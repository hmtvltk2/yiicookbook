<?php

use contrib\assets\metronic\MetronicAsset;
use yii\helpers\Html;

MetronicAsset::register($this);

$headerTitle = 'Hệ thống ABC';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<!-- begin::Head -->

<head>
    <meta charset="utf-8" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": [
                    "Roboto:300,400,500,600,700"
                ]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Fonts -->
    <?php $this->head() ?>

    <?php if (isset($this->blocks['extra-css'])) : ?>
    <?= $this->blocks['extra-css'] ?>
    <?php endif ?>
    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#5d78ff",
                    "dark": "#282a3c",
                    "light": "#ffffff",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": [
                        "#c5cbe3",
                        "#a1a8c3",
                        "#3d4465",
                        "#3e4466"
                    ],
                    "shape": [
                        "#f0f3ff",
                        "#d9dffa",
                        "#afb4d4",
                        "#646c9a"
                    ]
                }
            }
        };
    </script>
</head>
<!-- end::Head -->
<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--static kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">
    <?php $this->beginBody() ?>
    <!-- begin:: Page -->
    <?= $this->render('_header-base-mobile') ?>

    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            <!-- begin:: Aside -->
            <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
            <div class="kt-aside kt-aside--fixed kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
                <?= $this->render('_aside-brand') ?>
                <?= $this->render('_aside-menu') ?>
            </div>
            <!-- end:: Aside -->

            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                <?= $this->render('_header-base', ['headerTitle' => $headerTitle]) ?>
                <div class="kt-content kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                    <?= $this->render('_subheader-subheader-v3') ?>

                    <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
                        <?= $content ?>
                    </div>
                </div>
                <?= $this->render('_footer-base') ?>
            </div>
        </div>
    </div>
    <!-- end:: Page -->
    <?= $this->render('_layout-scrolltop') ?>



    <?php $this->endBody() ?>
    <script src="/app/js/app.js" type="text/javascript"></script>

    <?php if (isset($this->blocks['extra-script'])) : ?>
    <?= $this->blocks['extra-script'] ?>
    <?php endif ?>
</body>
<!-- end::Body -->

</html>
<?php $this->endPage() ?>