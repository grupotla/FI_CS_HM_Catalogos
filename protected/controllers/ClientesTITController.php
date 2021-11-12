<?php

class ClientesTITController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','loadtit'),
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
	public function actionCreate()
	{
		$model=new ClientesTIT;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ClientesTIT']))
		{
			$model->attributes=$_POST['ClientesTIT'];
			if($model->save()) {
				if ($this->asDialog) {
	                echo CHtml::script("
	                window.parent.$('#cru_dialog').dialog('close');
	                window.parent.$('#cru_frame').attr('src','');
	                if (window.parent.$.fn.yiiGridView)
	                	window.parent.$.fn.yiiGridView.update('clientes-tit-grid');
	                ");
	                Yii::app()->end();
				} else {
					$array = array('update','id'=>$model->id_tipo_identificacion_tributaria);

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

		if(isset($_POST['ClientesTIT']))
		{
			$model->attributes=$_POST['ClientesTIT'];
			if($model->save()) {
				if ($this->asDialog) {
	                echo CHtml::script("
	                window.parent.$('#cru_dialog').dialog('close');
	                window.parent.$('#cru_frame').attr('src','');
	                if (window.parent.$.fn.yiiGridView)
	                	window.parent.$.fn.yiiGridView.update('clientes-tit-grid');
	                ");
	                Yii::app()->end();
				} else {
					$array = array('update','id'=>$model->id_tipo_identificacion_tributaria);

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
		$dataProvider=new CActiveDataProvider('ClientesTIT');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ClientesTIT('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ClientesTIT']))
			$model->attributes=$_GET['ClientesTIT'];

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
		$model=ClientesTIT::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='clientes-tit-form')
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
		if(isset(Yii::app()->session['ClientesTIT_records']))
			$criteria['criteria'] = Yii::app()->session['ClientesTIT_records'];
		$criteria['pagination'] = array('pageSize'=>ClientesTIT::model()->count());
		$model = new CActiveDataProvider('ClientesTIT',$criteria);

		Yii::app()->request->sendFile('ClientesTIT_'.date('YmdHis').'.xls',
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
		if(isset(Yii::app()->session['ClientesTIT_records']))
			$criteria['criteria'] = Yii::app()->session['ClientesTIT_records'];
		$criteria['pagination'] = array('pageSize'=>ClientesTIT::model()->count());
		$model = new CActiveDataProvider('ClientesTIT',$criteria);

								//$orientation,$format,$langue,$unicode,$encoding,$marges
		$html2pdf = Yii::app()->ePdf->HTML2PDF('P','A4','en',true,'UTF-8',array(5,5,5,5));
       	$html2pdf->pdf->SetTitle('PDF_ClientesTIT');
       	$html2pdf->pdf->SetDisplayMode('fullpage');
        $html = $this->renderPartial('reportPdf', array('model'=>$model,'title'=>'ClientesTIT'), true);
        $html2pdf->WriteHTML($html);
        $html2pdf->Output('ClientesTIT_'.date('YmdHis').'.pdf');
	}


	public function actionLoadtit()
	{
		$combo = "";
		$arr = array();
		//$arr['count'] = 0;
		$arr['nit'] = 'hide';
		$arr['ide'] = 'hide';
		$arr['pais'] = 'show';
		$arr['msg'] = '';

		//echo $form->dropDownListRow($model,'id_tipo_identificacion_tributaria',CHtml::listData(ClientesTIT::model()->findAll(array("condition"=>"estado = 1 and (id_pais = '".$model->id_pais."' OR id_tipo_identificacion_tributaria = 0)","order"=>"id_tipo_identificacion_tributaria")),'id_tipo_identificacion_tributaria','tipo'));
		//echo "<script>console.log('".$_POST['isShipper']."');</script>";

		$Empresas=Empresas::model()->find("activo = 't' AND pais_iso = '".trim($_POST['id_pais'])."'");
		if ($Empresas) { //si es empresa


					/* 2017-04-07 ayer se solicito que toda esta funcionalidad se anule

					if ($_POST['isShipper'] == 1 && $_POST['isConsigneer'] == 0 && $_POST['isColoader'] == 0) { //solo es shipper

							//pais creacion diferente de pais usuario
							if (trim($_POST['id_pais_ant']) != substr(Yii::app()->session['pais'],0,2)) {

									//pais seleccionado diferente de pais usuario
									if (trim($_POST['id_pais']) != substr(Yii::app()->session['pais'],0,2)) {
											$arr['pais'] = 'empty';
											$arr['msg'] = 'Pais '.$_POST['id_pais'].' es de la region y no permitido';
									}
							}

					} else { //es shipper

							if ($_POST['isNewRecord'] == 0) { //solo valida cuando es update

									//pais creacion diferente de pais usuario
									if (trim($_POST['id_pais_ant']) != substr(Yii::app()->session['pais'],0,2)) {

											//pais seleccionado diferente de pais usuario
											if (trim($_POST['id_pais']) != substr(Yii::app()->session['pais'],0,2)) {
												$arr['pais'] = 'empty';
												$arr['msg'] = 'Pais '.$_POST['id_pais'].' es de la region y no permitido';
											}
									}
							}

							$arr['nit'] = 'show';

					}
					este bloque se sustituye por las lineas abajo

					*/

					//pais seleccionado diferente de pais usuario
					if (trim($_POST['id_pais']) != substr(Yii::app()->session['pais'],0,2)) {
							$arr['pais'] = 'empty';
							$arr['msg'] = 'Pais '.$_POST['id_pais'].' es de la region y no permitido';
					}
		//echo "<script>console.log('".trim($_POST['id_pais']) . " " . substr(Yii::app()->session['pais'],0,2)."');</script>";
		}


		//if ($_POST['isShipper'] == 1 && $_POST['isConsigneer'] == 0 && $_POST['isColoader'] == 0) { //solo es shipper


		if ($_POST['isConsigneer'] == 0 || $_POST['isColoader'] == 0) { //si no es shipper

				if ($Empresas)  //si es pais de la region y no es shipper
						$arr['nit'] = 'show';

				if (trim($_POST['id_pais']) != "") {

						$data=ClientesTIT::model()->findAll(array("condition"=>"estado = 1 and id_pais = '".trim($_POST['id_pais'])."'"));
						if ($data) {
									if ($_POST['isNewRecord'] == 0)
											$combo = CHtml::tag('option',array('value'=>''),CHtml::encode('Seleccione'),true);
					        /*echo CHtml::script("
					        var div = $('#Clientes_id_tipo_identificacion_tributaria').parent().parent();
					        $(div).show();
					        ");*/
									$arr['ide'] = 'show';
						} else {
								$data=ClientesTIT::model()->findAll(array("condition"=>"id_tipo_identificacion_tributaria = 0"));
					        /*echo CHtml::script("
					        var div = $('#Clientes_id_tipo_identificacion_tributaria').parent().parent();
					        $(div).hide();
					        ");*/
								//$arr['ide'] = 'hide';
								 $combo = "";
						}

						//$arr['count'] = count($data);
						//if (count($data) == 1) $combo = "";

						$data=CHtml::listData($data,'id_tipo_identificacion_tributaria','tipo');
						foreach($data as $value=>$name)
							$combo .= CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);
				}
		}

		$arr['id_tipo_identificacion_tributaria'] = $_POST['id_tipo_identificacion_tributaria'];
		$arr['id_pais_ant'] = $_POST['id_pais_ant'];
		$arr['combo'] = $combo;
		//$arr['isShipper'] = $_POST['isShipper'];
		$arr['isNewRecord'] = $_POST['isNewRecord'];

		echo json_encode($arr);

	} //function

}
