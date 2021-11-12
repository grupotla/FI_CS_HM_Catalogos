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

		//echo "<pre>";		
		//$res =	ContactosUsersMenu::ControllerActionsSet2( 39 );
		//echo "</pre>";
		
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
		$model=new NavierasRepresentantes;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['NavierasRepresentantes']))
		{
			$model->attributes=$_POST['NavierasRepresentantes'];
			$model->user_insert = Yii::app()->user->id;
			$model->activo = false;	
			$model->date_insert = date("Y-m-d H:i:s");			
			if($model->save()) {
				ContactosUsersMenu::YiiLog(Yii::app()->controller->id,Yii::app()->controller->action->id,$_POST,$_GET,$model->tableSchema->primaryKey,$model->getPrimaryKey());
				if ($this->asDialog) {
	                echo CHtml::script("
	                window.parent.$('#cru_dialog').dialog('close');
	                window.parent.$('#cru_frame').attr('src','');
	                if (window.parent.$.fn.yiiGridView)
	                	window.parent.$.fn.yiiGridView.update('navieras-grid');
	                ");
	                Yii::app()->end();
				} else {

			$this->redirect(array(Yii::app()->session['p']['update'] == 1 ? 'update' : 'modify','id'=>$model->id_naviera));

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
		 $this->performAjaxValidation($model);

		if(isset($_POST['NavierasRepresentantes']))
		{
			$model->attributes=$_POST['NavierasRepresentantes'];
			
			if (isset($_POST['btnAuth'])) {
				$model->user_auth = Yii::app()->user->id;
				$model->activo = true;	
				$model->date_auth = date("Y-m-d H:i:s");	
			} elseif (isset($_POST['btnDes'])) {				
				$model->user_auth = Yii::app()->user->id;
				$model->activo = false;	
				$model->date_auth = date("Y-m-d H:i:s");	
			} else {
				$model->user_update = Yii::app()->user->id;
				$model->date_update = date("Y-m-d H:i:s");
			}
						
			if($model->save()) {
				ContactosUsersMenu::YiiLog(Yii::app()->controller->id,Yii::app()->controller->action->id,$_POST,$_GET,$model->tableSchema->primaryKey,$model->getPrimaryKey());
				if ($this->asDialog) {
	                echo CHtml::script("
	                window.parent.$('#cru_dialog').dialog('close');
	                window.parent.$('#cru_frame').attr('src','');
	                if (window.parent.$.fn.yiiGridView)
	                	window.parent.$.fn.yiiGridView.update('navieras-grid');
	                ");
	                Yii::app()->end();
				} else {

			$this->redirect(array(Yii::app()->session['p']['update'] == 1 ? 'update' : 'modify','id'=>$model->id_naviera));

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

	public function actionModify($id)
	{

		if (Yii::app()->session['p']['update'] == 1)

			$this->redirect(array('update','id'=>$id));

		else {

			$model=$this->loadModel($id);

			if (Yii::app()->request->isAjaxRequest) {
		        $this->renderPartial('modify',array(
		            'model'=>$model,
		        ), false, true);
			} else {
			    if ($this->asDialog)
			    	$this->layout = '//layouts/iframe';
		        $this->render('modify',array(
		            'model'=>$model,
		        ));
			}

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
		if(isset($_POST['ajax']) && $_POST['ajax']==='navieras-form')
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
		if(isset(Yii::app()->session['Navieras_records']))
			$criteria['criteria'] = Yii::app()->session['Navieras_records'];
		$criteria['pagination'] = array('pageSize'=>NavierasRepresentantes::model()->count());
		$model = new CActiveDataProvider('NavierasRepresentantes',$criteria);

		Yii::app()->request->sendFile('Navieras_'.date('YmdHis').'.xls',
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
		if(isset(Yii::app()->session['Navieras_records']))
			$criteria['criteria'] = Yii::app()->session['Navieras_records'];
		$criteria['pagination'] = array('pageSize'=>NavierasRepresentantes::model()->count());
		$model = new CActiveDataProvider('NavierasRepresentantes',$criteria);

								//$orientation,$format,$langue,$unicode,$encoding,$marges
		$html2pdf = Yii::app()->ePdf->HTML2PDF('P','A4','en',true,'UTF-8',array(5,5,5,5));
       	$html2pdf->pdf->SetTitle('PDF_Navieras');
       	$html2pdf->pdf->SetDisplayMode('fullpage');
        $html = $this->renderPartial('reportPdf', array('model'=>$model,'title'=>'NavierasRepresentantes'), true);
        $html2pdf->WriteHTML($html);
        $html2pdf->Output('NavierasRepresentantes_'.date('YmdHis').'.pdf');
	}

}
