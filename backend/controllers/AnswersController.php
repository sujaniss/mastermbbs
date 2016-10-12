<?php

namespace backend\controllers;

use Yii;
use backend\models\Answers;
use backend\models\AnswersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\Response;

/**
 * AnswersController implements the CRUD actions for Answers model.
 */
class AnswersController extends Controller {

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
         * Lists all Answers models.
         * @return mixed
         */
        public function actionIndex() {
                $searchModel = new AnswersSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return $this->render('index', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                ]);
        }

        /**
         * Displays a single Answers model.
         * @param integer $id
         * @return mixed
         */
        public function actionView($id) {
                return $this->render('view', [
                            'model' => $this->findModel($id),
                ]);
        }

        /**
         * Creates a new Answers model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */
        public function actionCreate() {
                $model = new Answers();

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                } else {
                        return $this->render('create', [
                                    'model' => $model,
                        ]);
                }
        }

        /**
         * Updates an existing Answers model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param integer $id
         * @return mixed
         */
        public function actionUpdate($id) {
                $model = $this->findModel($id);

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                } else {
                        return $this->render('update', [
                                    'model' => $model,
                        ]);
                }
        }

        /**
         * Deletes an existing Answers model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         * @param integer $id
         * @return mixed
         */
        public function actionDelete($id) {
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
        }

        /**
         * Finds the Answers model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         * @param integer $id
         * @return Answers the loaded model
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected function findModel($id) {
                if (($model = Answers::findOne($id)) !== null) {
                        return $model;
                } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                }
        }

        public function actionAnsoptions() {
                $opts = [];
                $this->layout = FALSE;
                \Yii::$app->response->format = Response::FORMAT_JSON;
                if (isset($_POST['qid']) && $_POST['qid'] > 0) {
                        $opts = \yii\helpers\ArrayHelper::map(\backend\models\Options::find()->where('question_id=' . $_POST['qid'])->all(), 'option_id', 'options');
                        if (!empty($opts)) {
                                return ['success' => 'success', 'qid' => $opts];
                        }
                }
                return ['success' => 'success', 'opts' => $opts];
        }
        

        public function actionValidate() {
        	$model = new Answers();
        	$request = \Yii::$app->getRequest();
        	if ($request->isPost && $model->load($request->post())) {
        		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        		return ActiveForm::validate($model);
        	}
        }
        
        public function actionSaveanswer() {
        	$this->layout = FALSE;
        	\Yii::$app->response->format = Response::FORMAT_JSON;
        	$model = new Answers();
       		 if(isset($_POST['Answers']['question_id']) && $_POST['Answers']['question_id'] > 0){        		
        		$modelchkans = Answers::find()->where(['question_id'=>$_POST['Answers']['question_id']])->one();
        		if(count($modelchkans) > 0)
        			$model =  $modelchkans;
        	}   
        	$model->cb =  yii::$app->user->identity->id;
        	$request = \Yii::$app->getRequest();
        	if ($request->isPost && $model->load($request->post())) {
        		if ($model->save()) {
        			return ['response' => 'success', 'qid' => Yii::$app->db->getLastInsertID()];
        		}
        	}
        	return ['response' => 'error'];
        }

}
