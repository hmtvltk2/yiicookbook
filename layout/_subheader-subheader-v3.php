<?php

use yii\helpers\Url;

$breadcrumbs = isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [];
?>
<!-- begin:: Content Head -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
    <div class="kt-container kt-container--fluid ">
        <div class="kt-subheader__main">

            <h3 class="kt-subheader__title">
                <?= $this->title ?> </h3>

            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="/" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>

                <?php foreach ($breadcrumbs as $item) : ?>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <?php if (is_string($item)) : ?>
                <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active"><?= $item ?></span>
                <?php else : ?>
                <a href="<?= Url::to($item['url']) ?>" class="kt-subheader__breadcrumbs-link">
                    <?= $item['label'] ?> </a>
                <?php endif ?>
                <?php endforeach ?>

            </div>

        </div>
        <div class="kt-subheader__toolbar">
            <div class="kt-subheader__wrapper">
                <?php if (isset($this->blocks['subheader-toolbar'])) : ?>
                <?= $this->blocks['subheader-toolbar'] ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<!-- end:: Content Head -->