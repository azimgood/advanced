<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
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
    <link rel="icon" type="image/png" href="../../images/favicon-16x16.png" sizes="16x16">
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    $menuItems1 = [
        ['options' => ['class' => 'col-md-3 left'],'label' => '<img width = "42px" height = "42px" src = "../../images/cogwheel_LG_4.png" />', 'url' => ['/news/news/index']],
        ['options' => ['class' => 'link-a col-md-3 center'],'label' => 'ЕЭП', 'url' => ['/news/news/index']],
        ['options' => ['class' => 'link-a col-md-3 center'],'label' => 'Поддержка', 'url' => ['/news/news/index']],
        ['options' => ['class' => 'col-md-3 right'],'label' => '<img width = "42px" height = "42px" src = "../../images/mglass_gray2.png" />', 'url' => ['/news/news/index']],

    ];?>
    <div class = "container-fluid top">
      <div class = "row">
        <?php
        echo Nav::widget([
            'items' => $menuItems1,
            'encodeLabels' => false,
        ]);
        ?>
      </div>
    </div>
    <?php
    NavBar::begin([

        'brandLabel' => '<img src = "../../images/map_yellow.jpg"/>',
        'brandUrl' => Yii::$app->homeUrl,
        'brandOptions' => [
          'class' => 'header'
        ],
        'renderInnerContainer' => true,
        'innerContainerOptions' => [
            'class' => 'container1'
        ],

    ]);
    // $menuItems = [
    //     ['label' => 'Home', 'url' => ['/site/index']],
    //     ['label' => 'About', 'url' => ['/site/about']],
    //     ['label' => 'Contact', 'url' => ['/site/contact']],
    // ];
    // if (Yii::$app->user->isGuest) {
    //     $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    //     $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    // } else {
    //     $menuItems[] = [
    //         'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
    //         'url' => ['/site/logout'],
    //         'linkOptions' => ['data-method' => 'post']
    //     ];
    // }
    //
    // echo Nav::widget([
    //     'options' => ['class' => 'links navbar-nav navbar-right'],
    //     'items' => $menuItems,
    //
    // ]);
    NavBar::end();
    ?>

    <div class="container-fluid">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
  <div class = "container-fluid">
      <div class="row center">
          <div class="col-md-3">
              <?= Html::a('О компании MITWORK', ['/site/about']) ?>
          </div>
          <div class="col-md-2 vLine">
              <?= Html::a('Карта Сайта', ['#']) ?>
          </div>
          <div class="col-md-2 vLine">
              <?= Html::a('Новости', ['/news/news/index']) ?>
          </div>
          <div class="col-md-2 vLine">
              <?= Html::a('RSS', ['#']) ?>
          </div>
          <div class="col-md-3 vLine">
              <?= Html::a('Контакты', ['/site/contact']) ?>
          </div>
      </div>

      <div class="row center">

          <div class="col-md-3 col-md-push-3">
              <?= Html::a('Условия использования', ['#']) ?>
          </div>

          <div class="col-md-3 col-md-push-3 vLine">
              <?= Html::a('Политика конфиденциальности', ['#']) ?>
          </div>

      </div>

      <div class="row">
              <c>ТOO MITWORK 2015 год. Все права защищены </c>
      </div>
    </div>

</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
