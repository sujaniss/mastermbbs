<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "correct_answer".
 *
 * @property integer $id
 * @property integer $question_id
 * @property integer $option_id
 * @property integer $status
 * @property integer $cb
 * @property integer $ub
 * @property string $cob
 * @property string $uob
 * @property string $field
 */
class Answers extends \yii\db\ActiveRecord {

        /**
         * @inheritdoc
         */
        public static function tableName() {
                return 'correct_answer';
        }

        /**
         * @inheritdoc
         */
        public function rules() {
                return [
                    [['question_id', 'option_id'], 'required'],
                    [['question_id', 'option_id', 'status', 'cb', 'ub'], 'integer'],
                    [['cob', 'uob'], 'safe'],
                    [['field'], 'string', 'max' => 45],
                ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels() {
                return [
                    'id' => 'ID',
                    'question_id' => 'Question ID',
                    'option_id' => 'Option ID',
                    'status' => 'Status',
                    'cb' => 'Cb',
                    'ub' => 'Ub',
                    'cob' => 'Cob',
                    'uob' => 'Uob',
                    'field' => 'Field',
                ];
        }

}
