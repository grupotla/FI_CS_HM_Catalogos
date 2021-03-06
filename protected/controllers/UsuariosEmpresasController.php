<?php

class UsuariosEmpresasController extends Controller
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
		return ContactosUsersMenu::ControllerActionsSet2( 3, array(), array('menu','menu2','division'));
		//return ContactosUsersMenu::ControllerActionsSet2(3);
		/* return array(
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
		$model=new UsuariosEmpresas;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['UsuariosEmpresas']))
		{
			$model->attributes=$_POST['UsuariosEmpresas'];
			if($model->save()) {
				ContactosUsersMenu::YiiLog(Yii::app()->controller->id,Yii::app()->controller->action->id,$_POST,$_GET,$model->tableSchema->primaryKey,$model->getPrimaryKey());
				if ($this->asDialog) {
	                echo CHtml::script("
	                window.parent.$('#cru_dialog').dialog('close');
	                window.parent.$('#cru_frame').attr('src','');
	                if (window.parent.$.fn.yiiGridView)
	                	window.parent.$.fn.yiiGridView.update('usuarios-empresas-grid');
	                ");
	                Yii::app()->end();
				} else {
					$array = array('update','id'=>$model->id_usuario);



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
		 $this->performAjaxValidation($model);

		if(isset($_POST['UsuariosEmpresas']))
		{
			$model->attributes=$_POST['UsuariosEmpresas'];
			if($model->save()) {
				ContactosUsersMenu::YiiLog(Yii::app()->controller->id,Yii::app()->controller->action->id,$_POST,$_GET,$model->tableSchema->primaryKey,$model->getPrimaryKey());
				if ($this->asDialog) {
	                echo CHtml::script("
	                window.parent.$('#cru_dialog').dialog('close');
	                window.parent.$('#cru_frame').attr('src','');
	                if (window.parent.$.fn.yiiGridView)
	                	window.parent.$.fn.yiiGridView.update('usuarios-empresas-grid');
	                ");
	                Yii::app()->end();
				} else {
					$array = array('update','id'=>$model->id_usuario);



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
		$dataProvider=new CActiveDataProvider('UsuariosEmpresas');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{

		$model=new UsuariosEmpresas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UsuariosEmpresas']))
			$model->attributes=$_GET['UsuariosEmpresas'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}










	//$ctrl = "";

	function ModelArray($hasChildren,&$c,$opciones,$model,$id_usuario){

		//global $ctrl;

		/*echo "<pre>";
		print_r($opciones);
		echo "</pre>";*/

		$tmp_arr = array();
		$tmp_arr['id'] = $opciones['id'];
		$tmp_arr['view'] = $opciones['view'];
		$tmp_arr['stat'] = $opciones['stat'];
		$tmp_arr['control'] = $opciones['control'];

		$tmp_arr['panel'] = "";


		//if (!isset($opciones['parent'])) $opciones['parent'] = "";

		$activo = false;
		$select = false;

		$insert = false;
		$update = false;
		$auth = false;
		$excel = false;
		$pdf = false;
		$admin = false;
		$delete = false;
		
		$tmp_arr['chk1_val'] = 0;
		$tmp_arr['chk1_show'] = 0;
		
		$tmp_arr['chk2_val'] = 0;
		$tmp_arr['chk2_show'] = 0;

		$tmp_arr['chk3_val'] = 0;
		$tmp_arr['chk3_show'] = 0;
		
		$tmp_arr['activo_val'] = 0;
		$tmp_arr['activo_show'] = 0;
		
		$tmp_arr['insert_val'] = 0;
		$tmp_arr['insert_show'] = 0;

		$tmp_arr['update_val'] = 0;
		$tmp_arr['update_show'] = 0;	
		
		$tmp_arr['auth_val'] = 0;
		$tmp_arr['auth_show'] = 0;	
		
		$tmp_arr['excel_val'] = 0;
		$tmp_arr['excel_show'] = 0;
		
		$tmp_arr['pdf_val'] = 0;
		$tmp_arr['pdf_show'] = 0;

		$tmp_arr['admin_val'] = 0;
		$tmp_arr['admin_show'] = 0;

		$tmp_arr['delete_val'] = 0;
		$tmp_arr['delete_show'] = 0;	

