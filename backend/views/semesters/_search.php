<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SemestersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="semesters-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sem_id') ?>

    <?= $form->field($model, 'sem_name') ?>

    <?= $form->field($model, 'year_id') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'cb') ?>

    <?php // echo $form->field($model, 'ub') ?>

    <?php // echo $form->field($model, 'cod') ?>

    <?php // echo $form->field($model, 'uod') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
