<?php

/**
 * Team: 啊对对队
 * Coding by 匡俊霖 2212565, 20241220
 * 前五大国人工智能各领域投入php
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\controllers\AiIndexSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ai-index-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Country') ?>

    <?= $form->field($model, 'Talent') ?>

    <?= $form->field($model, 'Infrastructure') ?>

    <?= $form->field($model, 'Operating_Environment') ?>

    <?= $form->field($model, 'Research') ?>

    <?php // echo $form->field($model, 'Development') ?>

    <?php // echo $form->field($model, 'Government_Strategy') ?>

    <?php // echo $form->field($model, 'Commercial') ?>

    <?php // echo $form->field($model, 'Total_score') ?>

    <?php // echo $form->field($model, 'Region') ?>

    <?php // echo $form->field($model, 'Cluster') ?>

    <?php // echo $form->field($model, 'Income_group') ?>

    <?php // echo $form->field($model, 'Political_regime') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
