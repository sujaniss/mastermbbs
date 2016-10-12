<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "questions".
 *
 * @property integer $question_id
 * @property string $question
 * @property string $solutions
 * @property integer $correct_ans_id
 * @property integer $cb
 * @property integer $ub
 * @property string $cod
 * @property string $uod
 * @property integer $status
 * @property integer $test_id
 */
class Question extends \yii\db\ActiveRecord {

        /**
         * @inheritdoc
         */
	    public $proxyqid;
        public static function tableName() {
                return 'questions';
        }

        /**
         * @inheritdoc
         */
        public function rules() {
                return [
                    [['question'], 'required'],
                    [['question',], 'string'],
                    [['correct_ans_id', 'cb', 'ub', 'status', 'test_id'], 'integer'],
                    [['cod', 'uod'], 'safe'],
                ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels() {
                return [
                    'question_id' => 'Question ID',
                    'question' => 'Question',
                    'solutions' => 'Solutions',
                    'correct_ans_id' => 'Correct Ans ID',
                    'cb' => 'Cb',
                    'ub' => 'Ub',
                    'cod' => 'Cod',
                    'uod' => 'Uod',
                    'status' => 'Status',
                    'test_id' => 'Test ID',
                ];
        }

}
