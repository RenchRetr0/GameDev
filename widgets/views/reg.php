<?php
     
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

Modal::begin([
    'header'=>'<h4>Регистрация</h4>',
    'id'=>'reg-modal',
]);
?>

<p>Пожалуйста, заполните следующие поля, чтобы зарегистрироваться:</p>

<?php $form = ActiveForm::begin([
    'id' => 'form-signup',
    'enableAjaxValidation' => true,
    'action' => ['/gamedev/signup']
]);
echo $form->field($model, 'login')->textInput(['autofocus' => true, 'placeholder' => 'Логин'])->label(false);
echo $form->field($model, 'Firstname')->textInput(['autofocus' => true, 'placeholder' => 'Фамилия'])->label(false);
echo $form->field($model, 'Name')->textInput(['autofocus' => true, 'placeholder' => 'Имя'])->label(false);
echo $form->field($model, 'Middle_name')->textInput(['autofocus' => true, 'placeholder' => 'Отчество'])->label(false);
echo $form->field($model, 'email')->textInput(['placeholder' => 'email'])->label(false);
echo $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль'])->label(false);
echo $form->field($model, 'password1')->passwordInput(['placeholder' => 'Подтвердите пароля'])->label(false);
?>

<div>
    If you forgot your password you can <?= Html::a('reset it', ['#']) ?>.
</div>
<div class="form-group">
    <div class="text-right">

        <?php
        echo Html::button('Cancel', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']);
        echo Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'signup-button']); 
        ?>

    </div>
</div>

<?php 
ActiveForm::end();
Modal::end();