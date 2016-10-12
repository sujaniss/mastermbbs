<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Students */

$this->title = 'Update Students: ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<section class="mbbs-profile">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mbb">
                <div class="mbbs-left">
                    <img class="center-block demo" src="images/demo.jpg">

                    <ul>
                        <li><a href="#">bookmarks</a></li>
                        <li><a href="#">My posts</a></li>
                        <li><a href="#">My questions</a></li>
                        <li><a href="#">Latest post</a></li>
                        <li><a href="#">Plan destails</a></li>
                        <li class="active"><a href="editprofile.php">Edit profile</a></li>
                    </ul>

                </div>

            </div>
            <div class="col-md-8 col-sm-12 col-xs-12 prime">

                <?=
                $this->render('_updateForm', [
                    'model' => $model,
                ])
                ?>

            </div>

        </div>
    </div>
</section>
