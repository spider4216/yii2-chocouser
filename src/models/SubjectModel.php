<?php
namespace yii2chocofamily\yii2chocouser\models;

use yii\db\ActiveRecord;
use yii2chocofamily\yii2chocouser\enums\UserStatusEnum;

class SubjectModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'users';
    }
    
    public function rules()
    {
        return [
            [['email', 'phone',], 'required'],

            [['email', 'phone',], 'unique'],
            
            ['email', 'email'],
            
            [['email', 'phone'], 'string', 'max' => 255],
            
            ['status', 'default', 'value' => UserStatusEnum::ACTIVE],
            
            ['status', 'integer'],
        ];
    }
    
    public function getProfile()
    {
        return $this->hasOne(UserDataModel::class, ['user_id' => 'id']);
    }
}

