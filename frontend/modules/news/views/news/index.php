<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>


<h1>News</h1>
<hr>
<ul>
<?php foreach ($news as $n): ?>
	 <div class = "panel panel-default">

        <div class = "title panel-heading">
        <!-- <span><?php echo Yii::$app->formatter->asDatetime("$n->updated_at", "php:d-m-Y");  ?></spans> -->
        <span class = "news-title"><?= $n->title ?></span>
        </div>
        <div class = "panel-body news-descrip">
        <?= $n->short_description; ?>
        </div>
        <div class = "panel-body">
        <?= Html::a('Watch News', ['view','id' => $n->id], ['class' => 'btn btn-primary btn-xs']) ?>
        </div>

    </div>
<?php endforeach; ?>
<?= LinkPager::widget(['pagination' => $pagination]) ?>
</ul>
