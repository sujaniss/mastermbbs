<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<section class="mbbs-head">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="atags">
                    <ul>
                        <li class="active"> <a href="<?= Yii::$app->urlManager->createUrl(['subjects/list-subjects', 'sem_id=1' => 1]) ?>">studying</a></li>
                        <li > <a href="<?= Yii::$app->urlManager->createUrl(['subjects/list-subjects', 'sem_id=1' => 1]) ?>">tests</a></li>
                        <li> <a href="<?= Yii::$app->urlManager->createUrl(['posts/post', 'sem_id=1' => 1]) ?>">Posts</a> </li>
                        <li> <a href="#">forums</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>