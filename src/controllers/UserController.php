<?php
namespace yii2chocofamily\yii2chocouser\controllers;

use yii\web\NotFoundHttpException;
use yii\base\Controller;
use yii2chocofamily\yii2chocouser\dto\CreateUserDto;
use yii2chocofamily\yii2chocouser\models\SubjectModel;
use yii2chocofamily\yii2chocouser\models\TownsModel;
use yii2chocofamily\yii2chocouser\enums\RestStatusEnum;

class UserController extends Controller
{
    public function actionCreate()
    {
        $request = \Yii::$app->request;
        
        \Yii::$app->getModule('chocouser')->town->oneById(
            $request->post('town_id')
        );
        
        $dto = new CreateUserDto();
        
        $dto->setEmail($request->post('email'))
        ->setPhone($request->post('phone'))
        ->setName($request->post('name'))
        ->setSurname($request->post('surname'))
        ->setGender($request->post('gender'))
        ->setTownId($request->post('town_id'));
        
        $user = \Yii::$app->getModule('chocouser')->subject->create($dto);
        
        return [
            'status' => RestStatusEnum::OK,
            'user_id' => $user->id,
        ];
    }
    
    public function actionUserList()
    {
        return SubjectModel::find()->select([
            'id',
            'phone'
        ])->asArray()->all();
    }
    
    public function actionUserDetail()
    {
        $id = \Yii::$app->request->get('id');
        
        return \Yii::$app->getModule('chocouser')->subject->detailById($id);
    }
    
    public function actionUserCount()
    {
        $count = \Yii::$app->getModule('chocouser')->subject->usersCount();
        
        return [
            'count' => $count,
        ];
    }
}

