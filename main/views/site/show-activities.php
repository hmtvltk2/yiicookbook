<?php
$formatter = \Yii::$app->formatter;
?>
<table class="table">
    <thead>
        <th>Thời gian</th>
        <th>Hoạt động</th>
    </thead>
    <tbody>
        <?php foreach ($activities as $activity) : ?>
        <tr>
            <td><?= $formatter->asDatetime($activity['log_time']) ?></td>
            <td><?= $activity['message'] ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>