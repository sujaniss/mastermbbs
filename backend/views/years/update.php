<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Years */

$this->title = 'Update Years: ' . $model->year_id;
$this->params['breadcrumbs'][] = ['label' => 'Years', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->year_id, 'url' => ['view', 'id' => $model->year_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="content-header">
    <h1>
        <?= $this->title ?>

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
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