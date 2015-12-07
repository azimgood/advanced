<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\News;
use dosamigos\switchinput\SwitchBox;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>




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

            // [
            //   'attribute' => 'Category',
            //   'value' => 'categ.category'
            // ],

            [
            'attribute'=>'approved',
            'filter'=>array("1"=>"Approved","0"=>"UnApproved"),
            ],
            'created_at',
            'updated_at',
            'description:ntext',
            [
              'attribute' => 'AddedBy',
              'value' => 'user101.username'
            ],


            [
              'class' => 'yii\grid\ActionColumn',
            //   'buttons'=>[
            //       'view'=>function ($url, $model) {
            //             $customurl=Yii::$app->getUrlManager()->createUrl(['news/news/view','id'=>$model['id'],'type' => $model['type']]);
            //             return Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', $customurl,['title' => Yii::t('yii', 'View')]);
            //    }
            // ],
            // 'template'=>'{view}{update}{delete}',

            ],
        ],
    ]); ?>

</div>
