<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use contrib\widgets\DateRangeWidget;
/* @var $this yii\web\View */
/* @var $searchModel appname\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon2-line-chart"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Danh sách customer
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
        <!--begin: Search Form -->
        <?php $form = ActiveForm::begin(['class' => 'kt-form kt-form--fit',  'fieldConfig' => [
            'options' => [
                'tag' => false,
            ],
        ],]) ?>
        <div class="row kt-margin-b-20">
            <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                <?= $form->field($searchModel, 'name')->textInput() ?>
            </div>
            <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                <?= $form->field($searchModel, 'address')->textInput() ?>
            </div>
            <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                <?= $form->field($searchModel, 'email')->textInput() ?>
            </div>
            <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                <?= $form->field($searchModel, 'id')->textInput() ?>
            </div>
        </div>
        <div class="row kt-margin-b-20">
            <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                <?= $form->field($searchModel, 'created_at')->widget(DateRangeWidget::className(), [
                    'startAttribute' => 'createdAtStart',
                    'endAttribute' => 'createdAtEnd'
                ]) ?>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <button class="btn btn-primary btn-brand--icon" type="submit">
                    <i class="la la-search"></i>
                    <span>Tìm kiếm</span>
                </button>
                &nbsp;&nbsp;

                <button type="reset" class="btn btn-secondary btn-secondary--icon">
                    <i class="la la-close"></i>
                    <span>Cài lại</span>
                </button>
            </div>
        </div>
        <?php ActiveForm::end() ?>
        <!--begin: Datatable -->

        <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>

        <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="table1">
            <thead>
                <tr>
                    <th>Subscriber ID</th>
                    <th>Install Location</th>
                    <th>Subscriber Name</th>
                    <th>some data</th>
                    <th>ngay tao</th>
                    <th width='1%'>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>


<?php $this->beginBlock('extra-script'); ?>
<script src="/metronic/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="/app/js/dtUtils.js" type="text/javascript"></script>

<script>
    $(function() {
        var table = createDataTable({
            tableSelector: '#table1',
            formSelector: 'form',
            tableUrl: '<?= Url::to(['datatable']) ?>',
            viewUrl: '<?= Url::to(['view']) ?>',
            updateUrl: '<?= Url::to(['update']) ?>',
            deleteUrl: '<?= Url::to(['delete']) ?>',
            customConfig: {
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'address'
                    },
                    {
                        data: 'created_at',
                        render: dtRenderDate
                    },
                    {
                        data: null,
                        responsivePriority: -1,
                    },
                ],
            }
        });

    })
</script>
<?php $this->endBlock(); ?>

<?php $this->beginBlock('extra-css'); ?>
<link href="/metronic/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css">
<?php $this->endBlock(); ?>