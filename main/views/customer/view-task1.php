<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<h1><?= Html::encode($taskId) ?></h1>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    <a href="javascript:window.history.back()" class="btn btn-default btn-bold">

        Cancel </a>
</div>

<?php ActiveForm::end(); ?>