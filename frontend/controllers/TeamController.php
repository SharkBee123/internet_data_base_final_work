<?php

/**
 * Team: 啊对对队
 * Coding by 马有朝 2211631, 20241218
 * 团队成员表控制php
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Owers;

class TeamController extends Controller
{
    /**
     * Displays all owers.
     * @return mixed
     */
    public function actionIndex()
    {
        $models = Owers::find()->all(); // 获取所有记录
        return $this->render('index', ['models' => $models]);
    }
}