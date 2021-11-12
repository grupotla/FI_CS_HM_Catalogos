<?php

class EmpresasParametrosController extends Controller
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
		$res =  ContactosUsersMenu::ControllerActionsSet2( 48 ); //, array(), array('KRichTextEditor')  ); 		
		//print_r($res);
		return $res;
		/*return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','KRichTextEditor'),
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
		$model=new EmpresasParametros;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EmpresasParametros']))		
		{
			//print_r($_FILES);
			if (isset($_FILES['EmpresasParametros']['size']['logo']) && $_FILES['EmpresasParametros']['size']['logo'] > 0)
			{										
				$tmp_name = $_FILES['EmpresasParametros']['tmp_name']['logo'];													
				$imagedata = file_get_contents($tmp_name);
				$_POST['EmpresasParametros']['logo'] = base64_encode($imagedata);
			}
						
			$model->attributes=$_POST['EmpresasParametros'];		

			$model->creacion_user = Yii::app()->user->id;
			$model->creacion_date = date("Y-m-d H:i:s");
			$model->modifica_date = date("Y-m-d H:i:s");

			try {

				if($model->save()) {
					if ($this->asDialog) {
						echo CHtml::script("	                
						window.parent.$('#cru_dialog').dialog('close');
						window.parent.$('#cru_frame').attr('src','');
						if (window.parent.$.fn.yiiGridView)
							window.parent.$.fn.yiiGridView.update('empresas-parametros-grid');
						");
						Yii::app()->end();	                
					} else {
						$array = array('update','id'=>$model->id);					
						$this->redirect($array);
					}	
				}	

			} catch (Exception $e) {
				$s = $e->getMessage();				
				$s = strtr($s,"\n\r","  ");						
				echo CHtml::script("alert('$s');");				
			}
						
		}
		
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
		// $this->performAjaxValidation($model);

		if(isset($_POST['EmpresasParametros']))
		{
			//print_r($_FILES);

			if (isset($_FILES['EmpresasParametros']['size']['logo']) && $_FILES['EmpresasParametros']['size']['logo'] > 0 && $_FILES['EmpresasParametros']['type']['logo'] == 'image/jpeg')
			{								
				//echo $_FILES['EmpresasParametros']['type']['logo'];
				$tmp_name = $_FILES['EmpresasParametros']['tmp_name']['logo'];
				$imagedata = file_get_contents($tmp_name);
				$_POST['EmpresasParametros']['logo'] = base64_encode($imagedata);
			} else
			$_POST['EmpresasParametros']['logo'] = $_POST['EmpresasParametros']['logoupdate'];

			/*$_POST['EmpresasParametros']['modifica_user'] = Yii::app()->user->id;
			$_POST['EmpresasParametros']['modifica_date'] = date("Y-m-d H:i:s");
			if (empty($_POST['EmpresasParametros']['direccion']))
				$_POST['EmpresasParametros']['direccion'] = "";*/
				
			$model->attributes=$_POST['EmpresasParametros'];

			$model->logo = $_POST['EmpresasParametros']['logo'];
			$model->modifica_user = Yii::app()->user->id;			
			$model->modifica_date = date("Y-m-d H:i:s");			

			try {

				if($model->save()) {			
					if ($this->asDialog) {
						echo CHtml::script("	                
						window.parent.$('#cru_dialog').dialog('close');
						window.parent.$('#cru_frame').attr('src','');
						if (window.parent.$.fn.yiiGridView)
							window.parent.$.fn.yiiGridView.update('empresas-parametros-grid');
						");
						Yii::app()->end();	                
					} else {
						$array = array('update','id'=>$model->id);					
						$this->redirect($array);
					}								
				}			

			} catch (Exception $e) {
				$s = $e->getMessage();				
				$s = strtr($s,"\n\r","  ");						
				echo CHtml::script("alert('$s');");				
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
		$dataProvider=new CActiveDataProvider('EmpresasParametros');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EmpresasParametros('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmpresasParametros']))
			$model->attributes=$_GET['EmpresasParametros'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionKRichTextEditor($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['EmpresasParametros']))
		{
			$_POST['EmpresasParametros']['modifica_user'] = Yii::app()->user->id;
			$_POST['EmpresasParametros']['modifica_date'] = date("Y-m-d H:i:s");
			if (empty($_POST['EmpresasParametros']['direccion']))
				$_POST['EmpresasParametros']['direccion'] = "";
				
			$model->attributes=$_POST['EmpresasParametros'];

			if($model->save()) {			
				
	                echo CHtml::script("	                
	                window.parent.$('#cru_dialog').dialog('close');
					window.parent.$('#cru_frame').attr('src','');	   
					window.parent.location.reload();         
	                ");
	                Yii::app()->end();	                
				
					//$array = array('update','id'=>$model->id);					
					//$this->redirect($array);
												
			}			
		}

		$this->layout='//layouts/iframe';

		$this->render('KRichTextEditor',array(
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
		$model=EmpresasParametros::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='empresas-parametros-form')
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
		if(isset(Yii::app()->session['EmpresasParametros_records']))
			$criteria['criteria'] = Yii::app()->session['EmpresasParametros_records'];
		$criteria['pagination'] = array('pageSize'=>EmpresasParametros::model()->count());			
		$model = new CActiveDataProvider('EmpresasParametros',$criteria);
		
		Yii::app()->request->sendFile('EmpresasParametros_'.date('YmdHis').'.xls',
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
		if(isset(Yii::app()->session['EmpresasParametros_records']))
			$criteria['criteria'] = Yii::app()->session['EmpresasParametros_records'];
		$criteria['pagination'] = array('pageSize'=>EmpresasParametros::model()->count());			
		$model = new CActiveDataProvider('EmpresasParametros',$criteria);
	
								//$orientation,$format,$langue,$unicode,$encoding,$marges
		$html2pdf = Yii::app()->ePdf->HTML2PDF('P','A4','en',true,'UTF-8',array(5,5,5,5));
       	$html2pdf->pdf->SetTitle('PDF_EmpresasParametros');
       	$html2pdf->pdf->SetDisplayMode('fullpage');
        $html = $this->renderPartial('reportPdf', array('model'=>$model,'title'=>'EmpresasParametros'), true);	        
        $html2pdf->WriteHTML($html);
        $html2pdf->Output('EmpresasParametros_'.date('YmdHis').'.pdf');
	}
		
}
