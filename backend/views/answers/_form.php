<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Answers */
/* @var $form yii\widgets\ActiveForm */
?>


<div id="ans-container" style="min-height: 50px">

</div>


<div class="answers-form">

    <?php $form = ActiveForm::begin([
    		
    		'id' => 'answer-form',
    		'action' => Url::to(['answers/saveanswer']),
    		'enableAjaxValidation' => true,
    		'validationUrl' => Url::to(['answers/validate']),
    ]); ?>

    <?= $form->field($model, 'question_id')->textInput()->label(FALSE) ?>

    <?= $form->field($model, 'option_id')->textInput()->label(FALSE) ?>



    <div class="form-group">
        <?= Html::submitButton('Back', ['class' => 'btn btn-primary']) ?>
        <?= Html::submitButton($model->isNewRecord ? 'Add' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::submitButton('Next', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
