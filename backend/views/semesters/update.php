<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Semesters */

$this->title = 'Update Semesters: ' . $model->sem_id;
$this->params['breadcrumbs'][] = ['label' => 'Semesters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sem_id, 'url' => ['view', 'id' => $model->sem_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="content-header">
    <h1>
        <?= $this->title ?>

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=yii::$app->urlManager->createUrl(['semesters'])?>">Semesters</a></li>
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
        <!-- /.box-body -->

    </div>
    <!-- /.box -->

</section>
