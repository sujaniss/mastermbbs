<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "subjects".
 *
 * @property integer $sub_id
 * @property string $sub_name
 * @property integer $sem_id
 * @property integer $cb
 * @property integer $ub
 * @property string $cod
 * @property string $uod
 * @property integer $status
 * @property string $field1
 * @property string $field2
 */
class Subjects extends \yii\db\ActiveRecord {

        /**
         * @inheritdoc
         */
        public static function tableName() {
                return 'subjects';
        }

        /**
         * @inheritdoc
         */
        public function rules() {
                return [
                    [['sub_name', 'sem_id'], 'required'],
                    [['sem_id', 'cb', 'ub', 'status'], 'integer'],
                    [['cod', 'uod'], 'safe'],
                    [['sub_name'], 'string', 'max' => 150],
                    [['field1', 'field2'], 'string', 'max' => 45],
                ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels() {
                return [
                    'sub_id' => 'Sub ID',
                    'sub_name' => 'Subject Name',
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

        public function getSem() {
                return $this->hasOne(Semesters::className(), ['sem_id' => 'sem_id']);
        }

        public function getCb0() {
                return $this->hasOne(User::className(), ['id' => 'cb']);
        }

        public function getUb0() {
                return $this->hasOne(User::className(), ['id' => 'Ub']);
        }

}
