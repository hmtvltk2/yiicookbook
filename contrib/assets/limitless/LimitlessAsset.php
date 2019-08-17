<?php

namespace contrib\assets\limitless;

use yii\web\AssetBundle;

class LimitlessAsset extends AssetBundle
{
    public $sourcePath = '@contrib/assets/limitless';
    public $css = [
        // 'css/bootstrap.min.css',
        'css/bootstrap_limitless.min.css',
        'css/components.min.css',
        'css/colors.min.css',
        'css/layout.min.css',
        'css/styles.css'
    ];
    public $js = [
        'js/app.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset'
    ];
}
