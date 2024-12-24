<?php

/**
 * Team: 啊对对队
 * Coding by 蔡鸿 2212989, 20241221
 * 评论php
 */

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Comments;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CommentsController implements the CRUD actions for News model.
 */
class CommentsController extends Controller
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
        // 查询所有 Comments 数据
        $comments = Comments::find()->all();  // 或者使用更具体的查询条件

        // 把数据传递给视图
        return $this->render('index', [
            'CommentsModel' => $comments,
        ]);
    }
    protected function findModel($id)
    {   

        // 查询所有 Comments 数据
        $comments = Comments::find()->where(['id' => $id])->all();  // 或者使用更具体的查询条件

        // 把数据传递给视图
        return $this->render('index', [
            'CommentsModel' => $comments,
        ]);

    }
}