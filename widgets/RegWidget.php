<?php
     
namespace app\widgets;

use Yii;
use yii\base\Model;
use app\models\User;
use yii\base\Widget;
use app\models\Register;

class RegWidget extends Widget {

    public function run() {
        if (Yii::$app->user->isGuest) {
            $model = new Register();
            return $this->render('reg', [
                'model' => $model,
            ]);
        } else {
            return ;
        }
    }

}