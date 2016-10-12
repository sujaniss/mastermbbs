<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Posts;
use frontend\models\PostsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * PostsController implements the CRUD actions for Posts model.
 */
class PostsController extends Controller {

        /**
         * @inheritdoc
         */
        public function behaviors() {
                return [
                    'verbs' => [
                        'class' => VerbFilter::className(),
                        'actions' => [
                            'delete' => ['POST'],
                        ],
                    ],
                ];
        }

        /**
         * Lists all Posts models.
         * @return mixed
         */
        public function actionIndex() {
                $searchModel = new PostsSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return $this->render('index', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                ]);
        }

        /**
         * Displays a single Posts model.
         * @param integer $id
         * @return mixed
         */
        public function actionView($id) {
                return $this->render('view', [
                            'model' => $this->findModel($id),
                ]);
        }

        /**
         * Creates a new Posts model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */
        public function actionCreate() {
                $this->layout = "loggedstudent";
                $model = new Posts();
                $model->cb = yii::$app->user->identity->id;
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                        Yii::$app->session->setFlash('postsuccess', 'Your post added successfully!');
                        return $this->redirect(['create']);
                } else {
                        return $this->render('create', [
                                    'model' => $model,
                        ]);
                }
        }

        /**
         * Updates an existing Posts model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param integer $id
         * @return mixed
         */
        public function actionUpdate($id) {
                $model = $this->findModel($id);
                $model->cb = yii::$app->user->identity->id;
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                        return $this->redirect(['view', 'id' => $model->post_id]);
                } else {
                        return $this->render('update', [
                                    'model' => $model,
                        ]);
                }
        }

        /**
         * Deletes an existing Posts model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         * @param integer $id
         * @return mixed
         */
        public function actionDelete($id) {
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
        }

        /**
         * Finds the Posts model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         * @param integer $id
         * @return Posts the loaded model
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected function findModel($id) {
                if (($model = Posts::findOne($id)) !== null) {
                        return $model;
                } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                }
        }

        public function actionLatestPost() {
                $this->layout = "loggedstudent";
                $lpost = Posts::find()->where(['status' => 1])->orderBy(['post_id' => SORT_DESC])->one();
                $opost = Posts::find()->where(['status' => 1])->andWhere(['<>', 'post_id', $lpost->post_id])->orderBy(['post_id' => SORT_DESC])->all();
                $rpost = Posts::find()->where(['status' => 1, 'sub_id' => $lpost->sub_id])->andWhere(['<>', 'post_id', $lpost->post_id])->orderBy(['post_id' => SORT_DESC])->all();
                return $this->render('latestPost', [
                            'lpost' => $lpost, 'opost' => $opost, 'rpost' => $rpost
                ]);
        }

        public function actionMyPost() {
                $this->layout = "loggedstudent";
                $lpost = Posts::find()->where(['status' => 1, 'cb' => yii::$app->user->identity->id])->orderBy(['post_id' => SORT_DESC])->one();
                $opost = Posts::find()->where(['status' => 1, 'cb' => yii::$app->user->identity->id])->andWhere(['<>', 'post_id', $lpost->post_id])->orderBy(['post_id' => SORT_DESC])->all();
                $rpost = Posts::find()->where(['status' => 1, 'sub_id' => $lpost->sub_id])->andWhere(['<>', 'post_id', $lpost->post_id])->orderBy(['post_id' => SORT_DESC])->all();
                return $this->render('latestPost', [
                            'lpost' => $lpost, 'opost' => $opost, 'rpost' => $rpost
                ]);
        }

        public function actionDetailPost($id) {
                $this->layout = "loggedstudent";
                $post = $this->findModel($id);
                $rpost = new \yii\data\ActiveDataProvider([
                    'query' => Posts::find()->Where(['status' => 0]),
                    'pagination' => [
                        'pageSize' => 5,
                    ],
                ]);
                return $this->render('detailPost', [
                            'post' => $post, 'rpost' => $rpost
                ]);
        }

        public function actionPost() {
                $this->layout = "loggedstudent";
                $dataProvider = new ActiveDataProvider([
                    'query' => Posts::find()->where(['status' => 0])->orderBy('post_id DESC'),
                    'pagination' => [
                        'pageSize' => 3,
                    ],
                ]);
                return $this->render('postsView', ['provider' => $dataProvider]);
        }

        /* public function actionLatestPost() {
          $this->layout = "loggedstudent";
          $post = Posts::find()->where(['status' => 0])->orderBy(['post_id' => SORT_DESC])->one();
          $rpost = new \yii\data\ActiveDataProvider([
          'query' => Posts::find()->Where(['status' => 0]),
          'pagination' => [
          'pageSize' => 5,
          ],
          ]);
          return $this->render('detailPost', [
          'post' => $post, 'rpost' => $rpost
          ]);
          } */
}
