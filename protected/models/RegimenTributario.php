<?php

/**
 * This is the model class for table "regimen_tributario".
 *
 * The followings are the available columns in table 'regimen_tributario':
 * @property string $id_regimen
 * @property string $descripcion_regimen
 * @property integer $es_afecto
 *
 * The followings are the available model relations:
 * @property ClientesEquitrans[] $clientesEquitrans
 * @property Clientes[] $clientes
 */
class RegimenTributario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'regimen_tributario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('es_afecto', 'numerical', 'integerOnly'=>true),
			array('descripcion_regimen', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_regimen, descripcion_regimen, es_afecto', 'safe', 'on'=>'search'),
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
			'clientesEquitrans' => array(self::HAS_MANY, 'ClientesEquitrans', 'id_regimen'),
			'clientes' => array(self::HAS_MANY, 'Clientes', 'id_regimen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_regimen' => 'Id Regimen',
			'descripcion_regimen' => 'Descripcion Regimen',
			'es_afecto' => 'Es Afecto',
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

		$criteria->compare('id_regimen',$this->id_regimen,true);
		$criteria->compare('descripcion_regimen',$this->descripcion_regimen,true);
		$criteria->compare('es_afecto',$this->es_afecto);
		//$criteria->condition = "";		
		//$criteria->order = "";
		
		
				
		Yii::app()->session['RegimenTributario_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RegimenTributario the static model class
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
