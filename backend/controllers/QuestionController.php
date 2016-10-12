<?php

namespace backend\controllers;

use Yii;
use backend\models\Question;
use backend\models\QuestionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\Response;
use backend\models\Solution;
use backend\models\Options;
use backend\models\Answers;

/**
 * QuestionController implements the CRUD actions for Question model.
 */
class QuestionController extends Controller {

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
         * Lists all Question models.
         * @return mixed
         */
        public function actionIndex() {
                $searchModel = new QuestionSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                if (isset($_GET['id']) && is_int($_GET['id'])) {
                        $this->searchparams = $_GET['id'];
                }

                return $this->render('index', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                ]);
        }

        /**
         * Displays a single Question model.
         * @param integer $id
         * @return mixed
         */
        public function actionView($id) {
                return $this->render('view', [
                            'model' => $this->findModel($id),
                ]);
        }

        /**
         * Creates a new Question model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */
        public function actionCreate() {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $model = new Question();

                        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                                return $this->redirect(['view', 'id' => $model->question_id]);
                        } else {
                                return $this->render('create', [
                                            'model' => $model,
                                ]);
                        }
                } else {
                        return $this->redirect(['test/index']);
                }
        }

        /**
         * Updates an existing Question model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param integer $id
         * @return mixed
         */
        public function actionUpdate($id) {
                $model = $this->findModel($id);
                //$optionModel = Options::find(['question_id'=>$model->question_id])->all();
                //$answerModel = Answers::find(['question_id'=>$model->question_id])->one();  
                //$solutionModel = Solution::find(['question_id'=>$model->question_id])->one();
                if ($model->load(Yii::$app->request->post()) && $model->save()){
                        return $this->redirect(['view', 'id' => $model->question_id]);
                } else {
                        return $this->render('update', [
                                    'model' => $model,
                        			//'optionModel'=>$optionModel,
                        			//'answerModel'=>$answerModel,
                        			//'solutionModel'=>$solutionModel
                        ]);
                }
        }

        /**
         * Deletes an existing Question model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         * @param integer $id
         * @return mixed
         */
        public function actionDelete($id) {
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
        }

        /**
         * Finds the Question model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         * @param integer $id
         * @return Question the loaded model
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected function findModel($id) {
                if (($model = Question::findOne($id)) !== null) {
                        return $model;
                } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                }
        }

        public function actionValidate() {
                $model = new Question();
                $request = \Yii::$app->getRequest();
                if ($request->isPost && $model->load($request->post())) {
                        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                        return ActiveForm::validate($model);
                }
        }

        public function actionSavequestion() {
                $this->layout = FALSE;
                \Yii::$app->response->format = Response::FORMAT_JSON;
                $model = new Question();
                if(isset($_POST['Question']['question_id']) && $_POST['Question']['question_id'] > 0){                
                	$modelchkqid = Question::findOne($_POST['Question']['question_id']);
                	if(count($modelchkqid) > 0)
                		$model =  $modelchkqid;
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
        
        public function actionSolutionvalidate() {
        	$model = new Solution();
        	$request = \Yii::$app->getRequest();
        	if ($request->isPost && $model->load($request->post())) {
        		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        		return ActiveForm::validate($model);
        	}
        }
        
        public function actionSavesolutions() {
        	$this->layout = FALSE;
        	\Yii::$app->response->format = Response::FORMAT_JSON;
        	$model = new Solution();
        	if(isset($_POST['Solution']['question_id']) && $_POST['Solution']['question_id'] > 0){
        		
        		$modelchk = Solution::find()->where(['question_id'=>$_POST['Solution']['question_id']])->one();
        		if(count($modelchk) > 0)
        			$model =  $modelchk;
        	}        	
        	$request = \Yii::$app->getRequest();
        	if ($request->isPost && $model->load($request->post())) {
        		if ($model->save()) {
        			return ['response' => 'success', 'qid' => Yii::$app->db->getLastInsertID()];
        		}
        	}
        	return ['response' => 'error'];
        }

}
