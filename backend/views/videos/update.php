<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Videos */

$this->title = 'Update Videos: ' . $model->video_id;
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->video_id, 'url' => ['view', 'id' => $model->video_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="videos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
