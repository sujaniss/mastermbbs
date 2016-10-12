<?php

use yii\helpers\Html;
use kartik\grid\GridView;;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\YearsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Years';
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
           
            <?php $gridColoums = [['attribute' => 'year_name',
                        			'format' => 'raw',
                        			'value' => function($data) {
                                return Html::a($data->year_name, ['semesters/index', 'year' => $data->year_id]);
                       			 }],
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
            					];?>
            					
            					
            					
            		<?= GridView::widget([
					    'id' => 'kv-grid-demo',
					    'dataProvider'=>$dataProvider,
					    //'filterModel'=>$searchModel,
					    'columns'=>	$gridColoums,			   
					    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
					    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
					    'pjax'=>true, 
					    'export'=>false,
					    'toolbar'=> [
					        ['content'=>
					            Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>Yii::t('app', 'Create Year'), 'class'=>'btn btn-success','id'=>'create_years_grid']) . ' '.
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
       $('#pModal').modal('show')
                  .find('.modal-content')
                  .load($(this).attr('href'));  
   });
});
");

$this->registerJs(
	"$(document).on('ready pjax:success', function() {
    $('.update').click(function(e){
       e.preventDefault();
       $('#pModal').modal('show')
                  .find('.modal-content')
                  .load($(this).attr('href'));
   });
});
");






yii\bootstrap\Modal::begin([
		'id'=>'pModal',
]);
yii\bootstrap\Modal::end();
?>