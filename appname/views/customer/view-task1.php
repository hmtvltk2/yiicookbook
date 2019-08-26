<?php

use yii\helpers\Html;

?>
<h1><?= Html::encode($taskId) ?></h1>
<?= Html::beginForm() ?>
<?= Html::submitButton() ?>
<?= Html::endForm() ?>