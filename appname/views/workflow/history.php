<?php

use yii\helpers\Url;

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
        <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="table1">
            <thead>
                <tr>
                    <th> ID</th>
                    <th>Task name</th>
                    <th>Assignee</th>
                    <th>Created at</th>
                    <th>Finished at</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task) : ?>
                <tr>
                    <td><?= $task->id ?></td>
                    <td><?= $task->name ?></td>
                    <td><?= $task->assigneeUser->full_name ?></td>
                    <td><?= $task->created_at ?></td>
                    <td><?= $task->finished_at ?></td>


                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>