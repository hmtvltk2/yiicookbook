<?php

namespace contrib\admin;

use yii\web\AssetBundle;


class AnimateAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@contrib/admin/assets';
    /**
     * @inheritdoc
     */
    public $css = [
        'animate.css',
    ];
}
