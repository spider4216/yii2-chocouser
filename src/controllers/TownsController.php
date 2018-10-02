<?php
namespace yii2chocofamily\yii2chocouser\controllers;

use yii\base\Controller;

/**
 * Town Controller
 * 
 * @author farza
 */
class TownsController extends Controller
{
    /**
     * Get All Towns
     * 
     * Notice!
     * can't use strict return type because filters
     * 
     * @return array
     */
    public function actionAll()
    {
        return \Yii::$app->getModule('chocouser')->town->allTowns();
    }
}

