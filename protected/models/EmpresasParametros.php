<?php

/**
 * This is the model class for table "empresas_parametros".
 *
 * The followings are the available columns in table 'empresas_parametros':
 * @property integer $id
 * @property string $country
 * @property string $nit
 * @property string $nombre_empresa
 * @property string $direccion
 * @property string $telefonos
 * @property string $home_page
 * @property string $fact_elect_email
 * @property string $fact_elect_codigo
 * @property string $logo
 * @property boolean $activo
 * @property integer $creacion_user
 * @property string $creacion_date
 * @property integer $modifica_user
 * @property string $modifica_date
 * @property boolean $trackactivo
 * @property integer $trackpuerto
 * @property string $trackmailserver
 * @property integer $trackauth
 * @property string $trackfromaddress
 * @property string $trackpassword
 * @property string $ocean_error_reporting_mail
 * @property string $ocean_idioma_id
 * @property integer $ocean_dias_notificar_arribo
 * @property string $ocean_factor_riesgo_pais
 * @property string $insurance_codigo
 * @property string $dominio
 * @property string $firma
 * @property string $manifest_emisor
 * @property string $manifest_codigo
 * @property string $manifest_tipo
 * @property string $manifest_pass
 * @property string $ftp_server
 * @property string $ftp_user
 * @property string $ftp_pass
 * @property string $fact_elect_certname
 * @property string $fact_elect_certpass
 * @property boolean $fact_elect_dev
 * @property string $fact_elect_user
 * @property string $fact_elect_pass
 */
