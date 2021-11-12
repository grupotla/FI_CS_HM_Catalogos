<?php

/**
 * This is the model class for table "usuarios_empresas".
 *
 * The followings are the available columns in table 'usuarios_empresas':
 * @property string $id_usuario
 * @property string $pw_name
 * @property string $pw_passwd
 * @property integer $pw_uid
 * @property integer $pw_gid
 * @property string $pw_gecos
 * @property string $pw_dir
 * @property string $pw_shell
 * @property integer $tipo_usuario
 * @property string $pais
 * @property string $dominio
 * @property integer $level
 * @property integer $pw_activo
 * @property string $pw_codigo_tributario
 * @property integer $pw_correo
 * @property integer $id_usuario_reg
 * @property string $modificado
 * @property string $locode
 * @property integer $planilla_numero
 * @property string $pw_ultimo_acceso
 * @property integer $pw_passwd_dias
 * @property string $pw_passwd_fecha
 * @property string $pw_user_ip
 * @property integer $pw_sis_id
 *
 * The followings are the available model relations:
 * @property UsuariosEmpresasPasswds[] $usuariosEmpresasPasswds
 * @property UsuariosEmpresasLog[] $usuariosEmpresasLogs
 * @property Catalogos[] $catalogoses
 * @property DefinicionUsuario $tipoUsuario
 * @property UsuariosEmpresas $idUsuarioReg
 * @property UsuariosEmpresas[] $usuariosEmpresases
 * @property UsuariosPaises $pais0
 * @property Routings[] $routings
 * @property PerfilesUsuariosEmpresas $perfilesUsuariosEmpresas
 * @property NavierasCredito[] $navierasCreditos
 * @property CreditosClientes[] $creditosClientes
 * @property Creditos[] $creditoses
 * @property Creditos[] $creditoses1
 * @property CarriersCredito[] $carriersCreditos
 * @property Avisos[] $avisoses
 * @property Agentes[] $agentes
 * @property Agentes[] $agentes1
 * @property ContactosUsersMenu[] $contactosUsersMenus
 */
