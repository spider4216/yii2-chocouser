<?php
namespace yii2chocofamily\yii2chocouser\controllers;

use yii\base\Controller;

class TownsController extends Controller
{
    public function actionAll()
    {
        return \Yii::$app->getModule('chocouser')->town->allTowns();
    }
}

