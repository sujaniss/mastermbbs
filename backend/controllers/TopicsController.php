<?php

namespace backend\controllers;

use Yii;
use backend\models\Topics;
use backend\models\TopicsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Subjects;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use backend\models\Chapters;
use yii\web\UploadedFile;
use backend;
/**
 * TopicsController implements the CRUD actions for Topics model.
 */
class TopicsController extends Controller {

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
         * Lists all Topics models.c
         * @return mixed
         */
        public function actionIndex() {
                $searchModel = new TopicsSearch();
                if(isset($_GET['topicsub']) && $_GET['topicsub'] > 0)
                	$searchModel->topicsub = $_GET['topicsub'];
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return $this->render('index', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                ]);
        }

        /**
         * Displays a single Topics model.
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
         * Creates a new Topics model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */
        
        public function actionCreate(){
        	$model = new Topics();
        	$topicoptions =  Topics::find()->select(['topic_id','topic','parent_id'])->all();
        	$path =  dirname(Yii::$app->basePath) . '/common/uploads/'; 
        	print_r($path); 
        	if (!file_exists($path)) {
        		mkdir($path, 0777, true);
        	}
        	$model->cb = Yii::$app->user->identity->id;
        	$tagetFile ="";
        	if ($model->load(Yii::$app->request->post())) {
        		$image = UploadedFile::getInstance($model, 'video');
        		if(!empty($image)){
        			$model->filename = $image->name;
        			$ext = explode(".", $image->name);
        			$model->video = Yii::$app->security->generateRandomString().".".$ext[1];        		
        			$tagetFile = $path.$model->video;   
        		}
        		
        		if(isset($_POST['Topics']['content']) && $_POST['Topics']['content'] !=""){
        			$model->content = $_POST['Topics']['content'];
        		}
        		if($model->save()){
        			if($tagetFile !==""){
        				$image->saveAs($tagetFile);
        			}
	        		if (Yii::$app->request->isAjax) {
	        			return $this->renderAjax(['index']);
	        		}else{
	        			return $this->redirect(['index']);
	        		}
        	} else {
        		if (Yii::$app->request->isAjax) {
        			return $this->renderAjax('create', [
        					'model' => $model
        			]);
        		}else{
        			return $this->render('create', [
        					'model' => $model
        			]);
        		}
        	}}else{
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
         * Updates an existing Topics model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param integer $id
         * @return mixed
         */
        public function actionUpdate($id) {
                $model = $this->findModel($id);
                $path =  Yii::$app->basePath . '/uploads/';
                $model->ub = Yii::$app->user->identity->id;
                $tagetFile ="";
                if ($model->load(Yii::$app->request->post())) {
                	if(!empty($image)){
                		$model->filename = $image->name;
                		$ext = explode(".", $image->name);
                		$model->video = Yii::$app->security->generateRandomString().".".$ext[1];
                		$tagetFile = $path.$model->video;
                	}
                	if($model->save()){	
                		if($tagetFile !==""){
                			$image->saveAs($tagetFile);
                		}
	                	if (Yii::$app->request->isAjax) {
	                        return $this->renderAjax(['index']);
	                	}else{
	                		return $this->redirect(['index']);
	                	}
                	}else{
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
         * Deletes an existing Topics model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         * @param integer $id
         * @return mixed
         */
        public function actionDelete($id) {
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
        }

        /**
         * Finds the Topics model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         * @param integer $id
         * @return Topics the loaded model
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected function findModel($id) {
                if (($model = Topics::findOne($id)) !== null) {
                        return $model;
                } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                }
        }
              
        
 		
        
        public function actionSemandsub(){
        	$this->layout=null;
        	\yii::$app->response->format = Response::FORMAT_JSON;
        	$outsub= [];$outchap= [];$outparenttopic=[];
        	if(isset($_POST['sem_id']) && $_POST['sem_id'] > 0){        		
        		$outsub =  ArrayHelper::map(Subjects::findAll(['sem_id'=>$_POST['sem_id']]), 'sub_id', 'sub_name');
        		$outchap =  ArrayHelper::map(Chapters::find()->where(['sem_id'=>$_POST['sem_id']])->all(), 'chapter_id', 'chapter_name');
        		$outparenttopic = backend\models\Topics::Categories($_POST['sem_id']);
        		return ['response' => 'success','outsub'=>$outsub ,'outchap'=>$outchap,'outparenttopic'=>$outparenttopic];
        	}
        	  return ['response' => 'error'];
        	
        }
        
        public function actionChapters(){
        	$this->layout=null;
        	\yii::$app->response->format = Response::FORMAT_JSON;
        	$outsub= [];$outchap= [];$outparenttopic=[];
        	if(isset($_POST['sub_id']) && $_POST['sub_id'] > 0){        		
        		$outchap =  ArrayHelper::map(Chapters::find()->where(['sub_id'=>$_POST['sub_id']])->all(), 'chapter_id', 'chapter_name');
        		$outparenttopic = backend\models\Topics::Categories(0,$_POST['sub_id']);
        		return ['response' => 'success','outsub'=>$outsub ,'outchap'=>$outchap,'outparenttopic'=>$outparenttopic];
        	}
        	return ['response' => 'error'];
        	 
        }
        
        public function actionDrptopics(){
        	$this->layout=null;
        	$outparenttopic=[];
        	\yii::$app->response->format = Response::FORMAT_JSON;
        	$outsub= [];$outchap= [];
        	if(isset($_POST['cha']) && $_POST['cha'] > 0){
        		$outparenttopic = backend\models\Topics::Categories(0,0,$_POST['cha']);
        		return ['response' => 'success','outparenttopic'=>$outparenttopic];
        	}
        	return ['response' => 'error'];
        
        }
        
        public function Categories(){
        	$parents = Topics::findAll(['parent_id'=>null]);         	
        	$returnhtml = array();
        	for($i= 0;$i<count($parents);$i++){
        		//if($parents[$i]["id"] !=$params)
        			$returnhtml[$parents[$i]["topic_id"]] = $parents[$i]["topic"];
        			$childs = Topics::findAll(['parent_id'=>$parents[$i]["topic_id"]]);
        			if(count($childs) > 0){
        				for($j = 0; $j < count($childs);$j++){
        					$category= $parents[$i]["topic"].' -> '.$childs[$j]["topic"];
        				    					
        					//if($childs[$j]["id"] !=$params)
        						$returnhtml[$childs[$j]["topic_id"]] =$parents[$i]["topic"]."->". $childs[$j]["topic"];
        						$returnhtml = $this->CategoryTrees($childs[$j]["topic_id"],$category,$returnhtml);
        				}
        			}
        	}
        
        	return $returnhtml;
        }
        
        public function CategoryTrees($id,$category,$html)
        {
        	foreach(Topics::findAll(['parent_id'=>$id]) as $child)
        	{
        		$category1=$category.' -> '.$child->topic;
        		$html[$child->topic_id] = $category.' -> '.$child->topic;
        		$html = $this->CategoryTrees($child->topic_id,$category1,$html);
        	}
        	 
        
        	return $html;
        }
        
        

}