class EmpresasParametros extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empresas_parametros';
	}

	public $logoupdate;
	public $krichtexteditor;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('country, nit, nombre_empresa, direccion, activo', 'required'),			
			array('creacion_user, modifica_user, trackpuerto, trackauth, ocean_dias_notificar_arribo', 'numerical', 'integerOnly'=>true),
			array('country, manifest_tipo', 'length', 'max'=>5),
			array('nit, telefonos, ocean_error_reporting_mail, manifest_emisor, manifest_codigo', 'length', 'max'=>50),
			array('nombre_empresa, fact_elect_email, trackfromaddress, fact_elect_user', 'length', 'max'=>100),
			array('home_page, dominio, firma, fact_elect_certname', 'length', 'max'=>60),
			array('fact_elect_codigo, insurance_codigo, manifest_pass, ftp_server, ftp_user, ftp_pass, fact_elect_certpass, fact_elect_pass', 'length', 'max'=>30),

			array('trackpassword', 'length', 'max'=>100),
			
			array('trackmailserver', 'length', 'max'=>40),
			array('ocean_idioma_id', 'length', 'max'=>2),
			array('ocean_factor_riesgo_pais', 'length', 'max'=>10),
			array('direccion, logo, activo, creacion_date, modifica_date, trackactivo, fact_elect_dev', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, country, nit, nombre_empresa, direccion, telefonos, home_page, fact_elect_email, fact_elect_codigo, logo, activo, creacion_user, creacion_date, modifica_user, modifica_date, trackactivo, trackpuerto, trackmailserver, trackauth, trackfromaddress, trackpassword, ocean_error_reporting_mail, ocean_idioma_id, ocean_dias_notificar_arribo, ocean_factor_riesgo_pais, insurance_codigo', 'safe', 'on'=>'search'),
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
			'plantillas' => array(self::HAS_MANY, 'EmpresasPlantillas', '', 'foreignKey' => array('country'=>'country'), 'condition'=>"activo = 'true'", 'order'=>'country, sistema, titulo'),	
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'country' => 'Country',
			'nit' => 'Nit',
			'nombre_empresa' => 'Nombre Empresa',
			'direccion' => 'Direccion',
			'telefonos' => 'Telefonos',
			'home_page' => 'Home Page',
			'fact_elect_email' => 'Fact Elect Email',
			'fact_elect_codigo' => 'Fact Elect Codigo',
			'logo' => 'Logo',
			'activo' => 'Activo',
			'creacion_user' => 'Creacion User',
			'creacion_date' => 'Creacion Date',
			'modifica_user' => 'Modifica User',
			'modifica_date' => 'Modifica Date',
			'trackactivo' => 'Activo',
			'trackpuerto' => 'Puerto',
			'trackmailserver' => 'Mailserver',
			'trackauth' => 'Auth',
			'trackfromaddress' => 'From Address',
			'trackpassword' => 'Password',
			'ocean_error_reporting_mail' => 'Ocean Error Reporting Mail',
			'ocean_idioma_id' => 'Ocean Idioma',
			'ocean_dias_notificar_arribo' => 'Ocean Dias Notificar Arribo',
			'ocean_factor_riesgo_pais' => 'Ocean Factor Riesgo Pais',
			'insurance_codigo' => 'Insurance Codigo',
			'dominio' => 'Dominio',
			'firma' => 'Firma',			
			'manifest_emisor' => 'Manifest Emisor',
			'manifest_codigo' => 'Manifest Codigo',
			'manifest_tipo' => 'Manifest Tipo',
			'manifest_pass' => 'Manifest Pass',
			'ftp_server' => 'Ftp Server',
			'ftp_user' => 'Ftp User',
			'ftp_pass' => 'Ftp Pass',
			'fact_elect_certname' => 'Certificate Name',
			'fact_elect_certpass' => 'Certificate Pass',
			'fact_elect_dev' => 'Mode',
			'fact_elect_user' => 'User',
			'fact_elect_pass' => 'Pass',			
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

		$criteria->compare('id',$this->id);
		$criteria->compare('country',$this->country,true,'ILIKE');
		$criteria->compare('nit',$this->nit,true,'ILIKE');
		$criteria->compare('nombre_empresa',$this->nombre_empresa,true,'ILIKE');
		$criteria->compare('direccion',$this->direccion,true,'ILIKE');
		$criteria->compare('telefonos',$this->telefonos,true,'ILIKE');
		$criteria->compare('home_page',$this->home_page,true,'ILIKE');
		$criteria->compare('fact_elect_email',$this->fact_elect_email,true,'ILIKE');
		$criteria->compare('fact_elect_codigo',$this->fact_elect_codigo,true,'ILIKE');
		$criteria->compare('logo',$this->logo,true,'ILIKE');
		$criteria->compare('activo',$this->activo);
		$criteria->compare('creacion_user',$this->creacion_user);
		$criteria->compare('creacion_date',$this->creacion_date,true,'ILIKE');
		$criteria->compare('modifica_user',$this->modifica_user);
		$criteria->compare('modifica_date',$this->modifica_date,true,'ILIKE');
		$criteria->compare('trackactivo',$this->trackactivo);
		$criteria->compare('trackpuerto',$this->trackpuerto);
		$criteria->compare('trackmailserver',$this->trackmailserver,true,'ILIKE');
		$criteria->compare('trackauth',$this->trackauth);
		$criteria->compare('trackfromaddress',$this->trackfromaddress,true,'ILIKE');
		$criteria->compare('trackpassword',$this->trackpassword,true,'ILIKE');
		$criteria->compare('ocean_error_reporting_mail',$this->ocean_error_reporting_mail,true,'ILIKE');
		$criteria->compare('ocean_idioma_id',$this->ocean_idioma_id,true,'ILIKE');
		$criteria->compare('ocean_dias_notificar_arribo',$this->ocean_dias_notificar_arribo);
		$criteria->compare('ocean_factor_riesgo_pais',$this->ocean_factor_riesgo_pais,true,'ILIKE');
		$criteria->compare('insurance_codigo',$this->insurance_codigo,true,'ILIKE');
		$criteria->compare('dominio',$this->dominio,true,'ILIKE');		
		$criteria->compare('firma',$this->firma,true,'ILIKE');
		$criteria->compare('manifest_emisor',$this->manifest_emisor,true,'ILIKE');
		$criteria->compare('manifest_codigo',$this->manifest_codigo,true,'ILIKE');
		$criteria->compare('manifest_tipo',$this->manifest_tipo,true,'ILIKE');
		$criteria->compare('manifest_pass',$this->manifest_pass,true,'ILIKE');
		$criteria->compare('ftp_server',$this->ftp_server,true,'ILIKE');
		$criteria->compare('ftp_user',$this->ftp_user,true,'ILIKE');
		$criteria->compare('ftp_pass',$this->ftp_pass,true,'ILIKE');
		$criteria->compare('fact_elect_certname',$this->fact_elect_certname,true,'ILIKE');
		$criteria->compare('fact_elect_certpass',$this->fact_elect_certpass,true,'ILIKE');
		$criteria->compare('fact_elect_dev',$this->fact_elect_dev);
		$criteria->compare('fact_elect_user',$this->fact_elect_user,true,'ILIKE');
		$criteria->compare('fact_elect_pass',$this->fact_elect_pass,true,'ILIKE');		
		Yii::app()->session['EmpresasParametros_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,			
			'sort'=>array(
			    'defaultOrder'=>'id ASC',
			),				
		    'pagination'=>array(
		        'pageSize'=>10,
		    ),				
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EmpresasParametros the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
