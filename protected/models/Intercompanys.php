<?php

/**
 * This is the model class for table "intercompanys".
 *
 * The followings are the available columns in table 'intercompanys':
 * @property integer $id_intercompany
 * @property string $nombre_intercompany
 * @property string $nit
 * @property integer $tiporegimen
 * @property string $direccion
 * @property string $countries
 * @property integer $id_empresa_baw
 * @property string $fecha_creacion
 * @property integer $usuario_creacion
 * @property boolean $activo
 * @property string $nombre_comercial
 * @property string $ruc
 */
class Intercompanys extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'intercompanys';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('countries, id_empresa_baw, nombre_intercompany, nombre_comercial, fecha_creacion', 'required'),
			array('tiporegimen, id_empresa_baw, usuario_creacion', 'numerical', 'integerOnly'=>true),
			array('nombre_intercompany, nombre_comercial', 'length', 'max'=>150),
			array('nit, ruc', 'length', 'max'=>30),
			array('direccion', 'length', 'max'=>250),
			array('countries', 'length', 'max'=>45),
			array('activo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_intercompany, nombre_intercompany, nit, tiporegimen, direccion, countries, id_empresa_baw, fecha_creacion, usuario_creacion, activo, nombre_comercial, ruc', 'safe', 'on'=>'search'),
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
			'tiporegimen0' => array(self::BELONGS_TO, 'Tiporegimen', 'tiporegimen'),
			'idPais' => array(self::BELONGS_TO, 'Paises', 'countries'),
			'empresa0' => array(self::BELONGS_TO, 'Empresas', 'id_empresa_baw'),
			'usuario00' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'usuario_creacion'),			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_intercompany' => 'Id Intercompany',
			'nombre_intercompany' => 'Nombre Intercompany',
			'nit' => 'Nit',
			'tiporegimen' => 'Tiporegimen',
			'direccion' => 'Direccion',
			'countries' => 'Countries',
			'id_empresa_baw' => 'Id Empresa Baw',
			'fecha_creacion' => 'Fecha Creacion',
			'usuario_creacion' => 'Usuario Creacion',
			'activo' => 'Activo',
			'nombre_comercial' => 'Nombre Comercial',
			'ruc' => 'Ruc',
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

		$criteria->compare('id_intercompany',$this->id_intercompany);
		$criteria->compare('nombre_intercompany',$this->nombre_intercompany,true,'ILIKE');
		$criteria->compare('nit',$this->nit,true,'ILIKE');
		$criteria->compare('tiporegimen',$this->tiporegimen);
		$criteria->compare('direccion',$this->direccion,true,'ILIKE');
		$criteria->compare('countries',$this->countries,true,'ILIKE');
		$criteria->compare('id_empresa_baw',$this->id_empresa_baw);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true,'ILIKE');
		$criteria->compare('usuario_creacion',$this->usuario_creacion);
		$criteria->compare('activo',$this->activo);
		$criteria->compare('nombre_comercial',$this->nombre_comercial,true,'ILIKE');
		$criteria->compare('ruc',$this->ruc,true,'ILIKE');
		Yii::app()->session['Intercompanys_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,			
			'sort'=>array(
			    'defaultOrder'=>'id_intercompany DESC',
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
	 * @return Intercompanys the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
