<?php

class ClientesAereoController extends Controller
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
			//'ajaxOnly + delete',
			'postOnly + delete', // we only allow deletion via POST request
		);

	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{

		return ContactosUsersMenu::ControllerActionsSet2( 25 );
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
		$model=ClientesAereo::model()->find("id_cliente = '".$_REQUEST['id']['id_cliente']."' AND no_cuenta = '".$_REQUEST['id']['no_cuenta']."'");
		//$model = $this->loadModel($id);
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
		$model=new ClientesAereo;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['ClientesAereo']))
		{

			$seguir = true;
			$Clientes=Clientes::model()->findByPk($_POST['ClientesAereo']['id_cliente']);
			if (trim($Clientes->id_pais) != substr(Yii::app()->session['pais'],0,2)) {
				$Empresas=Empresas::model()->find("activo = 't' AND pais_iso = '".trim($Clientes->id_pais)."'");
				if ($Empresas) {
					$seguir = false;

				}
			}


			if ($seguir) {

				$model->attributes=$_POST['ClientesAereo'];
				if($model->save()) {
					ContactosUsersMenu::YiiLog(Yii::app()->controller->id,Yii::app()->controller->action->id,$_POST,$_GET,$model->tableSchema->primaryKey,$model->getPrimaryKey());
					if ($this->asDialog) {
		                echo CHtml::script("
		                window.parent.$('#cru_dialog').dialog('close');
		                window.parent.$('#cru_frame').attr('src','');
		                if (window.parent.$.fn.yiiGridView)
		                	window.parent.$.fn.yiiGridView.update('clientes-aereo-grid');
		                ");
		                Yii::app()->end();
					} else {
						$array = array('update','id["id_cliente"]'=>$model->id_cliente,'id["no_cuenta"]'=>$model->no_cuenta);


						$this->redirect($array);
					}
				}

			} else {

				Yii::app()->user->setFlash('error','No puede crear datos aereo desde '.Yii::app()->session['pais'].' para otro pais de la region. <br>Solicite a '.$Clientes->id_pais.' la creacion de datos aereo.');
			}

		}

		if (isset($_GET['id_cliente']))
			$model->id_cliente = $_GET['id_cliente'];

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
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
		//$model=$this->loadModel($id);


		$model=ClientesAereo::model()->find("id_cliente = '".$_REQUEST['id']['id_cliente']."' AND no_cuenta = '".$_REQUEST['id']['no_cuenta']."'");

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['ClientesAereo']))
		{

			$seguir = true;
			$Clientes=Clientes::model()->findByPk($_POST['ClientesAereo']['id_cliente']);
			if (trim($Clientes->id_pais) != substr(Yii::app()->session['pais'],0,2)) {
				$Empresas=Empresas::model()->find("activo = 't' AND pais_iso = '".trim($Clientes->id_pais)."'");
				if ($Empresas) {
					$seguir = false;
				}
			}

			if ($seguir) {

				$model->attributes=$_POST['ClientesAereo'];
				if($model->save()) {
					ContactosUsersMenu::YiiLog(Yii::app()->controller->id,Yii::app()->controller->action->id,$_POST,$_GET,$model->tableSchema->primaryKey,$model->getPrimaryKey());
					if ($this->asDialog) {
		                echo CHtml::script("
		                window.parent.$('#cru_dialog').dialog('close');
		                window.parent.$('#cru_frame').attr('src','');
		                if (window.parent.$.fn.yiiGridView)
		                	window.parent.$.fn.yiiGridView.update('clientes-aereo-grid');
		                ");
		                Yii::app()->end();
					} else {

						$array = array('update','id["id_cliente"]'=>$model->id_cliente,'id["no_cuenta"]'=>$model->no_cuenta);



						$this->redirect($array);
					}
				}

			} else {

				Yii::app()->user->setFlash('error','No puede modificar datos aereo desde '.Yii::app()->session['pais'].' para otro pais de la region. <br>Solicite a '.$Clientes->id_pais.' la creacion de datos aereo.');
			}


		}

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
	public function actionDelete()
	{


		if(Yii::app()->request->isPostRequest)
		//if(Yii::app()->request->isAjaxRequest)
		{
			// we only allow deletion via POST request


			$model=ClientesAereo::model()->find("id_cliente = '".$_REQUEST['id']['id_cliente']."' AND no_cuenta = '".$_REQUEST['id']['no_cuenta']."'");

			$model->delete();

			die();

			//$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			//if(!isset($_GET['ajax']))
				//$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Solicitud invalida. Porfavor no intente de nuevo.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ClientesAereo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ClientesAereo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ClientesAereo']))
			$model->attributes=$_GET['ClientesAereo'];

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
		$model=ClientesAereo::model()->findByPk($id);

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
		if(isset($_POST['ajax']) && $_POST['ajax']==='clientes-aereo-form')
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
		if(isset(Yii::app()->session['ClientesAereo_records']))
			$criteria['criteria'] = Yii::app()->session['ClientesAereo_records'];
		$criteria['pagination'] = array('pageSize'=>ClientesAereo::model()->count());
		$model = new CActiveDataProvider('ClientesAereo',$criteria);

		Yii::app()->request->sendFile('ClientesAereo_'.date('YmdHis').'.xls',
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
		if(isset(Yii::app()->session['ClientesAereo_records']))
			$criteria['criteria'] = Yii::app()->session['ClientesAereo_records'];
		$criteria['pagination'] = array('pageSize'=>ClientesAereo::model()->count());
		$model = new CActiveDataProvider('ClientesAereo',$criteria);

								//$orientation,$format,$langue,$unicode,$encoding,$marges
		$html2pdf = Yii::app()->ePdf->HTML2PDF('P','A4','en',true,'UTF-8',array(5,5,5,5));
       	$html2pdf->pdf->SetTitle('PDF_ClientesAereo');
       	$html2pdf->pdf->SetDisplayMode('fullpage');
        $html = $this->renderPartial('reportPdf', array('model'=>$model,'title'=>'ClientesAereo'), true);
        $html2pdf->WriteHTML($html);
        $html2pdf->Output('ClientesAereo_'.date('YmdHis').'.pdf');
	}

}
