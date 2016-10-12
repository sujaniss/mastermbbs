<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "videos".
 *
 * @property integer $video_id
 * @property string $video_name
 * @property integer $topic_id
 * @property integer $show_order
 * @property integer $cb
 * @property integer $ub
 * @property string $cod
 * @property string $uod
 * @property string $field1
 * @property string $field2
 */
class Videos extends \yii\db\ActiveRecord {

        /**
         * @inheritdoc
         */
        public $upload_file;

        public static function tableName() {
                return 'videos';
        }

        /**
         * @inheritdoc
         */
        public function rules() {
                return [
                    [['video_name', 'topic_id'], 'required'],
                    [['topic_id', 'show_order', 'cb', 'ub'], 'integer'],
                    [['cod', 'uod'], 'safe'],
                    [['video_name'], 'string', 'max' => 150],
                    [['field1', 'field2'], 'string', 'max' => 45],
                   	 [['upload_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
                        // [['video_name'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
                ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels() {
                return [
                    'video_id' => 'Video ID',
                    'video_name' => 'Video File',
                    'topic_id' => 'Topic ID',
                    'show_order' => 'Show Order',
                    'cb' => 'Created By',
                    'ub' => 'Ub',
                    'cod' => 'Cod',
                    'uod' => 'Uod',
                    'field1' => 'Field1',
                    'field2' => 'Field2',
                ];
        }

        public function getCb0() {
                return $this->hasOne(User::className(), ['id' => 'cb']);
        }

        public function getTop() {
                return $this->hasOne(Topics::className(), ['topic_id' => 'topic_id']);
        }

}
