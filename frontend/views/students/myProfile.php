<?php

use yii\helpers\Html;
?>

<section class="mbbs-profile">
    <div class="container">
        <div class="row">
            <?= $this->render('_menuLinks') ?>
            <div class="col-md-8 col-sm-12 col-xs-12 prime">

                <h2>My Profile</h2>
                <a href="<?= yii::$app->urlManager->createUrl(['students/update']) ?>" class="myprofiles"><img class="users" src="images/user.jpg">Edit</a>
                <div class="zeros">

                    <div class="copyz">
                        <div class="col-sm-3 col-xs-3 zeros">
                            <label for="textinput" class="control-labelz">First Name</label>
                        </div>
                        <div class="col-sm-1 col-xs-1 zeros">
                            <label for="textinput" class="control-labelz">:</label>
                        </div>
                        <div class="col-sm-8 col-xs-8 zeros">
                            <label for="textinput" class="control-labelz"><?= $model->first_name ? $model->first_name : "NOT SET" ?></label>
                        </div>
                    </div>

                    <div class="copyz">
                        <div class="col-sm-3 col-xs-3 zeros">
                            <label for="textinput" class="control-labelz">Last Name</label>
                        </div>
                        <div class="col-sm-1 col-xs-1 zeros">
                            <label for="textinput" class="control-labelz">:</label>
                        </div>
                        <div class="col-sm-8 col-xs-8 zeros">
                            <label for="textinput" class="control-labelz"><?= $model->last_name ? $model->last_name : "NOT SET" ?></label>
                        </div>
                    </div>


                    <div class="copyz">
                        <div class="col-sm-3 col-xs-3 zeros">
                            <label for="textinput" class="control-labelz">Email	</label>
                        </div>
                        <div class="col-sm-1 col-xs-1 zeros">
                            <label for="textinput" class="control-labelz">:</label>
                        </div>
                        <div class="col-sm-8 col-xs-8 zeros">
                            <label for="textinput" class="control-labelz"><?= $model->user_id ? $model->user_id : "NOT SET" ?></label>
                        </div>
                    </div>

                    <div class="copyz">
                        <div class="col-sm-3 col-xs-3 zeros">
                            <label for="textinput" class="control-labelz">Parent Email	</label>
                        </div>
                        <div class="col-sm-1 col-xs-1 zeros">
                            <label for="textinput" class="control-labelz">:</label>
                        </div>
                        <div class="col-sm-8 col-xs-8 zeros">
                            <label for="textinput" class="control-labelz"><?= $model->parent_email ? $model->parent_email : "NOT SET" ?></label>
                        </div>
                    </div>


                    <div class="copyz">
                        <div class="col-sm-3 col-xs-3 zeros">
                            <label for="textinput" class="control-labelz">College</label>
                        </div>
                        <div class="col-sm-1 col-xs-1 zeros">
                            <label for="textinput" class="control-labelz">:</label>
                        </div>
                        <div class="col-sm-8 col-xs-8 zeros">
                            <label for="textinput" class="control-labelz"><?= $model->college ? $model->college : "NOT SET" ?></label>
                        </div>
                    </div>


                    <div class="copyz">
                        <div class="col-sm-3 col-xs-3 zeros">
                            <label for="textinput" class="control-labelz">Year</label>
                        </div>
                        <div class="col-sm-1 col-xs-1 zeros">
                            <label for="textinput" class="control-labelz">:</label>
                        </div>
                        <div class="col-sm-8 col-xs-8 zeros">
                            <label for="textinput" class="control-labelz"><?= $model->mbbs_year ? $model->mbbs_year : "NOT SET" ?>  </label>
                        </div>
                    </div>

                    <div class="copyz">
                        <div class="col-sm-3 col-xs-3 zeros">
                            <label for="textinput" class="control-labelz">Address</label>
                        </div>
                        <div class="col-sm-1 col-xs-1 zeros">
                            <label for="textinput" class="control-labelz">:</label>
                        </div>
                        <div class="col-sm-8 col-xs-8 zeros">
                            <label for="textinput" class="control-labelz"><?= $model->address ? $model->address : "NOT SET" ?> </label>
                        </div>
                    </div>



                </div>



            </div>
        </div>
    </div>
</section>
