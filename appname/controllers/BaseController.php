<?php

namespace appname\controllers;

use Yii;
use yii\web\Controller;

class BaseController extends Controller
{
    public function logUserRead($message)
    {
        $this->logUserActivity($message, 'userRead');
    }

    public function logUserWrite($message)
    {
        $this->logUserActivity($message, 'userWrite');
    }

    private function logUserActivity($message, $type)
    {
        Yii::info($message, $type);
    }
}
