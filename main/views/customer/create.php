<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model main\models\Customer */

$this->title = 'Create Customer';
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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