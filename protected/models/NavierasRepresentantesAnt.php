<?php

/**
 * This is the model class for table "navieras".
 *
 * The followings are the available columns in table 'navieras':
 * @property string $id_naviera
 * @property string $nombre
 * @property boolean $activo
 * @property integer $tiporegimen
 * @property integer $dias
 * @property string $nit
 * @property string $nit2
 * @property string $id_pais
 * @property string $monto
 *
 * The followings are the available model relations:
 * @property Routings[] $routings
 * @property NavierasCredito[] $navierasCreditos
 */
class NavierasRepresentantes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'navieras_representantes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		
			array('nombre, tiporegimen, id_pais, id_naviera_group', 'required'),
			array(Yii::app()->session['permisos'][Yii::app()->controller->id]['fields'], 'disabled'), 					
			array('tiporegimen, dias, id_naviera_group, user_insert, user_update, user_auth', 'numerical', 'integerOnly'=>true),
			array('nit, nit2', 'length', 'max'=>30),
			array('id_pais', 'length', 'max'=>2),
			array('monto', 'length', 'max'=>12),
			array('nombre, activo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_naviera, nombre, activo, tiporegimen, dias, nit, nit2, id_pais, monto, id_naviera_group, user_insert, date_insert, user_update, date_update, user_auth, date_auth', 'safe', 'on'=>'search'),
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
			'routings' => array(self::HAS_MANY, 'Routings', 'id_naviera'),
			'navierasCreditos' => array(self::HAS_MANY, 'NavierasCredito', 'id_naviera', 'order'=>'id_nav_cred ASC'),
			'usuario0' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'user_insert'),
			'usuario1' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'user_update'),
			'usuario2' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'user_auth'),			

			'navieras' => array(self::BELONGS_TO, 'navieras', '', 'foreignKey' => array('id_naviera'=>'id_naviera_group')),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_naviera' => 'Id Representante',
			'nombre' => 'Nombre Representante',
			'activo' => 'Activo',
			'tiporegimen' => 'Tipo Regimen',
			'dias' => 'Dias',
			'nit' => 'Nit',
			'nit2' => 'Nit2',
			'id_pais' => 'Pais',
			'monto' => 'Monto',
			'id_naviera_group' => 'Grupo',
			'user_insert'=>'Usuario Creacion',
			'date_insert'=>'Fecha Creacion',
			'user_update'=>'Usuario Modifica',
			'date_update'=>'Fecha Modifica',
			'user_auth'=>'Usuario Autoriza',
			'date_auth'=>'Fecha Autoriza',
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

		$criteria->compare('id_naviera',$this->id_naviera);
		$criteria->compare('nombre',$this->nombre,true,'ILIKE');
		$criteria->compare('activo',$this->activo);
		$criteria->compare('tiporegimen',$this->tiporegimen);
		$criteria->compare('dias',$this->dias);
		$criteria->compare('nit',$this->nit,true,'ILIKE');
		$criteria->compare('nit2',$this->nit2,true,'ILIKE');
		$criteria->compare('id_pais',$this->id_pais,true);
		$criteria->compare('monto',$this->monto,true);
		$criteria->compare('id_naviera_group',$this->id_naviera_group);
	

		//$criteria->condition = "";		
		//$criteria->order = "";
		
		
				
		Yii::app()->session['Navieras_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'activo desc, id_naviera DESC',
			),	
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Navieras the static model class
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
