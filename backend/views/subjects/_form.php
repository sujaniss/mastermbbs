<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Subjects */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>



<?=
$form->field($model, 'sub_name')->textInput(['maxlength' => true]);
$semesters = \yii\helpers\ArrayHelper::map(backend\models\Semesters::find()->all(), 'sem_id', 'sem_name');
?>

<?= $form->field($model, 'sem_id')->dropDownList($semesters, ['prompt' => 'Select Semester']); ?>



<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
