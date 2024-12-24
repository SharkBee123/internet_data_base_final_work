<?php

/**
 * Team: 啊对对队
 * Coding by 匡俊霖 2212565, 20241222
 * AIindex表控制php
 */


namespace backend\controllers;

use common\models\AiIndex;
use backend\controllers\AiIndexSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AiIndexController implements the CRUD actions for AiIndex model.
 */
class AiIndexController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all AiIndex models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AiIndexSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AiIndex model.
     * @param string $Country Country
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Country)
    {
        return $this->render('view', [
            'model' => $this->findModel($Country),
        ]);
    }

    /**
     * Creates a new AiIndex model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AiIndex();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Country' => $model->Country]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AiIndex model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $Country Country
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Country)
    {
        $model = $this->findModel($Country);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Country' => $model->Country]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AiIndex model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $Country Country
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Country)
    {
        $this->findModel($Country)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AiIndex model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $Country Country
     * @return AiIndex the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Country)
    {
        if (($model = AiIndex::findOne(['Country' => $Country])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
