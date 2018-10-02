<?php
namespace yii2chocofamily\yii2chocouser\models;

use yii\db\ActiveRecord;

/**
 * User's profile model
 * 
 * @author farza
 */
class UserDataModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'user_data';
    }
    
    public function rules()
    {
        return [
            [['user_id', 'name', 'surname', 'gender', 'town_id'], 'required'],

            [['name', 'surname',], 'string', 'length' => [3, 24]],
            
            ['user_id', 'integer'],

            ['town_id', 'integer'],

            ['gender', 'integer'],
            
            [['name', 'surname'], 'string', 'max' => 255],
        ];
    }
    
    public function getTown()
    {
        return $this->hasOne(TownsModel::class, ['id' => 'town_id']);
    }
}

