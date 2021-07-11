<?php

namespace app\modules\product;

class Module extends \yii\base\Module
{
    public $layout = '/admin';
    
    public function init()
    {
        parent::init();

        $this->params['foo'] = 'bar';
        // ... остальной инициализирующий код ...
    }
}