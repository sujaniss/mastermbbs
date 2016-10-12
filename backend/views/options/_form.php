<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Options */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="options-form">
<div class="list-group">
<ul id="option_display">



</ul>
</div>

    <?php
    $form = ActiveForm::begin([
                'id' => 'option_form',
                'action' => Url::to(['options/saveoption']),
                'enableAjaxValidation' => true,
                'validationUrl' => Url::to(['options/validate']),
    ]);
    ?>
    <?= $form->field($model, 'option_id')->textInput()->label(false); ?>
	<?= $form->field($model, 'act')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'question_id')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'options')->textarea(['rows' => 6]) ?>

    <div class="form-group">

        <input type="button" value="Back" onclick="actionTabShow('option-tab', 'question-tab', 'question-question_id')" class="btn btn-primary"/>


        <?= Html::submitButton($model->isNewRecord ? 'Add+' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id' => 'question_submit']) ?>

        <?= Html::submitButton( 'Add' , ['class' => 'btn btn-success','id'=>'add']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
