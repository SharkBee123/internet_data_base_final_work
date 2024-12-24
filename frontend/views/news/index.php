<?php

/**
 * Team: 啊对对队
 * Coding by 蔡鸿   2212989, 20241218
 * 新闻展示主页php
 */

use common\models\News;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\controllers\NewsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

// ?>

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">新闻热点</h1>
        <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php" class="text-white">Pages</a></li>
            <li class="breadcrumb-item active text-secondary">News</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'title:ntext',
            'abstract:ntext',
            [
                'class' => ActionColumn::className(),
                'template' => '{view}', // 只显示查看按钮
                'urlCreator' => function ($action, News $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'buttons' => [
                    'view' => function ($url, News $model, $key) {
                        return Html::a('<span class="fas fa-eye"></span>', $url, [
                            'title' => Yii::t('app', 'View'),
                            'data-pjax' => '0',
                            'class' => 'btn btn-sm btn-outline-secondary'
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>


</div>