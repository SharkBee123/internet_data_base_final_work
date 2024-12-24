<?php

/**
 * Team: 啊对对队
 * Coding by 匡俊霖 2212565, 20241218
 * AI历史发展进程php
 */


namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\AiHistory;

class AiHistoryController extends Controller
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
        // 获取所有大事记数据
        $aiHistoryData = AiHistory::find()->all(); // 查询所有数据

        // 将数据传递到视图
        return $this->render('index', [
            'aiHistoryData' => $aiHistoryData,
        ]);
    }
}