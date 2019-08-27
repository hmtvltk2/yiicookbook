<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \contrib\admin\models\form\Login */

$this->title = Yii::t('rbac-admin', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <!--end::Base Path -->
    <meta charset="utf-8" />
    <title><?= $this->title ?></title>
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Fonts -->

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="/metronic/css/demo1/pages/login/login-6.css" rel="stylesheet" type="text/css" />

    <!--end::Page Custom Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="/metronic/vendors/global/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/metronic/css/demo1/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="/metronic/css/demo1/skins/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="/metronic/css/demo1/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="/metronic/css/demo1/skins/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="/metronic/css/demo1/skins/aside/dark.css" rel="stylesheet" type="text/css" />

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="/metronic/media/logos/favicon.ico" />
    <style>
        .help-block {
            width: 100%;
            margin-top: 0.25rem;
            font-size: 93%;
            color: #fd397a;
        }
    </style>
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
                    "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                    "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                }
            }
        };
    </script>
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v6 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
                <div class="kt-grid__item  kt-grid__item--order-tablet-and-mobile-2  kt-grid kt-grid--hor kt-login__aside">
                    <div class="kt-login__wrapper">
                        <div class="kt-login__container">
                            <div class="kt-login__body">
                                <div class="kt-login__logo">
                                    <a href="#">
                                        <img src="/metronic/media/company-logos/logo-2.png">
                                    </a>
                                </div>
                                <div class="kt-login__signin">
                                    <div class="kt-login__head">
                                        <h3 class="kt-login__title">Đăng nhập</h3>
                                    </div>
                                    <div class="kt-login__form">
                                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                                        <?= $form->field($model, 'username')->textInput(['placeholder' => 'Tên đăng nhập'])->label(false) ?>
                                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Mật khẩu'])->label(false) ?>
                                        <div class="kt-login__extra">
                                            <?= $form->field($model, 'rememberMe')->checkbox(['label' => 'Ghi nhớ <span></span>', 'labelOptions' => ['class' => 'kt-checkbox']]) ?>
                                        </div>
                                        <div class="kt-login__actions">
                                            <?= Html::submitButton(Yii::t('rbac-admin', 'Login'), ['class' => 'btn btn-brand btn-pill btn-elevate', 'name' => 'login-button']) ?>
                                        </div>
                                        <?php ActiveForm::end(); ?>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
                <div class="kt-grid__item kt-grid__item--fluid kt-grid__item--center kt-grid kt-grid--ver kt-login__content" style="background-image: url(/metronic/media//bg/bg-4.jpg);">
                    <div class="kt-login__section">
                        <div class="kt-login__block">
                            <h3 class="kt-login__title">Join Our Community</h3>
                            <div class="kt-login__desc">
                                Hello
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Page -->

    <!-- begin::Global Config(global config for global JS sciprts) -->


    <!-- end::Global Config -->

    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/metronic/vendors/global/vendors.bundle.js" type="text/javascript"></script>
    <script src="/metronic/js/demo1/scripts.bundle.js" type="text/javascript"></script>

    <!--end::Global Theme Bundle -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="/metronic/js/demo1/pages/login/login-general.js" type="text/javascript"></script>

    <!--end::Page Scripts -->
</body>

<!-- end::Body -->

</html>