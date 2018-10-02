<?php
namespace yii2chocofamily\yii2chocouser\services;

use yii\base\Component;
use yii2chocofamily\yii2chocouser\models\TownsModel;

class TownService extends Component
{
    public function allTowns()
    {
        return TownsModel::find()->asArray()->all();
    }
}

