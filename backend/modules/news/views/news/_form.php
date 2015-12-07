<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin();

    $items = ArrayHelper::map($categ,'id','category');
    $params = [
        'prompt' => 'Укажите тип новости'
    ];

    ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList($items,$params); ?>
    



    <?= $form->field($model, 'description',['options' => ['id' => 'ello']])->widget(\yii\redactor\widgets\Redactor::className(), [
    'clientOptions' => [

        'lang' => 'ru',
        'plugins' => ['clips', 'fontcolor','imagemanager']
    ]
])?>

    <script>
    $(document).ready(function(){

      $("#ello1").on("click",function(){


        var a;
        var bs;
        // if($("#ello1").val() == "") bs = true;
        // var b = $.trim($(".redactor-editor".val()));
        // a = b.substr(0,100);

        // if(bs == true){
        //   $("#ello1").val(a);
        //   bs = false;
        // }

      });
    });


    </script>

    <?= $form->field($model, 'short_description')->textInput(['id' => 'ello1']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
