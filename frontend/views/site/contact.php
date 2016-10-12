<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;

//use yii\bootstrap\ActiveForm;
//use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="imprint">
    <div class="container">
        <div class="row">

            <nav class="cl-effect-5">
                <a href="#"><span data-hover="Contact Us">Contact Us</span></a>

            </nav>
            <img class="center-block dots" src="images/dots.png">
            <div class="col-md-6">
                <p>adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>

                <div class="bits">
                    <ul>
                        <li>
                            <p>info@mastermbbs.com</p>

                        </li>
                        <li>
                            <p>info@demolink.org
                            </p>

                        </li>
                        <li>
                            <p>+90 123 45 67</p>

                        </li>
                        <li>
                            <p>+90 123 45 68</p>

                        </li> <li>
                            <p>Lorem lispum</p>

                        </li>

                    </ul>
                </div>

                <div class="clearfix"></div>
                <div class="social-icons">
                    <ul>
                        <li><a href="#"><i class="fa dev fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa dev fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa dev fa-twitter"></i></a></li>

                        <li><a href="#"><i class="fa dev fa-linkedin"></i></a></li>

                        <li><a href="#"><i class="fa dev fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa dev fa-skype"></i></a></li>
                        <li><a href="#"><i class="fa dev fa-youtube"></i></a></li>

                    </ul>

                </div>
            </div>
            <div class="col-md-6">


                <form role="form">
                    <div class="form-group">

                        <input type="email" class="form-new" id="email" placeholder="Name :">
                    </div>
                    <div class="form-group">

                        <input type="email" class="form-new" id="email" placeholder="Email :">
                    </div>
                    <div class="form-group">

                        <input type="email" class="form-new" id="email" placeholder="Subject :">
                    </div>
                    <div class="form-group">

                        <textarea class="form-controlm" rows="5" id="comment" placeholder="Message"></textarea>
                    </div>
                    <button type="submit" class="btn can1 btn-default">Submit</button>




                </form>
            </div>
        </div>
    </div>
</section>
