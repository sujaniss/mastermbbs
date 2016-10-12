<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\StudentLoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\ContactForm;
use frontend\models\Students;

/**
 * Site controller
 */
class SiteController extends Controller {

        /**
         * @inheritdoc
         */
        public function behaviors() {
                return [
                    'access' => [
                        'class' => AccessControl::className(),
                        'only' => ['logout', 'signup'],
                        'rules' => [
                            [
                                'actions' => ['signup'],
                                'allow' => true,
                                'roles' => ['?'],
                            ],
                            [
                                'actions' => ['logout'],
                                'allow' => true,
                                'roles' => ['@'],
                            ],
                        ],
                    ],
                    'verbs' => [
                        'class' => VerbFilter::className(),
                        'actions' => [
                            'logout' => ['post'],
                        ],
                    ],
                ];
        }

        /**
         * @inheritdoc
         */
        public function actions() {
                return [
                    'error' => [
                        'class' => 'yii\web\ErrorAction',
                    ],
                    'captcha' => [
                        'class' => 'yii\captcha\CaptchaAction',
                        'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                    ],
                ];
        }

        /**
         * Displays homepage.
         *
         * @return mixed
         */
        public function actionIndex() {
                Yii::$app->user->logout();
                return $this->render('index');
        }

        /**
         * Logs in a user.
         *
         * @return mixed
         */
        public function actionLogin() {
                if (!Yii::$app->user->isGuest) {
                        return $this->goHome();
                }

                $model = new StudentLoginForm();
                if ($model->load(Yii::$app->request->post()) && $model->login()) {
                        return $this->redirect(['students/my-account']);
                } else {
                        return $this->render('login', [
                                    'model' => $model,
                        ]);
                }
        }

        /**
         * Logs out the current user.
         *
         * @return mixed
         */
        public function actionLogout() {
                Yii::$app->user->logout();
                return $this->goHome();
        }

        /**
         * Displays contact page.
         *
         * @return mixed
         */
        public function actionContactus() {
                $model = new ContactForm();
                if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                        if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
                        } else {
                                Yii::$app->session->setFlash('error', 'There was an error sending email.');
                        }

                        return $this->refresh();
                } else {
                        return $this->render('contact', [
                                    'model' => $model,
                        ]);
                }
        }

        /**
         * Displays about page.
         *
         * @return mixed
         */
        public function actionAboutus() {
                return $this->render('about');
        }

        public function actionServices() {
                return $this->render('services');
        }

        public function actionRegister() {
                $model = new Students();
                $model->role = 1;
                if ($model->load(Yii::$app->request->post())) {
                        if ($model->register()) {
                                if (Yii::$app->getUser()->login($model)) {
                                        return $this->goHome();
                                }
                        }
                }
                return $this->render('register', ['model' => $model]);
        }

        /**
         * Signs user up.
         *
         * @return mixed
         */

        /**
         * Requests password reset.
         *
         * @return mixed
         */
        public function actionRequestPasswordReset() {
                $model = new PasswordResetRequestForm();
                if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                        if ($model->sendEmail()) {
                                Yii::$app->session->setFlash('spr', 'Check your email for further instructions.');
                                return $this->redirect(['site/request-password-reset']);
                                //  $this->goHome();
                        } else {
                                Yii::$app->session->setFlash('epr', 'Sorry, we are unable to reset password for email provided.');
                        }
                }

                return $this->render('requestPasswordResetToken', [
                            'model' => $model,
                ]);
        }

        /**
         * Resets password.
         *
         * @param string $token
         * @return mixed
         * @throws BadRequestHttpException
         */
        public function actionResetPassword($token) {
                try {
                        $model = new ResetPasswordForm($token);
                } catch (InvalidParamException $e) {
                        throw new BadRequestHttpException($e->getMessage());
                }

                if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
                        Yii::$app->session->setFlash('success', 'New password was saved.');

                        return $this->goHome();
                }

                return $this->render('resetPassword', [
                            'model' => $model,
                ]);
        }

}
