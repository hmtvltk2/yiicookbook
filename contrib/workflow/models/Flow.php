<?php

namespace contrib\workflow\models;

use contrib\DebugUtil;
use contrib\workflow\Constant;
use contrib\workflow\Helper;
use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;

class Flow
{
    public $flowDefinitionId;
    public $name;
    public $nodes;

    public function __construct($json, $flowDefinitionId)
    {
        $this->flowDefinitionId = $flowDefinitionId;
        $this->nodes = [];
        // create nodes
        foreach ($json as $jsonNode) {
            $node = new Node();
            $node->flowDeninitionId = $this->flowDefinitionId;
            $node->code = $jsonNode->code;
            $node->type = $jsonNode->type;
            $node->condition = $jsonNode->condition;
            $node->view = $jsonNode->view;
            $node->name = $this->valueOf($jsonNode, 'name');
            $node->assignType = $this->valueOf($jsonNode, 'assignType');
            $node->assignValue = $this->valueOf($jsonNode, 'assignValue');
            $node->prevConditionResult = $this->valueOf($jsonNode, 'prevConditionResult');
            $node->nexts = $jsonNode->nexts;
            $node->previous = $this->valueOf($jsonNode, 'previous');
            $this->nodes[$jsonNode->code] = $node;
        }
    }

    public static function createFlow($id)
    {
        $flowDefinition = FlowDefinition::findOne(['id' => $id]);
        $json = json_decode($flowDefinition->schema);

        return new Flow($json, $id);
    }

    public function createProcess($userId)
    {
        // create process
        $process = new Process();
        $process->flow_id = $this->flowDefinitionId;
        $process->created_at = Helper::now();
        $process->created_by = $userId;
        $process->completed = false;
        $process->status = Constant::STATUS_ACTIVE;
        $process->save();
        return $process;
    }

    public function createFirstTask($userId)
    {
        $process = static::createProcess($userId);
        $this->next($this->nodes['start'], $process->id);
        $tasks = $this->findTaskOfUserByProcessId($userId, $process->id);
        return isset($tasks[0]) ? $tasks[0] : null;
    }

    public static function getTaskOfUserQuery($userId)
    {
        $rolesOfUser = static::getRolesOfUser($userId);
        // DebugUtil::dumpdie($rolesOfUser);
        return Task::find()
            ->where(['completed' => false])
            ->andWhere(['or', ['assignee' => $userId], ['group' => $rolesOfUser], ['permission' => $rolesOfUser]]);
    }


    public function completeTask($taskId, $userId)
    {
        // complete task
        $task = $this->getTaskById($taskId);
        $task->completed = true;
        $task->assignee = $userId;
        $task->finished_at = Helper::now();
        $task->save();

        Yii::info($task->node_code);
        // create next task
        $currentNode = $this->nodes[$task->node_code];
        $this->next($currentNode, $task->process_id);
    }

    public function next($prevNode, $processId)
    {
        if (count($prevNode->nexts) == 0) {
            return;
        }

        foreach ($prevNode->nexts as $next) {
            $node = $this->nodes[$next];
            $this->initTask($node, $processId);
        }
    }

    public function initTask($node, $processId)
    {
        switch ($node->type) {
            case Constant::TASK:
                // create task
                $node->createTask($processId);
                break;
            case Constant::EXCLUSIVE:
                $result = call_user_func($node->condition, $processId);
                Yii::info('exclusive:' . $node->condition . strval($result));

                foreach ($node->nexts as $code) {
                    Yii::info('nextnode:' . $code);
                    $nextNode = $this->nodes[$code];
                    if ($nextNode->prevConditionResult == $result) {
                        $this->initTask($nextNode, $processId);
                        break;
                    }
                }
                break;
            case Constant::PARALLEL:
                // Kiểm tra tất cả task của các node trước hoàn thành thì execute node parallel
                $previousTasks = Task::find()
                    ->where(['node_code' => $node->previous, 'process_id' => $processId, 'completed' => true])
                    ->count();

                break;
            default:
                break;
        }
    }

    public static function getTaskById($id)
    {
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function valueOf($obj, $property)
    {
        return property_exists($obj, $property) ? $obj->$property : null;
    }

    private function findTaskOfUserByProcessId($userId, $processId)
    {
        $tasks = self::getTaskOfUserQuery($userId)->andWhere(['process_id' => $processId])->all();
        return $tasks;
    }

    private static function getRolesOfUser($userId)
    {
        $roles = (new Query())->from('auth_assignment')
            ->where(['user_id' => $userId])
            ->select('item_name')
            ->all();

        return ArrayHelper::getColumn($roles, 'item_name');
    }
}
