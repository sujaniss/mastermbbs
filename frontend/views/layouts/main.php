<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;

//use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody(); ?>

        <div id="static_cnts" class="">
            <header class="cf visible-xs visible-sm">

                <div class="navigation">
                    <nav>
                        <a href="javascript:void(0)" class="smobitrigger ion-navicon-round"><span></span></a>
                        <ul class="mobimenu">

                            <div id="cssmenu">
                                <ul>
                                    <li>
                                        <div class="form-mob">
                                            <form action="action_page.php">
                                                <input type="search" class="searchbox-two" name="googlesearch" placeholder="Search" vk_1a558="subscribed">
                                            </form>
                                        </div>
                                    </li>
                                    <li><a href="<?php echo Yii::$app->getUrlManager()->createUrl('site/index'); ?>"><span> Homes </span></a></li>
                                    <li><a href="<?php echo Yii::$app->getUrlManager()->createUrl('site/aboutus'); ?>"><span>About Us  </span></a></li>
                                    <li><a href="<?php echo Yii::$app->getUrlManager()->createUrl('site/services'); ?>"><span>Services</span></a></li>
                                    <li><a href"<?php echo Yii::$app->getUrlManager()->createUrl('site/contactus'); ?>"><span>Contact Us</span></a></li>
                                </ul>
                            </div>

                        </ul>
                    </nav>
                </div>
            </header>


        </div>
        <div id="static_cnt" class="">



            <section class="headers-main">

                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="indexs.php"><img class="img-responsive" src="images/logo.png"/></a>
                        </div>
                        <div class="col-md-5  list-1 hidden-sm hidden-xs">
                            <ul>
                                <li><a href="<?php echo Yii::$app->getUrlManager()->createUrl('site/index'); ?>"><span> Homes </span></a></li>
                                <li><a href="<?php echo Yii::$app->getUrlManager()->createUrl('site/aboutus'); ?>"><span>About Us  </span></a></li>
                                <li><a href="<?php echo Yii::$app->getUrlManager()->createUrl('site/services'); ?>"><span>Services</span></a></li>
                                <li><a href="<?php echo Yii::$app->getUrlManager()->createUrl('site/contactus'); ?>"><span>Contact Us</span></a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 log">
                            <ul class="home">
                                <li><a href="<?php echo Yii::$app->getUrlManager()->createUrl('site/login'); ?>">Login  </a></li>
                                <li><a href="<?php echo Yii::$app->getUrlManager()->createUrl('site/register'); ?>">Register</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?= $content ?>

        <section class="newsletter">
            <div class="container">
                <div class="row">

                    <div class="col-md-4 col-sm-6 col-xs-6 six">
                        <img class="min img-responsive" src="images/logo.png">
                        <h6 class="hid">© Copyright 2016 Master mbbs.
                            All Rights Reserved
                            Developed By Intersmart</h6>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 six">
                        <h4>CONTACT DETAILS</h4>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Register</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-6 six">
                        <h4>Find Us On</h4>
                        <h3><a href="#">Facebook</a></h3>
                        <h3><a href="#">Google+</a></h3>
                        <h3><a href="#">Twitter</a></h3>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 six">
                        <h4>CONTACT DETAILS</h4>
                        <p>Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit, sed do
                            info@mastermbbs.com</p>
                        <p>+90 123 45 67, +90 123 45 68</p>
                        <h6 class="show">© Copyright 2016 Master mbbs.
                            All Rights Reserved
                            Developed By Intersmart</h6>
                    </div>

                </div>
            </div>
        </section>

    </body>
</html>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
