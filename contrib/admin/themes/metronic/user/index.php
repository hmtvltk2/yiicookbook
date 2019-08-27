<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use contrib\admin\components\Helper;

$this->title = Yii::t('rbac-admin', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon2-line-chart"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                <?= Html::encode($this->title) ?>
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    <?= $this->render('@app/layout/partials/_export-menu') ?>

                    &nbsp;
                    <a href="<?= Url::to(['create']) ?>" class="btn btn-brand btn-elevate btn-icon-sm">
                        <i class="la la-plus"></i>
                        Thêm mới
                    </a>

                    <div id="buttons"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="kt-portlet__body">
        <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'username',
                    'email:email',
                    [
                        'attribute' => 'status',
                        'value' => function ($model) {
                            return $model->status == 0 ? 'Inactive' : 'Active';
                        },
                        'filter' => [
                            0 => 'Inactive',
                            10 => 'Active'
                        ]
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => Helper::filterActionColumn(['view', 'activate', 'delete']),
                        'buttons' => [
                            'activate' => function ($url, $model) {
                                if ($model->status == 10) {
                                    return '';
                                }
                                $options = [
                                    'title' => Yii::t('rbac-admin', 'Activate'),
                                    'aria-label' => Yii::t('rbac-admin', 'Activate'),
                                    'data-confirm' => Yii::t('rbac-admin', 'Are you sure you want to activate this user?'),
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, $options);
                            }
                        ]
                    ],
                ],
            ]);
        ?>
    </div>
</div>