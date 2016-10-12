<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\StudentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Students', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'stud_id',
            'first_name',
            'last_name',
            'password',
            'user_id',
            // 'dob',
            // 'native_place',
            // 'parent_email:email',
            // 'native_town',
            // 'education',
            // 'education_cat',
            // 'mbbs_year',
            // 'status',
            // 'profile_info',
            // 'cod',
            // 'uod',
            // 'field',
            // 'field1',
            // 'role',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
