<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ans_options".
 *
 * @property integer $option_id
 * @property string $options
 * @property integer $question_id
 * @property integer $cb
 * @property integer $ub
 * @property string $cod
 * @property string $uod
 * @property integer $status
 * @property string $field1
 * @property string $field2
 */
class Options extends \yii\db\ActiveRecord {

        /**
         * @inheritdoc
         */
	public $act;
	
        public static function tableName() {
                return 'ans_options';
        }

        /**
         * @inheritdoc
         */
        public function rules() {
                return [
                    [['options', 'question_id'], 'required'],
                    [['options'], 'string'],
                    [['question_id', 'cb', 'ub', 'status'], 'integer'],
                    [['cod', 'uod'], 'safe'],
                    [['field1', 'field2'], 'string', 'max' => 45],
                ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels() {
                return [
                    'option_id' => 'Option ID',
                    'options' => 'Options',
                    'question_id' => 'Question ID',
                    'cb' => 'Cb',
                    'ub' => 'Ub',
                    'cod' => 'Cod',
                    'uod' => 'Uod',
                    'status' => 'Status',
                    'field1' => 'Field1',
                    'field2' => 'Field2',
                		'act'=>'Act'
                ];
        }

}
