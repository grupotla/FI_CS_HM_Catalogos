<?php

/**
 * This is the model class for table "direcciones".
 *
 * The followings are the available columns in table 'direcciones':
 * @property string $id_direccion
 * @property string $id_nivel_geografico
 * @property string $direccion_completa
 * @property string $id_cliente
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $zipcode
 * @property string $name
 * @property string $phone_number
 * @property string $group
 * @property string $url
 * @property string $image
 * @property double $lat
 * @property double $lng
 * @property string $email
 * @property integer $id_tipo_direccion
 * @property boolean $boletines
 * @property boolean $activo
 *
 * The followings are the available model relations:
 * @property Clientes $idCliente
 * @property NivelesGeograficos $idNivelGeografico
 * @property TipoDireccion $idTipoDireccion
 */
class Direcciones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'direcciones';
	}

	public $id;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(

			array('id_cliente, id_nivel_geografico, direccion_completa', 'required'),

			array('id_tipo_direccion', 'numerical', 'integerOnly'=>true),

			array('id_cliente', 'readonly'),

			array('lat, lng', 'numerical'),
			array('direccion_completa, address', 'length', 'max'=>250),
			array('city, state, zipcode, group', 'length', 'max'=>35),
			array('name', 'length', 'max'=>65),
			array('phone_number, image', 'length', 'max'=>100),
			array('url', 'length', 'max'=>150),
			array('email', 'length', 'max'=>50),
			array('id_nivel_geografico, id_cliente, boletines, activo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_direccion, id_nivel_geografico, direccion_completa, id_cliente, address, city, state, zipcode, name, phone_number, group, url, image, lat, lng, email, id_tipo_direccion, boletines, activo', 'safe', 'on'=>'search'),
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
			//'idCliente' => array(self::BELONGS_TO, 'Clientes', 'id_cliente'),
			'idNivelGeografico' => array(self::BELONGS_TO, 'NivelesGeograficos', 'id_nivel_geografico'),
			//'idTipoDireccion' => array(self::BELONGS_TO, 'TipoDireccion', 'id_tipo_direccion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_direccion' => 'Id Direccion',
			'id_nivel_geografico' => 'Region',
			'direccion_completa' => 'Direccion Completa',
			'id_cliente' => 'Id Cliente',
			'address' => 'Address',
			'city' => 'City',
			'state' => 'State',
			'zipcode' => 'Zipcode',
			'name' => 'Name',
			'phone_number' => 'Telefono',
			'group' => 'Group',
			'url' => 'Url',
			'image' => 'Image',
			'lat' => 'Lat',
			'lng' => 'Lng',
			'email' => 'Email',
			'id_tipo_direccion' => 'Id Tipo Direccion',
			'boletines' => 'Boletines',
			'activo' => 'Activo',
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

		$criteria->compare('id_direccion',$this->id_direccion,true);
		$criteria->compare('id_nivel_geografico',$this->id_nivel_geografico,true);
		$criteria->compare('direccion_completa',$this->direccion_completa,true);
		$criteria->compare('id_cliente',$this->id_cliente,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('zipcode',$this->zipcode,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('group',$this->group,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('lat',$this->lat);
		$criteria->compare('lng',$this->lng);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('id_tipo_direccion',$this->id_tipo_direccion);
		$criteria->compare('boletines',$this->boletines);
		$criteria->compare('activo',$this->activo);
		//$criteria->condition = "";
		//$criteria->order = "";



		Yii::app()->session['Direcciones_records'] = $criteria;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'id_direccion ASC',
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Direcciones the static model class
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
