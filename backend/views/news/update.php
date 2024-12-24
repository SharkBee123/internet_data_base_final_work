<?php

/**
 * Team: 啊对对队
 * Coding by 蔡鸿 2212989, 20241219
 * 新闻php
 */

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\News $model */

$this->title = 'Update News: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="news-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
