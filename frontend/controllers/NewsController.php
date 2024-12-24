<?php

/**
 * Team: 啊对对队
 * Coding by 蔡鸿 2212989, 20241222
 * 新闻php
 */

namespace frontend\controllers;

use common\models\News;
use common\models\Comments;
use common\models\CommentForm;
use frontend\controllers\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
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
                            'actions' => ['index', 'view'],
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
        $newsSearchModel = new NewsSearch();
        $newsDataProvider = $newsSearchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $newsSearchModel,
            'dataProvider' => $newsDataProvider,
        ]);
    }

    /**
     * Displays a single News model.
     * @param int $id News ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {   

        $newsModel = $this->findModel($id);
        // $comments = $this->findModel($id);
        $comments = Comments::find()->where(['news_id' => $id])->all();

        $commentForm = new CommentForm(); // Create an instance of CommentForm

        if ($commentForm->load($this->request->post()) && $commentForm->createComment()) {
            // Redirect to the same page after successfully posting a comment
            $console = $commentForm->content;
            echo "<script>console.log('Console: " . $console . "' );</script>";
            return $this->refresh();
        }


        return $this->render('view', [
            'NewsModel' => $newsModel,
            'CommentsModel' => $comments,
            'CommentFormModel' => $commentForm,
        ]);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id News ID
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
