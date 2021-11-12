<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

$local = in_array($_SERVER['SERVER_ADDR'], array('127.0.0.1','::1','localhost')) ? true : false;
$local = false;
$sessionTimeout = 1800; // 60 seconds * 30 minutes

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Catalogo Aimar',
	'theme'=>'bootstrap',

    'sourceLanguage'=>'00', //language for messages and views
	'language'=>'es', // user language (for Locale)
    'charset'=>'utf-8',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	//'defaultController'=>'site/login',
	//'defaultController'=>'proveedores/admin',

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('*'),
            'generatorPaths'=>array(
                'bootstrap.gii',
            ),
		),
    //	'admin',
	),

	// application components
	'components'=>array(

		'bootstrap'=>array(
			'class'=>'bootstrap.components.Bootstrap',
    ),

		'user'=>array(
						//'class' => 'WebUser',
						// enable cookie-based authentication
						'allowAutoLogin' => true,
						'authTimeout' => $sessionTimeout,//60 * 30 = 1800 : 30min  se agrego nuevo
		),

		//se agrego nuevo
		'session' => array(
						//'class' => 'CDbHttpSession',
						'class' => 'CHttpSession',
						'timeout' => $sessionTimeout,
						'autoStart' => true,
		),


		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		/*
		'mysql'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=diamond',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/

		'db'=>array(
			'class'=>'CDbConnection',
			'emulatePrepare' => true,
			'charset' => 'utf8',

			//en el local host se quito el phone number para poder generar el modelo
			//para generar modelo direcciones ya que tiene un campo con espacio en blanco


/*
			'connectionString' => 'pgsql:host=10.10.1.20;port=5432;dbname=bk_master-aimar',
			'username' => 'dbmaster',
			'password' => 'aimargt',
*/

			'connectionString' => 'pgsql:host=' . ($local ? 'localhost' : '10.10.1.20') . ';port=5432;dbname=master-aimar',
			//'username' => 'postgres',
			//'password' => 'adminpass',
			'username' => 'dbmaster',
			'password' => 'aimargt',

		),

		'baw'=>array(
			'class'=>'CDbConnection',
			'emulatePrepare' => true,
			'charset' => 'utf8',
			'connectionString' => 'pgsql:host=' . ($local ? '10.10.1.18' : '10.10.1.18') . ';port=5432;dbname=aimar_baw',
			//'connectionString' => 'pgsql:host=10.10.1.18;port=5432;dbname=aimar_baw',
			//'connectionString' => 'pgsql:host=localhost;port=5432;dbname=aimar_baw',
			'username' => 'user_consultas',
			'password' => 'C0nsult@S',
		),


		'wms'=>array(
			'class'=>'CDbConnection',
			'emulatePrepare' => true,
			'charset' => 'utf8',
			'connectionString' => 'mysql:host=' . ($local ? 'localhost' : '10.10.1.18') . ';dbname=WMS_AIMAR',
			//'connectionString' => 'mysql:host=10.10.1.18;dbname=WMS_AIMAR',
			'username' => 'user_WMS',
			'password' => 'us3r_WM5',
		),

		'aereo'=>array(
			'class'=>'CDbConnection',			
			'emulatePrepare' => true,
			'charset' => 'utf8',
			'connectionString' => 'mysql:host=' . ($local ? 'localhost' : '10.10.1.18'), 			
			'username' => ($local ? 'root' : 'DbAereo'),
			'password' => ($local ? 'adminpass' : 'aereoaimar'),
/*
			'connectionString' => 'mysql:host=10.10.1.18;dbname=db_aereo',
			'username' => 'DbAereo',
			'password' => 'aereoaimar',*/
		),

		'terrestre'=>array(
			'class'=>'CDbConnection',			
			'emulatePrepare' => true,
			'charset' => 'utf8',
			'connectionString' => 'mysql:host=10.10.1.18;dbname=db_terrestre',
			'username' => 'DbTerrestre',
			'password' => 'terrestreaimar',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		/*'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),

			),
		),*/
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'logPath' => '../yiilog/',
					'logFile'=>'Yii'.date('Ym').'core.log',
					'levels'=>'error',
					//'categories'=>'application',
					//'categories'=>'system.*',
				),
		        array(
		            'class'=>'CFileLogRoute',
		            'logPath' => '../yiilog/',
		            'logFile'=>'Yii'.date('Ym').'user.log',
		            'levels'=>'info, warning',
		            'categories'=>'hoy',
		        ),

				// uncomment the following to show log messages on web pages

/*
				array(
					'class'=> in_array($_SERVER['SERVER_ADDR'], array('127.0.0.1','::1','localhost')) ? 'CWebLogRoute' : '',
				),
*/
			),
		),



// enables theme based JQueryUI's

        'widgetFactory' => array(
            'widgets' => array(

            	//'class'=>'CWidgetFactory',

	            'CGridView'=>array(
	                'cssFile' => 'css/gridview/styles.css', //Yii::app()->request->baseUrl.
	            ),

                'CJuiDialog' => array(
                    'themeUrl' => 'css/jqueryui',
                    'theme' => 'redmond',
                ),

                'CJuiTabs' => array(
                    'themeUrl' => 'css/jqueryui',
                    'theme' => 'redmond',
                ),
                'CJuiDatePicker' => array(
                    'themeUrl' => 'css/jqueryui',
                    'theme' => 'redmond',
                ),
                'CJuiAccordion' => array(
                    'themeUrl' => 'css/jqueryui',
                    'theme' => 'redmond',
                ),
                'CJuiButton' => array(
                    'themeUrl' => 'css/jqueryui',
                    'theme' => 'redmond',
                ),
            ),
        ),


	    'ePdf' => array(
	        'class'         => 'ext.yii-pdf.EYiiPdf',
	        'params'        => array(
	            'HTML2PDF' => array(
	                'librarySourcePath' => 'application.vendor.html2pdf.*',
	                'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
	                'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
	                    'orientation' => 'P', // landscape or portrait orientation
	                    'format'      => 'A4', // format A4, A5, ...
	                    'language'    => 'en', // language: fr, en, it ...
	                    'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
	                    'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
	                    'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
	                )
	            )
	        ),
	    ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'session_timeout'=> $sessionTimeout,
		// this is used in contact page
		'adminEmail'=>'soporte7@aimargroup.com',
//		'version'=>'2017.8.0',
//-se cambio en clientes el campo de fecha_modificacion a fecha_modificado
//-crear consignatario y es pais fuera de la region no es obligatorio codigo tributario
//-en consulta de clientes se agrego datos de unificacion de clientes
//en general a todos los inputs se quitaron espacion al inicio y final
			//'version'=>'2017.12.0',
//se agrego log en base de datos
//se update ajax
//validaciones en todos los inputs
//mejora en cambio de pais
//se puede modificar datos de cliente solo no pueda cambiar de pais
//		'version'=>'2017.14.0',
/*se realizaron las mejoras
consignee modifica pais local
shipper crea pais local del area
validacion nit solo para regionales
tipo id tributario no obligatorio
clientes inactivos en gris
usuario del mismo pais del cliente pude modificar libremente
*/
			'version'=>'2.1.0',
/*se agrego Alert Message Before Session Ends
themes/bootstrap/views/layouts/main.php
config.php
	session_timeout
	$sessionTimeout
SiteController.php
	actionRenewSession
*/


	),
);
