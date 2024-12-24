<?php

/**
 * Team: 啊对对队
 * Coding by 高鸿浩 2213411, 20241220
 * 各省综合AI竞争力php
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ChinaMap $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="china-map-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'competitiveness_index')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
