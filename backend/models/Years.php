<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_years".
 *
 * @property integer $year_id
 * @property string $year_name
 * @property integer $cb
 * @property integer $ub
 * @property string $cod
 * @property string $uod
 * @property integer $status
 * @property string $field1
 * @property string $field
 */
class Years extends \yii\db\ActiveRecord {

        /**
         * @inheritdoc
         */
        public static function tableName() {
                return 'tbl_years';
        }

        /**
         * @inheritdoc
         */
        public function rules() {
                return [
                    [['year_name', 'cb'], 'required'],
                    [['cb', 'ub', 'status'], 'integer'],
                    [['cod', 'uod'], 'safe'],
                    [['year_name'], 'string', 'max' => 100],
                    [['field1', 'field'], 'string', 'max' => 45],
                ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels() {
                return [
                    'year_id' => 'Year ID',
                    'year_name' => 'Year Name',
                    'cb' => 'Cb',
                    'ub' => 'Ub',
                    'cod' => 'Cod',
                    'uod' => 'Uod',
                    'status' => 'Status',
                    'field1' => 'Field1',
                    'field' => 'Field',
                ];
        }

}
