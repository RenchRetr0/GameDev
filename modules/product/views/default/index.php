<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    
    <div class="col-xs-6">
    
    </div>
</div>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $product->katalog->name;?>

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'content',
                'format' => 'html',
                'filter' => false,
                'value' => function($model){
                    return nl2br($model->content);
                }
            ],
            'price',
            [
                'attribute' => 'img',
                'value' => $model->img,
                'filter' => false,
                'format' => ['image', ['class' => 'minimized']],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>


