<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="login">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="cl-effect-5">
                    <a href="#"><span data-hover="Register">Register</span></a>

                </nav>
                <img class="center-block dots" src="images/dots.png">
                <div class="new_form row">

                    <?php
                    $form = ActiveForm::begin([
                                'options' => ['role' => 'form']
                    ]);
                    ?>
                    <div class="form-group col-xs-6">
                        <?= $form->field($model, 'first_name')->textInput(['class' => 'form-new', 'maxlength' => true, 'placeholder' => 'First Name'])->label(FALSE) ?>
                    </div>

                    <div class="form-group col-xs-6">
                        <?= $form->field($model, 'last_name')->textInput(['class' => 'form-new', 'maxlength' => true, 'placeholder' => 'Last Name'])->label(FALSE) ?>
                    </div>

                    <div class="form-group col-xs-6">
                        <?= $form->field($model, 'user_id')->textInput(['class' => 'form-new', 'placeholder' => 'email', 'maxlength' => true])->label(FALSE) ?>
                    </div>

                    <div class="form-group col-xs-6">
                        <?= $form->field($model, 'password')->passwordInput(['class' => 'form-new', 'maxlength' => true, 'placeholder' => 'Password'])->label(FALSE) ?>
                    </div>

                    <div class="form-group col-xs-6">
                        <?= $form->field($model, 'con_password')->passwordInput(['class' => 'form-new', 'maxlength' => true, 'placeholder' => 'Confirm Password'])->label(FALSE) ?>
                    </div>

                    <div class="form-group col-xs-6">
                        <?= $form->field($model, 'dob')->textInput(['class' => 'form-new', 'placeholder' => 'Date of Birth'])->label(FALSE) ?>
                    </div>


                    <div class="form-group col-xs-12">
                        <?= $form->field($model, 'address')->textArea(['rows' => 5, 'class' => 'form-controlv', 'placeholder' => 'Address'])->label(false) ?>
                    </div>
                    <div class="form-group col-xs-6">
                        <?= $form->field($model, 'native_place')->textInput(['class' => 'form-new', 'placeholder' => 'Native Place'])->label(FALSE) ?>
                    </div>
                    <div class="form-group col-xs-6">
                        <?= $form->field($model, 'parent_email')->textInput(['class' => 'form-new', 'maxlength' => true, 'placeholder' => 'Parent Email'])->label(FALSE) ?>
                    </div>
                    <div class="form-group col-xs-6">
                        <? $nt =  [];  ?>
                        <?= $form->field($model, 'native_town')->dropDownList($nt, ['class' => 'form-new', 'prompt' => 'select Town'])->label(FALSE) ?>
                    </div>

                    <div class="form-group col-xs-6">
                        <? $state =  [];  ?>
                        <?= $form->field($model, 'state')->dropDownList($state, ['class' => 'form-new', 'prompt' => 'select State'])->label(FALSE) ?>
                    </div>

                    <div class="form-group col-xs-6">
                        <? $country =  [];  ?>
                        <?= $form->field($model, 'country')->dropDownList($country, ['class' => 'form-new', 'prompt' => 'select Country'])->label(FALSE) ?>
                    </div>
                    <div class="form-group col-xs-6">
                        <? $edu =[]; ?>
                        <?= $form->field($model, 'education')->dropDownList($edu, ['class' => 'form-new', 'prompt' => 'Select Education'])->label(FALSE) ?>
                    </div>
                    <div class="form-group col-xs-6">
                        <?php $educat = []; ?>
                        <?= $form->field($model, 'education_cat')->dropDownList($educat, ['class' => 'form-new', 'prompt' => 'Select Education Category'])->label(FALSE) ?>
                    </div>
                    <div class="form-group col-xs-6">

                        <?php $mbbsyear = []; ?>
                        <?= $form->field($model, 'mbbs_year')->dropDownList($mbbsyear, ['class' => 'form-new', 'prompt' => 'Select MBBS Year'])->label(FALSE) ?>
                    </div>

                    <div class="form-group col-xs-12">
                        <?= $form->field($model, 'profile_info')->textInput(['class' => 'form-new', 'maxlength' => true, 'placeholder' => 'Profile Info'])->label(FALSE) ?>
                    </div>



                    <div class="form-group col-xs-12">
                        <?= Html::submitButton('Submit', ['class' => 'btn can1 btn-default ']) ?>
                        <?= Html::resetButton('Cancel', ['class' => 'btn can2 btn-default']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>


                </div>
            </div>
        </div>
    </div>
</section>
