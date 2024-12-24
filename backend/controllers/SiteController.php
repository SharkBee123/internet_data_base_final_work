<?php

/**
 * Team: 啊对对队
 * Coding by 高鸿浩 2213411, 20241223
 * 网站总控制php
 */

namespace backend\controllers;

use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {   
        // 新闻搜索和数据提供者
        $newsSearchModel = new NewsSearch();
        $newsDataProvider = $newsSearchModel->search($this->request->queryParams);

        // 用户搜索和数据提供者
        $userSearchModel = new UserSearch();
        $userDataProvider = $userSearchModel->search($this->request->queryParams);

        return $this->render('index', [
            'newsSearchModel' => $newsSearchModel,
            'newsDataProvider' => $newsDataProvider,
            'userSearchModel' => $userSearchModel,
            'userDataProvider' => $userDataProvider,
        ]);
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {   
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }


        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
