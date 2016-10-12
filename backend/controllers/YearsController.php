<?php

namespace backend\controllers;

use Yii;
use backend\models\Years;
use backend\models\YearsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * YearsController implements the CRUD actions for Years model.
 */
class YearsController extends Controller {

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
         * Lists all Years models.
         * @return mixed
         */
        public function actionIndex() {
                $searchModel = new YearsSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return $this->render('index', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                ]);
        }

        /**
         * Displays a single Years model.
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
         * Creates a new Years model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */
        public function actionCreate() {
        		$model = new Years();
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
         * Updates an existing Years model.
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
                        return$this->renderAjax('update', [
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
         * Deletes an existing Years model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         * @param integer $id
         * @return mixed
         */
        public function actionDelete($id) {
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
        }

        /**
         * Finds the Years model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         * @param integer $id
         * @return Years the loaded model
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected function findModel($id) {
                if (($model = Years::findOne($id)) !== null) {
                        return $model;
                } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                }
        }

}
