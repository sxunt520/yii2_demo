<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\controllers',
    'modules' => [
	    'xxx1' => [
            'class' => 'api\modules\xxx1\Module',
        ],
        'v1' => [
            'class' => 'api\modules\v1\Module',
        ],
        'v2' => [
            'class' => 'api\modules\v2\Module',
        ],
	],
    'components' => [
         'user' => [ 
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'enableSession'=>false
         ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'enableStrictParsing' => true,//这个为true 为验证后面是否为复数有s
            'rules' => [
                            // 'class' => 'yii\rest\UrlRule',
                            // 'controller' => ['v1/user'],
                            // 'extraPatterns' => [
                            //     'POST login' => 'login',
                            //     'POST signup' => 'signup',
                            //     'GET user-profile' => 'user-profile',
                            //   //'GET signup-test' => 'signup-test',
                            // ],
                            'POST users' => 'user/signup',
                            'POST users' => 'user/login',
                            'GET,HEAD users' => 'user/user-profile',
                     ],
          ],
            'response' => [
                'class' => 'yii\web\Response',
                'on beforeSend' => function ($event) {
                        $response = $event->sender;
                        $response->data = [
                            'code' => $response->getStatusCode(),
                            'data' => $response->data,
                            'message' => $response->statusText
                        ];
                        $response->format = yii\web\Response::FORMAT_JSON;
                    },
            ], 
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

    ],
    'params' => $params,
];