$um_mn_id = 0;

				
				$sql = "select count(*) from contactos_menu where mn_parent = ".$opciones['id'];
				$um_mn_id = intval(Yii::app()->db->createCommand($sql)->queryScalar());
					


		foreach ($model as $key=>$value){

			if ($opciones['id'] == $value['um_mn_id']) {

			

/*				
				$tmp_arr['chk1'] =

			//Chtml::HiddenField("ContactosUsersMenu[$c][id_usuario]",$id_usuario) .

			CHtml::CheckBox("ContactosUsersMenu[$c][um_mn_id]",$select, array('value'=>$opciones['id'], 
			
			//'tipo'=>$select,  'checked'=>$select, 	

			'onclick' => "javascript:
			$(this).attr('checked',$(this).is(':checked'));
			$(this).prop('checked',$(this).prop('checked'));		
			",	
			
			//'onclick' => "javascript:
			//$(this).attr('checked',!$(this).is(':checked'));
			//$(this).prop('checked',!$(this).prop('checked'));	
			//",
			
			
			'class'=>'par'.$opciones['id'].' chk_menu'


			));
			

*/
				$select = true;

				


				//echo "(".$value['um_st'].")";

				if ($value['um_st'] == "Activo")
					$activo = true;
				else
					$activo = false;

				$tmp_arr['user'] = $value['um_us_us_id'];
				$tmp_arr['fecha'] = $value['um_dt'];

				$insert = $value['um_permisos'][0];
				$update = $value['um_permisos'][1];
				$auth	= $value['um_permisos'][2];
				$pdf 	= $value['um_permisos'][3];
				$excel 	= $value['um_permisos'][4];

				if (isset($value['um_permisos'][5]))
					$admin 	= $value['um_permisos'][5];
					
				if (isset($value['um_permisos'][6]))
					$delete	= $value['um_permisos'][6];




				break;
			}
		}


				if ($um_mn_id == 0)  {
					if ($activo) $tmp_arr['activo_val'] = 1;
					$tmp_arr['activo_show'] = 1;
				}
				
				if ($um_mn_id == 0) {				
					if ($insert) $tmp_arr['insert_val'] = 1;
					$tmp_arr['insert_show'] = 1;
				}
				if ($um_mn_id == 0) {
					if ($update) $tmp_arr['update_val'] = 1;
					$tmp_arr['update_show'] = 1;	
				}
				
				if ($um_mn_id == 0) {						
					if ($auth) $tmp_arr['auth_val'] = 1;
					if ($um_mn_id == 0) $tmp_arr['auth_show'] = 1;				
				}

				if ($um_mn_id == 0) {		
					if ($excel) $tmp_arr['excel_val'] = 1;
					if ($um_mn_id == 0) $tmp_arr['excel_show'] = 1;
				}
				if ($um_mn_id == 0) {		
					if ($pdf) $tmp_arr['pdf_val'] = 1;
					if ($um_mn_id == 0) $tmp_arr['pdf_show'] = 1;
				}
				if ($um_mn_id == 0) {
					if ($admin) $tmp_arr['admin_val'] = 1;
					if ($um_mn_id == 0) $tmp_arr['admin_show'] = 1;
				}
				if ($um_mn_id == 0) {
					if ($delete) $tmp_arr['delete_val'] = 1;
					$tmp_arr['delete_show'] = 1;		
				}
				
		/*
		
				'onclick' => "javascript:
			$('.chk".$opciones['id']."').attr('checked',$(this).is(':checked'));			
			$('.chk".$opciones['id']."').attr('checked',$(this).is(':checked'));
			$('.par_a".$opciones['id']."_activo').attr('checked',$(this).is(':checked'));
			$('.par_i".$opciones['id']."_activo').attr('checked',!$(this).is(':checked'));
			$('#chk_a".$opciones['id']."').attr('checked',$(this).is(':checked'));
			$('#chk_i".$opciones['id']."').attr('checked',!$(this).is(':checked'));",
		*/
		
		
		$tmp_arr['chk0'] =

			//Chtml::HiddenField("ContactosUsersMenu[$c][id_usuario]",$id_usuario) .
