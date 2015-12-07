<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\News;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            [
                'attribute'=>'type',
                'label'=>'Категория',
                'format'=>'text',
                'content'=>function($model){
                    return $model->getCategName();
                },
                'filter' => News::getCategsList()

            ],
            [
            'attribute'=>'approved',
            'filter'=>array("1"=>"Approved","0"=>"UnApproved"),
            ],
            'created_at',
            'updated_at',
            'description:ntext',

            [
                'attribute'=>'author',
                'label'=>'Добавил',
                'format'=>'text',
                'content'=>function($model){
                    return $model->getUserName();
                },
                'filter' => News::getUsersList()

            ],


            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{approve}',
            'buttons' => [
                'approve' => function ($url,$model) {
                    return Html::a(
                        '<span class="glyphicon glyphicon-user"></span>',
                        $url);
                },
            ],
        ],




        ],
    ]); ?>

</div>
