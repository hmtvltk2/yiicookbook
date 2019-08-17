<?php

namespace contrib\assets\metronic;

use yii\web\AssetBundle;

class MetronicAsset extends AssetBundle
{
    public $basePath = "@webroot/metronic";
    public $baseUrl = "@web/metronic";
    public $css = [
        'vendors/global/vendors.bundle.css',
        'css/demo1/style.bundle.css',
        'css/demo1/skins/header/base/light.css',
        'css/demo1/skins/header/menu/light.css',
        'css/demo1/skins/brand/dark.css',
        'css/demo1/skins/aside/dark.css',
    ];
    public $js = [
        'vendors/global/vendors.bundle.js',
        'js/demo1/scripts.bundle.js',
    ];

    public $depends = [
        'yii\web\YiiAsset'
    ];
}
