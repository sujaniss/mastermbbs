<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Answers */

$this->title = 'Create Answers';
$this->params['breadcrumbs'][] = ['label' => 'Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
