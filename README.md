# ChocoFamily Home Work Project

## Версии

- PHP 7.2.10
- Nginx 1.10.3
- PostgreSQL 9.5.12
- Yii 2.0.15.1


## Развертывание Фреймворка

Загрузите Yii2 Basic и разверните его согласно инструкции

[Yii Manual](https://www.yiiframework.com/doc/guide/2.0/en/start-installation)

### Краткая инструкция по развороту

Загрузите и установите Yii2 Basic через менеджер зависимостей composer

```
composer create-project --prefer-dist yiisoft/yii2-app-basic basic
```

## Проектаная работа

Проектная работа была реализована как composer зависимость к фреймворку Yii2 Basic.

Добавьте в composer.json зависимость

```
"require": {
    ...
        "yii2-chocofamily/yii2-chocouser": "0.1.*"
    ...
},
```

Также добавьте репозиторий

```
"repositories": [
	...
	{
    	"type": "vcs",
		"url": "https://github.com/spider4216/yii2-chocouser.git"
	}
	...
]

```

Запустите установку

```
composer update
```

Отредактируйте конфигурационный файл, директивы которого отвечают за соединение с БД

```
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];

```

Запустите миграции для формирования структуры БД и фикстурных данных

```
php yii migrate/up --migrationPath=@vendor/yii2-chocofamily/yii2-chocouser/src/migrations

```
Внесите в главный конфиг приложения стартовые настройки роутинга и выдачи результата:

```
‘components’ => [
    ...
'response' => [
	'format' => Response::FORMAT_JSON
 ],

 'urlManager' => [
     'enablePrettyUrl' => true,
     'enableStrictParsing' => true,
     'showScriptName' => false,
 ],
...
]

```
А также подключите загруженный модуль

```
...
'modules' => [
        'chocouser' => [
            'class' => yii2chocofamily\yii2chocouser\Module::class,
        ],
],

'bootstrap' => [
    'chocouser',
],
...

```

### Список методов

| URL          | Метод | Описание                                    |
| ------------ |:-----:| -------------------------------------------:|
| /user        | POST  | Создание пользователя                       |
| /users       | GET   | Получить список всех пользователей          |
| /user/<id>   | GET   | Получить пользователя по ID                 |
| /users/count | GET   | Получить количество пользователей в системе |
| /towns       | GET   | Получить список всех городов                |