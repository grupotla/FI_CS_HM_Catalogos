<?php

/**
 * This is the model class for table "agentes_contactos".
 *
 * The followings are the available columns in table 'agentes_contactos':
 * @property integer $id_contacto
 * @property string $agente_id
 * @property string $nombres
 * @property string $telefono
 * @property string $fax
 * @property string $email
 * @property boolean $activo
 * @property string $puesto
 * @property integer $id_usuario_creacion
 * @property string $fecha_creacion
 * @property integer $id_usuario_modifica
 * @property string $fecha_modifica
 * @property string $id_pais
 *
 * The followings are the available model relations:
 * @property Agentes $agente
 */
class AgentesContactos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'agentes_contactos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario_creacion, id_usuario_modifica', 'numerical', 'integerOnly'=>true),
			array('puesto', 'length', 'max'=>60),
			array('id_pais', 'length', 'max'=>5),
			array('agente_id, nombres, telefono, fax, email, activo, fecha_creacion, fecha_modifica', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_contacto, agente_id, nombres, telefono, fax, email, activo, puesto, id_usuario_creacion, fecha_creacion, id_usuario_modifica, fecha_modifica, id_pais', 'safe', 'on'=>'search'),
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
			'agente' => array(self::BELONGS_TO, 'Agentes', 'agente_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_contacto' => 'Id Contacto',
			'agente_id' => 'Agente',
			'nombres' => 'Nombres',
			'telefono' => 'Telefono',
			'fax' => 'Fax',
			'email' => 'Email',
			'activo' => 'Activo',
			'puesto' => 'Puesto',
			'id_usuario_creacion' => 'Id Usuario Creacion',
			'fecha_creacion' => 'Fecha Creacion',
			'id_usuario_modifica' => 'Id Usuario Modifica',
			'fecha_modifica' => 'Fecha Modifica',
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

		$criteria->compare('id_contacto',$this->id_contacto);
		$criteria->compare('agente_id',$this->agente_id,true);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('activo',$this->activo);
		$criteria->compare('puesto',$this->puesto,true);
		$criteria->compare('id_usuario_creacion',$this->id_usuario_creacion);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('id_usuario_modifica',$this->id_usuario_modifica);
		$criteria->compare('fecha_modifica',$this->fecha_modifica,true);
		$criteria->compare('id_pais',$this->id_pais,true);
		//$criteria->condition = "";		
		//$criteria->order = "";
		
		
				
		Yii::app()->session['AgentesContactos_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AgentesContactos the static model class
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
