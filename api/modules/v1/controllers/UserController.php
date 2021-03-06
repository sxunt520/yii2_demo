<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;
use yii\filters\auth\QueryParamAuth;
use yii\web\IdentityInterface;
use api\models\User;
use api\models\LoginForm;

class UserController extends ActiveController
{
    public $modelClass = 'api\models\User';

    public function behaviors() {
        return ArrayHelper::merge (parent::behaviors(), [ 
                'authenticator' => [ 
                    'class' => QueryParamAuth::className() ,
                    'tokenParam' => 'token',
                    'optional' => [//过滤不需要验证的action
	                    'login',
	                    'signup',
	                  //'signup-test'

	                ],
                ] 
        ] );
    }

    
	/**
	 * 添加测试用户
	 */
	public function actionSignup ()
	{
	    $user = new User();
	    $user->username = 'admin'; 
	    $user->setPassword('123456');
	    $user->generateAuthKey();
	    $user->save(false);
	    return [ 'code' => 200 ];
	 }

	 /**
	 * 登录
	 */
	public function actionLogin ()
	{
	    $model = new LoginForm;
	    $model->setAttributes(Yii::$app->request->post());
	    if ($user = $model->login()) {
	        if ($user instanceof IdentityInterface) {
	            return $user->api_token;
	        } else {
	            return $user->errors;
	        }
	    } else {
	        return $model->errors;
	    }
	}
	
	/**
	 * 获取用户信息
	 */
	public function actionUserProfile ($token)
	{
	    // 到这一步，token都认为是有效的了
	    // 下面只需要实现业务逻辑即可，下面仅仅作为案例，比如你可能需要关联其他表获取用户信息等等
	    $user = User::findIdentityByAccessToken($token);
	    return [
	        'id' => $user->id,
	        'username' => $user->username,
	    ];
	}

}