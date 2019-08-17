<?php

namespace contrib\widgets;

use yii\widgets\InputWidget;

class DateRangeWidget extends InputWidget
{
    public $startAttribute;
    public $endAttribute;
    public function run()
    {
        return $this->render('dateRangeWidget', [
            'model' => $this->model,
            'startAttribute' => $this->startAttribute,
            'endAttribute' => $this->endAttribute
        ]);
    }
}
