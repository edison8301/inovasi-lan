<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FrontendAsset extends AssetBundle
{
    public $sourcePath = '@jvectormap/src';
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/frontend.css',
        'js/jsmaps/jsmaps.css',
        'js/jvectormap/jquery-jvectormap-2.0.3.css'
    ];
    public $js = [
        'js/raphael.js',
        'js/jvectormap/jquery-jvectormap-2.0.3.min.js',
        'js/jvectormap/jvectormap-asia-mill.js',
        'js/jvectormap/jvectormap-indonesia.js',
        'js/jsmaps/jsmaps.js',
        'js/jsmaps/jsmaps-libs.js',
        'js/jsmaps/jsmaps-panzoom.js',
        'js/jsmaps/jsmaps.min.js',
        'js/jsmaps/indonesia.js',
        'js/jsmaps/kabupaten.js',
        'js/jsmaps/kabupaten-aceh.js',
        'js/kinetic/kinetic-v5.1.0.min.js',
        'js/fusioncharts/js/fusioncharts.js',
        'js/fusioncharts/js/themes/fusioncharts.theme.fint.js',
        'js/tooltip-master/js/Tooltip.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_BEGIN
    ];

}
