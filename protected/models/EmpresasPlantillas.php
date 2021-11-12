<?php

/**
 * This is the model class for table "empresas_plantillas".
 *
 * The followings are the available columns in table 'empresas_plantillas':
 * @property integer $id
 * @property string $country
 * @property string $logo
 * @property string $edicion
 * @property string $titulo
 * @property string $nombre_empresa
 * @property string $nit
 * @property string $sistema
 * @property string $direccion
 * @property boolean $activo
 * @property integer $creacion_user
 * @property string $creacion_date
 * @property integer $modifica_user
 * @property string $modifica_date
 * @property string $correo_fact_electronica
 * @property string $codigo_fact_electronica
 * @property string $telefonos
 * @property string $excountry
 * @property string $coloader
 * @property string $observaciones
 * @property string $doc_id
 * @property boolean $trackactivo
 * @property integer $trackpuerto
 * @property string $trackmailserver
 * @property integer $trackauth
 * @property string $trackfromaddress
 * @property string $trackpassword
 * @property string $ocean_requerimiento_partidas
 * @property string $ocean_cuentas_bancarias
 * @property integer $ocean_id_naviera
 * @property integer $logo_alto
 * @property integer $logo_ancho
 * @property string $ocean_codigo_iso 
 * 
 */
class EmpresasPlantillas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empresas_plantillas';
	}

	public $krichtexteditor;
	public $country_disabled;
	public $flag;


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('country, sistema, doc_id, activo', 'required'),
			array('creacion_user, modifica_user, trackpuerto, trackauth, ocean_id_naviera, logo_alto, logo_ancho', 'numerical', 'integerOnly'=>true),
			array('country, excountry', 'length', 'max'=>5),
			array('logo, nit, telefonos', 'length', 'max'=>50),
			array('edicion, sistema, codigo_fact_electronica, trackpassword', 'length', 'max'=>30),
			array('titulo, nombre_empresa, correo_fact_electronica, coloader, trackfromaddress', 'length', 'max'=>100),
			array('doc_id', 'length', 'max'=>10),
			array('trackmailserver', 'length', 'max'=>40),
			array('ocean_codigo_iso', 'length', 'max'=>20),
			array('direccion, activo, creacion_date, modifica_date, observaciones, trackactivo, ocean_requerimiento_partidas, ocean_cuentas_bancarias', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, country, logo, edicion, titulo, nombre_empresa, nit, sistema, direccion, activo, creacion_user, creacion_date, modifica_user, modifica_date, correo_fact_electronica, codigo_fact_electronica, telefonos, excountry, coloader, observaciones, doc_id, trackactivo, trackpuerto, trackmailserver, trackauth, trackfromaddress, trackpassword', 'safe', 'on'=>'search'),
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
			//'docs2' => array(self::BELONGS_TO, 'EmpresasPlantillasDocs', '', 'foreignKey' => array('country'=>'country'), 'condition'=>"activo = 'true'", 'order'=>'country ASC'),	
			'docs' => array(self::BELONGS_TO, 'EmpresasPlantillasDocs', '', 'foreignKey' => array('doc_id'=>'doc_id')),				
			'datos' => array(self::HAS_MANY, 'EmpresasPlantillasDatos', '', 'foreignKey' => array('country'=>'country', 'sistema'=>'sistema', 'doc_id'=>'doc_id'), 'order'=>'id_direccion ASC'),
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
			'logo' => 'Logo',
			'edicion' => 'Edicion',
			'titulo' => 'Titulo',
			'nombre_empresa' => 'Nombre Empresa',
			'nit' => 'Nit',
			'sistema' => 'Modulo',
			'direccion' => 'Direccion',
			'activo' => 'Activo',
			'creacion_user' => 'Creacion User',
			'creacion_date' => 'Creacion Date',
			'modifica_user' => 'Modifica User',
			'modifica_date' => 'Modifica Date',
			'correo_fact_electronica' => 'Correo Fact Electronica',
			'codigo_fact_electronica' => 'Codigo Fact Electronica',
			'telefonos' => 'Telefonos',
			'excountry' => 'Excountry',
			'coloader' => 'Coloader',
			'observaciones' => 'Contenido',
			'doc_id' => 'Plantilla',
			'trackactivo' => 'Tracking activo',
			'trackpuerto' => 'Tracking Puerto',
			'trackmailserver' => 'Tracking Mailserver',
			'trackauth' => 'Tracking  Auth',
			'trackfromaddress' => 'Tracking From Address',
			'trackpassword' => 'Tracking Password',
			'ocean_requerimiento_partidas' => 'Ocean Requerimiento Partidas',
			'ocean_cuentas_bancarias' => 'Ocena Cuentas Bancarias',
			'ocean_id_naviera' => 'Naviera',		
			'logo_alto' => 'Logo Alto',
			'logo_ancho' => 'Logo Ancho',
			'ocean_codigo_iso' => 'Ocean Codigo Iso',				
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
		$criteria->compare('logo',$this->logo,true,'ILIKE');
		$criteria->compare('edicion',$this->edicion,true,'ILIKE');
		$criteria->compare('titulo',$this->titulo,true,'ILIKE');
		$criteria->compare('nombre_empresa',$this->nombre_empresa,true,'ILIKE');
		$criteria->compare('nit',$this->nit,true,'ILIKE');
		$criteria->compare('sistema',$this->sistema,true,'ILIKE');
		$criteria->compare('direccion',$this->direccion,true,'ILIKE');
		$criteria->compare('activo',$this->activo);
		$criteria->compare('creacion_user',$this->creacion_user);
		$criteria->compare('creacion_date',$this->creacion_date,true,'ILIKE');
		$criteria->compare('modifica_user',$this->modifica_user);
		$criteria->compare('modifica_date',$this->modifica_date,true,'ILIKE');
		$criteria->compare('correo_fact_electronica',$this->correo_fact_electronica,true,'ILIKE');
		$criteria->compare('codigo_fact_electronica',$this->codigo_fact_electronica,true,'ILIKE');
		$criteria->compare('telefonos',$this->telefonos,true,'ILIKE');
		$criteria->compare('excountry',$this->excountry,true,'ILIKE');
		$criteria->compare('coloader',$this->coloader,true,'ILIKE');
		$criteria->compare('observaciones',$this->observaciones,true,'ILIKE');
		$criteria->compare('doc_id',$this->doc_id,true,'ILIKE');
		$criteria->compare('trackactivo',$this->trackactivo);
		$criteria->compare('trackpuerto',$this->trackpuerto);
		$criteria->compare('trackmailserver',$this->trackmailserver,true,'ILIKE');
		$criteria->compare('trackauth',$this->trackauth);
		$criteria->compare('trackfromaddress',$this->trackfromaddress,true,'ILIKE');
		$criteria->compare('trackpassword',$this->trackpassword,true,'ILIKE');
		$criteria->compare('ocean_requerimiento_partidas',$this->ocean_requerimiento_partidas,true,'ILIKE');
		$criteria->compare('ocean_cuentas_bancarias',$this->ocean_cuentas_bancarias,true,'ILIKE');
		$criteria->compare('ocean_id_naviera',$this->ocean_id_naviera);
		$criteria->compare('logo_alto',$this->logo_alto);
		$criteria->compare('logo_ancho',$this->logo_ancho);
		$criteria->compare('ocean_codigo_iso',$this->ocean_codigo_iso,true,'ILIKE');
		Yii::app()->session['EmpresasPlantillas_records'] = $criteria;		

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
	 * @return EmpresasPlantillas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
