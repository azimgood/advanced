<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>


<h1 class = "center">Новости</h1>
<hr>

<div class="row">
	<div class = "space col-md-2">
		<div class="panel panel-default">
			<div class = "panel-heading">Контакты</div>
			<div class="news-descrip">
			<div>050009, Республика Казахстан, г. Алматы, ул. Розыбакиева 68, офис 404</div>
			<div>+7 (727) 221 09 91</div>
			<div>+7 (727) 221 90 60</div>
			<div>+7 (701) 034 77 14</div>
			</div>
		</div>
	</div>
	<div class = "space col-md-7">
		<?php foreach ($news as $n): ?>
			<div class="panel panel-default">
		        <div class = "title panel-heading">
		        <!-- <span><?php echo Yii::$app->formatter->asDatetime("$n->updated_at", "php:d-m-Y");  ?></spans> -->
		        <span class = "news-title"><?= $n->title ?></span>
		        </div>
		        <div class = "panel-body news-descrip">
		        <?= $n->short_description; ?>
		        </div>
		        <div class = "panel-body">
		        <?= Html::a('Читать', ['view','id' => $n->id], ['class' => 'read-btn btn btn-primary btn-xs']) ?>
		        </div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class = "space col-md-2">
		<div class="panel panel-default">
			Banner
		</div>
	</div>


</div>
<div class="row">
	<div class = "col-md-3 col-md-push-8"><?= LinkPager::widget(['pagination' => $pagination]) ?></div>
</div>
