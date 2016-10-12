<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Subjects */

$this->title = 'Update Subjects: ' . $model->sub_name;
$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sub_id, 'url' => ['view', 'id' => $model->sub_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="content-header">
    <h1>
        <?= $this->title ?>

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo yii::$app->urlManager->createUrl(['subjects'])?>">Subjects</a></li>
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