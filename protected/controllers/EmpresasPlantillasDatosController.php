<?php

class EmpresasPlantillasDatosController extends Controller
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
				'actions'=>array('index','view','ajaxCheckboxToggle'),
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
	public function actionView($country, $sistema, $doc_id)
	{	
		$model=new EmpresasPlantillasDatos;

		//$this->performAjaxValidation($model);

		$datos=EmpresasPlantillasDatos::model()->findAll("country = '" . $country."' AND sistema = '" . $sistema . "' AND doc_id = '" . intval($doc_id) . "'"); 

		$grid = array();

		$etiquetas = EmpresasPlantillasEtiquetas::model()->findAll(array("condition"=>"trafico = '$sistema'","order"=>"valor"));

		$count = count($etiquetas);

		//echo "($count)";

		$arr_nums = array();
		$arr_nums[''] = '-- Seleccione --';
		for ($i=1; $i < $count; $i++) 
			$arr_nums[$i] = $i;

		foreach ($etiquetas as $i => $etiqueta) {
			
			$checked = false;
			$etiqueta_id = $etiqueta->etiqueta_id;			
			$dato_id = 0;
			$orden = 0;

			foreach ($datos as $j => $dato) {				
				if ($dato->id_etiqueta == $etiqueta->id) {
					$dato_id = $dato->id;
					$orden = $dato->orden;
					break;
				}					
			}
			
			$tmp_arr = array();			
			$tmp_arr['id'] = $etiqueta->id;
			$tmp_arr['label'] = $etiqueta->valor . CHtml::HiddenField("EmpresasPlantillasDatos[$i][id]",$etiqueta_id) . CHtml::HiddenField("EmpresasPlantillasDatos[$i][dato_id]",$dato_id);
			$tmp_arr['orden'] = CHtml::dropDownList("EmpresasPlantillasDatos[$i][orden]", $orden, $arr_nums,
				array('onchange'=>'document.getElementById("EmpresasPlantillasDatos_'.$i.'_chk").style.display = this.value > 0 ? \'block\' : \'none\';')
			);			  
			$tmp_arr['chk'] = CHtml::CheckBox("EmpresasPlantillasDatos[$i][chk]",$dato_id > 0 ? true : false, 
			array(
				'id'=>"EmpresasPlantillasDatos_{$i}_chk",
				'value'=>$etiqueta->id,				
				'style'=> $dato_id > 0 ? 'display:block' : 'display:none', 
				'ajax' => array(
					'type'=>'POST', //request type		
					'url'=>  $this->createUrl('ajaxCheckboxToggle'),		
					'dataType'=>'json',							
					'data' => array(						
						'country'=>$country,
						'sistema' => $sistema,
						'doc_id' => $doc_id,
						'dato_id'=>'js:document.getElementById("EmpresasPlantillasDatos_'.$i.'_dato_id").value', 
						'orden'=>'js:document.getElementById("EmpresasPlantillasDatos_'.$i.'_orden").value', 
						'chk'=>'js:this.value', 'checked'=>'js:document.getElementById("EmpresasPlantillasDatos_'.$i.'_chk").checked ? 1 : 0'),
					'success' => 'js:function(result){		
						var nodo = document.getElementById("EmpresasPlantillasDatos_'.$i.'_chk");
						nodo.checked = !nodo.checked;						
						console.clear();
						console.log(result);
						document.getElementById("EmpresasPlantillasDatos_'.$i.'_dato_id").value = result.id;

						if (result.id == 0)
							document.getElementById("EmpresasPlantillasDatos_'.$i.'_orden").value = "";
					}',		
					'error'=>'function (xhr, ajaxOptions, thrownError){		
						alert(xhr.statusText);		
						alert(thrownError);
					}',		
				),
			));			

			$grid[] = $tmp_arr;
		}
		
		$gridDataProvider = new CArrayDataProvider($grid,array('pagination' => array('pageSize'=>count($grid))));		
		
		$this->layout = '//layouts/iframe';
	    if (Yii::app()->request->isAjaxRequest || $this->asDialog) {		
	        $this->renderPartial('view',array(
				'model'=>$model,
				'gridDataProvider'=>$gridDataProvider,
	        ), false, true);
	    } else {
	        $this->render('view',array(
				'model'=>$model,
				'gridDataProvider'=>$gridDataProvider,
	        ));
	    }
	}

	public function actionajaxCheckboxToggle(){
		
		$result = array();
		$result['id'] = 0;

		try {
					
			if ($_POST['dato_id'] > 0)  {
				$model=EmpresasPlantillasDatos::model()->findByPk($_POST['dato_id']);
				if ($model) {
					$model->delete();		
					$result['msg'] = 'deleted ' . $_POST['dato_id'];
				}
			}

			$_POST['checked'] = intval($_POST['checked']);

			if ($_POST['checked'] > 0){
				$model=new EmpresasPlantillasDatos;
				$model->country = $_POST['country'];
				$model->sistema = $_POST['sistema'];
				$model->doc_id = $_POST['doc_id'];
				$model->id_etiqueta = $_POST['chk'];
				$model->orden = $_POST['orden'];
				if ($model->save()) {
					$result['id'] = $model->id;
					$result['msg'] = 'saved ' . $model->id;					
				}
				else
					$result['error'] = $model->getErrors();
			}

		} catch (Exception $e) {		
			$result['exception'] = $e->getMessage();
		}			

		echo json_encode($result);		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new EmpresasPlantillasDatos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EmpresasPlantillasDatos']))		
		{
			$model->attributes=$_POST['EmpresasPlantillasDatos'];		
			if($model->save()) {
				if ($this->asDialog) {
	                echo CHtml::script("	                
	                window.parent.$('#cru_dialog').dialog('close');
	                window.parent.$('#cru_frame').attr('src','');
	                if (window.parent.$.fn.yiiGridView)
	                	window.parent.$.fn.yiiGridView.update('empresas-plantillas-datos-grid');
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

		if(isset($_POST['EmpresasPlantillasDatos']))
		{
			$model->attributes=$_POST['EmpresasPlantillasDatos'];
			if($model->save()) {			
				if ($this->asDialog) {
	                echo CHtml::script("	                
	                window.parent.$('#cru_dialog').dialog('close');
	                window.parent.$('#cru_frame').attr('src','');
	                if (window.parent.$.fn.yiiGridView)
	                	window.parent.$.fn.yiiGridView.update('empresas-plantillas-datos-grid');
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
		$dataProvider=new CActiveDataProvider('EmpresasPlantillasDatos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EmpresasPlantillasDatos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmpresasPlantillasDatos']))
			$model->attributes=$_GET['EmpresasPlantillasDatos'];

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
		$model=EmpresasPlantillasDatos::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='empresas-plantillas-datos-form')
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
		if(isset(Yii::app()->session['EmpresasPlantillasDatos_records']))
			$criteria['criteria'] = Yii::app()->session['EmpresasPlantillasDatos_records'];
		$criteria['pagination'] = array('pageSize'=>EmpresasPlantillasDatos::model()->count());			
		$model = new CActiveDataProvider('EmpresasPlantillasDatos',$criteria);
		
		Yii::app()->request->sendFile('EmpresasPlantillasDatos_'.date('YmdHis').'.xls',
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
		if(isset(Yii::app()->session['EmpresasPlantillasDatos_records']))
			$criteria['criteria'] = Yii::app()->session['EmpresasPlantillasDatos_records'];
		$criteria['pagination'] = array('pageSize'=>EmpresasPlantillasDatos::model()->count());			
		$model = new CActiveDataProvider('EmpresasPlantillasDatos',$criteria);
	
								//$orientation,$format,$langue,$unicode,$encoding,$marges
		$html2pdf = Yii::app()->ePdf->HTML2PDF('P','A4','en',true,'UTF-8',array(5,5,5,5));
       	$html2pdf->pdf->SetTitle('PDF_EmpresasPlantillasDatos');
       	$html2pdf->pdf->SetDisplayMode('fullpage');
        $html = $this->renderPartial('reportPdf', array('model'=>$model,'title'=>'EmpresasPlantillasDatos'), true);	        
        $html2pdf->WriteHTML($html);
        $html2pdf->Output('EmpresasPlantillasDatos_'.date('YmdHis').'.pdf');
	}
		
}
