<?php
/**
 * Created by PhpStorm.
 * User: feli
 * Date: 2018/1/27
 * Time: AM7:18
 */

namespace wm00689\assets\music;


use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{

    public $baseUrl = '@static';

    public $css = [
        'music/css/components-md.css',
        'music/js/jPlayer/jplayer.flat.css',
        'music/css/bootstrap.css',
        'music/css/animate.css',
        'music/css/font-awesome.min.css',
        'music/css/simple-line-icons.css',
        'music/css/font.css',
        'music/css/app.css',
        'plugins/validform/css/style.css',
       // 'js/bootstrap-sweetalert/sweetalert.css',
    ];

    public $js = [
        'music/js/jquery.min.js',
        //'js/bootstrap/js/bootstrap.js',
       // 'js/ui-confirmations.min.js',
        'music/js/bootstrap.js',
        'music/js/bootstrap-sweetalert/sweetalert.js',
        //'js/app.js',
        'music/js/slimscroll/jquery.slimscroll.min.js',
        'music/js/sortable/jquery.sortable.js',
      //  'js/charts/sparkline/jquery.sparkline.min.js',
        //'js/app.plugin.js',
       // 'js/jPlayer/jquery.jplayer.min.js',
      //  'js/jPlayer/add-on/jplayer.playlist.min.js',
       // 'js/jPlayer/demo.js',
        'plugins/validform/js/Validform_v5.3.2_min.js',
        'music/js/admin.js'
    ];

    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}