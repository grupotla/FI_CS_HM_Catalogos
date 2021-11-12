<?php

/**
 * This is the model class for table "contactos_users_menu".
 *
 * The followings are the available columns in table 'contactos_users_menu':
 * @property integer $um_id
 * @property integer $id_usuario
 * @property integer $um_mn_id
 * @property string $um_st
 * @property integer $um_us_us_id
 * @property string $um_dt
 * @property string $um_fields
 * @property string $um_permisos
 *
 * The followings are the available model relations:
 * @property UsuariosEmpresas $idUsuario
 * @property ContactosMenu $umMn
 * @property ContactosEnums $umSt
 */
class ContactosUsersMenu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contactos_users_menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario, um_mn_id, um_us_us_id', 'numerical', 'integerOnly'=>true),
			array('um_st, um_dt, um_fields, um_permisos', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('um_id, id_usuario, um_mn_id, um_st, um_us_us_id, um_dt, um_fields, um_permisos', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idUsuario' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'id_usuario'),
			'umMn' => array(self::BELONGS_TO, 'ContactosMenu', 'um_mn_id'),
			'umSt' => array(self::BELONGS_TO, 'ContactosEnums', 'um_st'),
		);
	}






		public static function YiiLog($controller,$action,$post,$get,$pk="",$pkv="") {

			if (isset($post)) {
				if (isset($post['LoginForm']['password']))	unset($post['LoginForm']['password']);
				if (isset($post['yt0']))										unset($post['yt0']);
				if (isset($post['ajax']))										unset($post['ajax']);
				if (!empty($post)) {
					if ($action == "create" && !empty($pk))
						$post[ucfirst($controller)][$pk] = $pkv;
					$post = json_encode($post);
				}
				else
					$post = "";
			}


			if (isset($get)) {
				if (!empty($get))
					$get = json_encode($get);
			}

			$sql = "insert into yiicatalogolog (fecha,user_id,user_nom,ip,controller,action,post,get) values (now(),".Yii::app()->user->id.",'".Yii::app()->session['usr_nm']."','".$_SERVER['REMOTE_ADDR']."','$controller','$action','$post','$get');";
			//echo "$sql<br><br>";
			//echo '<script>console.log("'.$sql.'");</script>';
			try {
				if (!empty($post))
					Yii::app()->db->createCommand($sql)->execute();
			} catch(Exception $e){
					//print_r($e);
			}
		}


	public static function ControllerActionsSet2($id_menu, $admin_actions=array(), $user_actions=array()) {

		//if (empty(Yii::app()->user->id))
			//$this->redirect(array('/site/logout'));

/*
		$arr_log = array();
		$arr_log['mn'] = $id_menu;
		$arr_log['ctrl'] = Yii::app()->controller->id;
		$arr_log['action'] = Yii::app()->controller->action->id;
		$arr_log['ip'] = $_SERVER['REMOTE_ADDR'];
		$arr_log['id'] = intval(Yii::app()->user->id);
		$arr_log['nm'] = Yii::app()->session['usr_nm'];

		if (isset($_POST)) {
			$post = $_POST;
			if (isset($post['LoginForm']['password']))
				unset($post['LoginForm']['password']); //en caso de autorizacion o login no mostrara el password
			$arr_log['post'] = json_encode($post);
		}

		if (isset($_GET))
			$arr_log['get'] = json_encode($_GET); //todas las llamadas url

		Yii::log(json_encode($arr_log), CLogger::LEVEL_INFO, 'hoy');
*/


		//aqui va directo los permisos por controller
		$p['panel'] = '';
		$p['create'] = 0;
		$p['update'] = 0;
		$p['auth'] = 0;
		$p['pdf'] = 0;
		$p['excel'] = 0;
		$p['admin'] = 0;
		$p['delete'] = 0;
		$p['activo'] = 0;
		
		
		

		$ctrl = strtolower(Yii::app()->controller->id);
		$ctrl = Yii::app()->controller->id;
		
		$campos = "";
		$arr_permisos = array();

		$menu=ContactosMenu::model()->findByPk($id_menu);
		

		if (!$menu) {
				
			if (Yii::app()->user->name == "admin") {
											
				$arr_permisos[$ctrl][$ctrl]['create'] = 1;
				$arr_permisos[$ctrl][$ctrl]['update'] = 1;
				$arr_permisos[$ctrl][$ctrl]['auth'] = 1;
				$arr_permisos[$ctrl][$ctrl]['pdf'] = 1;
				$arr_permisos[$ctrl][$ctrl]['excel'] = 1;
				$arr_permisos[$ctrl][$ctrl]['admin'] = 1;
				$arr_permisos[$ctrl][$ctrl]['delete'] = 1;
				$arr_permisos[$ctrl][$ctrl]['activo'] = 1;								

				//aqui va directo los permisos por controller
				$p['panel'] = "*";
				$p['create'] = 1;
				$p['update'] = 1;
				$p['auth'] = 1;
				$p['pdf'] = 1;
				$p['excel'] = 1;
				$p['admin'] = 1;
				$p['delete'] = 1;
				$p['activo'] = 1;
								
			} else {

				$criterio = "UPPER(mn_control) = UPPER('$ctrl') AND UPPER(mn_title_long) = UPPER('$ctrl')";
				
				$menu = ContactosMenu::model()->find($criterio);
				if ($menu) {
					$id_menu = $menu->mn_id;
				}					

				//echo "<br><br><br><br><br><br><br><br><br>($id_menu)***".$criterio;
				//echo "<script>console.log(" . $criterio . ");</script>";
				//die();
				
			}

		}



				

		if ($menu) {
			
			//si necesita valida paneles, leera opcion y sus paneles

			if ($menu->mn_viewer == 'panel') 
				$id_menu = $menu->mn_parent;

			$criterio = "(mn_id = '$id_menu') OR (mn_parent = '$id_menu' AND mn_viewer = 'panel')";
	
			$menu = ContactosMenu::model()->findAll(array("condition"=>$criterio,"order"=>"mn_sort"));
			foreach ($menu as $opcion) {

				unset($permisos);
				$um_st = 0;

				if (Yii::app()->user->name == "admin") {
					$permisos = '1111111'; //admin full permisos
					$um_st = 1;
				} else {
					
					$criterio = "id_usuario = '".intval(Yii::app()->user->id)."' AND um_mn_id = '{$opcion->mn_id}'";
					
					$row = ContactosUsersMenu::model()->find(array("condition"=>$criterio,"order"=>""));

					if ($row)	{
						$um_st = $row->um_st == 'Activo' ? 1 : 0;
						$permisos = $row->um_permisos;
					}
				}
				
				$mn_control = strtolower($opcion->mn_control);
				$mn_title_long = strtolower($opcion->mn_title_long);
				
				$mn_control = ($opcion->mn_control);
				$mn_title_long = ($opcion->mn_title_long);
				

				if (!isset($arr_permisos[$mn_control]['fields']))
					$arr_permisos[$mn_control]['fields'] = "";

				if (isset($permisos)) {
					
					
			//echo "<br><br><br><br><br><br><br><br><br>(".$mn_control.")($um_st)***".$permisos;
			//die();
										

					if ($ctrl == $mn_control && $ctrl == $mn_title_long) { //guarda los permisos del controller actual
						$arr_permisos[$mn_control][$mn_title_long]['main'] = 1;
						
						if (Yii::app()->user->name == "user") {
							
							if ($permisos[0] == 1) $user_actions[] = 'create';
							if ($permisos[1] == 1) $user_actions[] = 'update';
							//if ($permisos[2] == 1) $user_actions[] = ''; auth no genera vista
							if ($permisos[3] == 1) $user_actions[] = 'GeneratePdf';
							if ($permisos[4] == 1) $user_actions[] = 'GenerateExcel';
							//if ($permisos[5] == 1) $user_actions[] = ''; admin no genera vista

							if (isset($permisos[6]))
								if ($permisos[6] == 1) $user_actions[] = 'delete';

							//if ($um_st == 1) $user_actions[] = 'delete'; //Activo Inactivo del mn_users

							if ($um_st == 1) $user_actions[] = 'modify'; //si esta activo
						}

						//para habilitar botones en las vistas
						$p['panel'] = $opcion->mn_title_short;
						$p['create'] = $permisos[0];
						$p['update'] = $permisos[1];
						$p['auth'] = $permisos[2];
						$p['pdf'] = $permisos[3];
						$p['excel'] = $permisos[4];

						if (isset($permisos[5]))
							$p['admin'] = $permisos[5];

						if (isset($permisos[6]))
							$p['delete'] = $permisos[6];

						$p['activo'] = $um_st;
					}

					//echo "(".$ctrl.")(".$mn_control.")(".$mn_title_long.")(".$p['panel'].")<br>";


					//leer los campos disponibles para usuario
					$arr_permisos[$mn_control][$mn_title_long]['panel'] = $opcion->mn_title_short;

					//aun sirven para child's admin
					$arr_permisos[$mn_control][$mn_title_long]['create'] 	= $permisos[0];
					$arr_permisos[$mn_control][$mn_title_long]['update'] 	= $permisos[1];
					$arr_permisos[$mn_control][$mn_title_long]['auth'] 		= $permisos[2];
					$arr_permisos[$mn_control][$mn_title_long]['pdf'] 		= $permisos[3];
					$arr_permisos[$mn_control][$mn_title_long]['excel'] 	= $permisos[4];
					if (isset($permisos[5]))
						$arr_permisos[$mn_control][$mn_title_long]['admin'] 	= $permisos[5];//solo en clientes para habilitar los iconos de editar nombre, facturar y nit
					else
						$arr_permisos[$mn_control][$mn_title_long]['admin'] 	= 0;

					if (isset($permisos[6]))
						$arr_permisos[$mn_control][$mn_title_long]['delete'] 	= $permisos[6];//se utiliza mas en los child_admin
					else
						$arr_permisos[$mn_control][$mn_title_long]['delete'] 	= 0;

					$arr_permisos[$mn_control][$mn_title_long]['activo'] 	= $um_st;//se usara para bloquear acceso a los paneles

					if ($opcion->mn_viewer == 'panel')
					switch (Yii::app()->controller->action->id) {
						case "create":
							if ($permisos[0] == 0) {
								$arr_permisos[$mn_control]['fields'] .= $opcion->mn_fields;
								$campos .= $opcion->mn_fields;
							}
							break;
						case "update":
							if ($permisos[1] == 0) {
								$arr_permisos[$mn_control]['fields'] .= $opcion->mn_fields;
								$campos .= $opcion->mn_fields;
							}
							break;
						case "modify": //por el momento solo en clientes
								$arr_permisos[$mn_control]['fields'] .= $opcion->mn_fields;
								$campos .= $opcion->mn_fields;
							break;
					}

				} else {

					//aqui va un array de todos los panesles de distintos controllers
					$arr_permisos[$mn_control][$mn_title_long]['panel'] = '';
					$arr_permisos[$mn_control][$mn_title_long]['create'] = 0;
					$arr_permisos[$mn_control][$mn_title_long]['update'] = 0;
					$arr_permisos[$mn_control][$mn_title_long]['auth'] = 0;
					$arr_permisos[$mn_control][$mn_title_long]['pdf'] = 0;
					$arr_permisos[$mn_control][$mn_title_long]['excel'] = 0;
					$arr_permisos[$mn_control][$mn_title_long]['admin'] = 0;
					$arr_permisos[$mn_control][$mn_title_long]['delete'] = 0;
					$arr_permisos[$mn_control][$mn_title_long]['activo'] = 0;
				}
			}
		}

		Yii::app()->session['p'] = $p;

		//echo "<script>console.log('$campos');</script>";

		//echo "<script>console.log('".json_encode($user_actions)."');</script>";

		if (empty(Yii::app()->session['p']['panel'])) {
			/*
			echo "<pre>";
			print_r($arr_permisos);
			echo "<pre>";
			die();
			*/
			return array(
				array('deny',  // deny all users
					'users'=>array('*'),
				),
			);
		}

		Yii::app()->session['permisos'] = $arr_permisos;

		if (Yii::app()->user->name == "user") {
			$user_actions[] = 'index';
			$user_actions[] = 'view';
			$user_actions[] = 'admin';
		} else {
			$admin_actions[] = 'create';
			$admin_actions[] = 'update';
			$admin_actions[] = 'GenerateExcel';
			$admin_actions[] = 'GeneratePdf';
			$admin_actions[] = 'index';
			$admin_actions[] = 'view';
			$admin_actions[] = 'admin';
		}

		//die();
/*		
		echo "<pre>";
		print_r($admin_actions);
		echo "</pre>";
		
		echo "<pre>";
		print_r($user_actions);
		echo "</pre>";
		
		die();
*/
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>$admin_actions,
				'users'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>$user_actions,
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);



	}









	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'um_id' => 'Id UM',
			'id_usuario' => 'Id Usuario',
			'um_mn_id' => 'Id Menu',
			'um_st' => 'Status',
			'um_us_us_id' => 'Usuario',
			'um_dt' => 'Fecha',
			'um_fields' => 'Campos',
			'um_permisos' => 'Permisos',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('um_id',$this->um_id);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('um_mn_id',$this->um_mn_id);
		$criteria->compare('um_st',$this->um_st,true);
		$criteria->compare('um_us_us_id',$this->um_us_us_id);
		$criteria->compare('um_dt',$this->um_dt,true);
		$criteria->compare('um_fields',$this->um_fields,true);
		$criteria->compare('um_permisos',$this->um_permisos,true);
		//$criteria->condition = "";
		//$criteria->order = "";



		Yii::app()->session['ContactosUsersMenu_records'] = $criteria;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ContactosUsersMenu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/*
    public function behaviors()
    {
        return array('ESaveRelatedBehavior' => array(
                'class' => 'application.components.ESaveRelatedBehavior')
        );
    }
    */

}
