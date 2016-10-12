<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "solutions".
 *
 * @property integer $solution_id
 * @property integer $question_id
 * @property string $solution
 */
class Solution extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solutions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_id', 'solution'], 'required'],
            [['question_id'], 'integer'],
            [['solution'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'solution_id' => 'Solution ID',
            'question_id' => 'Question ID',
            'solution' => 'Solution',
        ];
    }
}
