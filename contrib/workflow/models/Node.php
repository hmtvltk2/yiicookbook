<?php

namespace contrib\workflow\models;

use contrib\workflow\Helper;
use Yii;

class Node
{
    public $name;
    public $code;
    public $type;
    public $condition;
    public $view;
    public $assignType;
    public $assignValue;
    public $prevConditionResult;
    public $previous = [];
    public $nexts = [];

    const TASK = 'task';
    const START = 'start';
    const EXCLUSIVE = 'exclusive';
    const PARALLEL = 'parallel';
    const ASSIGN_OWNER = 'owner';
    const ASSIGN_USER = 'user';
    const ASSIGN_GROUP = 'group';
    const ASSIGN_PERMISSION = 'permission';

    public function createTask($processId)
    {
        $task = new Task();
        $task->process_id = $processId;
        $task->name = $this->name;
        $task->completed = false;
        $task->created_at = Helper::now();
        $task->node_code = $this->code;
        switch ($this->assignType) {
            case static::ASSIGN_OWNER:
                $process = $this->getProcess($processId);
                $task->assignee = $process->created_by;
                break;
            case static::ASSIGN_USER:
                $task->assignee = $this->assignValue;
                break;
            case static::ASSIGN_GROUP:
                $task->group = $this->assignValue;
                break;
            case static::ASSIGN_PERMISSION:
                $task->permission = $this->assignValue;
                break;
        }
        $task->save();
        return $task;
    }

    public function next($processId)
    {
        if (count($this->nexts) == 0) {
            return;
        }

        foreach ($this->nexts as $node) {
            Yii::trace($node);
            switch ($node->type) {
                case static::TASK:
                    // create task
                    $node->createTask($processId);
                    break;
                case static::EXCLUSIVE:
                    $result = call_user_func($node->condition);
                    foreach ($node->nexts as $next) {
                        if ($next->prevConditionResult == $result) {
                            $next->next();
                        }
                    }
                    break;
                case static::PARALLEL:

                    break;
                default:
                    break;
            }
        }
    }

    private function getProcess($id)
    {
        if (($model = Process::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
