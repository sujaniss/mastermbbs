<?php

namespace backend\controllers;

use Yii;
use backend\models\Chapters;
use backend\models\ChaptersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ChaptersController implements the CRUD actions for Chapters model.
 */
class ChaptersController extends Controller {

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
         * Lists all Chapters models.
         * @return mixed
         */
        public function actionIndex() {
                $searchModel = new ChaptersSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return $this->render('index', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                ]);
        }

        /**
         * Displays a single Chapters model.
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
         * Creates a new Chapters model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */
        public function actionCreate() {
                $model = new Chapters();
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
         * Updates an existing Chapters model.
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
         * Deletes an existing Chapters model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         * @param integer $id
         * @return mixed
         */
        public function actionDelete($id) {
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
        }

        /**
         * Finds the Chapters model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         * @param integer $id
         * @return Chapters the loaded model
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected function findModel($id) {
                if (($model = Chapters::findOne($id)) !== null) {
                        return $model;
                } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                }
        }

}
