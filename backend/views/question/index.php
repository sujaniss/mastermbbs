<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Questions';
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

            <? if(isset($_GET['id']) && ($_GET['id'] > 0)){ ?>
            <p>
                <?= Html::a('Create Question', ['question/create', 'id' => $_GET['id']], ['class' => 'btn btn-success']) ?>
            </p>

            <? } ?>




            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    //   ['class' => 'yii\grid\SerialColumn'],
                    //'question_id',
                    'question:ntext',
                    'solutions:ntext',
                    // 'correct_ans_id',
                    //'cb',
                    // 'ub',
                    // 'cod',
                    // 'uod',
                    // 'status',
                    'test_id',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>
        </div>
        <!-- /.box-body -->

    </div>
    <!-- /.box -->

</section>
<!-- /.content -->