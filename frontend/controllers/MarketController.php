<?php

/**
 * Team: 啊对对队
 * Coding by 高鸿浩 2213411, 20241219
 * AI产业及其市场份额占比php
 */

namespace frontend\controllers;

use common\models\Market;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NewsController implements the CRUD actions for News model.
 */
class MarketController extends Controller
{
    /**
     * @inheritDoc
     */
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
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [ // 使用 'actions' 而不是 'rules'
                        'delete' => ['POST'], // 确认仅允许 POST 请求
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all News models.
     *
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index');
    }
}
