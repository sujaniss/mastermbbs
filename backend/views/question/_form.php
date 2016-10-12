<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-form">

    <?php
    $testid =  0;
    $form = ActiveForm::begin([
                'id' => 'question-form',
                'action' => Url::to(['question/savequestion']),
                'enableAjaxValidation' => true,
                'validationUrl' => Url::to(['question/validate']),
    ]);
    
    if(isset($_GET['id']) && $_GET['id']){
    	$testid = $_GET['id'];
    }
    ?>
    <?= $form->field($model, 'test_id')->hiddenInput(['value'=>$testid])->label(false); ?>
    <?= $form->field($model, 'question_id')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'question')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['id'=>"add_question_submit",'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
