<?php

/**
 * Team: 啊对对队
 * Coding by 匡俊霖 2212565, 20241219
 * 前五大国人工智能各领域投入php
 */


namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\AiIndex;

class AiIndexController extends Controller
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
        // 查询所有 AiIndex 数据
        $data = AiIndex::find()->orderBy(['Total_score' => SORT_DESC])->limit(5)->all();  // 或者使用更具体的查询条件

        // 把数据传递给视图
        return $this->render('index', [
            'data' => $data,
        ]);
    }
}