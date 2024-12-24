<?php

/**
 * Team: 啊对对队
 * Coding by 蔡鸿 2212989, 20241219
 * 新闻php
 */

use common\models\News;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\controllers\NewsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'News';
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

<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create News', ['news/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'tableOptions' => ['class' => 'table table-striped table-bordered table-responsive'], // 添加响应式和条纹样式
    'columns' => [
        [
            'attribute' => 'id',
            'format' => ['decimal', 0], // 添加千位分隔符
        ],
        [
            'attribute' => 'title',
            'format' => 'ntext',
            'value' => function ($model) {
                return mb_substr($model->title, 0, 50) . (mb_strlen($model->title) > 50 ? '...' : '');
            }, // 限制显示字符数
        ],
        [
            'attribute' => 'abstract',
            'format' => 'ntext',
            'value' => function ($model) {
                return mb_substr($model->abstract, 0, 100) . (mb_strlen($model->abstract) > 100 ? '...' : '');
            }, // 限制显示字符数
        ],
        [
            'attribute' => 'context',
            'format' => 'ntext',
            'value' => function ($model) {
                return mb_substr($model->context, 0, 200) . (mb_strlen($model->context) > 200 ? '...' : '');
            }, // 限制显示字符数
        ],
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, News $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
             }
        ],
    ],
]); ?>


</div>
