<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "chapters".
 *
 * @property integer $chapter_id
 * @property string $chapter_name
 * @property integer $sub_id
 * @property integer $sem_id
 * @property integer $cb
 * @property integer $ub
 * @property string $cod
 * @property string $uod
 * @property integer $status
 * @property string $field1
 * @property string $field2
 */
class Chapters extends \yii\db\ActiveRecord {

        /**
         * @inheritdoc
         */
        public static function tableName() {
                return 'chapters';
        }

        /**
         * @inheritdoc
         */
        public function rules() {
                return [
                    [['chapter_name', 'sub_id', 'sem_id', 'cb'], 'required'],
                    [['sub_id', 'sem_id', 'cb', 'ub', 'status'], 'integer'],
                    [['cod', 'uod'], 'safe'],
                    [['chapter_name'], 'string', 'max' => 255],
                    [['field1', 'field2'], 'string', 'max' => 45],
                ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels() {
                return [
                    'chapter_id' => 'Chapter ID',
                    'chapter_name' => 'Chapter Name',
                    'sub_id' => 'Subject',
                    'sem_id' => 'Semester',
                    'cb' => 'Created By',
                    'ub' => 'Ub',
                    'cod' => 'Cod',
                    'uod' => 'Uod',
                    'status' => 'Status',
                    'field1' => 'Field1',
                    'field2' => 'Field2',
                ];
        }

        public function getCb0() {
                return $this->hasOne(User::className(), ['id' => 'cb']);
        }

        /**
         * @return \yii\db\ActiveQuery
         */
        public function getSub() {
                return $this->hasOne(Subjects::className(), ['sub_id' => 'sub_id']);
        }

        /**
         * @return \yii\db\ActiveQuery
         */
        public function getSem() {
                return $this->hasOne(Semesters::className(), ['sem_id' => 'sem_id']);
        }

}
