<?php

/**
 * Team: 啊对对队
 * Coding by 蔡鸿   2212989, 20241218
 * 新闻搜索php
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\controllers\NewsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="news-search">

    <?php $form = ActiveForm::begin([
        'action' => ['news/index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'abstract') ?>

    <?= $form->field($model, 'context') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
