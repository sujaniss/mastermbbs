<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\VideosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="videos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Videos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            //  ['class' => 'yii\grid\SerialColumn'],
            // 'video_id',
            'video_name',
            // 'topic_id',
            ['attribute' => 'topic_id', 'value' => 'top.topic'],
            ['attribute' => 'cb', 'value' => 'cb0.username'],
            //'show_order',
            // 'ub',
            // 'cod',
            // 'uod',
            // 'field1',
            // 'field2',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