class UsuariosEmpresas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios_empresas';
	}

    public $valuador_id;

	public function primaryKey(){
        return 'id_usuario';
    }	
    
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		
			//array(Yii::app()->session['permisos'][Yii::app()->controller->id]['fields'], 'disabled'),
		
			array('pw_name, pais, pw_ultimo_acceso', 'required'),
			array('pw_uid, pw_gid, tipo_usuario, level, pw_activo, pw_correo, id_usuario_reg, planilla_numero, pw_passwd_dias, pw_sis_id', 'numerical', 'integerOnly'=>true),
			array('pw_name', 'length', 'max'=>32),
			array('pw_passwd', 'length', 'max'=>40),
			array('pw_gecos', 'length', 'max'=>48),
			array('pw_dir', 'length', 'max'=>160),
			array('pw_shell', 'length', 'max'=>20),
			array('pais', 'length', 'max'=>5),
			array('dominio, pw_codigo_tributario', 'length', 'max'=>30),
			array('locode', 'length', 'max'=>3),
			array('pw_user_ip', 'length', 'max'=>15),
			array('modificado, pw_passwd_fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_usuario, pw_name, pw_passwd, pw_uid, pw_gid, pw_gecos, pw_dir, pw_shell, tipo_usuario, pais, dominio, level, pw_activo, pw_codigo_tributario, pw_correo, id_usuario_reg, modificado, locode, planilla_numero, pw_ultimo_acceso, pw_passwd_dias, pw_passwd_fecha, pw_user_ip, pw_sis_id', 'safe', 'on'=>'search'),
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
			'usuariosEmpresasPasswds' => array(self::HAS_MANY, 'UsuariosEmpresasPasswds', 'id_usuario'),
			'usuariosEmpresasLogs' => array(self::HAS_MANY, 'UsuariosEmpresasLog', 'user_id'),
			'catalogoses' => array(self::MANY_MANY, 'Catalogos', 'usuarios_catalogos(id_usuario, id_catalogo)'),
			'tipoUsuario' => array(self::BELONGS_TO, 'DefinicionUsuario', 'tipo_usuario'),
			'idUsuarioReg' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'id_usuario_reg'),
			'usuariosEmpresases' => array(self::HAS_MANY, 'UsuariosEmpresas', 'id_usuario_reg'),
			'pais0' => array(self::BELONGS_TO, 'UsuariosPaises', 'pais'),
			'routings' => array(self::HAS_MANY, 'Routings', 'vendedor_id'),
			'perfilesUsuariosEmpresas' => array(self::HAS_ONE, 'PerfilesUsuariosEmpresas', 'id_usuario'),
			'navierasCreditos' => array(self::HAS_MANY, 'NavierasCredito', 'id_usuario'),
			'creditosClientes' => array(self::HAS_MANY, 'CreditosClientes', 'id_usuario'),
			'creditoses' => array(self::HAS_MANY, 'Creditos', 'id_usuario_autoriza'),
			'creditoses1' => array(self::HAS_MANY, 'Creditos', 'id_usuario_crea'),
			'carriersCreditos' => array(self::HAS_MANY, 'CarriersCredito', 'id_usuario'),
			'avisoses' => array(self::HAS_MANY, 'Avisos', 'id_usuario'),
			'agentes' => array(self::HAS_MANY, 'Agentes', 'id_usuario_creacion'),
			'agentes1' => array(self::HAS_MANY, 'Agentes', 'id_usuario_modificacion'),
			'contactosUsersMenus' => array(self::HAS_MANY, 'ContactosUsersMenu', 'id_usuario'),
			
			'divisiones' => array(self::HAS_MANY, 'ContactosDivisiones', '', 'foreignKey' => array('id_catalogo'=>'id_usuario'),'condition'=>"catalogo = 'USUARIO'", 'order'=>'id ASC'),
			
						
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usuario' => 'Id Usuario',
			'pw_name' => 'Login',
			'pw_passwd' => 'Passwd',
			'pw_uid' => 'Uid',
			'pw_gid' => 'Gid',
			'pw_gecos' => 'Nombre Usuario',
			'pw_dir' => 'Dir',
			'pw_shell' => 'Shell',
			'tipo_usuario' => 'Tipo',
			'pais' => 'Pais',
			'dominio' => 'Dominio',
			'level' => 'Level',
			'pw_activo' => 'Activo',
			'pw_codigo_tributario' => 'Codigo Tributario',
			'pw_correo' => 'Correo',
			'id_usuario_reg' => 'Id Usuario Reg',
			'modificado' => 'Modificado',
			'locode' => 'Locode',
			'planilla_numero' => 'Planilla Numero',
			'pw_ultimo_acceso' => 'Ultimo Acceso',
			'pw_passwd_dias' => 'Passwd Dias',
			'pw_passwd_fecha' => 'Passwd Fecha',
			'pw_user_ip' => 'User Ip',
			'pw_sis_id' => 'Sis',
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

		/*if(isset(Yii::app()->session['UsuariosEmpresas_records'])) {
			
			$criteria = Yii::app()->session['UsuariosEmpresas_records'];
			
		} else {*/
			

		$criteria=new CDbCriteria;
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('pw_name',$this->pw_name,true,'ILIKE');
		$criteria->compare('pw_passwd',$this->pw_passwd,true,'ILIKE');
		$criteria->compare('pw_uid',$this->pw_uid);
		$criteria->compare('pw_gid',$this->pw_gid);
		$criteria->compare('pw_gecos',$this->pw_gecos,true,'ILIKE');
		$criteria->compare('pw_dir',$this->pw_dir,true,'ILIKE');
		$criteria->compare('pw_shell',$this->pw_shell,true,'ILIKE');
		$criteria->compare('tipo_usuario',$this->tipo_usuario);
		$criteria->compare('pais',$this->pais,true);
		$criteria->compare('dominio',$this->dominio,true,'ILIKE');
		$criteria->compare('level',$this->level);
		$criteria->compare('pw_activo',$this->pw_activo);
		$criteria->compare('pw_codigo_tributario',$this->pw_codigo_tributario,true,'ILIKE');
		$criteria->compare('pw_correo',$this->pw_correo);
		$criteria->compare('id_usuario_reg',$this->id_usuario_reg);
		$criteria->compare('modificado',$this->modificado,true,'ILIKE');
		$criteria->compare('locode',$this->locode,true,'ILIKE');
		$criteria->compare('planilla_numero',$this->planilla_numero);
		$criteria->compare('pw_ultimo_acceso',$this->pw_ultimo_acceso,true);
		$criteria->compare('pw_passwd_dias',$this->pw_passwd_dias);
		$criteria->compare('pw_passwd_fecha',$this->pw_passwd_fecha,true);
		$criteria->compare('pw_user_ip',$this->pw_user_ip,true);
		$criteria->compare('pw_sis_id',$this->pw_sis_id);
		//$criteria->condition = "";		
		//$criteria->order = "";
		
		//}			
				
		Yii::app()->session['UsuariosEmpresas_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'id_usuario ASC',
			),						
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsuariosEmpresas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/*
	public function validatePassword($password)
	{	
		return md5($password)===$this->pw_passwd || $password===$this->pw_passwd; 
	}
	*/	
	/*
    public function behaviors()
    {
        return array('ESaveRelatedBehavior' => array(
                'class' => 'application.components.ESaveRelatedBehavior')
        );
    }
    */	
	
}
