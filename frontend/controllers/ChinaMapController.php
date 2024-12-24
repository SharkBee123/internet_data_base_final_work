<?php

/**
 * Team: 啊对对队
 * Coding by 匡俊霖 2212565, 20241219
 * 中国地图php
 */


namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Chinamap;

class ChinaMapController extends Controller
{   
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => \yii\filters\AccessControl::className(),
                    'rules' => [
                        [
                            'actions' => ['index'],
                            'allow' => true,
                            'roles' => ['@'], // 确保用户已登录才能访问这些动作
                        ],
                    ],
                ],
            ]
        );
    }
    public function actionIndex()
    {
        // 从数据库中获取所有省份和竞争力指数
        $competitivenessData = Chinamap::find()->select(['province', 'competitiveness_index'])->asArray()->all();
        
        // 将数据整理成一个键值对数组，键是省份名称，值是竞争力指数
        $competitivenessData = array_column($competitivenessData, 'competitiveness_index', 'province');

        // 将数据传递到视图
        return $this->render('index', [
            'competitivenessData' => $competitivenessData,
        ]);
    }
}