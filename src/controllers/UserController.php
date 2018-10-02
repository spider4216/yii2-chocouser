<?php
namespace yii2chocofamily\yii2chocouser\controllers;

use yii\base\Controller;
use yii2chocofamily\yii2chocouser\dto\CreateUserDto;
use yii2chocofamily\yii2chocouser\enums\RestStatusEnum;

/**
 * User Controller
 * 
 * @author farza
 */
class UserController extends Controller
{
    /**
     * Create User
     * 
     * Notice!
     * can't use strict return type because filters
     * 
     * @return array
     */
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
    
    /**
     * Get User List
     * 
     * Notice!
     * can't use strict return type because filters
     * 
     * @return array
     */
    public function actionUserList()
    {
        return \Yii::$app->getModule('chocouser')->subject->userList();
    }
    
    /**
     * Get User Detail by User ID
     * 
     * Notice!
     * can't use strict return type because filters
     * 
     * @return array
     */
    public function actionUserDetail()
    {
        $id = \Yii::$app->request->get('id');
        
        return \Yii::$app->getModule('chocouser')->subject->detailById($id);
    }
    
    /**
     * Get count of user
     * 
     * Notice!
     * can't use strict return type because filters
     * 
     * @return array
     */
    public function actionUserCount()
    {
        $count = \Yii::$app->getModule('chocouser')->subject->usersCount();
        
        return [
            'count' => $count,
        ];
    }
}

