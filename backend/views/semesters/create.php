<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Semesters */

$this->title = 'Create Semesters';
$this->params['breadcrumbs'][] = ['label' => 'Semesters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
            <?=
            $this->render('_form', [
                'model' => $model,
            ])
            ?>


        </div>
        <!-- /.box-body -->

    </div>
    <!-- /.box -->

</section>
