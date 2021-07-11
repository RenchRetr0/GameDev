<?php
     
namespace app\widgets;

use Yii;
use yii\base\Model;
use app\models\User;
use yii\base\Widget;
use app\models\LoginForm;

class LoginWidget extends Widget {

    public function run() {
        if (Yii::$app->user->isGuest) {
            $model = new LoginForm();
            return $this->render('login', [
                'model' => $model,
            ]);
        } else {
            return ;
        }
    }

}