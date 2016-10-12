<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solution-form">

    <?php
    $testid =  0;
    $form = ActiveForm::begin([
                'id' => 'solution-form',
                'action' => Url::to(['question/savesolutions']),
                'enableAjaxValidation' => true,
                'validationUrl' => Url::to(['question/solutionvalidate']),
    ]);
    
    if(isset($_GET['id']) && $_GET['id']){
    	$testid = $_GET['id'];
    }
    ?>
   
    <?= $form->field($model, 'question_id')->textInput()->label(false); ?>
    <?= $form->field($model, 'solution')->textarea(['rows' => 6]) ?>

    <div class="form-group">
    <input type="button" value="Back" onclick="actionTabShow('solutions-tab', 'answer-tab', 'question-question_id')" class="btn btn-primary"/>
        <?= Html::submitButton($model->isNewRecord ? 'Create & Close' : 'Update', ['id'=>"add_question_submit",'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    	<input type="button" value="Create &  Another Question" onclick="actionTabShow('option-tab', 'question-tab', 'question-question_id')" class="btn btn-primary"/>
    </div>

    <?php ActiveForm::end(); ?>

</div>
