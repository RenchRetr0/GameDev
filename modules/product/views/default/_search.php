<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary', 'id' => 'ww']) ?>
        <?= Html::resetButton('Сброс настроек', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$js = <<< JS

        $("document").ready(function(){
            $('.noUi-base').on('change', function(){
                alert("ssd");
                $('#w0').submit();
            });
        });

JS;

$this->registerJs($js, View::POS_READY, null);

?>
