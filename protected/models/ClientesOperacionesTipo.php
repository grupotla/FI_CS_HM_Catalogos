<?php

/**
 * This is the model class for table "clientes_operaciones_tipo".
 *
 * The followings are the available columns in table 'clientes_operaciones_tipo':
 * @property integer $cto_id
 * @property string $cto_nombre
 * @property integer $sis_id
 * @property string $sis_nombre
 *
 * The followings are the available model relations:
 * @property ClientesOperaciones[] $clientesOperaciones
 * @property Clientes[] $clientes
 */
class ClientesOperacionesTipo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'clientes_operaciones_tipo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cto_nombre, sis_id, sis_nombre', 'required'),
			array('sis_id', 'numerical', 'integerOnly'=>true),
			array('cto_nombre, sis_nombre', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cto_id, cto_nombre, sis_id, sis_nombre', 'safe', 'on'=>'search'),
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
			'clientesOperaciones' => array(self::HAS_MANY, 'ClientesOperaciones', 'cto_id'),
			'clientes' => array(self::HAS_MANY, 'Clientes', 'cto_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cto_id' => 'Cto',
			'cto_nombre' => 'Cto Nombre',
			'sis_id' => 'Sis',
			'sis_nombre' => 'Sis Nombre',
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

		$criteria->compare('cto_id',$this->cto_id);
		$criteria->compare('cto_nombre',$this->cto_nombre,true);
		$criteria->compare('sis_id',$this->sis_id);
		$criteria->compare('sis_nombre',$this->sis_nombre,true);
		//$criteria->condition = "";		
		//$criteria->order = "";
		
		
				
		Yii::app()->session['ClientesOperacionesTipo_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClientesOperacionesTipo the static model class
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
