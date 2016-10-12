<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Test */
/* @var $form yii\widgets\ActiveForm */
?>



<?php $form = ActiveForm::begin(); ?>

<?php
$sub = \yii\helpers\ArrayHelper::map(\backend\models\Chapters::find()->all(), 'chapter_id', 'chapter_name');
?>

<?= $form->field($model, 'chapter_id')->dropDownList($sub, ['prompt' => 'Select Chapter']); ?>

<?= $form->field($model, 'test_name')->textInput(['maxlength' => true]) ?>



<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
