<?php

class EmpresasPlantillasController extends Controller
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
		//return ContactosUsersMenu::ControllerActionsSet2( 0 ); 		
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','KRichTextEditor','loaddocs','loadref'),
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
		);
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
	/*public function actionCreate()
	{
		$model=new EmpresasPlantillas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EmpresasPlantillas']))		
		{
			$model->attributes=$_POST['EmpresasPlantillas'];		

			$model->creacion_user = Yii::app()->user->id;
			$model->creacion_date = date("Y-m-d H:i:s");

			if($model->save()) {
				if ($this->asDialog) {
	                echo CHtml::script("	                
	                window.parent.$('#cru_dialog').dialog('close');
	                window.parent.$('#cru_frame').attr('src','');
	                if (window.parent.$.fn.yiiGridView)
	                	window.parent.$.fn.yiiGridView.update('empresas-plantillas-grid');
	                ");
	                Yii::app()->end();	                
				} else {
					$array = array('update','id'=>$model->id);
					
					$this->redirect($array);
				}	
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
	}*/


	public function actionCreate($country='',$button=0)
	{

		if ($button > 0) $this->asDialog = true; else $this->asDialog = false;

			
		$model=new EmpresasPlantillas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EmpresasPlantillas']))		
		{
			$model->attributes=$_POST['EmpresasPlantillas'];		

			$model->creacion_user = Yii::app()->user->id;
			$model->creacion_date = date("Y-m-d H:i:s");
			$model->modifica_date = date("Y-m-d H:i:s");

			try {

				if($model->save()) {
					
					if ($_POST['EmpresasPlantillas']['flag'] == 1)	{
			
						$array = array('update','id'=>$model->id, 'button'=>$button);
						$this->redirect($array);

					} else {

						if ($this->asDialog) {
							echo CHtml::script("	                
							window.parent.$('#cru_dialog').dialog('close');
							window.parent.$('#cru_frame').attr('src','');
							if (window.parent.$.fn.yiiGridView)
								window.parent.$.fn.yiiGridView.update('empresas-plantillas-grid');
							");
							Yii::app()->end();	                
						} else {
							$array = array('update','id'=>$model->id, 'button'=>$button);
							
							$this->redirect($array);
						}
					}
				}	

			} catch (Exception $e) {
				$s = $e->getMessage();				
				$s = strtr($s,"\n\r","  ");						
				echo CHtml::script("alert('$s');");			
				
				$model->sistema = "";
				$model->doc_id = "";

				//$array = array('create','button'=>$button);							
				//$this->redirect($array);				
			}
			
		}
		
		$model->country_disabled = false;
		if (!empty($country)) { $model->country = $country; $model->country_disabled = true;}

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



	public function actionUpdate($id,$button=0)
	{
		$model=$this->loadModel($id);

		if ($button > 0) $this->asDialog = true; else $this->asDialog = false;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		echo CHtml::script("	                					
		if (window.parent.$.fn.yiiGridView)
		window.parent.$.fn.yiiGridView.update('empresas-plantillas-grid');					
		");			

		if(isset($_POST['EmpresasPlantillas']))
		{
			$model->attributes=$_POST['EmpresasPlantillas'];

			/*echo "<pre>";
			print_r($_POST['EmpresasPlantillas']);
			echo "</pre>";*/

			$model->modifica_user = Yii::app()->user->id;			
			$model->modifica_date = date("Y-m-d H:i:s");

			if (isset($_POST['EmpresasPlantillas']['logo_alto']))
			$model->logo_alto	= $_POST['EmpresasPlantillas']['logo_alto'];
			if (isset($_POST['EmpresasPlantillas']['logo_ancho']))
			$model->logo_ancho	= $_POST['EmpresasPlantillas']['logo_ancho'];
			if (isset($_POST['EmpresasPlantillas']['ocean_cuentas_bancarias']))
			$model->ocean_cuentas_bancarias	= $_POST['EmpresasPlantillas']['ocean_cuentas_bancarias'];

			try {
				
				if($model->save()) {		

					if ($_POST['EmpresasPlantillas']['flag'] == 1)	{
						$array = array('update','id'=>$model->id, 'button'=>$button);							
						$this->redirect($array);

					} else {

						if ($this->asDialog) {
							echo CHtml::script("	                
							window.parent.$('#cru_dialog').dialog('close');
							window.parent.$('#cru_frame').attr('src','');
							if (window.parent.$.fn.yiiGridView)
								window.parent.$.fn.yiiGridView.update('empresas-plantillas-grid');
							");
							Yii::app()->end();	                
						} else {
							$array = array('update','id'=>$model->id, 'button'=>$button);							
							$this->redirect($array);
						}
					}
				}	
				
			} catch (Exception $e) {
				$s = $e->getMessage();				
				$s = strtr($s,"\n\r","  ");						
				echo CHtml::script("alert('$s');");		
				
				$model->sistema = "";
				$model->doc_id = "";
				
			}
			
		}
		
		$model->country_disabled = true;
		//if (!empty($country)) { $model->country = $country; $model->country_disabled = true;}

	
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
	/*public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EmpresasPlantillas']))
		{
			$model->attributes=$_POST['EmpresasPlantillas'];

			$model->modifica_user = Yii::app()->user->id;
			$model->modifica_date = date("Y-m-d H:i:s");

			if($model->save()) {		


				if ($this->asDialog) {
					echo CHtml::script("	                
					window.parent.$('#cru_dialog').dialog('close');
					window.parent.$('#cru_frame').attr('src','');
					if (window.parent.$.fn.yiiGridView)
						window.parent.$.fn.yiiGridView.update('empresas-plantillas-grid');
					");
					Yii::app()->end();	                
				} else {
					$array = array('update','id'=>$model->id);
					
					$this->redirect($array);
				}	
										
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

	}*/



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
		$dataProvider=new CActiveDataProvider('EmpresasPlantillas');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EmpresasPlantillas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmpresasPlantillas']))
			$model->attributes=$_GET['EmpresasPlantillas'];

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
				
			$model->attributes=$_POST['EmpresasParametros'];

			if($model->save()) {			
				
	                echo CHtml::script("	                
	                window.parent.$('#cru_dialog').dialog('close');
					window.parent.$('#cru_frame').attr('src','');	   
					window.parent.location.reload();         
	                ");
	                Yii::app()->end();	                											
			}			
		}

		$this->layout='//layouts/iframe';

		$this->render('KRichTextEditor',array(
			'model'=>$model,
		));
	}



	public function actionLoaddocs()
	{
		$country = $_POST['country'];
		$sistema = $_POST['sistema'];

		$op = "<option value=''>Seleccione Modulo</option>";
		//$op = "<option value=''>$country)($sistema)</option>";
		if (!empty($sistema)) {		

			$data = EmpresasPlantillasDocs::model()->findAll(array("condition" => "(country='$country' OR country IS NULL OR country = '') AND sistema='$sistema'","order" => "nombre"));			
			if ($sistema == "FCL" || $sistema == "LCL")	
				$data=CHtml::listData($data,'doc_id','nombre');				
			else
				$data=CHtml::listData($data,'id','nombre');				
			$op = "<option value=''>No hay registros</option>";
			if ($data) {
				$op = "<option value=''>Seleccione Plantilla</option>";
				foreach($data as $id=>$nombre)									
					$op .= CHtml::tag('option', array('value'=>$id),CHtml::encode($nombre),true);
			}
		}
		echo $op;
	}

	public function actionLoadref()
	{		
		$country = $_POST['country'];
		$sistema = $_POST['sistema'];
		$id = $_POST['id'];

		if (!empty($id)) {			
			if ($sistema == "FCL" || $sistema == "LCL")	
				$model=EmpresasPlantillasDocs::model()->find("(country=:country OR country IS NULL OR country = '') AND sistema=:sistema AND doc_id=:doc_id", 
					array(':country'=>$country, ':sistema'=>$sistema, ':doc_id'=>$id)
				);		
			else				
				$model=EmpresasPlantillasDocs::model()->findByPk($id);

			echo $model ? $model->nombre : 

			"Error : ($country )($sistema)($id)";

		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=EmpresasPlantillas::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='empresas-plantillas-form')
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
		if(isset(Yii::app()->session['EmpresasPlantillas_records']))
			$criteria['criteria'] = Yii::app()->session['EmpresasPlantillas_records'];
		$criteria['pagination'] = array('pageSize'=>EmpresasPlantillas::model()->count());			
		$model = new CActiveDataProvider('EmpresasPlantillas',$criteria);
		
		Yii::app()->request->sendFile('EmpresasPlantillas_'.date('YmdHis').'.xls',
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
		if(isset(Yii::app()->session['EmpresasPlantillas_records']))
			$criteria['criteria'] = Yii::app()->session['EmpresasPlantillas_records'];
		$criteria['pagination'] = array('pageSize'=>EmpresasPlantillas::model()->count());			
		$model = new CActiveDataProvider('EmpresasPlantillas',$criteria);
	
								//$orientation,$format,$langue,$unicode,$encoding,$marges
		$html2pdf = Yii::app()->ePdf->HTML2PDF('P','A4','en',true,'UTF-8',array(5,5,5,5));
       	$html2pdf->pdf->SetTitle('PDF_EmpresasPlantillas');
       	$html2pdf->pdf->SetDisplayMode('fullpage');
        $html = $this->renderPartial('reportPdf', array('model'=>$model,'title'=>'EmpresasPlantillas'), true);	        
        $html2pdf->WriteHTML($html);
        $html2pdf->Output('EmpresasPlantillas_'.date('YmdHis').'.pdf');
	}
		
}
