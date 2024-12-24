<?php
return [
    'id' => 'app-common-tests',
    'basePath' => dirname(__DIR__),
    'components' => [
        'user' => [
            'class' => \yii\web\User::class,
            'identityClass' => 'common\models\User',
            'loginUrl' => ['site/login'], // 登录页面的 URL
            'defaultReturnUrl' => ['site/index'], // 默认返回页面的 URL
        ],
    ],
];
