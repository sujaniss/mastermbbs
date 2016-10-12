<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Semesters */
/* @var $form yii\widgets\ActiveForm */
?>


<?php
$form = ActiveForm::begin();
$years = \yii\helpers\ArrayHelper::map(backend\models\Years::find()->all(), 'year_id', 'year_name');
?>
<?= $form->field($model, 'year_id')->dropDownList($years, ['prompt' => 'Select Year']) ?>

<?= $form->field($model, 'sem_name')->textInput(['maxlength' => true]) ?>





<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
