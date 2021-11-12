<?php

/**
 * This is the model class for table "tipo_proveedor".
 *
 * The followings are the available columns in table 'tipo_proveedor':
 * @property integer $id_tipo_proveedor
 * @property string $descripcion
 * @property boolean $master
 * @property string $tabla
 * @property string $where_clause
 * @property string $id_field_name
 * @property string $description_field_name
 * @property string $regimen_field_name
 * @property boolean $activo
 */
class TipoProveedor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipo_proveedor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion', 'length', 'max'=>150),
			array('tabla, id_field_name, description_field_name, regimen_field_name', 'length', 'max'=>50),
			array('where_clause', 'length', 'max'=>200),
			array('master, activo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_tipo_proveedor, descripcion, master, tabla, where_clause, id_field_name, description_field_name, regimen_field_name, activo', 'safe', 'on'=>'search'),
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
			'id_tipo_proveedor' => 'Id Tipo Proveedor',
			'descripcion' => 'Descripcion',
			'master' => 'Master',
			'tabla' => 'Tabla',
			'where_clause' => 'Where Clause',
			'id_field_name' => 'Id Field Name',
			'description_field_name' => 'Description Field Name',
			'regimen_field_name' => 'Regimen Field Name',
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

		$criteria->compare('id_tipo_proveedor',$this->id_tipo_proveedor);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('master',$this->master);
		$criteria->compare('tabla',$this->tabla,true);
		$criteria->compare('where_clause',$this->where_clause,true);
		$criteria->compare('id_field_name',$this->id_field_name,true);
		$criteria->compare('description_field_name',$this->description_field_name,true);
		$criteria->compare('regimen_field_name',$this->regimen_field_name,true);
		$criteria->compare('activo',$this->activo);
		//$criteria->condition = "";		
		//$criteria->order = "";
		
		
				
		Yii::app()->session['TipoProveedor_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TipoProveedor the static model class
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
