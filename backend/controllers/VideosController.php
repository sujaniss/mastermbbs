<?php

namespace backend\controllers;

use Yii;
use backend\models\Videos;
use backend\models\VideosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Topics;
use yii\web\UploadedFile;


/**
 * VideosController implements the CRUD actions for Videos model.
 */
class VideosController extends Controller {

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
         * Lists all Videos models.
         * @return mixed
         */
        public function actionIndex() {
                $searchModel = new VideosSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return $this->render('index', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                ]);
        }

        /**
         * Displays a single Videos model.
         * @param integer $id
         * @return mixed
         */
        public function actionView($id) {
                return $this->render('view', [
                            'model' => $this->findModel($id),
                ]);
        }

        /**
         * Creates a new Videos model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */
         public function actionCreate() {
                $model = new Videos();
                $topicoptions =  Topics::find()->select(['topic_id','topic','parent_id'])->all();
                $topic_dropdown =  $this->get_options($topicoptions);               
                
                if ($model->load(Yii::$app->request->post())) {
                        $file = \yii\web\UploadedFile::getInstance($model, 'video_name');
                        $model->video_name = $file->name;
                        $model->save();
                        $file->saveAs('../uploads/' . $model->video_name);
                        return $this->redirect(['index']);
                } else {
                        return $this->render('create', [
                                    'model' => $model,'topicOption'=>$topic_dropdown
                        ]);
                }
        } 
        
        public function actionValidate() {
        	$this->layout = FALSE;
        	$model = new Videos();
        	$request = \Yii::$app->getRequest();
        	if ($request->isPost && $model->load($request->post())) {
        		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        		return ActiveForm::validate($model);
        	}
        }
        
      /*   public function actionCreate() {
        	error_reporting(E_STRICT);
        	header('Content-type:application/json');
        	$model = new Videos();
        	$topicoptions =  Topics::find()->select(['topic_id','topic','parent_id'])->all();
        	$topic_dropdown =  $this->get_options($topicoptions);        	
        	$imageFile = UploadedFile::getInstanceByName('Topic[video_name]');
        	$directory = \Yii::getAlias('@backend/web/videos/');
        	
        	if (!is_dir($directory)) {
        		mkdir($directory);
        	}
        	if ($imageFile) {
        		$this->layout=null;
        		Yii::$app->response->format = Response::FORMAT_JSON;
        		$uid = uniqid(time(), true);
        		$fileName = $uid . '.' . $imageFile->extension;
        		$filePath = $directory . $fileName;
        		$model->video_name= $filePath;
        		if ($model->load(Yii::$app->request->post()) && $model->save()) {
        			if ($imageFile->saveAs($filePath)) {
        				$path = '/img/temp/' . Yii::$app->session->id . DIRECTORY_SEPARATOR . $fileName;
        				return [
        						'files' => [[
        								'name' => $fileName,
        								'size' => $imageFile->size,
        								"url" => $path,
        								"thumbnailUrl" => $path,
        								"deleteUrl" => 'image-delete?name=' . $fileName,
        								"deleteType" => "POST"
        						]]
        				];
        			
        			}
        		
        	}else {
        		return $this->render('create', [
        				'model' => $model,'topicOption'=>$topic_dropdown
        		]);
        	}
        	
        	} else {
        		return $this->render('create', [
        				'model' => $model,'topicOption'=>$topic_dropdown
        		]);
        	}
        } */

        /**
         * Updates an existing Videos model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param integer $id
         * @return mixed
         */
        public function actionUpdate($id) {
                $model = $this->findModel($id);

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                        return $this->redirect(['view', 'id' => $model->video_id]);
                } else {
                        return $this->render('update', [
                                    'model' => $model,
                        ]);
                }
        }

        /**
         * Deletes an existing Videos model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         * @param integer $id
         * @return mixed
         */
        public function actionDelete($id) {
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
        }

        /**
         * Finds the Videos model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         * @param integer $id
         * @return Videos the loaded model
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected function findModel($id) {
                if (($model = Videos::findOne($id)) !== null) {
                        return $model;
                } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                }
        }
        
        function get_options($array, $parent=NULL, $indent=NULL) {
        	$return = [];
        	foreach($array as $key => $val) {
        		if($val["parent_id"] == $parent) {
        			$return[] = $indent.$val["topic"];
        			$return = array_merge($return, $this->get_options($array, $val["topic_id"], $indent.$val["topic"].'->'));
        		}
        	}
        	return $return;
        }

}
