<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Chapters */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<? $subjects = yii\helpers\ArrayHelper::map(backend\models\Subjects::find()->all(), 'sub_id', 'sub_name');
$sems = yii\helpers\ArrayHelper::map(backend\models\Semesters::find()->all(), 'sem_id', 'sem_name');
?>
<?= $form->field($model, 'sem_id')->dropDownList($sems, ['prompt' => 'Select Semester']); ?>
<?= $form->field($model, 'sub_id')->dropDownList($subjects, ['prompt' => 'Select Subjects']) ?>
<?= $form->field($model, 'chapter_name')->textInput(['maxlength' => true]); ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
