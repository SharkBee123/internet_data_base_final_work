<?php

/**
 * Team: 啊对对队
 * Coding by 马有朝 2211631, 20241220
 * 错误页面php
 */

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = $name;
?>

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php" class="text-white">Pages</a></li>
            <li class="breadcrumb-item active text-secondary">404 not found</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<!-- 404 Start -->
<div class="container-fluid bg-light py-5">
    <div class="container py-5 text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <i class="bi bi-exclamation-triangle display-1 text-secondary"></i>
                <h1 class="display-1">404</h1>
                <h1 class="mb-4">Page Not Found</h1>
                <p class="mb-4"><?= Html::encode($exception->getMessage()) ?></p>
                <a class="btn btn-primary rounded-pill py-3 px-5" href="<?= Url::to(['site/index']) ?>">Go Back To Home</a>
            </div>
        </div>
    </div>
</div>
<!-- 404 End -->