<?php
return [
    'id' => 'app-backend-tests',
    'components' => [
        'assetManager' => [
            'basePath' => __DIR__ . '/../web/assets',
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
        'request' => [
            'cookieValidationKey' => 'test',
        ],
        'user' => [
            'class' => \yii\web\User::class,
            'identityClass' => 'common\models\User',
            'loginUrl' => ['site/login'], // 登录页面的 URL
            'defaultReturnUrl' => ['site/err'], // 默认返回页面的 URL
        ],
    ],
];
