<?php

/**
 * This is the model class for table "usuarios_paises".
 *
 * The followings are the available columns in table 'usuarios_paises':
 * @property integer $id_pais
 * @property string $pais
 * @property string $nombre
 * @property boolean $activo
 *
 * The followings are the available model relations:
 * @property UsuariosEmpresas[] $usuariosEmpresases
 */
class UsuariosPaises extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios_paises';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pais', 'length', 'max'=>5),
			array('nombre', 'length', 'max'=>30),
			array('activo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pais, pais, nombre, activo', 'safe', 'on'=>'search'),
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
			'usuariosEmpresases' => array(self::HAS_MANY, 'UsuariosEmpresas', 'pais'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pais' => 'Id Pais',
			'pais' => 'Pais',
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

		$criteria->compare('id_pais',$this->id_pais);
		$criteria->compare('pais',$this->pais,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('activo',$this->activo);
		//$criteria->condition = "";		
		//$criteria->order = "";
		
		
				
		Yii::app()->session['UsuariosPaises_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsuariosPaises the static model class
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
