<?php

class ContactosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	public $asDialog=true;

	public $banned = array('john-seckinger@aimargroup.com','aimarnic@aimargroup.com');


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

		return ContactosUsersMenu::ControllerActionsSet2( 26 );
		/*
		return array(
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
		$model=new Contactos;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Contactos']))
		{

			$seguir = true;
			$Clientes=Clientes::model()->findByPk($_POST['Contactos']['id_cliente']);
			if (trim($Clientes->id_pais) != substr(Yii::app()->session['pais'],0,2)) {
				$Empresas=Empresas::model()->find("activo = 't' AND pais_iso = '".$Clientes->id_pais."'");
				if ($Empresas) {
					$seguir = false;
				}
			}

			if ($seguir) {

				$_POST['Contactos']['activo'] = $_POST['Contactos']['activo'] == 1 ? 't' : '';

				if (!in_array($_POST['Contactos']['email'],$this->banned)) {


					if (empty($_POST['Contactos']['cargo']))
					$_POST['Contactos']['cargo'] = "CONTACTO";

					if (empty($_POST['Contactos']['tipo_persona']))
					$_POST['Contactos']['tipo_persona'] = "Secundario";

					


					$model->attributes=$_POST['Contactos'];

					$model->id_usuario_ingreso = intval(Yii::app()->user->id);
					$model->ingreso = date("Y-m-d H:i:s");
					$model->activo = true;
					$model->cargo = trim($_POST['Contactos']['cargo']);


					$model->email  = trim($_POST['Contactos']['email']);
					
					if (!empty($_POST['Contactos']['area_enum'])) {
						$model->area = json_encode($_POST['Contactos']['area_enum']);						
					} else {
						$model->area =  '["Aereo","Terrestre","Maritimo","Aduana","Preembarque"]';													
					}
					$model->area_enum = "0";
		
					if (!empty($_POST['Contactos']['impexp_enum'])) {
						$model->impexp = json_encode($_POST['Contactos']['impexp_enum']);						
					} else {
						$model->impexp = '["Import","Export"]';
					}
					$model->impexp_enum = "0";
		
					if (!empty($_POST['Contactos']['carga_enum'])) {
						$model->carga = json_encode($_POST['Contactos']['carga_enum']);
					} else {
						$model->carga = '["FCL","LCL","LTL","FTL"]';	
					}
					$model->carga_enum = "0";



					if($model->save()) {
						ContactosUsersMenu::YiiLog(Yii::app()->controller->id,Yii::app()->controller->action->id,$_POST,$_GET,$model->tableSchema->primaryKey,$model->getPrimaryKey());
						if ($this->asDialog) {
			                echo CHtml::script("
			                window.parent.$('#cru_dialog').dialog('close');
			                window.parent.$('#cru_frame').attr('src','');
			                if (window.parent.$.fn.yiiGridView)
			                	window.parent.$.fn.yiiGridView.update('contactos-grid');
			                ");
			                Yii::app()->end();
						} else {
							$array = array('update','id'=>$model->contacto_id);



							$this->redirect($array);
						}
					}


				} else {

					Yii::app()->user->setFlash('error','Esta cuenta de correo no puede se usada como un contacto de cliente.');
				}

			} else {

				Yii::app()->user->setFlash('error','No puede crear contactos desde '.Yii::app()->session['pais'].' para otro pais de la region. <br>Solicite a '.$Clientes->id_pais.' la creacion de contactos.');
			}

		}

		if (isset($_GET['id_cliente']))
			$model->id_cliente = $_GET['id_cliente'];

		$model->area_enum = json_decode($model->area,true);
		$model->impexp_enum = json_decode($model->impexp,true);
		$model->carga_enum = json_decode($model->carga,true);
			

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

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Contactos']))
		{


			$seguir = true;
			$Clientes=Clientes::model()->findByPk($_POST['Contactos']['id_cliente']);
			if (trim($Clientes->id_pais) != substr(Yii::app()->session['pais'],0,2)) {
				$Empresas=Empresas::model()->find("activo = 't' AND pais_iso = '".trim($Clientes->id_pais)."'");
				if ($Empresas) {
					$seguir = false;
				}
			}

			if ($seguir) {

				if (!in_array($_POST['Contactos']['email'],$this->banned)) {

					if ($_POST['Contactos']['activo'] != 1) {
						if (empty($_POST['Contactos']['nombres'])) $_POST['Contactos']['nombres'] = "N/A";
						if (empty($_POST['Contactos']['telefono'])) $_POST['Contactos']['telefono'] = "N/A";
						if (empty($_POST['Contactos']['email'])) $_POST['Contactos']['email'] = "N/A"; 
						if (empty($_POST['Contactos']['cargo'])) $_POST['Contactos']['cargo'] = "NINGUNO";
					}

					$_POST['Contactos']['activo'] = $_POST['Contactos']['activo'] == 1 ? 't' : '';

					$model->attributes=$_POST['Contactos'];
					$model->id_usuario_modifica = intval(Yii::app()->user->id);
					$model->modifica = date("Y-m-d H:i:s");

					$model->email  = trim($_POST['Contactos']['email']);
					
					if (!empty($_POST['Contactos']['area_enum'])) {
						$model->area = json_encode($_POST['Contactos']['area_enum']);						
					}
					$model->area_enum = "0";
		
					if (!empty($_POST['Contactos']['impexp_enum'])) {
						$model->impexp = json_encode($_POST['Contactos']['impexp_enum']);						
					}
					$model->impexp_enum = "0";
		
					if (!empty($_POST['Contactos']['carga_enum'])) {
						$model->carga = json_encode($_POST['Contactos']['carga_enum']);
					}
					$model->carga_enum = 0;



					if($model->save()) {
						
						ContactosUsersMenu::YiiLog(Yii::app()->controller->id,Yii::app()->controller->action->id,$_POST,$_GET,$model->tableSchema->primaryKey,$model->getPrimaryKey());
						if ($this->asDialog) {
			                echo CHtml::script("
			                window.parent.$('#cru_dialog').dialog('close');
			                window.parent.$('#cru_frame').attr('src','');
			                if (window.parent.$.fn.yiiGridView)
			                	window.parent.$.fn.yiiGridView.update('contactos-grid');
			                ");
			                Yii::app()->end();
						} else {
							$array = array('update','id'=>$model->contacto_id);



							$this->redirect($array);
						}
						
					}

				} else {

					Yii::app()->user->setFlash('error','Esta cuenta de correo no puede se usada como un contacto de cliente.');
				}

			} else {

				Yii::app()->user->setFlash('error','No puede modificar contactos desde '.Yii::app()->session['pais'].' para otro pais de la region. <br>Solicite a '.$Clientes->id_pais.' la modificar de contactos.');
			}

		}

$model->area_enum = json_decode($model->area,true);
$model->impexp_enum = json_decode($model->impexp,true);
$model->carga_enum = json_decode($model->carga,true);


/*
echo "<pre>";
print_r($model);
echo "</pre>";
*/

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
		$dataProvider=new CActiveDataProvider('Contactos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Contactos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Contactos']))
			$model->attributes=$_GET['Contactos'];

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
		$model=Contactos::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='contactos-form')
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
		if(isset(Yii::app()->session['Contactos_records']))
			$criteria['criteria'] = Yii::app()->session['Contactos_records'];
		$criteria['pagination'] = array('pageSize'=>Contactos::model()->count());
		$model = new CActiveDataProvider('Contactos',$criteria);

		Yii::app()->request->sendFile('Contactos_'.date('YmdHis').'.xls',
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
		if(isset(Yii::app()->session['Contactos_records']))
			$criteria['criteria'] = Yii::app()->session['Contactos_records'];
		$criteria['pagination'] = array('pageSize'=>Contactos::model()->count());
		$model = new CActiveDataProvider('Contactos',$criteria);

								//$orientation,$format,$langue,$unicode,$encoding,$marges
		$html2pdf = Yii::app()->ePdf->HTML2PDF('P','A4','en',true,'UTF-8',array(5,5,5,5));
       	$html2pdf->pdf->SetTitle('PDF_Contactos');
       	$html2pdf->pdf->SetDisplayMode('fullpage');
        $html = $this->renderPartial('reportPdf', array('model'=>$model,'title'=>'Contactos'), true);
        $html2pdf->WriteHTML($html);
        $html2pdf->Output('Contactos_'.date('YmdHis').'.pdf');
	}

}
