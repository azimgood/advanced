<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'MitWork',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
  <div>
      <div class="colC5">
          <?= Html::a('О компании MITWORK', ['/site/about']) ?>
      </div>
      <div class="colC5 vLine">
          <?= Html::a('Карта Сайта', ['#']) ?>
      </div>
      <div class="colC5 vLine">
          <?= Html::a('Новости', ['/news/news/index']) ?>
      </div>
      <div class="colC5 vLine">
          <?= Html::a('RSS', ['#']) ?>
      </div>
      <div class="colC5 vLine">
          <?= Html::a('Контакты', ['/site/contact']) ?>
      </div>
  </div>

  <div>
      <div class="colC4">
      </div>
      <div class="colC4">
          <?= Html::a('Условия использования', ['#']) ?>
      </div>
      <div class="colC4 vLine">
          <?= Html::a('Политика конфиденциальности', ['#']) ?>
      </div>
  </div>

  <div>
          <c>ТOO MITWORK 2015 год. Все права защищены </c>
  </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
