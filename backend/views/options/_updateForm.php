<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Options */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="options-form">

    <?php
    $form = ActiveForm::begin([
                'id' => 'update_option_form',
                'action' => Url::to(['options/saveoption']),
                'enableAjaxValidation' => true,
                'validationUrl' => Url::to(['options/validate']),
    ]);
    ?>
	<?= $form->field($optionModel, 'act')->hiddenInput()->label(false); ?>
    <?= $form->field($optionModel, 'question_id')->hiddenInput()->label(false); ?>
    <?= $form->field($optionModel, 'options')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <input type="button" value="Back" onclick="actionTabShow('option-tab', 'question-tab', 'question-question_id')" class="btn btn-primary"/>
        <?= Html::submitButton($optionModel->isNewRecord ? 'Add+' : 'Update', ['class' => $optionModel->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id' => 'question_submit']) ?>
        <?= Html::submitButton( 'Add' , ['class' => 'btn btn-success','id'=>'add']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
