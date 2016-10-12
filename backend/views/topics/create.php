<?php

use yii\helpers\Html;
use yii;

/* @var $this yii\web\View */
/* @var $model backend\models\Topics */

$this->title = 'Create Topics';
$this->params['breadcrumbs'][] = ['label' => 'Topics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content-header">
    <h1>
        <?= $this->title ?>

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo  yii::$app->urlManager->createUrl(['topics'])?>">Topics</a></li>
        <li class="active">Create</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">

        <div class="box-body">
            <?=
            $this->render('_form', [
                'model' => $model
            ])
            ?>


        </div>
        <!-- /.box-body -->

    </div>
    <!-- /.box -->

</section>