$opciones['id'] . "&nbsp;" . 
	CHtml::CheckBox("",false, array('value'=>$opciones['id'], 'onclick' => "javascript:$('.par" . $opciones['id'] . "').attr('checked',$(this).is(':checked'));"));
			
		//CHtml::textField("ContactosUsersMenu[$c][um_mn_id2]", $opciones['id']);		
			
		
		$tmp_arr['chk0'] .= 
		Chtml::HiddenField("ContactosUsersMenu[$c][um_us_us_id]",Yii::app()->user->id) .
		Chtml::HiddenField("ContactosUsersMenu[$c][um_dt]",date("Y-m-d H:i:s"));
		

		if ($hasChildren == 1) {
			
			
			$tmp_arr['chk1'] = CHtml::CheckBox("ContactosUsersMenu[$c][um_mn_id]", $select, array('value'=>$opciones['id'],							
			'class'=>'par'.$opciones['id'].' id'.$opciones['id']
			));
					
			$tmp_arr['chk1_val'] = $select;
			
			$tmp_arr['chk1_show'] = 1;

/*
			$tmp_arr['chk11'] = CHtml::CheckBox("", $select, array('value'=>$opciones['id'], 

			'onclick' => "javascript:
			$(this).attr('checked',$(this).is(':checked'));
			$(this).prop('checked',$(this).prop('checked'));			
			$('id" . $opciones['id'] . "').attr('checked',$(this).is(':checked'));
			$('id" . $opciones['id'] . "').prop('checked',$(this).prop('checked'));			
			",				
				
			'class'=>'par'.$opciones['id'].' chk_menu'

			));
*/

			//$tmp_arr['parent'] = CHtml::label("<span class='label label-info'>".$opciones['label']."</span>","ContactosUsersMenu_{$c}_um_mn_id");

			$tmp_arr['parent'] = CHtml::label($opciones['label'],"ContactosUsersMenu_{$c}_um_mn_id");

			/*$tmp_arr['child'] = CHtml::CheckBox('contract',true, array('onclick' => "javascript:
			$(this).is(':checked') ? $('.chk".$opciones['id']."').parent().parent().show() : $('.chk".$opciones['id']."').parent().parent().hide()"));					*/

		}

		if ($hasChildren == 2) {
			
/*			
			$tmp_arr['chk2'] =

			//Chtml::HiddenField("ContactosUsersMenu[$c][id_usuario]",$id_usuario) .

			CHtml::CheckBox("ContactosUsersMenu[$c][um_mn_id]",$select, array('value'=>$opciones['id'], 
			
			//'onclick' =>  "javascript:
			//$('#chk_a".$opciones['id']."').attr('checked',$(this).is(':checked'));
			//$('#chk_i".$opciones['id']."').attr('checked',!$(this).is(':checked'));
			//",


			'onclick' => "javascript:
			$(this).attr('checked',!$(this).is(':checked'));
			$(this).prop('checked',!$(this).prop('checked'))			
			",	

			//esto hace click a parent
			//$('.par".$opciones['parent']."').attr('checked',$(this).is(':checked'));
			//$('#chk_a".$opciones['parent']."').attr('checked',$(this).is(':checked'));
			//$('#chk_i".$opciones['parent']."').attr('checked',!$(this).is(':checked'));

			//'class'=>'chk'.$opciones['parent']));
			'class'=>'par'.$opciones['id'].' chk_opcion'));

*/

			$tmp_arr['chk2'] = CHtml::CheckBox("ContactosUsersMenu[$c][um_mn_id]", $select, array('value'=>$opciones['id'],							
			'class'=>'par'.$opciones['id'].' id'.$opciones['id']
			));
					
			$tmp_arr['chk2_val'] = $select;
			
			$tmp_arr['chk2_show'] = 1;
			
			$tmp_arr['child'] = CHtml::label($opciones['label'],"ContactosUsersMenu_{$c}_um_mn_id");
		}
		
		
		

		if ($hasChildren == 3) {
			
			/*
			$tmp_arr['child'] =

			CHtml::CheckBox("ContactosUsersMenu[$c][um_mn_id]",$select, array('value'=>$opciones['id'], 'style'=>'float:right;', 
			
			

			'onclick' => "javascript:
			$(this).attr('checked',!$(this).is(':checked'));
			$(this).prop('checked',!$(this).prop('checked'))			
			",				
			
			
			//'onclick' =>  "javascript:
			//$('#chk_a".$opciones['id']."').attr('checked',$(this).is(':checked'));
			//$('#chk_i".$opciones['id']."').attr('checked',!$(this).is(':checked'));
			//",
			
			//'class'=>'chk_'.$opciones['parent']));
			'class'=>'par'.$opciones['id'].' chk_panel'));
			
			*/

			$tmp_arr['chk3'] = CHtml::CheckBox("ContactosUsersMenu[$c][um_mn_id]", $select, array('value'=>$opciones['id'],							
			'class'=>'par'.$opciones['id'].' id'.$opciones['id']
			));			

			$tmp_arr['chk3_val'] = $select;
			
			$tmp_arr['chk3_show'] = 1;
			
			$tmp_arr['panel'] = CHtml::label($opciones['label'],"ContactosUsersMenu_{$c}_um_mn_id");
			
		}

		if ($hasChildren == 2 || $hasChildren == 3) {

			$tmp_arr['insert'] = CHtml::CheckBox("ContactosUsersMenu[$c][insert]",$insert,array('class'=>'par'.$opciones['id'].' id'.$opciones['id'].'in chk_insert','title'=>'Create'));
			$tmp_arr['update'] = CHtml::CheckBox("ContactosUsersMenu[$c][update]",$update,array('class'=>'par'.$opciones['id'].' id'.$opciones['id'].'up chk_update','title'=>'Update'));
			$tmp_arr['auth'] = CHtml::CheckBox("ContactosUsersMenu[$c][auth]",$auth,  array('class'=>'par'.$opciones['id'].' id'.$opciones['id'].'au chk_auth','title'=>'Auth'));
			//$tmp_arr['pdf'] = CHtml::CheckBox("ContactosUsersMenu[$c][pdf]",$pdf,     array('class'=>'par'.$opciones['id'].' id'.$opciones['id'].'pd chk_pdf','title'=>'Pdf'));
			//$tmp_arr['excel'] = CHtml::CheckBox("ContactosUsersMenu[$c][excel]",$excel,array('class'=>'par'.$opciones['id'].' id'.$opciones['id'].'ex chk_excel','title'=>'Excel'));
			$tmp_arr['admin'] = CHtml::CheckBox("ContactosUsersMenu[$c][admin]",$admin,array('class'=>'par'.$opciones['id'].' id'.$opciones['id'].'ad chk_admin','title'=>'Admin'));
			$tmp_arr['delete'] = CHtml::CheckBox("ContactosUsersMenu[$c][delete]",$delete,array('class'=>'par'.$opciones['id'].' id'.$opciones['id'].'de chk_delete','title'=>'Delete'));
			
			
			
		}
		
