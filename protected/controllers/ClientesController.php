<?php

class ClientesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	public $asDialog=false;


	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{



		return ContactosUsersMenu::ControllerActionsSet2( 6, array(), array('coincidencias','auth','edit') );




		/*return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','coincidencias', 'auth', 'edit'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','GeneratePdf','GenerateExcel'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);*/
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
	    if (Yii::app()->request->isAjaxRequest || $this->asDialog) {
	        $this->renderPartial('view',array(
	            'model'=>$model,
	        ), false, true);
	    } else {
	        $this->render('view',array(
	            'model'=>$model,
	        ));
	    }
	}


	public function actionEdit($id_cliente)
	{
		$model=new Clientes;

		$model->setScenario('ScenarioEdit');

		$this->performAjaxValidation($model);

		if(isset($_POST['Clientes']))
		{
			$model->attributes=$_POST['Clientes'];

			//echo "<script>alert('".$model->dato."-".$_GET['dato']."');</script>";

			//echo "(".$model->dato.")(".$model->dato_anterior.")";

			//if ($model->dato <> isset($_GET['dato']) ? $_GET['dato'] : "") {
			if ($model->dato <> $_GET['dato']) {

				if (!empty($model->dato) && strlen($model->dato) > 4) {

					//$this->redirect(array('coincidencias','nombre_nuevo'=>$model->dato, 'field'=>$model->field));
					//position: { my: 'center', at: 'center', of: window },

          echo CHtml::script("
          window.parent.$('#cru_dialog').dialog('close');
          window.parent.$('#cru_frame').attr('src','');
					var opt = {modal: true, width: '90%', height: 600, title: 'COINCIDENCIAS [".$model->field."] : ".$model->dato."', };
					window.parent.crud_frame_adjust('".Yii::app()->controller->createUrl('coincidencias',array('nombre_nuevo'=>trim($model->dato), 'field'=>$model->field,'id_cliente'=>$_POST['Clientes']['id_cliente']))."', '', 0, opt); 
          ");
          Yii::app()->end();
				}

			} else {

				//echo CHtml::script("window.parent.$('#Clientes_dato_em_').html('No se modifico el dato');window.parent.$('#Clientes_dato_em_').slideUp( 10 ).delay( 800 ).fadeIn( 10 );");
				//Yii::app()->end();

			}
		}

		$this->layout = '//layouts/iframe';


		//echo "(".$_GET['dato'].")";

		if (isset($_GET['field'])) $model->field = $_GET['field'];
		if (isset($_GET['dato'])) $model->dato = str_replace("!!!","&",$_GET['dato']); //solo para & desde _form clientes


		$this->render('_edit',array(
			'model'=>$model,
			'id_cliente'=>$id_cliente,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{

		$model=new Clientes;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Clientes']))
		{

			/*echo "<pre>";
			print_r($_POST['Clientes']);
			echo "</pre>";*/


			//if (empty($_POST['Clientes']['id_vendedor']))
				//$_POST['Clientes']['id_vendedor'] = 1;

			//if (empty($_POST['Clientes']['fecha_uvisita']))
				//$_POST['Clientes']['fecha_uvisita'] = date("Y-m-d");
//

			/*if (isset($_POST['Clientes']['es_shipper']))
				$model->es_shipper = $_POST['Clientes']['es_shipper'];

			if (isset($_POST['Clientes']['es_consigneer']))
				$model->es_consigneer = $_POST['Clientes']['es_consigneer'];			*/



			$model->attributes=$_POST['Clientes'];

			if ($model->es_shipper == 1)
				$model->setScenario('ScenarioShipper');
			else
				$model->setScenario('ScenarioConsigneer');


			if (isset($_POST['Clientes']['nombre_cliente'])) { //si aun no se ingreso nombre solo selecciono tipo

				//Ticket#2016102604000021 — CREAR CLIENTES Y MODIFICAR CATALOGO DE CLIENTES no se autorizo
				//Ticket#2016111104000529 — FAVOR DE CREAE SHIPPER. AUTORIZZADO POR ROXANA si se autorizo
				//segun llamada telefonica Roxana no autoriza crear clientes en otros paises 2016-11-15
				//if (Yii::app()->session['p']['auth'] == 0) {

				//echo "<br><br><br>(".$model->id_pais.")(".Yii::app()->session['pais'].")<br>";

				$Empresas=Empresas::model()->find("activo = 't' AND pais_iso = '".trim($_POST['Clientes']['id_pais'])."'");
				/*2017-03-30
				$seguir = true;
				if (isset($_POST['Clientes']['id_pais']))
					if (trim($_POST['Clientes']['id_pais']) != substr(Yii::app()->session['pais'],0,2)) {
						if ($Empresas) {
							$seguir = false;
							Yii::app()->user->setFlash('error','Solo puede crear clientes '.Yii::app()->session['pais'].', solicite a '.$_POST['Clientes']['id_pais'].' crear cliente.');
						}
					}

				if ($seguir) {
				*/

					if (!isset($model->id_tipo_identificacion_tributaria))
						$model->id_tipo_identificacion_tributaria = 0;

					if (!isset($model->direccion_completa))
						$model->direccion_completa = "1";

					$model->id_usuario_creacion = Yii::app()->user->id;
					$model->fecha_creacion = date("Y-m-d");
					$model->hora_creacion = date("his");

					$model->nombre_cliente = trim($model->nombre_cliente);
					$model->nombre_facturar = trim($model->nombre_facturar);
					$model->codigo_tributario = trim($model->codigo_tributario);

					if (!$Empresas && empty($model->codigo_tributario))
						$model->codigo_tributario = "c.f.";

					//$model->id_estatus = 1;
					if($model->save()) {

							ContactosUsersMenu::YiiLog(Yii::app()->controller->id,Yii::app()->controller->action->id,$_POST,$_GET,$model->tableSchema->primaryKey,$model->getPrimaryKey());

							if ($model->direccion_completa != "1") {
									//$id_nivel = Yii::app()->db->createCommand("SELECT id_nivel FROM niveles_geograficos WHERE id_pais = '".substr(Yii::app()->session['pais'],0,2)."'")->queryScalar();

									$id_nivel = Yii::app()->db->createCommand("SELECT id_nivel FROM niveles_geograficos WHERE id_pais = '".trim($model->id_pais)."'")->queryScalar();
									$dir=new Direcciones;
									$dir->id_nivel_geografico = $id_nivel;
									$dir->id_cliente = $model->id_cliente;
									$dir->direccion_completa = $model->direccion_completa;
									//echo "<br><br><br>(".$model->id_cliente.")(".$model->direccion_completa.")";
									$dir->activo = true;
									if (!$dir->save())
										print_r($dir->getErrors());
							}


	            if ($this->asDialog) {
	                //Close the dialog, reset the iframe and update the grid
	                echo CHtml::script("window.parent.$.fn.yiiGridView.update('clientes-grid');");
	                //Yii::app()->end();
	            }

							$this->redirect(array(Yii::app()->session['p']['update'] == 1 ? 'update' : 'modify','id'=>$model->id_cliente));

					} else {
						$model->direccion_completa = "";
					}
				/*} else { 2017-03-30
					$model->id_pais = "";
				}*/
			}
		}

	    if (Yii::app()->request->isAjaxRequest || $this->asDialog) {
	        $this->renderPartial('create',array(
	            'model'=>$model,
	            //'direcciones'=>true,
	        ), false, true);
	    } else {
	        $this->render('create',array(
	            'model'=>$model,
	            //'direcciones'=>true,
	        ));
	    }
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);


		if ($model->id_estatus == 3)

			$this->redirect(array('view','id'=>$id));


			//echo "(paso)";

			/*if ($model->es_shipper == 1) { //$model->es_consigneer == 0 && 2016-11-03 debe entrar a modo shipper si es shipper


					$model->setScenario('ScenarioShipperUpdateUser');

			} else {


					$model->setScenario('ScenarioConsigneerUpdateUser');
			}*/




			//echo "(".$model->es_shipper.")(".Yii::app()->session['p']['admin'].")";


		//Ticket#2016102504000461 — Accesso a Catalogo de cliente no funciona
		//$model->es_shipper == 1 &&  $model->es_consigneer == 0 && 2016-11-03 debe entrar a modo shipper si es shipper

		if ($model->es_shipper==0 || ($model->es_consigneer==1 && $model->es_shipper==1) || $model->es_coloader==1){
			if (Yii::app()->user->name == "admin" || Yii::app()->session['p']['admin'] == 1)
				$model->setScenario('ScenarioConsigneerUpdateAdmin');
			else
				$model->setScenario('ScenarioConsigneerUpdateUser');

		} else {

			if (Yii::app()->user->name == "admin" || Yii::app()->session['p']['admin'] == 1)
				$model->setScenario('ScenarioShipperUpdateAdmin');
			else
				$model->setScenario('ScenarioShipperUpdateUser');
		}


		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		$input = true;
		$direcciones = true;
		if(isset($_POST['Clientes']))
		{

			$input = false;

			/*if ($_POST['Clientes']['es_consigneer'] == 0 && $_POST['Clientes']['es_shipper'] == 0 && $_POST['Clientes']['es_coloader'] == 0 && $_POST['Clientes']['id_estatus'] == '') {
				unset($_POST['Clientes']['es_consigneer']);
				unset($_POST['Clientes']['es_shipper']);
				unset($_POST['Clientes']['es_coloader']);
				unset($_POST['Clientes']['id_estatus']);
			}*/




			$pais_anterior = $model->id_pais;

			$model->attributes=$_POST['Clientes'];

			//vuelve a evaluar el escenario
			if ($model->es_shipper==0 || ($model->es_consigneer==1 && $model->es_shipper==1) || $model->es_coloader==1){
				if (Yii::app()->user->name == "admin" || Yii::app()->session['p']['admin'] == 1)
					$model->setScenario('ScenarioConsigneerUpdateAdmin');
				else
					$model->setScenario('ScenarioConsigneerUpdateUser');

			} else {

				if (Yii::app()->user->name == "admin" || Yii::app()->session['p']['admin'] == 1)
					$model->setScenario('ScenarioShipperUpdateAdmin');
				else
					$model->setScenario('ScenarioShipperUpdateUser');
			}

			if (isset($_POST['Clientes']['nombre_cliente'])) { //si aun no se ingreso facturar solo selecciono tipo

				$seguir = true;

				$Empresas=Empresas::model()->find("activo = 't' AND pais_iso = '".trim($_POST['Clientes']['id_pais'])."'");

				/* esto es permitido desde ajax en ClientesTITController actionLoadtit autorizado por Cesar segun pruebas del 04/04/2017
				if (trim($_POST['Clientes']['id_pais']) != $pais_anterior) { //si cambio de pais
					if ($Empresas) {
						if (trim($_POST['Clientes']['id_pais']) != substr(Yii::app()->session['pais'],0,2)) {
							$seguir = false;
							Yii::app()->user->setFlash('error','No puede cambiar a otro pais ('.$_POST['Clientes']['id_pais'].') de la region.');
							$model->id_pais = $pais_anterior;
						}
					}
				}
				*/




				if (isset($_FILES['Clientes']['size']['logo']) && $_FILES['Clientes']['size']['logo'] > 0) // && $_FILES['Clientes']['type']['logo'] == 'image/jpeg')
				{								
/*
					echo "<pre>";
					print_r($_FILES['Clientes']);
					echo "</pre>";
*/
					
					//echo $_FILES['Clientes']['type']['logo'];

					function clean($string) {
						$string = str_replace(' ', '_', $string); // Replaces all spaces with hyphens.
						$string = preg_replace('/[^A-Za-z0-9\-\.\_]/', '', $string); // Removes special chars.
					 
						return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
					 }


					$filename = clean($_FILES['Clientes']['name']['logo']);
					$tmp_name = $_FILES['Clientes']['tmp_name']['logo'];
					$imagedata = file_get_contents($tmp_name);
					$_POST['Clientes']['logo'] = base64_encode($imagedata);

					$PathLogo = "http://www.aimargroup.com/logos/" . $filename;
					//$PathLogo = "http://10.10.1.32:8585/logos/" . $filename;


					//este segmento se agrego el 27/07/2020 
					//en el form se agrego la funcionalidad de subir logos para los clientes con atributos de coloader y esto significa que se actualiza la table en el terrestre
					$sql = "SELECT PathLogo FROM LogosColoader WHERE ColoaderID = ".$model->id_cliente;
					$PathLogo_ant = Yii::app()->terrestre->createCommand($sql)->queryScalar();

					if ($PathLogo_ant) {
					
					$sql = "UPDATE LogosColoader SET PathLogo = '$PathLogo', CreatedDateTime = NOW(), UserID = ".Yii::app()->user->id.", Expired = 0 WHERE ColoaderID = ".$model->id_cliente;
										
					} else {
								
					$sql = "INSERT INTO LogosColoader (ColoaderID, PathLogo, CreatedDateTime, UserID, Expired) VALUES (".$model->id_cliente.",'$PathLogo', NOW(), ".Yii::app()->user->id.", 0)";
						
					}			
					
					//echo $sql;

					Yii::app()->terrestre->createCommand($sql)->execute();	



					// el logo lo transfiere por web service 
					
					$url = "http://10.10.1.21:9092/SendParametros.asmx?wsdl";
					//$url = "http://10.10.1.32:60982/SendParametros.asmx?wsdl";	

					
					$client = new SoapClient($url);

					$xml = "<?xml version = \"1.0\"?>
				<root>
				<row NUM = \"4\"><name>$filename</name><file><![CDATA[".base64_encode(file_get_contents($tmp_name))."]]></file></row>
				</root>";
			
					$load = $client->Upload_Files(	
						array(
							'ruta'=>'C://inetpub//wwwroot//site//logos//',
							'filename_old'=>$PathLogo_ant,
							'user'=>'hhmm', 
							'ip'=>'::1', 
							'attachments'=>$xml,
							'erase'=>true,
						)
					);
					
					$result = $load->Upload_FilesResult;		

/*
					echo "<pre>";
					print_r($result);
					echo "<pre>";
*/

				} else {

					if (isset($_POST['Clientes']['logoupdate']))
						$_POST['Clientes']['logo'] = $_POST['Clientes']['logoupdate'];

				}
				




				if ($seguir) {

					if (!isset($model->id_tipo_identificacion_tributaria))
						$model->id_tipo_identificacion_tributaria = 0;

					if (!isset($model->direccion_completa))
						$model->direccion_completa = "1";

					if (isset($_POST['btnAuth'])) { //2018-01-12
						$model->id_estatus = 1;
					}
					$model->id_usuario_modificacion = Yii::app()->user->id;
					$model->fecha_modificado = date("Y-m-d H:i:s");

					$model->nombre_cliente = trim($model->nombre_cliente);
					$model->nombre_facturar = trim($model->nombre_facturar);
					$model->codigo_tributario = trim($model->codigo_tributario);

					if (!$Empresas && empty($model->codigo_tributario))
						$model->codigo_tributario = "c.f.";

					if ($Empresas && $model->codigo_tributario == "c.f.")
						$model->codigo_tributario = "";


					if($model->save()) {
							ContactosUsersMenu::YiiLog(Yii::app()->controller->id,Yii::app()->controller->action->id,$_POST,$_GET,$model->tableSchema->primaryKey,$model->getPrimaryKey());
							$input = true;

							if ($model->direccion_completa != "1") {
								//$id_nivel = Yii::app()->db->createCommand("SELECT id_nivel FROM niveles_geograficos WHERE id_pais = '".substr(Yii::app()->session['pais'],0,2)."'")->queryScalar();

								$id_nivel = Yii::app()->db->createCommand("SELECT id_nivel FROM niveles_geograficos WHERE id_pais = '".trim($model->id_pais)."'")->queryScalar();

								$dir=new Direcciones;
								$dir->id_nivel_geografico = $id_nivel;
								$dir->id_cliente = $model->id_cliente;
								$dir->direccion_completa = $model->direccion_completa;
							//echo "<br><br><br>(".$model->id_cliente.")(".$model->direccion_completa.")";
								$dir->activo = true;
								if (!$dir->save())
									print_r($dir->getErrors());
							}


							if ($this->asDialog) {
								//Close the dialog, reset the iframe and update the grid
								echo CHtml::script("window.parent.$.fn.yiiGridView.update('clientes-grid');");
								//Yii::app()->end();
							}

							//$this->redirect(array( Yii::app()->session['p']['update'] == 1 ? 'update' : 'modify','id'=>$model->id_cliente));

					} else {
						$model->direccion_completa = "";
					}
				}
			}

		}
		//else {

			$direcciones=Direcciones::model()->findAll("id_cliente = $id");

			if (!$direcciones) {
				$direcciones = false;

				if ($input == true)
					Yii::app()->user->setFlash('error','Aun no se ha ingresado direccion.');
			}


		//}


		$_POST['Clientes']=$model->attributes;

	    if (Yii::app()->request->isAjaxRequest || $this->asDialog) {
	        $this->renderPartial('update',array(
	            'model'=>$model,
	            'direcciones'=>$direcciones,
	        ), false, true);
	    } else {
	        $this->render('update',array(
	            'model'=>$model,
	            'direcciones'=>$direcciones,
	        ));
	    }
	}



	public function actionModify($id)
	{

		if (Yii::app()->session['p']['update'] == 1)

			$this->redirect(array('update','id'=>$id));

		else {

			$model=$this->loadModel($id);

			if ($model->es_shipper == 1) {		//$model->es_consigneer == 0 &&
					$model->setScenario('ScenarioShipperUpdateUser');

			} else {
					$model->setScenario('ScenarioConsigneerUpdateUser');
			}

			// Uncomment the following line if AJAX validation is needed
			$this->performAjaxValidation($model);

			//$_POST['Clientes']=$model->attributes;

		    if (Yii::app()->request->isAjaxRequest || $this->asDialog) {
		        $this->renderPartial('modify',array(
		            'model'=>$model,
		        ), false, true);
		    } else {
		        $this->render('modify',array(
		            'model'=>$model,
		        ));
		    }

	    }
	}


	public function actionCoincidencias()
	{

		$titulo = 'AUTORIZAR CREACION CLIENTE';
		if (isset($_GET['id_cliente']))
			if (!empty($_GET['id_cliente']))
				$titulo = 'AUTORIZAR MODIFICAR CLIENTE';

		if (isset($_POST['yt0'])) {

	        echo CHtml::script("
            window.parent.$('#cru_dialog').dialog('close');
            window.parent.$('#cru_frame').attr('src','');
			var opt = {width: 350, height: 350,	title:'".$titulo."', };
			window.parent.crud_frame_adjust('".Yii::app()->controller->createUrl('auth',array('nombre_nuevo'=>$_GET['nombre_nuevo'], 'field'=>$_GET['field']))."', '', 0, opt);
            ");
            Yii::app()->end();
		}

		if (isset($_POST['id_cliente'])) {
	        echo CHtml::script("
            window.parent.window.location.href = '".Yii::app()->controller->createUrl('update',array('id'=>$_POST['id_cliente']))."';
            window.parent.$('#cru_dialog').dialog('close');
            window.parent.$('#cru_frame').attr('src','');
            ");
            Yii::app()->end();
		}



		$arr_wds = array();
		/*$arr_wds[] = "GUATEMALA";
		$arr_wds[] = "EL SALVADOR";
		$arr_wds[] = "HONDURAS";
		$arr_wds[] = "NICARAGUA";
		$arr_wds[] = "COSTA RICA";
		$arr_wds[] = "PANAMA";
		$arr_wds[] = "BRASIL";
		$arr_wds[] = "MEXICO";
		$arr_wds[] = "BELICE";
		$arr_wds[] = "CO";
		$arr_wds[] = "SA";
		$arr_wds[] = "S";
		$arr_wds[] = "A";
		$arr_wds[] = "CA";
		$arr_wds[] = "Y";
		$arr_wds[] = "&";
		$arr_wds[] = "/";
		$arr_wds[] = "LA";
		$arr_wds[] = "S.";
		$arr_wds[] = "A.";
		$arr_wds[] = ".";
		$arr_wds[] = ",";
		$arr_wds[] = "EL";
		$arr_wds[] = "DE";
		$arr_wds[] = "E";
		$arr_wds[] = "DO";
		$arr_wds[] = ", S.A.";
	    $arr_wds[] = ",S.A.";
	    $arr_wds[] = "S.A.";
	    $arr_wds[] = ",SA";
	    $arr_wds[] = ",S A";
	    $arr_wds[] = ", S A";
		$arr_wds[] = "SV";
		$arr_wds[] = "CV";
		$arr_wds[] = "RL";
	    $arr_wds[] = "EN";
	    $arr_wds[] = "OF.";
	    */


		$arr_wds[] = "DEL";
		$arr_wds[] = "POR";
	    $arr_wds[] = "PARA";
		$arr_wds[] = "LOS";
		$arr_wds[] = "LAS";
		$arr_wds[] = "SAN";
		$arr_wds[] = "LTDA";
		$arr_wds[] = "LTD";
		$arr_wds[] = "LIMITADA";
		$arr_wds[] = "SOCIEDAD";
		$arr_wds[] = "ANONIMA";
		$arr_wds[] = "INC";
		$arr_wds[] = "AND";
		$arr_wds[] = "POR";
		$arr_wds[] = "THE";
		$arr_wds[] = "THIS";
		$arr_wds[] = "END";
		$arr_wds[] = "LLC";
		$arr_wds[] = "FOR";
		$arr_wds[] = "FROM";


		//$_GET['nombre_nuevo'] = str_replace(".","CAMPOUNO",strtoupper(trim($_GET['nombre_nuevo'])));
		//$_GET['nombre_nuevo'] = str_replace(",","CAMPODOS",strtoupper(trim($_GET['nombre_nuevo'])));

      

        $nombre_nuevo = strtoupper($_GET['nombre_nuevo']);


		if ($_GET['field'] == "codigo_tributario")
			$nombre_nuevo = str_replace("-","CAMPOTRES",$nombre_nuevo);

		$nombre_nuevo = preg_replace("/[^ \w]+/", " ", $nombre_nuevo);

		if ($_GET['field'] == "codigo_tributario")
			$nombre_nuevo = str_replace("CAMPOTRES","-",$nombre_nuevo);


		//realiza comparativo de datos en porcentajes y en contenido
		$words = explode(" ",$nombre_nuevo);


//print_r($words);


		//ini_set('memory_limit', '-1');
		//ini_set('max_execution_time', 300);



		$condition = "(";
		$words_new = array();
		for ($i=0;$i<count($words);$i++){
			if (strlen($words[$i]) > 2 && !in_array($words[$i],$arr_wds)) {
				if ($condition != "(")
					$condition .= " OR ";

				//2016-12-22 se quita para que encuentre mas coincidencias
				if (substr($words[$i],strlen($words[$i])-1,1) == "S" )
					if (strlen(substr($words[$i],0,-1)) > 2)
						$words[$i] = substr($words[$i],0,-1);

				$condition .= $_GET['field']." ILIKE '%".$words[$i]."%'";

				$words_new[] = $words[$i];
			}
		}

		if ($condition != "(")
			$condition .= ") AND ";
		else
			$condition .= ")";


			if ($condition == "()") $condition = $_GET['field']." ILIKE '%$nombre_nuevo%' AND ";

		$condition .= "(id_estatus IN (1,2)";

		$id_cliente = 0;
		if (isset($_GET['id_cliente']))
			if (!empty($_GET['id_cliente'])) {
				$id_cliente = intval($_GET['id_cliente']);
				$condition .= " AND id_cliente <> ".$_GET['id_cliente'];
			}

		$condition .= ")";

		// echo '<script>console.log("'.$condition.'")</script>';

		$model = Clientes::model()->findAll(array("condition"=>$condition,"order"=>$_GET['field']));


		// echo "<script>console.log('".json_encode($words_new)."')</script>";

		$found = false;
		$codigos = "";

		if ($model) {

			foreach ($model as $key=>$row){
				$nombre = strtoupper(trim($row[$_GET['field']]));

				similar_text($nombre_nuevo, $nombre, $porcent);

				$pos = strpos("*".$nombre,$nombre_nuevo);
				$c=0;
				for ($i=0;$i<count($words_new);$i++){
					if (strpos("*".$nombre,$words_new[$i]) > 0)
						$c++;
					//break; //solo el primer elemento se evalua para evitar demasiadas coincidencias
					//se desea saber cuantas coincidencias hay
				}



				$w = $c * 100 / count($words_new);

				$p = ($porcent + $w) / 2;



				if (($porcent > 80 || $w > 50)) { // && $id_cliente != $row['id_cliente']) {
					// echo "<script>console.log('[$nombre][%=$porcent][c=$c][count=".count($words_new)."][".$w."]')</script>";


				//if ($p > 70) {


					$row['ultimo_tipo_movimiento'] = intval($porcent);
					//$row['ultimo_tipo_movimiento'] = intval($p);
					$row['cto_id'] = intval($w);
					$found = true;
					if (!empty($codigos))
						$codigos .= ",";
					$codigos .= $row['id_cliente'];
				} else {
					unset($model[$key]); //elimino las no coincidencias
				}
			}
		}



		//echo '<script>console.log("'.$codigos.'")</script>';

		if ($found == true) {


	       	$dataProvider=new CArrayDataProvider($model, array(
	           	'id'=>'id',
	           	'sort'=>array(
	               'attributes'=>array(
	                   'id_cliente',
	                   'codigo_tributario',
	                   'nombre_cliente',
	                   'nombre_facturar',
	                   'id_pais',
	                   'id_tipo_cliente',
	                   'ultimo_tipo_movimiento',
	                   'cto_id',
	               ),

	               'defaultOrder'=>'ultimo_tipo_movimiento DESC, '.$_GET['field'],
	           	),
	           	'pagination'=>array(
	               'pageSize'=>10,
	           	),
	       	));


			/*$criteria=new CDbCriteria;
			$criteria->addCondition("id_cliente IN ($codigos)");
			$dataProvider = new CActiveDataProvider('Clientes', array(
				'criteria'=>$criteria,
				'sort'=>array(
				    'defaultOrder'=>$_GET['field'],
				),
			));*/

			$this->layout = '//layouts/iframe';

	        $this->render('coincidencias',array(
	            'dataProvider'=>$dataProvider,
	            'titulo'=>$titulo,
	        ));

		} else {

            echo CHtml::script("
			window.parent.$('#Clientes_".$_GET['field']."').val('".$_GET['nombre_nuevo']."');
        	if ('".$_GET['field']."' == 'nombre_cliente' && window.parent.$('#Clientes_nombre_facturar'))
	        	window.parent.$('#Clientes_nombre_facturar').val('".$_GET['nombre_nuevo']."');

            window.parent.$('#cru_dialog').dialog('close');
            window.parent.$('#cru_frame').attr('src','');
            if (window.parent.$.fn.yiiGridView)
            	window.parent.$.fn.yiiGridView.update('clientes-grid');
            ");
            Yii::app()->end();

		}






		//$_GET['nombre_nuevo'] = str_replace("CAMPOUNO",".",strtoupper(trim($_GET['nombre_nuevo'])));
		//$_GET['nombre_nuevo'] = str_replace("CAMPODOS",",",strtoupper(trim($_GET['nombre_nuevo'])));

		/*
		$c = 0;
		$words = explode(" ",$nombre_nuevo);
		$condition = " id_estatus IN (1,2) AND (".$_GET['field']." <> '' ";
		for ($i=0;$i<count($words);$i++){
			if (strlen($words[$i]) > 2 && !in_array($words[$i],$arr_wds)) {
				$c++;
				if (!empty($condition))
					$condition .= " AND ";
				$condition .= " ".$_GET['field']." ILIKE '%".$words[$i]."%'";
			}
		}

		$condition .= ") ";

		if ($c > 3) {
			$d = 0;
			$dato = "";
			for ($i=0;$i<count($words);$i++){
				if (strlen($words[$i]) > 2 && !in_array($words[$i],$arr_wds)) {
					if ($d < 3)
						$dato .= $words[$i]." ";
					$d++;
				}
			}

			//if ($dato != "")
				//$condition .= " OR ".$_GET['field']." ILIKE '%".trim($dato)."%'";
		}

		if (isset($_GET['id_cliente']))
			if (!empty($_GET['id_cliente']))
				$condition .= " AND id_cliente <> ".$_GET['id_cliente'];


		echo '<script>console.log("'.$condition.'")</script>';

		$dataProvider = new CActiveDataProvider('Clientes',array(
			'criteria'=>array(
				'condition'=>$condition,
			),
		    'sort'=>array(
		     	'defaultOrder'=>$_GET['field'],
		        //'multiSort'=>true,
		        //'attributes'=>array('id_sales_support_grh',),
		    ),
		    'pagination'=>array(
		        'pageSize'=>150,
		    ),
		));


		if ($dataProvider->getTotalItemCount() > 0) {

			$this->layout = '//layouts/iframe';

	        $this->render('coincidencias',array(
	            'dataProvider'=>$dataProvider,
	            'titulo'=>$titulo,
	        ));

		} else {

            echo CHtml::script("
			window.parent.$('#Clientes_".$_GET['field']."').val('".$_GET['nombre_nuevo']."');
        	if ('".$_GET['field']."' == 'nombre_cliente' && window.parent.$('#Clientes_nombre_facturar'))
	        	window.parent.$('#Clientes_nombre_facturar').val('".$_GET['nombre_nuevo']."');

            window.parent.$('#cru_dialog').dialog('close');
            window.parent.$('#cru_frame').attr('src','');
            if (window.parent.$.fn.yiiGridView)
            	window.parent.$.fn.yiiGridView.update('clientes-grid');
            ");
            Yii::app()->end();

		}
		*/




	}


/**
	 * Displays the auth page  (very similar to login)
	 */
	public function actionAuth()
	{
		$model=new LoginForm;

		if (isset($_POST['yt0'])) {
	            echo CHtml::script("
	            window.parent.$('#cru_dialog').dialog('close');
	            window.parent.$('#cru_frame').attr('src','');
				var opt = {width: 800, height: 550,	title:'COINCIDENCIAS', };
				window.parent.crud_frame_adjust('".Yii::app()->controller->createUrl('coincidencias',array('nombre_nuevo'=>$_GET['nombre_nuevo'], 'field'=>$_GET['field']))."', '', 0, opt);
	            ");
	            Yii::app()->end();
		}

		//print_r($_GET);

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid

			if($model->validate())
			{

							ContactosUsersMenu::YiiLog(Yii::app()->controller->id,Yii::app()->controller->action->id,$_POST,$_GET);

	            echo CHtml::script("
				window.parent.$('#Clientes_".$_GET['field']."').val('".$_GET['nombre_nuevo']."');
	        	if ('".$_GET['field']."' == 'nombre_cliente' && window.parent.$('#Clientes_nombre_facturar'))
		        	window.parent.$('#Clientes_nombre_facturar').val('".$_GET['nombre_nuevo']."');
	            window.parent.$('#cru_dialog').dialog('close');
	            window.parent.$('#cru_frame').attr('src','');
	            ");
	            Yii::app()->end();
			}
		}



		$this->layout = '//layouts/iframe';

        $this->render('auth',array(
            'model'=>$model,
        ));

	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Clientes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Clientes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Clientes']))
			$model->attributes=$_GET['Clientes'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}




	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Clientes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='clientes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionGenerateExcel()
	{



		ini_set('memory_limit', '-1');
		ini_set('max_execution_time', 300);

		$criteria = array();
		if(isset(Yii::app()->session['Clientes_records']))
			$criteria['criteria'] = Yii::app()->session['Clientes_records'];
		//$criteria['pagination'] = array('pageSize'=>Clientes::model()->count());
		$criteria['pagination'] = false;
		$model = new CActiveDataProvider('Clientes',$criteria);

		Yii::app()->request->sendFile('Clientes_'.date('YmdHis').'.xls',
			$this->renderPartial('reportExcel', array(
				'model'=>$model
			), true)
		);
	}


    public function actionGeneratePdf()
	{



		ini_set('memory_limit', '-1');
		ini_set('max_execution_time', 300);

		$criteria = array();
		if(isset(Yii::app()->session['Clientes_records']))
			$criteria['criteria'] = Yii::app()->session['Clientes_records'];
		$criteria['pagination'] = array('pageSize'=>Clientes::model()->count());
		$model = new CActiveDataProvider('Clientes',$criteria);

								//$orientation,$format,$langue,$unicode,$encoding,$marges
		$html2pdf = Yii::app()->ePdf->HTML2PDF('P','A4','en',true,'UTF-8',array(5,5,5,5));
       	$html2pdf->pdf->SetTitle('PDF_Clientes');
       	$html2pdf->pdf->SetDisplayMode('fullpage');
        $html = $this->renderPartial('reportPdf', array('model'=>$model,'title'=>'Clientes'), true);
        $html2pdf->WriteHTML($html);
        $html2pdf->Output('Clientes_'.date('YmdHis').'.pdf');
	}

}
