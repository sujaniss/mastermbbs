<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\LoggedStudentAsset;

LoggedStudentAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>

        <style>
            .dropup{
                position: fixed !important;
                width: 100%;
                margin: 0 auto;
                z-index: 200000;
                top: 0;
            }
            .dropdown-menu {
                z-index: 2000000;
            }
            #static_cnt {
                position: relative;
                z-index: 100;
            }

            #static_cnts {
                position: relative;
                z-index: 40000;
            }
            .headers {
                z-index: 1000;
                position: relative;
            }

        </style>
        <script type="text/javascript">
                var baseurl = "<?php print \yii\helpers\Url::base() . "/index.php/"; ?>";
                var basepath = "<?php print \yii\helpers\Url::base(); ?>";

        </script>
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
                                    <li><a href="indexs.php"><span> Home </span></a></li>
                                    <li><a href="aboutus.php"><span>About Us  </span></a></li>
                                    <li><a href="services.php"><span>Services</span></a></li>
                                    <li><a href="contactus.php"><span>Contact Us</span></a></li>
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
                        <div class="col-md-4 list-1 hidden-sm hidden-xs">
                            <div id="custom-search-input">
                                <div class="input-group col-md-12">
                                    <input type="text" class="form-control input-lg multiples" placeholder="Search Products">
                                    <span class="input-group-btn">
                                        <button class="btn btn-info btn-lg" type="button">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 log">
                            <ul class="debug">
                                <li>
                                    <?= Html::a('<i class="fa mys fa-home"></i>My Home', ['students/my-account']);
                                    ?></li>
<!--                                <li><a href="#"><i class="fa fa-home"></i>My Home  </a></li>-->
                                <li>
                                    <div class="dropdown">
                                        <button class="btn drops dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true"><i class="fa mys fa-user"></i>My Account
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu tt animated fadeInDown">
                                            <li><?=
                                                Html::a('<i class="fa ys fa-user"></i>My Profile', ['students/my-profile'], ['class' => 'lk', 'data-method' => 'post']);
                                                ?></li>
                                            <li><?=
                                                Html::a('<i class="fa ys fa-user"></i>My Posts', ['posts/my-post'], ['class' => 'lk', 'data-method' => 'post']);
                                                ?></li>
                                            <li><?=
                                                Html::a('<i class="fa ys fa-user"></i>My Questions', ['students/my-profile'], ['class' => 'lk', 'data-method' => 'post']);
                                                ?></li>
                                            <li><a class="lk" href="#"><i class="fa ys fa-cog"></i>Settings</a></li>
                                            <li><?=
                                                Html::a('<i class="fa ys fa-sign-out"></i>Log Out', ['site/logout'], ['class' => 'lk', 'data-method' => 'post']);
                                                ?></li>
                                        </ul>
                                    </div>


                                </li>
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
