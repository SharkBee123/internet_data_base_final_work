<?php

/**
 * Team: 啊对对队
 * Coding by 匡俊霖 2212565, 20241220
 * 前五大国人工智能各领域投入php
 */

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\AiIndex $model */

$this->title = 'Create Ai Index';
$this->params['breadcrumbs'][] = ['label' => 'Ai Indices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ai-index-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
