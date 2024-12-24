<?php

/**
 * Team: 啊对对队
 * Coding by 匡俊霖 2212565, 20241219
 * 近六年投资数量与投资额发展php
 */


namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\InvestmentData;

class InvestmentDataController extends Controller
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
        // 从数据库中查询投资数量和投资额的数据
        $investmentData = InvestmentData::find()->all();

        // 初始化年份、投资数量和投资额的数组
        $years = [];
        $investmentQuantities = [];
        $investmentAmounts = [];

        foreach ($investmentData as $data) {
            $years[] = $data->year;
            $investmentQuantities[] = $data->investment_quantity;
            $investmentAmounts[] = $data->investment_amount;
        }
        // 将数据传递给视图
        return $this->render('index', [
            'years' => $years,
            'investmentQuantities' => $investmentQuantities,
            'investmentAmounts' => $investmentAmounts,
        ]);
    }
}