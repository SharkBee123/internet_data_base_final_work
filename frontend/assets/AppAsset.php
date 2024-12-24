<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Poppins:wght@200;300;400;500;600&display=swap',
        'https://use.fontawesome.com/releases/v5.15.4/css/all.css',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css',
        'lib/animate/animate.min.css',
        'https://fonts.googleapis.com',
        'lib/owlcarousel/assets/owl.carousel.min.css',
        'css/bootstrap.min.css',
        'css/style.css',
    ];

    public $js = [
        'js/jquery.min.js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js',
        'lib/wow/wow.min.js', // 确保此行在 main.js 之前
        'lib/easing/easing.min.js',
        'lib/waypoints/waypoints.min.js',
        'lib/counterup/counterup.min.js',
        'lib/owlcarousel/owl.carousel.min.js',
        'js/main.js',
        'js/jsencrypt.js',
        'js/jsencrypt.min.js',
        'js/crypto-js.min.js'
    ];
    // 确保 jQuery 和 Bootstrap 在其他依赖之前加载
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
