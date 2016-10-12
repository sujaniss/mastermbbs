<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tests';
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
            <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>

            <p>
                <?= Html::a('Create Test', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                //    'filterModel' => $searchModel,
                'columns' => [
                    //  ['class' => 'yii\grid\SerialColumn'],
                    // 'test_id',

                    ['attribute' => 'test_name',
                        'format' => 'raw',
                        'value' => function($data) {
                                return Html::a($data->test_name, ['question/index', 'id' => $data->test_id]);
                        }],
                            'chapter_id',
                            // 'cb',
                            // 'ub',
                            // 'cod',
                            // 'uod',
                            // 'status',
                            // 'field',
                            // 'field2',
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

