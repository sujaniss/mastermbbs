<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\Topics */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<?php


if(isset($model->sem_id) && $model->sem_id > 0 )
	$subs = \yii\helpers\ArrayHelper::map(backend\models\Subjects::find()->where(['sem_id'=>$model->sem_id])->all(), 'sub_id', 'sub_name');
else 
	$subs = [];

	if(isset($model->sub_id) && $model->sub_id > 0 )
		$chps = yii\helpers\ArrayHelper::map(backend\models\Chapters::find()->where(['sub_id'=>$model->sub_id])->all(), 'chapter_id', 'chapter_name');
	else
		$chps = [];
if(isset($model->chapter_id) && $model->chapter_id > 0 )
	$topicOption = $model->Categories($semid = 0,$subid=0,$model->chapter_id,$parent=0);
 else
	$topicOption = $model->Categories($semid = 0,$subid=0,$chapid=1,$parent=0);

	
	
$sems = yii\helpers\ArrayHelper::map(backend\models\Semesters::find()->all(), 'sem_id', 'sem_name');

?>
<?= $form->field($model, 'sem_id')->dropDownList($sems, ['prompt' => 'Select Semester','onchange'=>'topicChangesemdrp(this)']) ?>
<?= $form->field($model, 'sub_id')->dropDownList($subs, ['prompt' => 'Select Subjects','onchange'=>'topicChangesubdrp(this)']) ?>
<?= $form->field($model, 'chapter_id')->dropDownList($chps, ['prompt' => 'Select Chapter','onchange'=>'topicChangechadrp(this)']) ?>
<?= $form->field($model, 'parent_id')->dropDownList($topicOption, ['prompt' => 'Select parent']); ?>
<?= $form->field($model, 'topic')->textInput(['maxlength' => true]); ?>

<?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>
<?= $form->field($model, 'video')->widget(FileInput::classname(), [
		    'options' => ['accept' => 'video/*'],
		]);?>





<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>



