<?php

class ContactosMenuController extends Controller
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
		//return ContactosUsersMenu::ControllerActionsSet2( 0, array('ConsultaLogs'), array() );




		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','ConsultaLogs','LogsView'),
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
		$model=new ContactosMenu;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['ContactosMenu']))
		{
			$model->attributes=$_POST['ContactosMenu'];
			$model->mn_us_id = Yii::app()->user->id;
			$model->mn_dt = date("Y-m-d H:i:s");
			if($model->save()) {
				ContactosUsersMenu::YiiLog(Yii::app()->controller->id,Yii::app()->controller->action->id,$_POST,$_GET,$model->tableSchema->primaryKey,$model->getPrimaryKey());
				if ($this->asDialog) {
	                echo CHtml::script("
	                window.parent.$('#cru_dialog').dialog('close');
	                window.parent.$('#cru_frame').attr('src','');
	                if (window.parent.$.fn.yiiGridView)
	                	window.parent.$.fn.yiiGridView.update('contactos-menu-grid');
	                ");
	                Yii::app()->end();
				} else {
					$array = array('update','id'=>$model->mn_id);



					$this->redirect($array);
				}
			}
		}

		if (isset($_GET['parent']))
			$model->mn_parent = $_GET['parent'];

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

		if(isset($_POST['ContactosMenu']))
		{
			$model->attributes=$_POST['ContactosMenu'];
			$model->mn_us_id = Yii::app()->user->id;
			$model->mn_dt = date("Y-m-d H:i:s");
			if($model->save()) {
				ContactosUsersMenu::YiiLog(Yii::app()->controller->id,Yii::app()->controller->action->id,$_POST,$_GET,$model->tableSchema->primaryKey,$model->getPrimaryKey());
				if ($this->asDialog) {
	                echo CHtml::script("
	                window.parent.$('#cru_dialog').dialog('close');
	                window.parent.$('#cru_frame').attr('src','');
	                if (window.parent.$.fn.yiiGridView)
	                	window.parent.$.fn.yiiGridView.update('contactos-menu-grid');
	                ");
	                Yii::app()->end();
				} else {
					$array = array('update','id'=>$model->mn_id);



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
		$dataProvider=new CActiveDataProvider('ContactosMenu');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}







	function ModelArray($hasChildren,&$c,$opciones,$model,$id_usuario){

		/*echo "<pre>";
		print_r($opciones);
		echo "</pre>";*/

		$tmp_arr = array();
		$tmp_arr['id'] = $opciones['id'];
		$tmp_arr['view'] = $opciones['view'];
		$tmp_arr['stat'] = $opciones['stat'];
		$tmp_arr['control'] = $opciones['control'];
		$tmp_arr['action'] = $opciones['action'];
		$tmp_arr['sort'] = $opciones['sort'];

		$tmp_arr['panel'] = "";


		$update = isset(Yii::app()->session['permisos']['contactosMenu']['contactosMenu']['update']) ? Yii::app()->session['permisos']['contactosMenu']['contactosMenu']['update'] : 0;
		$create = isset(Yii::app()->session['permisos']['contactosMenu']['contactosMenu']['create']) ? Yii::app()->session['permisos']['contactosMenu']['contactosMenu']['create'] : 0;
		

		if ($hasChildren == 1) {

			$tmp_arr['parent'] =

			CHtml::link('<span class="icon-pencil"></span>'.$opciones['label'],Yii::app()->controller->createUrl('update',array("id"=>$opciones['id'], "button"=>2, "text" => "Update ContactosMenu")),array('title'=>'Editar Menu','class'=>'','onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"Update ContactosMenu",1); return false; }', 'style' => 'display:' . ($update == 1 ? 'inline' : 'none')));


			$tmp_arr['child'] =

			CHtml::link('<span class="icon-plus"></span>',Yii::app()->controller->createUrl('create',array("parent"=>$opciones['id'], "button"=>1, "text" => "Create ContactosMenu")),array('title'=>'Agregar Opcion','class'=>'','onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"Create ContactosMenu",1); return false; }', 'style' => 'display:' . ($create == 1 ? 'inline' : 'none')));

		}

		if ($hasChildren == 2) {

			$tmp_arr['child'] =

			CHtml::link('<span class="icon-pencil"></span>'.$opciones['label'],Yii::app()->controller->createUrl('update',array("id"=>$opciones['id'], "button"=>2, "text" => "Update ContactosMenu")),array('title'=>'Editar Opcion','class'=>'','onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"Update ContactosMenu",1); return false; }', 'style' => 'display:' . ($update == 1 ? 'inline' : 'none')));


			$tmp_arr['panel'] =

			CHtml::link('<span class="icon-plus"></span>',Yii::app()->controller->createUrl('create',array("parent"=>$opciones['id'], "button"=>1, "text" => "Create ContactosMenu")),array('title'=>'Agregar Panel','class'=>'','onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"Create ContactosMenu",1); return false; }', 'style' => 'display:' . ($create == 1 ? 'inline' : 'none')));


		}



		if ($hasChildren == 3) {


			$tmp_arr['panel'] =

			CHtml::link('<span class="icon-pencil"></span>'.$opciones['label'],Yii::app()->controller->createUrl('update',array("id"=>$opciones['id'], "button"=>2, "text" => "Update ContactosMenu")),array('title'=>'Editar Panel','class'=>'','onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"Update ContactosMenu",1); return false; }', 'style' => 'display:' . ($update == 1 ? 'inline' : 'none')));



		}




		$c++;

		return $tmp_arr;
	}


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{



		$menues = VwContactosMenu::getChilds3(1,0);
		$grid = array();
		$c = 0;

		/*
		echo "<pre>";
		print_r($menues);
		echo "</pre>";
		*/


		foreach ($menues as $i => $items) {

			//echo "<pre>";
			//print_r($items);
			//echo "</pre>";

			$grid[] = $this->ModelArray(1,$c,$items,null,null);
			if (isset($items['children']))
				foreach ($items['children'] as $k => $opcion) {
					$grid[] = $this->ModelArray(2,$c,$opcion,null,null);
					if (isset($opcion['children'])) {
						foreach ($opcion['children'] as $l => $opcion2) {
							$grid[] = $this->ModelArray(3,$c,$opcion2,null,null);
						}
					}
				}
		}

		$gridDataProvider = new CArrayDataProvider($grid,array('pagination' => array('pageSize'=>count($grid))));

		$this->render('admin',array(
			'gridDataProvider'=>$gridDataProvider,
		));

	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=ContactosMenu::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='contactos-menu-form')
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
		if(isset(Yii::app()->session['ContactosMenu_records']))
			$criteria['criteria'] = Yii::app()->session['ContactosMenu_records'];
		$criteria['pagination'] = array('pageSize'=>ContactosMenu::model()->count());
		$model = new CActiveDataProvider('ContactosMenu',$criteria);

		Yii::app()->request->sendFile('ContactosMenu_'.date('YmdHis').'.xls',
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
		if(isset(Yii::app()->session['ContactosMenu_records']))
			$criteria['criteria'] = Yii::app()->session['ContactosMenu_records'];
		$criteria['pagination'] = array('pageSize'=>ContactosMenu::model()->count());
		$model = new CActiveDataProvider('ContactosMenu',$criteria);

								//$orientation,$format,$langue,$unicode,$encoding,$marges
		$html2pdf = Yii::app()->ePdf->HTML2PDF('P','A4','en',true,'UTF-8',array(5,5,5,5));
       	$html2pdf->pdf->SetTitle('PDF_ContactosMenu');
       	$html2pdf->pdf->SetDisplayMode('fullpage');
        $html = $this->renderPartial('reportPdf', array('model'=>$model,'title'=>'ContactosMenu'), true);
        $html2pdf->WriteHTML($html);
        $html2pdf->Output('ContactosMenu_'.date('YmdHis').'.pdf');
	}




  public function actionConsultaLogs()
	{
		$text = "";


		$file = "http://10.10.1.20/yiilog/Yii201701user.log";
		$text .= file_get_contents($file);

		$file = "http://10.10.1.20/yiilog/Yii201701user.log.1";
		$text .= file_get_contents($file);

		$file = "http://10.10.1.20/yiilog/Yii201701user.log.2";
		$text .= file_get_contents($file);

		$file = "http://10.10.1.20/yiilog/Yii201701user.log.3";
		$text .= file_get_contents($file);

		$file = "http://10.10.1.20/yiilog/Yii201701user.log.4";
		$text .= file_get_contents($file);

		$file = "http://10.10.1.20/yiilog/Yii201701user.log.5";
		$text .= file_get_contents($file);


		$file = "http://10.10.1.20/yiilog/Yii201702user.log";
		$text .= file_get_contents($file);

		$file = "http://10.10.1.20/yiilog/Yii201702user.log.1";
		$text .= file_get_contents($file);

		$file = "http://10.10.1.20/yiilog/Yii201702user.log.2";
		$text .= file_get_contents($file);

		$file = "http://10.10.1.20/yiilog/Yii201702user.log.3";
		$text .= file_get_contents($file);

		$file = "http://10.10.1.20/yiilog/Yii201702user.log.4";
		$text .= file_get_contents($file);

		$file = "http://10.10.1.20/yiilog/Yii201702user.log.5";
		$text .= file_get_contents($file);




		//$text = explode("\n",file_get_contents($file));

		$text = explode("\n",$text);

		$rowdata = array();

		$str_ant = "";
		$arr_n = array();
		$arr_p = array();
		$arr_g = array();

		$arr_ant = "";
		//$arr['auth'] = array();

		$cliente = array();

		$ext = array("yt0","}","{","\"","[","]",",","\\");

		foreach ($text as $i => $row) {

			if (substr($row,0,3) != "in ") {
				//echo substr($row,0,19)."<br>";
				$str = trim(substr($row,33,strlen($row)));
				$str = str_replace(array("\\",'"{"','"}"',']}"','}}",'),array("",'{"','"}',']}','}},'),$str);

				if ($str != $str_ant) {

					$arr = json_decode($str,true);
					$arr['fecha'] = substr($row,0,10);
					$arr['hora'] = substr($row,11,8);

					if (isset($arr['post'])) {

//SAI COCOPEAT EXPORT PRIVATE LIMITED

						switch ($arr['action']) {
						//case "update":
							//break;
						case "auth":
/*
							$model=Clientes::model()->find($arr['get']['field']." = '".$arr['get']['nombre_nuevo']."'");
							if ($model)
								$arr['get']['id_cliente'] = $model->id_cliente;
							else
								$arr['post'] = "";
								//$arr['get']['id_cliente'] = 0;
*/
							if (isset($arr['ip'])) {
									/*
									$arr_p[$arr['ip']] = json_encode($arr['post']);
									$arr_g[$arr['ip']] = json_encode($arr['get']);

									$model=Clientes::model()->find($arr['get']['field']." = '".$arr['get']['nombre_nuevo']."'");
									if ($model)
										$arr_p[$arr['ip']] .=  " id_cliente = " . $model->id_cliente;
/*
									echo "<pre>";
									print_r($arr);
									echo "</pre>";

									$arr['post'] = "";
									$arr['get'] = "";
									$arr_n[$arr['ip']] = $arr;
								}*/

/*
	//							echo $str."<br>";
								if (isset($arr['post']['LoginForm']['username'])) {
									$arr_n['nombre_nuevo'] = $arr['get']['nombre_nuevo'];
									$arr_n['field'] = $arr['get']['field'];
									$arr_n['date'] = $arr['fecha'] . " " . $arr['hora'];
									$arr_n['auth'] = $arr['post']['LoginForm']['username'];
									$cliente[$arr['get']['nombre_nuevo']] = $arr_n;
/*
									$arr['post'] = "";
									echo "<pre>";
									print_r($arr_n);
									echo "</pre>";
*/
								}
							break;

							case 'create':
								/*
								if (isset($arr['post']['Clientes']['nombre_cliente'])) {
									if (isset($arr['ip'])) {
										if (isset($arr_n[$arr['ip']])) {
											/*echo "<pre>";
											print_r($arr_n[$arr['ip']]);
											echo "</pre>";

											//if ($arr_ant != $arr['ip'] . $arr['fecha'] . $arr['hora']) {
												$arr_n[$arr['ip']]['post'] = $arr_p[$arr['ip']];
												$arr_n[$arr['ip']]['get'] = $arr_g[$arr['ip']];
												$rowdata[] = $arr_n[$arr['ip']];

												unset($arr_n[$arr['ip']]);
											//}

											$arr_ant = $arr['ip'] . $arr['fecha'] . $arr['hora'];

										}
									}


*/



/*
									$arr['action'] = "auth2";

									if (isset($cliente[$arr['post']['Clientes']['nombre_cliente']]))
									$nom = $arr['post']['Clientes']['nombre_cliente'];
									else
									$nom = "";
									if (!empty($nom)) {
										//$model=Clientes::model()->find($cliente[$nom]['field']." = '".$cliente[$nom]['nombre_nuevo']."'");
										//if ($model)
										//$cliente[$nom]['cliente_id'] = $model->id_cliente;
										$arr['get'] = $cliente[$nom];
									}*/
									/*
									if (isset($arr_n['field'])) {
									$model=Clientes::model()->find($arr_n['field']." = '".$arr_n['nombre_nuevo']."'");
									if ($model)
										$arr_n['cliente'] = $model->id_cliente;
									//if (!empty($arr_n))
										$arr['get'] = json_encode($arr_n);
									//$arr['auth'] = json_encode($arr_n);
									//$arr['auth'] = trim(str_replace($ext," ",$arr['auth']));
									}
									*/

									//$arr_n = array();
								//}
								//else
								//$arr['post'] = "";
								break;


								default:
									//$arr['post'] = "";
									break;
							}

							$arr['post'] = json_encode($arr['post']);
							$arr['post'] = trim(str_replace($ext," ",$arr['post']));
						}

									//$auth_ant = $arr['ip'] . '|' . $arr['id'] . '|' . $nombre_nuevo . "|" . $field ;
/*
						}

						//if (strlen($arr['post']) < 3) $arr['post'] = "";

					}
					//else $arr['post'] = "";
*/
					if (isset($arr['get'])) {
							$arr['get'] = json_encode($arr['get']);
							$arr['get'] = trim(str_replace($ext," ",$arr['get']));
					}
					/*
					else
						$arr['get'] = "";*/

					//if (!empty($arr['id']))
						if (!empty($arr['post'])) {
							$arr['post'] = str_replace(array("LoginForm",":","username"),"",$arr['post']);
							$arr['get'] = str_replace("r : clientes /auth ","",$arr['get']);


							$rowdata[] = $arr;
						}

	/*
					echo "<pre>";
					print_r($arr);
					echo "</pre>";
	*/
					$str_ant = $str;

				}
			}
		}






		$filtersForm=new FiltersForm;
		if (isset($_GET['FiltersForm']))
		    $filtersForm->filters=$_GET['FiltersForm'];

		$filteredData=$filtersForm->filter($rowdata);


       	$dataProvider=new CArrayDataProvider($filteredData, array(
           	'id'=>'id',
           	'sort'=>array(
               'defaultOrder'=>'fecha DESC, hora, ip',
               'attributes' => array(
									'fecha',
									'hora',
									'id',
									'nm',
									'ip',
									'mn',
									'ctrl',
									'action',
               ),
           	),
           	'pagination'=>array('pageSize'=>30,),
       	));


        $this->render('logs',array(
            'dataProvider'=>$dataProvider,
            'filtersForm'=>$filtersForm,
        ));







	}


	public function actionLogsView($datos)
	{

	    	$this->layout = '//layouts/iframe';
	        $this->render('logs_view',array(
	            'datos'=>$datos,
	        ));

	}

}
