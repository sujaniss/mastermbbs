<?php

namespace backend\controllers;

use Yii;
use backend\models\Options;
use backend\models\OptionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\Response;

/**
 * OptionsController implements the CRUD actions for Options model.
 */
class OptionsController extends Controller {

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
         * Lists all Options models.
         * @return mixed
         */
        public function actionIndex() {
                $searchModel = new OptionsSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return $this->render('index', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                ]);
        }

        /**
         * Displays a single Options model.
         * @param integer $id
         * @return mixed
         */
        public function actionView($id) {
                return $this->render('view', [
                            'model' => $this->findModel($id),
                ]);
        }

        /**
         * Creates a new Options model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */
        public function actionCreate() {
                $model = new Options();

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                        return $this->redirect(['view', 'id' => $model->option_id]);
                } else {
                        return $this->render('create', [
                                    'model' => $model,
                        ]);
                }
        }

        /**
         * Updates an existing Options model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param integer $id
         * @return mixed
         */
        public function actionUpdate($id) {
                $model = $this->findModel($id);

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                        return $this->redirect(['view', 'id' => $model->option_id]);
                } else {
                        return $this->render('update', [
                                    'model' => $model,
                        ]);
                }
        }

        /**
         * Deletes an existing Options model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         * @param integer $id
         * @return mixed
         */
        public function actionDelete($id) {
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
        }

        /**
         * Finds the Options model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         * @param integer $id
         * @return Options the loaded model
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected function findModel($id) {
                if (($model = Options::findOne($id)) !== null) {
                        return $model;
                } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                }
        }

        public function actionValidate() {
                $this->layout = FALSE;
                $model = new Options();
                $request = \Yii::$app->getRequest();
                if ($request->isPost && $model->load($request->post())) {
                        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                        return ActiveForm::validate($model);
                }
        }

        public function actionSaveoption() {
                $this->layout = FALSE;
                $model = new Options();
                if(isset($_POST['Options']['option_id']) && $_POST['Options']['option_id'] > 0){
                	$model =   $model = $this->findModel($_POST['Options']['option_id']);
                	$model->ub =  \yii::$app->user->identity->id;
                }	
                $model->cb =  \yii::$app->user->identity->id;                
                $request = \Yii::$app->getRequest();
                \Yii::$app->response->format = Response::FORMAT_JSON;
                if ($request->isPost && $model->load($request->post())) {
                        if ($model->save()) {
                                return ['success' => 'success', 'optionid' => Yii::$app->db->getLastInsertID()];
                        }
                }
                return ['response' => 'error', 'msg' => 'opps! Cannot save this time.'];
        }

}
