<?php

/**
 * Team: 啊对对队
 * Coding by 高鸿浩 2213411, 20241220
 * 各省综合AI竞争力php
 */

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ChinaMap $model */

$this->title = 'Create China Map';
$this->params['breadcrumbs'][] = ['label' => 'China Maps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="china-map-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
