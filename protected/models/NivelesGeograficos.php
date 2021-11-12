<?php

/**
 * This is the model class for table "niveles_geograficos".
 *
 * The followings are the available columns in table 'niveles_geograficos':
 * @property string $id_nivel
 * @property string $id_pais
 * @property string $nivel1
 *
 * The followings are the available model relations:
 * @property Paises $idPais
 * @property DireccionesEquitrans[] $direccionesEquitrans
 * @property Direcciones[] $direcciones
 * @property DetalleNiveles[] $detalleNiveles
 */
class NivelesGeograficos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'niveles_geograficos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pais', 'length', 'max'=>2),
			array('nivel1', 'length', 'max'=>120),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_nivel, id_pais, nivel1', 'safe', 'on'=>'search'),
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
			'idPais' => array(self::BELONGS_TO, 'Paises', 'id_pais'),
			'direccionesEquitrans' => array(self::HAS_MANY, 'DireccionesEquitrans', 'id_nivel_geografico'),
			'direcciones' => array(self::HAS_MANY, 'Direcciones', 'id_nivel_geografico'),
			'detalleNiveles' => array(self::HAS_MANY, 'DetalleNiveles', 'id_nivel'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_nivel' => 'Id Nivel',
			'id_pais' => 'Id Pais',
			'nivel1' => 'Nivel1',
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

		$criteria->compare('id_nivel',$this->id_nivel,true);
		$criteria->compare('id_pais',$this->id_pais,true);
		$criteria->compare('nivel1',$this->nivel1,true);
		//$criteria->condition = "";		
		//$criteria->order = "";
		
		
				
		Yii::app()->session['NivelesGeograficos_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NivelesGeograficos the static model class
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
