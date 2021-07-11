<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::$app->name;
$this->params['breadcrumbs'][] = 'Регистрация';
?>
<div class="container">
    <div class="site-signup">
        <h1><?= Html::encode('Регистрация') ?></h1>

        <p>Пожалуйста, заполните следующие поля для регистрации:</p>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                    <?= $form->field($model, 'login')->textInput(['autofocus' => true, 'placeholder' => 'Логин'])->label(false) ?>

                    <?= $form->field($model, 'Firstname')->textInput(['autofocus' => true, 'placeholder' => 'Фамилия'])->label(false) ?>

                    <?= $form->field($model, 'Name')->textInput(['autofocus' => true, 'placeholder' => 'Имя'])->label(false) ?>

                    <?= $form->field($model, 'Middle_name')->textInput(['autofocus' => true, 'placeholder' => 'Отчество'])->label(false) ?>

                    <?= $form->field($model, 'email')->textInput(['placeholder' => 'email'])->label(false) ?>

                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль'])->label(false) ?>

                    <?= $form->field($model, 'password1')->passwordInput(['placeholder' => 'Подтвердите пароля'])->label(false) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>