<?php

use yii2chocofamily\yii2chocouser\services\TownService;
use yii2chocofamily\yii2chocouser\services\UserService;

return [
    'components' => [
        'subject' => [
            'class' => UserService::class,
        ],
        
        'town' => [
            'class' => TownService::class,
        ],
    ],
];