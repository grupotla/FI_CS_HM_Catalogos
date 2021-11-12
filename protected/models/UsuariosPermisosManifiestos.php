<?php

/**
 * This is the model class for table "usuarios_permisos_manifiestos".
 *
 * The followings are the available columns in table 'usuarios_permisos_manifiestos':
 * @property string $id
 * @property string $id_usuario
 * @property integer $id_empresa
 * @property integer $id_menu
 * @property string $fecha_creado
 */
class UsuariosPermisosManifiestos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios_permisos_manifiestos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_empresa, id_menu', 'numerical', 'integerOnly'=>true),
			array('id_usuario, fecha_creado', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_usuario, id_empresa, id_menu, fecha_creado', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'id_usuario' => 'Id Usuario',
			'id_empresa' => 'Id Empresa',
			'id_menu' => 'Id Menu',
			'fecha_creado' => 'Fecha Creado',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('id_usuario',$this->id_usuario,true);
		$criteria->compare('id_empresa',$this->id_empresa);
		$criteria->compare('id_menu',$this->id_menu);
		$criteria->compare('fecha_creado',$this->fecha_creado,true);
		//$criteria->condition = "";		
		//$criteria->order = "";
		
		
				
		Yii::app()->session['UsuariosPermisosManifiestos_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsuariosPermisosManifiestos the static model class
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
