<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Videos */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?php $topics = \yii\helpers\ArrayHelper::map(backend\models\Topics::find()->all(), 'topic_id', 'topic')
?>

<?php ?>
<?= $form->field($model, 'topic_id')->dropDownList($topicOption, ['prompt' => 'Select Topics']); ?>

<?= $form->field($model, 'video_name')->fileInput() ?>



	 <video width="300" height="200" controls>
	<source src="test_upload/<?php echo $all_video['video_name']; ?>" type="video/mp4">
	</video> 

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>


