<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel contrib\admin\models\searchs\Menu */

$this->title = Yii::t('rbac-admin', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  
    ?>

    <p>
        <?= Html::a(Yii::t('rbac-admin', 'Create Menu'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name',
                [
                    'attribute' => 'menuParent.name',
                    'filter' => Html::activeTextInput($searchModel, 'parent_name', [
                        'class' => 'form-control', 'id' => null
                    ]),
                    'label' => Yii::t('rbac-admin', 'Parent'),
                ],
                'route',
                'order',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'buttons' => [
                        'view' => function ($url, $model) { }
                    ]
                ],
            ],
        ]);
    ?>
    <?php Pjax::end(); ?>

</div>
<td>
    <div class="text-nowrap">
        <a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="view?id=1" title="View">
            <i class="la la-eye"></i>
        </a>

        <a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="update?id=1" title="Update">
            <i class="la la-edit"></i>
        </a>
        <a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="delete?id=1" title="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post">
            <i class="la la-trash-o"></i>
        </a>
    </div>
</td>