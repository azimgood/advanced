<?php

use yii\helpers\Html;


$this->title = 'Approve News: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'News',];
$this->params['breadcrumbs'][] = ['label' => $model->id,];
$this->params['breadcrumbs'][] = 'Approve';
?>
<div class="news-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
