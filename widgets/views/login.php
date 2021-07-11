<?php
     
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

Modal::begin([
    'header'=>'<h4>Войти</h4>',
    'id'=>'login-modal',
]);
?>

<p>Пожалуйста, заполните следующие поля, чтобы войти:</p>

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'enableAjaxValidation' => true,
    'action' => ['/site/login']
]);
echo $form->field($model, 'login')->textInput(['autofocus' => true, 'placeholder' => 'Логин'])->label(false);
echo $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль'])->label(false);
?>

<div>
    If you forgot your password you can <?= Html::a('reset it', ['#']) ?>.
</div>
<div class="form-group">
    <div class="text-right">

        <?php
        echo Html::button('Cancel', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']);
        echo Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'signup-button']); 
        ?>

    </div>
</div>

<?php 
ActiveForm::end();
Modal::end();