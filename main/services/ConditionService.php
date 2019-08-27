<?php

namespace main\services;

use main\models\Customer;
use contrib\workflow\models\Flow;
use contrib\workflow\models\Process;

class ConditionService
{
    public static function conditionN1($processId)
    {
        $process = Flow::getProcessById($processId);
        $customer = Customer::findOne(['id' => $process->ref_id]);
        return strlen($customer->name) > 10;
    }
}
