<?php

/**
 * Team: 啊对对队
 * Coding by 马有朝 2211631, 20241217
 * 用户php
 */

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\controllers\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Users';
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

<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['users/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped table-bordered table-responsive'], // 添加响应式和条纹样式
        'columns' => [
            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
