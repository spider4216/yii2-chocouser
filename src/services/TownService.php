<?php
namespace yii2chocofamily\yii2chocouser\services;

use yii\base\Component;
use yii2chocofamily\yii2chocouser\models\TownsModel;
use yii\web\NotFoundHttpException;

class TownService extends Component
{
    public function allTowns()
    {
        return TownsModel::find()->asArray()->all();
    }
    
    public function oneById(int $id)
    {
        $town = TownsModel::findOne($id);
        
        if ($town === null) {
            throw new NotFoundHttpException(\Yii::t('app', 'town does not exist'));
        }
        
        return $town;
    }
}

