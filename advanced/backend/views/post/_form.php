<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Author;

/* @var $this yii\web\View */
/* @var $model backend\models\Post */
/* @var $form yii\widgets\ActiveForm */
$items=Author::find()->select('name')->asArray()->all();
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['style'=>'width:50px']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'anounce')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'content')->textArea(['maxlength' => 10000]) ?>

    <?= $form->field($model, 'created_at')->textInput(['maxlength' => true, 'value'=>Date('Y-m-d')]) ?>

    <?= $form->field($model, 'author')->dropDownList($items) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
