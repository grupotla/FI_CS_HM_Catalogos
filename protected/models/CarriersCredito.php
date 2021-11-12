<?php

/**
 * This is the model class for table "carriers_credito".
 *
 * The followings are the available columns in table 'carriers_credito':
 * @property integer $id_car_cred
 * @property string $carrier_id
 * @property string $id_empresa
 * @property boolean $activo
 * @property integer $secuencia
 * @property string $id_usuario
 * @property string $ingreso
 * @property string $id_usuario_modifica
 * @property string $modifica
 * @property string $id_usuario_borrado
 * @property string $borrado
 * @property integer $dias
 * @property string $monto
 * @property string $observaciones
 *
 * The followings are the available model relations:
 * @property Carriers $carrier
 * @property Empresas $idEmpresa
 * @property UsuariosEmpresas $idUsuario
 */
class CarriersCredito extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'carriers_credito';
	}
	
	public $id;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('carrier_id, id_empresa, dias, monto', 'required'),
			
			array('id_usuario, ingreso, id_usuario_modifica, modifica, id_usuario_borrado, borrado', 'disabled'),
				
			array('secuencia, dias', 'numerical', 'integerOnly'=>true),
			array('monto', 'length', 'max'=>12),
			array('observaciones', 'length', 'max'=>75),
			array('activo, ingreso, id_usuario_modifica, modifica, id_usuario_borrado, borrado', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_car_cred, carrier_id, id_empresa, activo, secuencia, id_usuario, ingreso, id_usuario_modifica, modifica, id_usuario_borrado, borrado, dias, monto, observaciones', 'safe', 'on'=>'search'),
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
			'carrier' => array(self::BELONGS_TO, 'Carriers', 'carrier_id'),
			'carrierair' => array(self::BELONGS_TO, 'CarriersAir', 'carrier_id'),
			'idEmpresa' => array(self::BELONGS_TO, 'Empresas', 'id_empresa'),
			'idUsuario' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'id_usuario'),
			'idUsuarioModifica' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'id_usuario_modifica'),
			'idUsuarioBorrado' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'id_usuario_borrado'),			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_car_cred' => 'Id Car Cred',
			'carrier_id' => 'Carrier',
			'id_empresa' => 'Empresa',
			'activo' => 'Activo',
			'secuencia' => 'Secuencia',
			'id_usuario' => 'Id Usuario',
			'ingreso' => 'Ingreso',
			'id_usuario_modifica' => 'Id Usuario Modifica',
			'modifica' => 'Modifica',
			'id_usuario_borrado' => 'Id Usuario Borrado',
			'borrado' => 'Borrado',
			'dias' => 'Dias',
			'monto' => 'Monto',
			'observaciones' => 'Observaciones',
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

		$criteria->compare('id_car_cred',$this->id_car_cred);
		$criteria->compare('carrier_id',$this->carrier_id,true);
		$criteria->compare('id_empresa',$this->id_empresa,true);
		$criteria->compare('activo',$this->activo);
		$criteria->compare('secuencia',$this->secuencia);
		$criteria->compare('id_usuario',$this->id_usuario,true);
		$criteria->compare('ingreso',$this->ingreso,true);
		$criteria->compare('id_usuario_modifica',$this->id_usuario_modifica,true);
		$criteria->compare('modifica',$this->modifica,true);
		$criteria->compare('id_usuario_borrado',$this->id_usuario_borrado,true);
		$criteria->compare('borrado',$this->borrado,true);
		$criteria->compare('dias',$this->dias);
		$criteria->compare('monto',$this->monto,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		//$criteria->condition = "";		
		//$criteria->order = "";
		
		
				
		Yii::app()->session['CarriersCredito_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CarriersCredito the static model class
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
