<?php

/**
 * Team: 啊对对队
 * Coding by 匡俊霖 2212565, 20241220
 * 前五大国人工智能各领域投入php
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\AiIndex $model */

$this->title = $model->Country;
$this->params['breadcrumbs'][] = ['label' => 'Ai Indices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ai-index-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Country' => $model->Country], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Country' => $model->Country], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Country',
            'Talent',
            'Infrastructure',
            'Operating_Environment',
            'Research',
            'Development',
            'Government_Strategy',
            'Commercial',
            'Total_score',
            'Region',
            'Cluster',
            'Income_group',
            'Political_regime',
        ],
    ]) ?>

</div>
