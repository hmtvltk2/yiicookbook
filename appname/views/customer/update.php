<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model appname\models\Customer */

$this->title = 'Update Customer: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
    </div>
    <div class="kt-portlet__body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>