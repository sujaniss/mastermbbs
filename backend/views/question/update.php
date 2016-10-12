<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model backend\models\Question */

$this->title = 'Update Question: ' . $model->question_id;
$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->question_id, 'url' => ['view', 'id' => $model->question_id]];
$this->params['breadcrumbs'][] = 'Update';
?>


<section class="content-header">
    <h1>
        <?= $this->title ?>

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo yii::$app->urlManager->createUrl(['questions'])?>">Questions</a></li>
        <li class="active">Create</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">

        <div class="box-body">

<?php
            echo Tabs::widget([
                'items' => [
                    [
                        'label' => 'Questions',
                        'content' => $this->render('_form', ['model' => $model]),
                        'options' => ['tag' => 'div', 'id' => 'update-question-tab'],
                        'headerOptions' => ['class' => 'my-class'],
                    ],
                    [
                        'label' => 'Options',
                        'content' => $this->render('//options/_form', ['model' => new backend\models\Options()]),
                        'options' => ['id' => 'update-option-tab'],
                       	//'linkOptions'=>['class'=>'disabled','data-toggle'=>""],
                    	//'headerOptions' => ['class' => 'disabled'],
                    ],
                    [
                        'label' => 'Answer',
                        'content' => $this->render('//answers/_form', ['model' => new backend\models\Answers()]),
                        'options' => ['id' => 'update-answer-tab'],
                    	//'linkOptions'=>['class'=>'disabled','data-toggle'=>""],
                    		//'headerOptions' => ['class' => 'disabled'],
                    	
                    ],
                    [
                        'label' => 'Solutions',
                        'content' => $this->render('//question/_solution', ['model' => new backend\models\Solution()]),
                        'options' => ['id' => 'update-solutions-tab'],
                    	//'linkOptions'=>['class'=>'disabled','data-toggle'=>""],
                    	//'headerOptions' => ['class' => 'disabled'],
                    	
                    ],
                ],
                'options' => ['tag' => 'div'],
                'itemOptions' => ['tag' => 'div'],
                'headerOptions' => ['class' => 'my-class'],
                'clientOptions' => ['collapsible' => false],
            ]);
            ?>


        </div>
        <!-- /.box-body -->

    </div>
    <!-- /.box -->

</section>
