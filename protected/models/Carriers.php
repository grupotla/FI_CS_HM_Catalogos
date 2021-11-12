<?php

/**
 * This is the model class for table "carriers".
 *
 * The followings are the available columns in table 'carriers':
 * @property integer $carrier_id
 * @property string $name
 * @property string $countries
 * @property string $carriercode
 * @property integer $tiporegimen
 * @property integer $dias
 * @property string $nit
 * @property string $nit2
 * @property boolean $activo
 * @property string $monto
 *
 * The followings are the available model relations:
 * @property Routings[] $routings
 * @property CarriersCredito[] $carriersCreditos
 * @property Paises $countries0
 */
class Carriers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'carriers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, countries, carriercode, tiporegimen, dias, nit, monto', 'required'),
			array('tiporegimen, dias, user_insert, user_update, user_auth', 'numerical', 'integerOnly'=>true),
			array(Yii::app()->session['permisos'][Yii::app()->controller->id]['fields'], 'disabled'),
			array('name', 'length', 'max'=>50),
			array('countries, carriercode', 'length', 'max'=>5),
			array('nit, nit2', 'length', 'max'=>30),
			array('monto', 'length', 'max'=>12),
			array('activo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('carrier_id, name, countries, carriercode, tiporegimen, dias, nit, nit2, activo, monto, user_insert, date_insert, user_update, date_update, user_auth, date_auth', 'safe', 'on'=>'search'),
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
			'routings' => array(self::HAS_MANY, 'Routings', 'carrier_id'),
			'carriersCreditos' => array(self::HAS_MANY, 'CarriersCredito', 'carrier_id', 'order'=>'id_car_cred ASC'),
			'countries0' => array(self::BELONGS_TO, 'Paises', 'countries'),
			'usuario0' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'user_insert'),
			'usuario1' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'user_update'),
			'usuario2' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'user_auth'),			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'carrier_id' => 'Id Carrier',
			'name' => 'Name Carrier',
			'countries' => 'Countries',
			'carriercode' => 'Code Carrier',
			'tiporegimen' => 'Tipo Regimen',
			'dias' => 'Dias',
			'nit' => 'Nit',
			'nit2' => 'Nit2',
			'activo' => 'Activo',
			'monto' => 'Monto',
			'user_insert'=>'Usuario Creacion',
			'date_insert'=>'Fecha Creacion',
			'user_update'=>'Usuario Modifica',
			'date_update'=>'Fecha Modifica',
			'user_auth'=>'Usuario Autoriza',
			'date_auth'=>'Fecha Autoriza',			
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

		$criteria->compare('carrier_id',$this->carrier_id);
		$criteria->compare('name',$this->name,true,'ILIKE');
		$criteria->compare('countries',$this->countries);
		$criteria->compare('carriercode',$this->carriercode,true,'ILIKE');
		$criteria->compare('tiporegimen',$this->tiporegimen);
		$criteria->compare('dias',$this->dias);
		$criteria->compare('nit',$this->nit,true,'ILIKE');
		$criteria->compare('nit2',$this->nit2,true,'ILIKE');
		$criteria->compare('activo',$this->activo);
		$criteria->compare('monto',$this->monto,true);
		//$criteria->condition = "";		
		//$criteria->order = "";		
		
				
		Yii::app()->session['Carriers_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'carrier_id DESC',
			),	
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Carriers the static model class
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
