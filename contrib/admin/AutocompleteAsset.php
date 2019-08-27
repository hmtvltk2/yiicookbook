<?php

namespace contrib\admin;

use yii\web\AssetBundle;

/**
 * AutocompleteAsset
 *

 */
class AutocompleteAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@contrib/admin/assets';
    /**
     * @inheritdoc
     */
    public $css = [
        'jquery-ui.min.css',
    ];
    /**
     * @inheritdoc
     */
    public $js = [
        'jquery-ui.min.js',
    ];
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
