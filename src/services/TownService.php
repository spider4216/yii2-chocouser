<?php
namespace yii2chocofamily\yii2chocouser\services;

use yii\base\Component;
use yii2chocofamily\yii2chocouser\models\TownsModel;
use yii\web\NotFoundHttpException;

/**
 * Business and Infrastructure logic for towns
 * 
 * @author farza
 */
class TownService extends Component
{
    /**
     * Get All Towns
     * 
     * @return array|\yii\db\ActiveRecord[]
     */
    public function allTowns() : array
    {
        return TownsModel::find()->asArray()->all();
    }
    
    /**
     * Get One Town By Id
     * 
     * @param int $id
     * @throws NotFoundHttpException
     * @return \yii2chocofamily\yii2chocouser\models\TownsModel
     */
    public function oneById(int $id)
    {
        $town = TownsModel::findOne($id);
        
        if ($town === null) {
            throw new NotFoundHttpException(\Yii::t('app', 'town does not exist'));
        }
        
        return $town;
    }
}

