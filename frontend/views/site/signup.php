<?php

/**
 * Team: 啊对对队
 * Coding by 蔡鸿  2212989, 20241215
 * 注册界面php
 */

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
?>
<!-- <div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div> -->


<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Join Us</h1>
        <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
            <li class="breadcrumb-item active text-secondary">Sign</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<!-- 注册表 Start -->
<div class="container-fluid contact overflow-hidden py-5">
    <div class="container py-5">
        <div class="row g-5 mb-5">
            <!-- 注册表左侧 -->
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                <img src="img/contact-2.png" alt="Image" width="1350" height="625">
                <div class="carousel-caption-1">
                    <div class="text-center p-4" style="max-width: 900px;">
                        <p style="color: #003A62; font-size: 25px;font-style: italic;font-weight: bold;" data-wow-delay="0.5s">未来已来，探索人工智能无限可能！</p>
                    </div>
                </div>
            </div>

            <!-- 注册表右侧 -->
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3">
                <div class="site-login">
                    <h5 class="sub-title text-primary pe-3">注册加入我们！</h5>
                    <h1 class="display-5 mb-4">Sign up</h1>

                    <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'form-floating']]); ?>

                        <div class="g-4">
                            <div class="row">
                                <div class="col-12 col-md-8 col-lg-6">
                                    <div class="form-floating">
                                        <?= $form->field($model, 'username')->textInput([
                                            'autofocus' => true,
                                            'class' => 'form-control',
                                            'placeholder' => '账号'
                                        ])->label(false) ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-8 col-lg-6">
                                    <div class="form-floating">
                                        <?= $form->field($model, 'email')->textInput([
                                            'autofocus' => true,
                                            'class' => 'form-control',
                                            'placeholder' => '邮箱'
                                        ])->label(false) ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-8 col-lg-6">
                                    <div class="form-floating">
                                        <?= $form->field($model, 'password')->passwordInput([
                                            'class' => 'form-control',
                                            'placeholder' => '密码'
                                        ])->label(false) ?>
                                    </div>
                                </div>
                            </div>

                            <div id="result"></div>

                            <div class="row">
                                <div class="col-12 col-md-8 col-lg-6">
                                    <?= Html::submitButton('', ['class' => 'btn btn-primary w-100 py-3', 'name' => 'submit']) ?>
                                </div>
                            </div>

                            <div class="mymsg col-12">
                                返回登录
                                <?= Html::a('Login', ['site/login'], ['class' => '']) ?>
                            </div>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- 注册表 End -->
