<?php

/**
 * This is the model class for table "cobradores".
 *
 * The followings are the available columns in table 'cobradores':
 * @property string $id_cobrador
 * @property string $nombre_cobrador
 * @property string $telefono
 * @property integer $estatus
 * @property integer $id_pais
 *
 * The followings are the available model relations:
 * @property ClientesEquitrans[] $clientesEquitrans
 * @property Clientes[] $clientes
 */
class Cobradores extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cobradores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('estatus, id_pais', 'numerical', 'integerOnly'=>true),
			array('nombre_cobrador', 'length', 'max'=>40),
			array('telefono', 'length', 'max'=>22),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_cobrador, nombre_cobrador, telefono, estatus, id_pais', 'safe', 'on'=>'search'),
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
			'clientesEquitrans' => array(self::HAS_MANY, 'ClientesEquitrans', 'id_cobrador'),
			'clientes' => array(self::HAS_MANY, 'Clientes', 'id_cobrador'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cobrador' => 'Id Cobrador',
			'nombre_cobrador' => 'Nombre Cobrador',
			'telefono' => 'Telefono',
			'estatus' => 'Estatus',
			'id_pais' => 'Id Pais',
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

		$criteria->compare('id_cobrador',$this->id_cobrador,true);
		$criteria->compare('nombre_cobrador',$this->nombre_cobrador,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('estatus',$this->estatus);
		$criteria->compare('id_pais',$this->id_pais);
		//$criteria->condition = "";		
		//$criteria->order = "";
		
		
				
		Yii::app()->session['Cobradores_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cobradores the static model class
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
