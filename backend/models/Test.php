<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "testpaper".
 *
 * @property integer $test_id
 * @property string $test_name
 * @property integer $chapter_id
 * @property integer $cb
 * @property integer $ub
 * @property string $cod
 * @property string $uod
 * @property integer $status
 * @property string $field
 * @property string $field2
 */
class Test extends \yii\db\ActiveRecord {

        /**
         * @inheritdoc
         */
        public static function tableName() {
                return 'testpaper';
        }

        /**
         * @inheritdoc
         */
        public function rules() {
                return [
                    [['chapter_id', 'cb'], 'required'],
                    [['chapter_id', 'cb', 'ub', 'status'], 'integer'],
                    [['cod', 'uod'], 'safe'],
                    [['test_name'], 'string', 'max' => 150],
                    [['field', 'field2'], 'string', 'max' => 45],
                ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels() {
                return [
                    'test_id' => 'Test ID',
                    'test_name' => 'Test Name',
                    'chapter_id' => 'Chapter ID',
                    'cb' => 'Cb',
                    'ub' => 'Ub',
                    'cod' => 'Cod',
                    'uod' => 'Uod',
                    'status' => 'Status',
                    'field' => 'Field',
                    'field2' => 'Field2',
                ];
        }

}
