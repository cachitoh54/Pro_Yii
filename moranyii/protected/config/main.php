<?php

// uncomment the following to define a path alias
//Yii::setPathOfAlias('local','path/to/local-folder');  // Este es para crear nuestros propios "Alias" como abajo.
Yii::setPathOfAlias('me',dirname(__FILE__)."/../../../alias_class"); // Mi propio "Alias" creado.

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Mi aplicación Web',
    'theme'=>'classic',
    // 'theme'=>'blue',
    // 'theme'=>'chame_blue',
    // 'theme'=>'chame_salmon',
    // 'theme'=>'gustalh',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'me.test.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1234',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'authManager'=>array(
			"class"=>"CDbAuthManager",
			"connectionID"=>"db",
		),
        'happy'=>array(
			"class"=>"ext.MHappy",
		),
		'sad'=>array(
			"class"=>"ext.FHappy",
			"trato"=>1,	
		),
		'user'=>array(
			//'class'=>'CWebUser' - Este código no lo escribimos porque el framework lo tiene predeterminado internamente y así nos evita colocar la clase de donde viene el componenete "user" y así con los restos de componentes internos que no tiene la clase de donde vienen.
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'urlSuffix'=>'.html',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),
        
        /*'db'=>array(
		'class'=>'CDbConnection',
	    'connectionString' => 'mysql:host=localhost;dbname=moranyii',
	    'emulatePrepare' => true,
	    'username' => 'root',
	    'password' => '',
	    'charset' => 'utf8',
        ),*/
        
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			//'errorAction'=>YII_DEBUG ? null : 'site/error',  // Este es el que viene por defecto en el framework.
			'errorAction'=>'site/error',  // Este es el que coloqué para que se viera el error.
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'henryjmm54@gmail.com',
	),
);
