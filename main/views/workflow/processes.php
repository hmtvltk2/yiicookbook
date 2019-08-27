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
                Danh sách process
            </h3>
        </div>
        <!-- <div class="kt-portlet__head-toolbar">
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
        </div> -->
    </div>

    <div class="kt-portlet__body">
        <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="table1">
            <thead>
                <tr>
                    <th> ID</th>
                    <th>Process name</th>
                    <th>Created at</th>
                    <th>Created by</th>
                    <th>Finished at</th>
                    <!-- <th>Completed</th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($processes as $process) : ?>
                <tr>
                    <td><?= $process->id ?></td>
                    <td><?= $process->flowDefinition->name ?></td>
                    <td><?= $process->created_at ?></td>
                    <td><?= $process->created_by ?></td>
                    <td><?= $process->finished_at ?></td>
                    <!-- <td><?= $process->completed ?></td> -->


                    <td>
                        <a href="<?= Url::to(['history', 'processId' => $process->id]) ?>" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            History
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>