/*		
		$tmp_arr['activo'] = CHtml::CheckBox("ContactosUsersMenu[$c][um_st]",$activo,array(
		'title'=>'Activo',
		'class'=>'par'.$opciones['id'].' chk_activo par_'.$opciones['parent'].'_activo chk_'.$opciones['id'],'id'=>"chk_".$opciones['id'])).
		Chtml::HiddenField("ContactosUsersMenu[$c][um_us_us_id]",Yii::app()->user->id) .
		Chtml::HiddenField("ContactosUsersMenu[$c][um_dt]",date("Y-m-d H:i:s"));
*/
		//$tmp_arr['activo'] = CHtml::CheckBox("ContactosUsersMenu[$c][um_st]", $activo, array('value'=>$opciones['id'],							'class'=>'par'.$opciones['id'].' id'.$opciones['id'].'ac'));			


		$c++;

		return $tmp_arr;
	}







	public function actionMenu($id)
	{
		$model=$this->loadModel($id);

					
		if (isset($_POST['ContactosUsersMenu']))
		{
			
			
	/*
			echo "<pre>";
			print_r($_POST['ContactosUsersMenu']);
			echo "</pre>";
	*/				
			$ContactosUsersMenu = array();


			$sql = "DELETE FROM contactos_users_menu WHERE id_usuario = {$model->id_usuario}";
			Yii::app()->db->createCommand($sql)->execute();	


		

			$mn_ids = "";
			foreach ($_POST['ContactosUsersMenu'] as $k => $opciones) {

				if (isset($opciones['um_mn_id'])) { //si hay menu

/*
					echo "<pre>";
					print_r($opciones);
					echo "</pre>";
*/
	
					$permisos = "";
					if (isset($opciones['insert'])) $permisos .= "1"; else $permisos .= "0";
					if (isset($opciones['update'])) $permisos .= "1"; else $permisos .= "0";
					if (isset($opciones['auth'])) $permisos .= "1"; else $permisos .= "0";
					if (isset($opciones['pdf'])) $permisos .= "1"; else $permisos .= "0";
					if (isset($opciones['excel'])) $permisos .= "1"; else $permisos .= "0";
					if (isset($opciones['admin'])) $permisos .= "1"; else $permisos .= "0";
					if (isset($opciones['delete'])) $permisos .= "1"; else $permisos .= "0";

					if (isset($opciones['um_st'])) $opciones['um_st'] = 'Activo'; else $opciones['um_st'] = 'Inactivo';

////////////////////////////////////////////////////
				$opciones['um_st'] = 'Activo'; 

				$sql = "select count(*) from contactos_menu where mn_parent = ".$opciones['um_mn_id'];
				$um_mn_id = intval(Yii::app()->db->createCommand($sql)->queryScalar());
				
				if ($um_mn_id > 0) {
					$permisos[0] = '1';
					$permisos[1] = '1';
				}

					$mn_ids .= $opciones['um_mn_id'].",";

					$opciones['um_permisos'] = $permisos;

					$updated = new ContactosUsersMenu;

					$updated->id_usuario = $model->id_usuario;
					$updated->um_mn_id = $opciones['um_mn_id'];
					$updated->um_st = $opciones['um_st'];

					$updated->um_permisos = $opciones['um_permisos'];
					$updated->um_dt = $opciones['um_dt'];
					$updated->um_us_us_id = $opciones['um_us_us_id'];
					$updated->save();					

					/*

					$tmp = $opciones;//asigna a temporal los datos del input
					foreach ($model->contactosUsersMenus as $saved) //revisa si hay cambios
						if ($saved['um_mn_id'] == $opciones['um_mn_id']) {
							$tmp = null;
							//if (isset($saved['um_st']) && isset($opciones['um_st']))
								if ($saved['um_st'] != $opciones['um_st'] || $saved['um_permisos'] != $permisos) {

									$tmp = $saved; //si no hay cambios, asigna el mismo dato anterior

									if ($saved['um_st'] != $opciones['um_st']) $tmp['um_st'] = $opciones['um_st'];

									if ($saved['um_permisos'] != $permisos) $tmp['um_permisos'] = $permisos;



									$tmp['um_us_us_id'] = $opciones['um_us_us_id'];
									$tmp['um_dt'] = $opciones['um_dt'];
								}
							break;
						}

					if ($tmp)
						$ContactosUsersMenu[] = $tmp;
						*/
				}
			}

			$mn_ids = substr($mn_ids,0,-1);

			/*
			if (!empty($mn_ids)) {
				//borra todos los que no fueron marcados
				$del=ContactosUsersMenu::model()->findall("id_usuario = '{$model->id_usuario}' AND um_mn_id NOT IN ($mn_ids)");
				foreach ($del as $mustdel) {
					$mustdelmodel=ContactosUsersMenu::model()->findByPk($mustdel->um_id);
					$mustdelmodel->delete();
				}
			}

			foreach ($ContactosUsersMenu as $opciones) {

				if (isset($opciones['um_id']))
					$updated = ContactosUsersMenu::model()->findByPk($opciones['um_id']);
				else
					$updated = new ContactosUsersMenu;

				$updated->id_usuario = $model->id_usuario;
				$updated->um_mn_id = $opciones['um_mn_id'];
				$updated->um_st = $opciones['um_st'];

				$updated->um_permisos = $opciones['um_permisos'];
				$updated->um_dt = $opciones['um_dt'];
				$updated->um_us_us_id = $opciones['um_us_us_id'];
				$updated->save();
			}
*/

			//$this->redirect(array('menu','id'=>$model->id_usuario));
		}




		$menues = VwContactosMenu::getChilds3(1,$model->level);
		$grid = array();
		$c = 0;

		/*echo "<pre>";
		print_r($menues);
		echo "</pre>";*/

		if (empty($model->contactosUsersMenus))
			$model->contactosUsersMenus = ContactosUsersMenu::model()->findAll("id_usuario=".$model->id_usuario);

		foreach ($menues as $i => $items) {

			$grid[] = $this->ModelArray(1,$c,$items,$model->contactosUsersMenus,$model->id_usuario);
			if (isset($items['children']))
				foreach ($items['children'] as $k => $opcion) {
					$grid[] = $this->ModelArray(2,$c,$opcion,$model->contactosUsersMenus,$model->id_usuario);
					if (isset($opcion['children'])) {
						foreach ($opcion['children'] as $l => $opcion2) {
							$grid[] = $this->ModelArray(3,$c,$opcion2,$model->contactosUsersMenus,$model->id_usuario);
						}
					}
				}
		}

		$gridDataProvider = new CArrayDataProvider($grid,array('pagination' => array('pageSize'=>count($grid))));

		$this->render('menu',array(
			'model'=>$model,
			'gridDataProvider'=>$gridDataProvider,
		));



	}









	public function actionDivision($id)
	{
		$model=$this->loadModel($id);

		$this->render('division',array(
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
		$model=UsuariosEmpresas::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuarios-empresas-form')
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
		if(isset(Yii::app()->session['UsuariosEmpresas_records']))
			$criteria['criteria'] = Yii::app()->session['UsuariosEmpresas_records'];
		$criteria['pagination'] = array('pageSize'=>UsuariosEmpresas::model()->count());
		$model = new CActiveDataProvider('UsuariosEmpresas',$criteria);

		Yii::app()->request->sendFile('UsuariosEmpresas_'.date('YmdHis').'.xls',
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
		if(isset(Yii::app()->session['UsuariosEmpresas_records']))
			$criteria['criteria'] = Yii::app()->session['UsuariosEmpresas_records'];
		$criteria['pagination'] = array('pageSize'=>UsuariosEmpresas::model()->count());
		$model = new CActiveDataProvider('UsuariosEmpresas',$criteria);

								//$orientation,$format,$langue,$unicode,$encoding,$marges
		$html2pdf = Yii::app()->ePdf->HTML2PDF('P','A4','en',true,'UTF-8',array(5,5,5,5));
       	$html2pdf->pdf->SetTitle('PDF_UsuariosEmpresas');
       	$html2pdf->pdf->SetDisplayMode('fullpage');
        $html = $this->renderPartial('reportPdf', array('model'=>$model,'title'=>'UsuariosEmpresas'), true);
        $html2pdf->WriteHTML($html);
        $html2pdf->Output('UsuariosEmpresas_'.date('YmdHis').'.pdf');
	}

}
