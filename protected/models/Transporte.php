<?php

/**
 * This is the model class for table "transporte".
 *
 * The followings are the available columns in table 'transporte':
 * @property integer $id_transporte
 * @property string $descripcion
 * @property string $letra
 * @property string $medio_transporte
 * @property string $descripcion_en
 * @property boolean $aplica_pricing
 *
 * The followings are the available model relations:
 * @property Servicios[] $servicioses
 * @property TransporteServicio[] $transporteServicios
 * @property Routings[] $routings
 * @property EmpresasTransportesServicios[] $empresasTransportesServicioses
 * @property Clientes[] $clientes
 */
class Transporte extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transporte';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion', 'required'),
			array('descripcion, descripcion_en', 'length', 'max'=>30),
			array('letra', 'length', 'max'=>2),
			array('medio_transporte', 'length', 'max'=>1),
			array('aplica_pricing', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_transporte, descripcion, letra, medio_transporte, descripcion_en, aplica_pricing', 'safe', 'on'=>'search'),
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
			'servicioses' => array(self::MANY_MANY, 'Servicios', 'transportes_servicios(id_transporte, id_servicio)'),
			'transporteServicios' => array(self::HAS_MANY, 'TransporteServicio', 'id_transporte'),
			'routings' => array(self::HAS_MANY, 'Routings', 'id_transporte'),
			'empresasTransportesServicioses' => array(self::HAS_MANY, 'EmpresasTransportesServicios', 'id_transporte'),
			'clientes' => array(self::HAS_MANY, 'Clientes', 'ultimo_tipo_movimiento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_transporte' => 'Id Transporte',
			'descripcion' => 'Descripcion',
			'letra' => 'Letra',
			'medio_transporte' => 'Medio Transporte',
			'descripcion_en' => 'Descripcion En',
			'aplica_pricing' => 'Aplica Pricing',
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

		$criteria->compare('id_transporte',$this->id_transporte);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('letra',$this->letra,true);
		$criteria->compare('medio_transporte',$this->medio_transporte,true);
		$criteria->compare('descripcion_en',$this->descripcion_en,true);
		$criteria->compare('aplica_pricing',$this->aplica_pricing);
		//$criteria->condition = "";		
		//$criteria->order = "";
		
		
				
		Yii::app()->session['Transporte_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Transporte the static model class
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
