<?php

/**
 * Team: 啊对对队
 * Coding by 匡俊霖 2212565, 20241220
 * 前五大国人工智能各领域投入php
 */

use common\models\AiIndex;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\controllers\AiIndexSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ai Indices';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
.table th {
    background-color:rgb(37, 143, 196); 
    color: #fff; /* 白色文字 */
}

/* 鼠标悬浮效果 */
.table tbody tr:hover {
    background-color: #e6f7ff;
}
</style>

<div class="ai-index-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ai Index', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped table-bordered table-responsive'], // 添加响应式和条纹样式
        'columns' => [
            'Country',
            'Talent',
            'Infrastructure',
            'Operating_Environment',
            'Research',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AiIndex $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Country' => $model->Country]);
                 }
            ],
        ],
    ]); ?>


</div>
