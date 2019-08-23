<?php

namespace contrib\workflow;

use contrib\workflow\models\Task;

class WorkflowService
{
    public static function getTaskOfUser($userId)
    {
        return Task::find()
            ->where([
                'assignee' => $userId,
                'completed' => false
            ]);
    }
}
