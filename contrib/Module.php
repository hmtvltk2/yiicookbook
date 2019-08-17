<?php

namespace contrib;

class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();
        $this->modules = [
            'assets' => [
                'class' => 'contrib\assets\Module'
            ],
            'components' => 'contrib\components\Module',
            'testmodule' => [
                'class' => 'contrib\testmodule\Module',
            ],
        ];
    }
}
