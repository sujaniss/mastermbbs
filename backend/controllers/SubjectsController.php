<?php

namespace backend\controllers;

use Yii;
use backend\models\Subjects;
use backend\models\SubjectSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SubjectsController implements the CRUD actions for Subjects model.
 */
class SubjectsController extends Controller {

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
         * Lists all Subjects models.
         * @return mixed
         */
        public function actionIndex() {
                $searchModel = new SubjectSearch();
                if(isset($_GET['semester']) && $_GET['semester'] > 0)
                	$searchModel->semester = $_GET['semester'];
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return $this->render('index', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                ]);
        }

        /**
         * Displays a single Subjects model.
         * @param integer $id
         * @return mixed
         */
        public function actionView($id) {
        	if (Yii::$app->request->isAjax) {
                return $this->renderAjax('view', [
                            'model' => $this->findModel($id),
                ]);
        	}else{
        		return $this->render('view', [
        				'model' => $this->findModel($id),
        		]);
        		
        	}
        }

        /**
         * Creates a new Subjects model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */
        public function actionCreate() {
                $model = new Subjects();
                $model->cb = Yii::$app->user->identity->id;

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                	if (Yii::$app->request->isAjax) {
                        return $this->renderAjax(['index']);
                	}else{
                		return $this->redirect(['index']);
                	}
                } else {
                	if (Yii::$app->request->isAjax) {
                        return $this->renderAjax('create', [
                                    'model' => $model,
                        ]);
                	}else{
                		return $this->render('create', [
                				'model' => $model,
                		]);
                		
                	}
                }
        }

        /**
         * Updates an existing Subjects model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param integer $id
         * @return mixed
         */
        public function actionUpdate($id) {
                $model = $this->findModel($id);

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                	if (Yii::$app->request->isAjax) {
                        return $this->renderAjax(['index']);
                	}else{
                		return $this->redirect(['index']);
                	}
                } else {
                	if (Yii::$app->request->isAjax) {
                        return $this->renderAjax('update', [
                                    'model' => $model,
                        ]);
                	}else{
                		return $this->render('update', [
                				'model' => $model,
                		]);
                	}
                }
        }

        /**
         * Deletes an existing Subjects model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         * @param integer $id
         * @return mixed
         */
        public function actionDelete($id) {
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
        }

        /**
         * Finds the Subjects model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         * @param integer $id
         * @return Subjects the loaded model
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected function findModel($id) {
                if (($model = Subjects::findOne($id)) !== null) {
                        return $model;
                } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                }
        }

}
