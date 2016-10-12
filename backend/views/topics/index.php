<?php

use yii\helpers\Html;
use kartik\grid\GridView;




/* @var $this yii\web\View */
/* @var $searchModel backend\models\TopicsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Topics';
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
	            <?= GridView::widget([
					    'id' => 'topics-grid',
					    'dataProvider'=>$dataProvider,
					    'filterModel'=>$searchModel,
					    'columns'=>['topic',
					                    ['attribute' => 'parent_id', 'value' => 'parent.topic'],
					                    ['attribute' => 'sub_id', 'value' => 'sub.sub_name'],
					                    ['attribute' => 'chapter_id', 'value' => 'chapter.chapter_name'],
					                    ['attribute' => 'sem_id', 'value' => 'sem.sem_name'],
					                    ['attribute' => 'cb', 'value' => 'cb0.username'],
					    				  ['class' => 'yii\grid\ActionColumn',
                          			  'buttons'=>[
                          			  		'view' => function ($url, $model) {
                                 				return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url , ['class' => 'view', 'data-pjax' => '0']);
                           					 },
                          			  		
                          			  		'update'=>function ($url,$model){                          			  		
                          			  			return html::a('<span class="glyphicon glyphicon-pencil"></span>', $url , ['class' => 'update', 'data-pjax' => '0']);
                           					 },
                           					 
                          			  		'delete'
                          			  		]
 		
                          					
                       			 ],					    		
					    ],					   
					    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
					    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
					    'pjax'=>true, 
					    'export'=>false,
					    'toolbar'=> [
					        ['content'=>
					            Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>Yii::t('app', 'Add Book'), 'class'=>'btn btn-success','id'=>'topics_create_grid']) . ' '.
					            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('app', 'Reset Grid')])
					        ],
					        '{export}',
					        '{toggleData}',
					    ],
					    'panel' => [
					    		'type' => GridView::TYPE_PRIMARY,
					    		
					    ],
					        
					]);?>
          


        </div>
        <!-- /.box-body -->

    </div>
    <!-- /.box -->

</section>
<!-- /.content -->

<?php 
$this->registerJs(
 "$(document).on('ready pjax:success', function() {
    $('.view').click(function(e){
       e.preventDefault();
       $('#tModal').modal('show')
                  .find('.modal-content')
                  .load($(this).attr('href'));
   });
});
");

$this->registerJs(
	"$(document).on('ready pjax:success', function() {
    $('.update').click(function(e){
       e.preventDefault();
       $('#tModal').modal('show')
                  .find('.modal-content')
                  .load($(this).attr('href'));
  	 });
	});
");


yii\bootstrap\Modal::begin([
		'id'=>'tModal',
]);
yii\bootstrap\Modal::end();
?>
