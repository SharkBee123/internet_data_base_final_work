<?php

/**
 * Team: 啊对对队
 * Coding by 高鸿浩 2213411, 20241220
 * 各省综合AI竞争力php
 */

use common\models\ChinaMap;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\controllers\ChinaMapSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'China Maps';
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

<div class="china-map-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create China Map', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped table-bordered table-responsive'], // 添加响应式和条纹样式
        'columns' => [
            'id',
            'province',
            'competitiveness_index',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ChinaMap $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
