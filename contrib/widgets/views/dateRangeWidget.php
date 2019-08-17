<?php

use yii\helpers\Html;

?>

<div class="input-daterange input-group">
    <?= Html::activeInput(
        'text',
        $model,
        $startAttribute,
        ['class' => 'form-control kt-input', 'placeholder' => 'Từ']
    ) ?>

    <div class="input-group-append">
        <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
    </div>
    <?= Html::activeInput(
        'text',
        $model,
        $endAttribute,
        ['class' => 'form-control kt-input', 'placeholder' => 'Đến']
    ) ?>
</div>