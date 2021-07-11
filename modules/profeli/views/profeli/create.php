<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Profeli */

$this->title = 'Create Profeli';
$this->params['breadcrumbs'][] = ['label' => 'Profelis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profeli-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
