<?php

use yii\helpers\Html;
use yii;

/* @var $this yii\web\View */
/* @var $model backend\models\Chapters */

$this->title = 'Update Chapters: ' . $model->chapter_name;
$this->params['breadcrumbs'][] = ['label' => 'Chapters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->chapter_id, 'url' => ['view', 'id' => $model->chapter_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="content-header">
    <h1>
        <?= $this->title ?>

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo yii::$app->urlManager->createUrl(['chapters'])?>">Chapters</a></li>
        <li class="active">Update</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">

        <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</section>
