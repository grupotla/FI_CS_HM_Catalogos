<?php

class NavierasRepresentantesController extends Controller
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
		return ContactosUsersMenu::ControllerActionsSet2( 39 ); 		
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
	public function actionCreate($id_naviera=0,$id_representante=0)
	{
		$model=new NavierasRepresentantes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['NavierasRepresentantes']))		
		{	
			$model->attributes=$_POST['NavierasRepresentantes'];	

			$model->date_insert = date("Y-m-d H:i:s");
			$model->user_insert = Yii::app()->user->id;

			if($model->save()) {

				if ($id_representante == 0){
					$parent = 2;
					$id_naviera = $model->id_naviera_representante;
					$pais = Yii::app()->session['pais'];
				}
				else 
				if ($id_naviera == 0) {
					$parent = 1;
					$id_naviera = $model->id_naviera;
					$pais = Yii::app()->session['pais'];
				}

				$sql = "UPDATE navieras SET parent_id = $parent, id_pais = '$pais' WHERE id_naviera = {$id_naviera}";				
				Yii::app()->db->createCommand($sql)->execute();		

				$sql = "INSERT INTO yiicatalogolog (fecha, user_id, user_nom, ip, controller, action, post, get) VALUES (now(),".Yii::app()->user->id.",'".Yii::app()->session['usr_nm']."','".$_SERVER['REMOTE_ADDR']."','".Yii::app()->controller->id."','".Yii::app()->controller->action->id."','".json_encode($_POST)."','".json_encode($_GET)."');";

				try {

					Yii::app()->db->createCommand($sql)->execute();

				} catch (Exception $e) {

				}			

				//if ($this->asDialog) {
	                echo CHtml::script("	                
	                window.parent.$('#cru_dialog').dialog('close');
	                window.parent.$('#cru_frame').attr('src','');
	                if (window.parent.$.fn.yiiGridView)
	                	window.parent.$.fn.yiiGridView.update('navieras-grid');
	                ");
	                Yii::app()->end();	                
				/*} else {
					$array = array('update','id'=>$model->id,
											'id_naviera'=>$id_naviera,
	            							'id_representante'=>$id_representante,	
					);
					
					$this->redirect($array);
				}	*/
			}	
		}

		$vista = "";

		if ($id_representante > 0)
			$vista = "create_representantes";

		if ($id_naviera > 0)
			$vista = "create_navieras";

		/*if (Yii::app()->request->isAjaxRequest) { 
	        $this->renderPartial('create',array(
	            'model'=>$model,
	        ), false, true);		
		} else {
		    if ($this->asDialog) */
		    	$this->layout = '//layouts/iframe';


	        $this->render($vista,array(
	            'model'=>$model,
	            'id_representante'=>$id_representante,
	            'id_naviera'=>$id_naviera,
	        ));
		//}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id,$id_naviera=0,$id_representante=0)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['NavierasRepresentantes']))
		{
			$model->attributes=$_POST['NavierasRepresentantes'];

			$model->date_update = date("Y-m-d H:i:s");
			$model->user_update = Yii::app()->user->id;

			if($model->save()) {		


				if ($id_representante == 0){
					$parent = 2;
					$id_naviera = $model->id_naviera_representante;
					$pais = Yii::app()->session['pais'];
				}
				else 
				if ($id_naviera == 0) {
					$parent = 1;
					$id_naviera = $model->id_naviera;
					$pais = Yii::app()->session['pais'];
				}

				$sql = "UPDATE navieras SET parent_id = $parent, id_pais = '$pais' WHERE id_naviera = {$id_naviera}";				
				Yii::app()->db->createCommand($sql)->execute();	

				$sql = "INSERT INTO yiicatalogolog (fecha, user_id, user_nom, ip, controller, action, post, get) VALUES (now(),".Yii::app()->user->id.",'".Yii::app()->session['usr_nm']."','".$_SERVER['REMOTE_ADDR']."','".Yii::app()->controller->id."','".Yii::app()->controller->action->id."','".json_encode($_POST)."','".json_encode($_GET)."');";

				try {

					Yii::app()->db->createCommand($sql)->execute();

				} catch (Exception $e) {

				}

				//if ($this->asDialog) {
	                echo CHtml::script("	                
	                window.parent.$('#cru_dialog').dialog('close');
	                window.parent.$('#cru_frame').attr('src','');
	                if (window.parent.$.fn.yiiGridView)
	                	window.parent.$.fn.yiiGridView.update('navieras-grid');
	                ");
	                Yii::app()->end();	                
				/*} else {
					$array = array('update','id'=>$model->id);
					
					$this->redirect($array);
				}*/								
			}			
		}
		/*
		if (Yii::app()->request->isAjaxRequest) { 
	        $this->renderPartial('update',array(
	            'model'=>$model,
	        ), false, true);		
		} else {
		    if ($this->asDialog) */

		$vista = "";

		if ($id_representante > 0)
			$vista = "update_representantes";

		if ($id_naviera > 0)
			$vista = "update_navieras";

		    	$this->layout = '//layouts/iframe';
	        $this->render($vista,array(
	            'model'=>$model,
	            'id_representante'=>$id_representante,
	            'id_naviera'=>$id_naviera,	            
	        ));
		//}

	}

			
//$model=NavierasRepresentantes::model()->findByPk($id);

//$sql = "UPDATE navieras_representantes SET activo = false WHERE id = $id";
//Yii::app()->db->createCommand($sql)->execute();	

//ContactosUsersMenu::YiiLog(Yii::app()->controller->id,Yii::app()->controller->action->id,$_POST,$_GET,$model->tableSchema->primaryKey,$model->getPrimaryKey());

//ContactosUsersMenu::YiiLog(Yii::app()->controller->id,Yii::app()->controller->action->id,$_POST,$_GET,null,null);

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

			$sql = "INSERT INTO yiicatalogolog (fecha, user_id, user_nom, ip, controller, action, post, get) VALUES (now(),".Yii::app()->user->id.",'".Yii::app()->session['usr_nm']."','".$_SERVER['REMOTE_ADDR']."','".Yii::app()->controller->id."','".Yii::app()->controller->action->id."','".json_encode($_POST)."','".json_encode($_GET)."');";
			Yii::app()->db->createCommand($sql)->execute();

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
		$dataProvider=new CActiveDataProvider('NavierasRepresentantes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new NavierasRepresentantes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['NavierasRepresentantes']))
			$model->attributes=$_GET['NavierasRepresentantes'];

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
		$model=NavierasRepresentantes::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='navieras-representantes-form')
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
		if(isset(Yii::app()->session['NavierasRepresentantes_records']))
			$criteria['criteria'] = Yii::app()->session['NavierasRepresentantes_records'];
		$criteria['pagination'] = array('pageSize'=>NavierasRepresentantes::model()->count());			
		$model = new CActiveDataProvider('NavierasRepresentantes',$criteria);
		
		Yii::app()->request->sendFile('NavierasRepresentantes_'.date('YmdHis').'.xls',
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
		if(isset(Yii::app()->session['NavierasRepresentantes_records']))
			$criteria['criteria'] = Yii::app()->session['NavierasRepresentantes_records'];
		$criteria['pagination'] = array('pageSize'=>NavierasRepresentantes::model()->count());			
		$model = new CActiveDataProvider('NavierasRepresentantes',$criteria);
	
								//$orientation,$format,$langue,$unicode,$encoding,$marges
		$html2pdf = Yii::app()->ePdf->HTML2PDF('P','A4','en',true,'UTF-8',array(5,5,5,5));
       	$html2pdf->pdf->SetTitle('PDF_NavierasRepresentantes');
       	$html2pdf->pdf->SetDisplayMode('fullpage');
        $html = $this->renderPartial('reportPdf', array('model'=>$model,'title'=>'NavierasRepresentantes'), true);	        
        $html2pdf->WriteHTML($html);
        $html2pdf->Output('NavierasRepresentantes_'.date('YmdHis').'.pdf');
	}
		
}
