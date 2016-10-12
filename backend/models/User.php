<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $role
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $first_name
 * @property string $last_name
 * @property integer $gender
 * @property string $dob
 * @property string $native_place
 * @property string $education
 * @property string $edu_cat
 * @property integer $mbbs_year
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'status', 'role', 'created_at', 'updated_at', 'first_name', 'last_name', 'gender', 'dob', 'education', 'edu_cat', 'mbbs_year'], 'required'],
            [['status', 'role', 'created_at', 'updated_at', 'gender', 'mbbs_year'], 'integer'],
            [['dob'], 'safe'],
            [['username', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['email', 'native_place'], 'string', 'max' => 100],
            [['first_name', 'last_name', 'education', 'edu_cat'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'role' => 'Role',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'gender' => 'Gender',
            'dob' => 'Dob',
            'native_place' => 'Native Place',
            'education' => 'Education',
            'edu_cat' => 'Edu Cat',
            'mbbs_year' => 'Mbbs Year',
        ];
    }
}
