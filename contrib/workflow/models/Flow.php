<?php

namespace contrib\workflow\models;

use contrib\workflow\Helper;
use yii\helpers\VarDumper;

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
            $node->code = $jsonNode->code;
            $node->type = $jsonNode->type;
            $node->condition = $jsonNode->condition;
            $node->view = $jsonNode->view;
            $node->name = $this->valueOf($jsonNode, 'name');
            $node->assignType = $this->valueOf($jsonNode, 'assignType');
            $node->assignValue = $this->valueOf($jsonNode, 'assginValue');
            $node->prevConditionResult = $this->valueOf($jsonNode, 'prevConditionResult');
            $this->nodes[$jsonNode->code] = $node;
        }
        // create transition
        foreach ($json as $jsonNode) {
            $code = $jsonNode->code;
            foreach ($jsonNode->nexts as $next) {
                $this->nodes[$code]->nexts[] = $this->nodes[$next];
            }
        }
    }

    public static function createFlow($id)
    {
        $flowDefinition = FlowDefinition::findOne(['id' => $id]);
        $json = json_decode($flowDefinition->schema);

        return new Flow($json, $id);
    }

    public function getStartView()
    {
        return $this->nodes['start']->view;
    }

    public function completeStart($userId)
    {
        // create process
        $process = new Process();
        $process->flow_id = $this->flowDefinitionId;
        $process->completed = false;
        $process->status = 1;
        $process->save();

        // create task
        $startTask = $this->nodes['start']->createTask($process->id);

        // complete start task
        $this->completeTask($startTask->id, $userId);
    }

    // public static function createTask($processId, $node)
    // {
    //     $task = new Task();
    //     $task->process_id = $processId;
    //     $task->name = $node->name;
    //     $task->completed = false;
    //     $task->created_at = date_create();
    //     $task->node_code = $node->code;
    //     $task->save();
    //     return $task;
    // }

    public function completeTask($taskId, $userId)
    {
        // complete task
        $task = Task::findOne(['id' => $taskId]);
        $task->completed = true;
        $task->assignee = $userId;
        $task->finished_at = Helper::now();
        $task->save();

        // create next task
        $this->nodes[$task->node_code]->next($task->process_id);
    }

    private function valueOf($obj, $property)
    {
        return property_exists($obj, $property) ? $obj->$property : null;
    }
}
