<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "device".
 *
 * @property integer $id
 * @property string $registration_token
 * @property string $email_user
 */
class Device extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'device';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['registration_token', 'email_user'], 'required'],
            [['registration_token', 'email_user'], 'string', 'max' => 255],
            [['email_user'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'registration_token' => 'Registration Token',
            'email_user' => 'Email User',
        ];
    }
}
