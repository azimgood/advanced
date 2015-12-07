<?php

use yii\helpers\Html;
use yii\widgets\DetailView;



/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="news-view">

    <h1><?= $model->title ?></h1>

    <div class = "news-descrip" ><?= $model->description ?></div>
    <?php echo \ijackua\sharelinks\ShareLinks::widget(
    [
        'viewName' => '@app/modules/news/views/news/linksView.php'   //custom view file for you links appearance
    ]
); ?>


</div>
