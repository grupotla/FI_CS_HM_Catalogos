<?php

class ContactosDivisionesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';
	public $asDialog=true;



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
		return ContactosUsersMenu::ControllerActionsSet2( 19 );
		/*return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ContactosDivisiones;

		$model->setScenario('ScenarioEdit');

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['ContactosDivisiones']))
		{
			$model->attributes=$_POST['ContactosDivisiones'];

			//$usuarios_paises = CHtml::listData(UsuariosPaises::model()->findAll(array("condition"=>"activo = 't'","order"=>"nombre")), 'pais', 'nombre');
			$usuarios_paises = CHtml::listData(Empresas::model()->findAll(array("condition"=>"activo = 't'","order"=>"pais_iso")), 'pais_iso', 'nombre_empresa');
			$contactoxpais = array();
			foreach ($usuarios_paises as $key => $value) {
				$key = trim($key);
				if (!empty($_POST['ContactosDivisiones'][$key]['contactoxpais']))
					$contactoxpais[$key] = $_POST['ContactosDivisiones'][$key]['contactoxpais'];
			}

			$model->email = trim($_POST['ContactosDivisiones']['email']);

			if (count($contactoxpais) > 0)
				$model->contactoxpais = json_encode($contactoxpais);
			else
				$model->contactoxpais = "0";

			if (!empty($model->pais))
				$model->pais = json_encode($model->pais);

			if (!empty($_POST['ContactosDivisiones']['area_enum'])) {
				$model->area = json_encode($_POST['ContactosDivisiones']['area_enum']);
				$model->area_enum = "0";
			}

			if (!empty($_POST['ContactosDivisiones']['impexp_enum'])) {
				$model->impexp = json_encode($_POST['ContactosDivisiones']['impexp_enum']);
				$model->impexp_enum = "0";
			}

			if (!empty($_POST['ContactosDivisiones']['carga_enum'])) {
				$model->carga = json_encode($_POST['ContactosDivisiones']['carga_enum']);
			} else {
				$model->carga = 0;
			}
			$model->carga_enum = 0;

			if (!$model->tranship)
				$model->tranship = 0;

			if (!$model->rechazo)
				$model->rechazo = 'No';

			$model->fecha = date("Y-m-d H:i:s");


			if($model->save()) {
				ContactosUsersMenu::YiiLog(Yii::app()->controller->id,Yii::app()->controller->action->id,$_POST,$_GET,$model->tableSchema->primaryKey,$model->getPrimaryKey());
				if ($this->asDialog) {
	                echo CHtml::script("
	                window.parent.$('#cru_dialog').dialog('close');
	                window.parent.$('#cru_frame').attr('src','');
	                if (window.parent.$.fn.yiiGridView)
	                	window.parent.$.fn.yiiGridView.update('contactos-divisiones-grid');
	                ");
	                Yii::app()->end();
				} else {
					$array = array('update','id'=>$model->id);



					$this->redirect($array);
				}
			}
		}



		$model->catalogo = $_GET['CATALOGO'];

		if ($_GET['id_catalogo'] > 0) {

			$model->id_contacto = 0;
			$model->id_catalogo = $_GET['id_catalogo'];

			switch ($_GET['CATALOGO']) {
			case "AGENTE":
				//$contactos=AgentesContactos::model()->findByPk($_GET['id_catalogo']);
				$contactos=AgentesContactos::model()->find("agente_id=".$_GET['id_catalogo']);
				if ($contactos) {
					$model->nombre = $contactos->nombres;
					$model->email = $contactos->email;
					$model->telefono = $contactos->telefono;
					$model->id_catalogo = $contactos->agente_id;
				}
				break;
			case "CLIENTE":
				//$contactos=ClientesContactos::model()->findByPk($_GET['id_catalogo']);
				$contactos=ClientesContactos::model()->find("id_cliente=".$_GET['id_catalogo']);
				if ($contactos) {
					$model->nombre = $contactos->nombres;
					$model->email = $contactos->email;
					$model->telefono = $contactos->telefono;
					$model->id_catalogo = $contactos->id_cliente;
				}
				break;
			case "USUARIO":
				$contactos=UsuariosEmpresas::model()->findByPk($_GET['id_catalogo']);
				if ($contactos) {
					$model->nombre = $contactos->pw_gecos;
					$model->email = $contactos->pw_name."@".$contactos->dominio;
					//$model->telefono = $contactos->telefono;
					$model->id_catalogo = $contactos->id_usuario;
				}
				break;
			}
		}

		$model->status = 'Activo';
		$model->copia = 'Si';
		$model->rechazo = 'No';

		if (Yii::app()->request->isAjaxRequest) {
	        $this->renderPartial('create',array(
	            'model'=>$model,
	        ), false, true);
		} else {
		    if ($this->asDialog)
		    	$this->layout = '//layouts/iframe';
	        $this->render('create',array(
	            'model'=>$model,
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

		$model->setScenario('ScenarioEdit');

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['ContactosDivisiones']))
		{
			$model->attributes=$_POST['ContactosDivisiones'];

			//$usuarios_paises = CHtml::listData(UsuariosPaises::model()->findAll(array("condition"=>"activo = 't'","order"=>"nombre")), 'pais', 'nombre');
			$usuarios_paises = CHtml::listData(Empresas::model()->findAll(array("condition"=>"activo = 't'","order"=>"pais_iso")), 'pais_iso', 'nombre_empresa');
			$contactoxpais = array();
			foreach ($usuarios_paises as $key => $value) {
				$key = trim($key);
				if (!empty($_POST['ContactosDivisiones'][$key]['contactoxpais']))
					$contactoxpais[$key] = $_POST['ContactosDivisiones'][$key]['contactoxpais'];
			}

			$model->email  = trim($_POST['ContactosDivisiones']['email']);


			if (count($contactoxpais) > 0)
				$model->contactoxpais = json_encode($contactoxpais);
			else
				$model->contactoxpais = "0";

			if (!empty($model->pais))
				$model->pais = json_encode($model->pais);

			if (!empty($_POST['ContactosDivisiones']['area_enum'])) {
				$model->area = json_encode($_POST['ContactosDivisiones']['area_enum']);
				$model->area_enum = "0";
			}

			if (!empty($_POST['ContactosDivisiones']['impexp_enum'])) {
				$model->impexp = json_encode($_POST['ContactosDivisiones']['impexp_enum']);
				$model->impexp_enum = "0";
			}

			if (!empty($_POST['ContactosDivisiones']['carga_enum'])) {
				$model->carga = json_encode($_POST['ContactosDivisiones']['carga_enum']);
			} else {
				$model->carga = 0;
			}
			$model->carga_enum = 0;

			if (!$model->tranship)
				$model->tranship = 0;

			if (!$model->rechazo)
				$model->rechazo = 'No';

			$model->fecha = date("Y-m-d H:i:s");

			if($model->save()) {
				ContactosUsersMenu::YiiLog(Yii::app()->controller->id,Yii::app()->controller->action->id,$_POST,$_GET,$model->tableSchema->primaryKey,$model->getPrimaryKey());
				if ($this->asDialog) {
	                echo CHtml::script("
	                window.parent.$('#cru_dialog').dialog('close');
	                window.parent.$('#cru_frame').attr('src','');
	                if (window.parent.$.fn.yiiGridView)
	                	window.parent.$.fn.yiiGridView.update('contactos-divisiones-grid');
	                ");
	                Yii::app()->end();
				} else {
					$array = array('update','id'=>$model->id);



					$this->redirect($array);
				}

			}
		}

		$model->area_enum = json_decode($model->area,true);
		$model->impexp_enum = json_decode($model->impexp,true);
		$model->carga_enum = json_decode($model->carga,true);
		$model->pais = json_decode($model->pais,true);

		if (Yii::app()->request->isAjaxRequest) {
	        $this->renderPartial('update',array(
	            'model'=>$model,
	        ), false, true);
		} else {
		    if ($this->asDialog)
		    	$this->layout = '//layouts/iframe';
	        $this->render('update',array(
	            'model'=>$model,
	        ));
		}

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
			throw new CHttpException(400,'Solicitud invalida. Porfavor no intente de nuevo.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ContactosDivisiones');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ContactosDivisiones('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ContactosDivisiones']))
			$model->attributes=$_GET['ContactosDivisiones'];

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
		$model=ContactosDivisiones::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'La pagina solicitada no existe.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='contactos-divisiones-form')
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
		if(isset(Yii::app()->session['ContactosDivisiones_records']))
			$criteria['criteria'] = Yii::app()->session['ContactosDivisiones_records'];
		$criteria['pagination'] = array('pageSize'=>ContactosDivisiones::model()->count());
		$model = new CActiveDataProvider('ContactosDivisiones',$criteria);

		Yii::app()->request->sendFile('ContactosDivisiones_'.date('YmdHis').'.xls',
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
		if(isset(Yii::app()->session['ContactosDivisiones_records']))
			$criteria['criteria'] = Yii::app()->session['ContactosDivisiones_records'];
		$criteria['pagination'] = array('pageSize'=>ContactosDivisiones::model()->count());
		$model = new CActiveDataProvider('ContactosDivisiones',$criteria);

								//$orientation,$format,$langue,$unicode,$encoding,$marges
		$html2pdf = Yii::app()->ePdf->HTML2PDF('P','A4','en',true,'UTF-8',array(5,5,5,5));
       	$html2pdf->pdf->SetTitle('PDF_ContactosDivisiones');
       	$html2pdf->pdf->SetDisplayMode('fullpage');
        $html = $this->renderPartial('reportPdf', array('model'=>$model,'title'=>'ContactosDivisiones'), true);
        $html2pdf->WriteHTML($html);
        $html2pdf->Output('ContactosDivisiones_'.date('YmdHis').'.pdf');
	}

}
