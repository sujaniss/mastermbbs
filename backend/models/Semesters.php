<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "semesters".
 *
 * @property integer $sem_id
 * @property string $sem_name
 * @property integer $year_id
 * @property integer $status
 * @property integer $cb
 * @property integer $ub
 * @property string $cod
 * @property string $uod
 */
class Semesters extends \yii\db\ActiveRecord {

        /**
         * @inheritdoc
         */
        public static function tableName() {
                return 'semesters';
        }

        /**
         * @inheritdoc
         */
        public function rules() {
                return [
                    [['sem_name', 'year_id'], 'required'],
                    [['year_id', 'status', 'cb', 'ub'], 'integer'],
                    [['cod', 'uod'], 'safe'],
                    [['sem_name'], 'string', 'max' => 150],
                        // ['year_id', 'exist', 'targetClass' => FaqCategory::className()]
                ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels() {
                return [
                    'sem_id' => 'Sem ID',
                    'sem_name' => 'Semester Name',
                    'year_id' => 'Year',
                    'status' => 'Status',
                    'cb' => 'Created By',
                    'ub' => 'Ub',
                    'cod' => 'Cod',
                    'uod' => 'Uod',
                ];
        }

        public function getYear() {
                return $this->hasOne(Years::className(), ['year_id' => 'year_id']);
        }

        public function getCb0() {
                return $this->hasOne(User::className(), ['id' => 'cb']);
        }

        public function getUb0() {
                return $this->hasOne(User::className(), ['id' => 'Ub']);
        }

}
