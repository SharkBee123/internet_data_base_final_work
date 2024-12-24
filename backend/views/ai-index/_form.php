<?php

/**
 * Team: 啊对对队
 * Coding by 匡俊霖 2212565, 20241220
 * 前五大国人工智能各领域投入php
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\AiIndex $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ai-index-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Talent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Infrastructure')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Operating_Environment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Research')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Development')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Government_Strategy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Commercial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Total_score')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Cluster')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Income_group')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Political_regime')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
