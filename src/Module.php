<?php
namespace yii2chocofamily\yii2chocouser;

use yii\base\BootstrapInterface;

/**
 * Home Work for Chocofamily company
 * Yii2 Module which implements REST API user
 * functionality
 * 
 * @author farza
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    public function init()
    {
        parent::init();
        
        $config = require __DIR__ . '/config/main.php';
        
        \Yii::configure($this, $config);
    }
    
    public function bootstrap($app)
    {
        $routes = require __DIR__ . '/config/routes.php';
        $app->getUrlManager()->addRules($routes);
    }
}

