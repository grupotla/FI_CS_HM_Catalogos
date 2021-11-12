<?php

/**
 * This is the model class for table "exactus_costos_correos_grupos".
 *
 * The followings are the available columns in table 'exactus_costos_correos_grupos':
 * @property integer $id_correo_grupo
 * @property string $siglas
 * @property string $nombre
 * @property boolean $activo
 */
class ExactusCostosCorreosGrupos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'exactus_costos_correos_grupos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('siglas', 'length', 'max'=>3),
			array('nombre', 'length', 'max'=>40),
			array('activo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_correo_grupo, siglas, nombre, activo', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_correo_grupo' => 'Id Correo Grupo',
			'siglas' => 'Siglas',
			'nombre' => 'Nombre',
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

		$criteria->compare('id_correo_grupo',$this->id_correo_grupo);
		$criteria->compare('siglas',$this->siglas,true,'ILIKE');
		$criteria->compare('nombre',$this->nombre,true,'ILIKE');
		$criteria->compare('activo',$this->activo);
		Yii::app()->session['ExactusCostosCorreosGrupos_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,			
			'sort'=>array(
			    'defaultOrder'=>'id_correo_grupo ASC',
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
	 * @return ExactusCostosCorreosGrupos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
