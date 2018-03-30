<?php
/**
 * Created by PhpStorm.
 * User: feli
 * Date: 2018/3/13
 * Time: PM10:19
 */

namespace wm00689\assets;


use yii\web\AssetBundle;

class Layout3Asset extends AssetBundle
{
    public $baseUrl = '@static/metronic/assets';

    public $css = [
        'global/css/components-md.min.css',
        'global/css/plugins-md.min.css',

        'layouts/layout3/css/layout.min.css',
        'layouts/layout3/css/themes/default.min.css',
        'layouts/layout3/css/custom.min.css',
    ];
    public $js = [
        'layouts/layout3/scripts/layout.min.js',
        'layouts/layout3/scripts/demo.min.js',
        'layouts/global/scripts/quick-sidebar.min.js',
        'layouts/global/scripts/quick-nav.min.js'
    ];

    public $depends = [
        'wm00689\assets\GlobalAsset'
    ];
}