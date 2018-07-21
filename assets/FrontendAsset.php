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
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/frontend.css',
        //'css/site.css',
        //'css/animate.css',
        //'css/font-awesome.min.css',

        /*'css/main-css/animate.min.css',
        'css/main-css/bootstrap.min.css',
        'css/main-css/font-awesome.min.css',
        'css/main-css/icomoon-fonts.css',
        'css/main-css/jPushMenu.css',
        'css/main-css/jquery.fancybox.css',
        'css/main-css/jquery.fancybox-thumbs.css',
        'css/main-css/loader.css',
        'css/main-css/loader-colorful.css',
        'css/main-css/one-color.css',
        'css/main-css/onepage.css',
        'css/main-css/owl.carousel.css',
        'css/main-css/owl.transitions.css',
        'css/main-css/settings.css',
        'css/main-css/zerogrid.css',*/
    ];
    public $js = [
        'js/skel.min.js',
        'js/jquery.min.js',
        'js/jquery.scrollex.min.js',
        'js/jquery.scrolly.min.js',
        'js/main.js',
        'js/util.js',
        'js/sweetalert.js'

        /*'js/main-js/jquery-2.1.4.js',
        'js/main-js/bootstrap.min.js',
        'js/main-js/jquery.themepunch.tools.min.js',
        'js/main-js/jquery.themepunch.revolution.min.js',
        'js/main-js/jquery.easing.min.js',
        'js/main-js/owl.carousel.min.js',
        'js/main-js/jquery-countTo.js',
        'js/main-js/jquery.appear.js', 
        'js/main-js/jquery.circliful.js',
        'js/main-js/jquery.mixitup.min.js',
        'js/main-js/wow.min.js',
        'js/main-js/jquery.parallax-1.1.3.js',
        'js/main-js/jquery.fancybox.js',
        'js/main-js/jquery.fancybox-thumbs.js',
        'js/main-js/jquery.fancybox-media.js',
        'js/main-js/jPushMenu.js',
        'js/main-js/functions.js',*/
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];

}
