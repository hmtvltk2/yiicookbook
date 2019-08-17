<?php

use yii\helpers\Html;
use yii\grid\GridView;
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
        const url = '<?= Url::to(['datatable']) ?>';
        const formSelector = 'form';
        let table = $('#table1').DataTable({
            responsive: true,
            dom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [],
            buttons: [
                'print',
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            ajax: {
                url: url,
                data: function(data) {
                    return dtParseRequest(data, formSelector);
                }
            },
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
                    data: 'created_at'
                },
                {
                    data: null,
                    responsivePriority: -1,
                },
            ],
            columnDefs: [{
                    targets: -1,
                    orderable: false,
                    render: function(data, type, full, meta) {
                        return `
                        <div class="text-nowrap">
                            <a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="view?id=${data.id}" title="View">
                                <i class="la la-eye"></i>
                            </a>

                            <a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="update?id=${data.id}" title="Update">
                                <i class="la la-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="delete?id=${data.id}" title="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post">
                                <i class="la la-trash-o"></i>
                            </a>
                        </div>
                        `;
                    },
                },

            ],
        });

        dtRegisterButtonsEvent(table);
        dtRegisterSearchEvent(formSelector, table);
    })
</script>
<?php $this->endBlock(); ?>

<?php $this->beginBlock('extra-css'); ?>
<link href="/metronic/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css">
<?php $this->endBlock(); ?>