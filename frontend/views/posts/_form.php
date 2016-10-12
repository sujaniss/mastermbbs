<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Posts */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$sub = \yii\helpers\ArrayHelper::map(backend\models\Subjects::find()->all(), 'sub_id', 'sub_name');
$top = \yii\helpers\ArrayHelper::map(backend\models\Topics::find()->all(), 'topic_id', 'topic');
?>
<?php $form = ActiveForm::begin(['id' => 'post-form', 'options' => ['role' => 'form']]); ?>
<div class="row">
    <?php if (Yii::$app->session->hasFlash('postsuccess')): ?>
            <div class="info">
                <?php echo Yii::$app->session->getFlash('postsuccess'); ?>
            </div>
    <?php endif; ?>
    <div class="col-md-6">
        <h6><?= $this->title ?></h6>
        <div class="form-group">
            <?= $form->field($model, 'sub_id')->dropDownList($sub, ['class' => 'aps', 'carform' => 'carform', 'prompt' => 'Select Semester']) ?>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'topic_id')->dropDownList($top, ['class' => 'aps', 'carform' => 'carform', 'prompt' => 'Select Semester']) ?>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'heading')->textInput(['maxlength' => true, 'class' => 'ui_ques'])->label('Heading', ['class' => 'questions']) ?>
        </div>
    </div>

    <div class="col-md-6">
        <div class="ins">
            <h6>Instructions to Add a Question</h6>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. </p>

            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. </p>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?= $form->field($model, 'con_text')->textarea(['rows' => 5, 'class' => 'form-controlv'])->label('Content', ['class' => 'questions']) ?>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'serach_tags')->textInput(['class' => 'ui_ques'])->label('Search tags', ['class' => 'questions']) ?>
        </div>
        <!-- <div class="sear"></div>-->
        <?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => 'btn qued btn-default']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>