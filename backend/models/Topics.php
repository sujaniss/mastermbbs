<?php

namespace backend\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "topics".
 *
 * @property integer $topic_id
 * @property string $topic
 * @property integer $parent_id
 * @property integer $sub_id
 * @property integer $status
 * @property integer $cb
 * @property integer $ub
 * @property string $cod
 * @property string $uod
 * @property string $field
 * @property string $field2
 */
class Topics extends \yii\db\ActiveRecord {

        /**
         * @inheritdoc
         */
	
	public $opts;
	public $filename;
        public static function tableName() {
                return 'topics';
        }

        /**
         * @inheritdoc
         */
        public function rules() {
                return [
                    [['topic', 'sub_id', 'chapter_id','sem_id','content'], 'required'],
                    [['parent_id', 'sub_id', 'status', 'cb', 'ub', 'sem_id', 'chapter_id'], 'integer'],
                    [['cod', 'uod'], 'safe'],
                    [['topic'], 'string', 'max' => 150],
                	[['video'], 'safe'],
                	[['video'], 'file', 'extensions'=>'mp4,flv'],
                ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels() {
                return [
                    'topic_id' => 'Topic ID',
                    'topic' => 'Topic',
                    'parent_id' => 'Parent Topic',
                    'sub_id' => 'Subject',
                    'status' => 'Status',
                    'cb' => 'Created By',
                    'ub' => 'Ub',
                    'cod' => 'Cod',
                    'uod' => 'Uod',
                    'chapter_id' => 'Chapter',
                    'sem_id' => 'Semester',
                		'content'=>'Content'
                ];
        }

        public function getParent() {
                return $this->hasOne(Topics::className(), ['topic_id' => 'parent_id']);
        }

        /**
         * @return \yii\db\ActiveQuery
         */
        public function getSub() {
                return $this->hasOne(Subjects::className(), ['sub_id' => 'sub_id']);
        }

        public function getCb0() {
                return $this->hasOne(User::className(), ['id' => 'cb']);
        }

        public function getUb0() {
                return $this->hasOne(User::className(), ['id' => 'Ub']);
        }

        public function getChapter() {
                return $this->hasOne(Chapters::className(), ['chapter_id' => 'chapter_id']);
        }

        /**
         * @return \yii\db\ActiveQuery
         */
        public function getSem() {
                return $this->hasOne(Semesters::className(), ['sem_id' => 'sem_id']);
        }
        

        public function Categories($semid = 1,$subid=0,$chapid=0,$parent=0){
        	$parentTopicFilter = "SELECT topic_id,topic,parent_id from topics where ";
        	if($semid > 0)
        		$parentTopicFilter .= "sem_id =". $semid." AND ";
        	if($subid > 0)
        		$parentTopicFilter .= "sub_id=". $subid." AND ";
        		
        	if($subid > 0)
        		$parentTopicFilter .= "chapter_id=". $chapid." AND ";
        		
        	if($parent !== null  && $parent > 0)
        		$parentTopicFilter .= "parent_id= ". $parent." ";
        		
        	else{
        		$parentTopicFilter .= "parent_id=0 ";
        	}
        	$parentTopicFilter .= "ORDER BY topic DESC";
        	
        	//print_r($parentTopicFilter); exit();
        	
        	
        	$parents = Topics::findBySql($parentTopicFilter)->all();
        	$returnhtml = array();
        	for($i= 0;$i<count($parents);$i++){
        		$returnhtml[$parents[$i]["topic_id"]] = $parents[$i]["topic"];
        		$childs = Topics::findAll(['parent_id'=>$parents[$i]["topic_id"]]);
        		if(count($childs) > 0){
        			for($j = 0; $j < count($childs);$j++){
        				$category= $parents[$i]["topic"].' -> '.$childs[$j]["topic"];        					
        				$returnhtml[$childs[$j]["topic_id"]] =$parents[$i]["topic"]."->". $childs[$j]["topic"];
        				$returnhtml = self::CategoryTrees($childs[$j]["topic_id"],$category,$returnhtml);
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
        		$html = self::CategoryTrees($child->topic_id,$category1,$html);
        	}
        
        
        	return $html;
        }

}
