<?php

/**
 * This is the model class for table "creditos".
 *
 * The followings are the available columns in table 'creditos':
 * @property string $id_credito
 * @property string $dias
 * @property integer $id_estatus
 * @property string $limite_credito_local
 * @property string $limite_credito_dollar
 * @property string $id_aviso
 * @property string $id_usuario_autoriza
 * @property string $id_usuario_crea
 * @property string $limite_credito_local_autorizado
 * @property string $limite_credito_dollar_autorizado
 *
 * The followings are the available model relations:
 * @property Estatus $idEstatus
 * @property UsuariosEmpresas $idUsuarioAutoriza
 * @property UsuariosEmpresas $idUsuarioCrea
 * @property ClientesEquitrans[] $clientesEquitrans
 * @property Clientes[] $clientes
 */
class Creditos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'creditos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_estatus', 'numerical', 'integerOnly'=>true),
			array('limite_credito_local, limite_credito_dollar, limite_credito_local_autorizado', 'length', 'max'=>16),
			array('limite_credito_dollar_autorizado', 'length', 'max'=>6),
			array('dias, id_aviso, id_usuario_autoriza, id_usuario_crea', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_credito, dias, id_estatus, limite_credito_local, limite_credito_dollar, id_aviso, id_usuario_autoriza, id_usuario_crea, limite_credito_local_autorizado, limite_credito_dollar_autorizado', 'safe', 'on'=>'search'),
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
			'idEstatus' => array(self::BELONGS_TO, 'Estatus', 'id_estatus'),
			'idUsuarioAutoriza' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'id_usuario_autoriza'),
			'idUsuarioCrea' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'id_usuario_crea'),
			'clientesEquitrans' => array(self::HAS_MANY, 'ClientesEquitrans', 'id_credito'),
			'clientes' => array(self::HAS_MANY, 'Clientes', 'id_credito'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_credito' => 'Id Credito',
			'dias' => 'Dias',
			'id_estatus' => 'Id Estatus',
			'limite_credito_local' => 'Limite Credito Local',
			'limite_credito_dollar' => 'Limite Credito Dollar',
			'id_aviso' => 'Id Aviso',
			'id_usuario_autoriza' => 'Id Usuario Autoriza',
			'id_usuario_crea' => 'Id Usuario Crea',
			'limite_credito_local_autorizado' => 'Limite Credito Local Autorizado',
			'limite_credito_dollar_autorizado' => 'Limite Credito Dollar Autorizado',
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

		$criteria->compare('id_credito',$this->id_credito,true);
		$criteria->compare('dias',$this->dias,true);
		$criteria->compare('id_estatus',$this->id_estatus);
		$criteria->compare('limite_credito_local',$this->limite_credito_local,true);
		$criteria->compare('limite_credito_dollar',$this->limite_credito_dollar,true);
		$criteria->compare('id_aviso',$this->id_aviso,true);
		$criteria->compare('id_usuario_autoriza',$this->id_usuario_autoriza,true);
		$criteria->compare('id_usuario_crea',$this->id_usuario_crea,true);
		$criteria->compare('limite_credito_local_autorizado',$this->limite_credito_local_autorizado,true);
		$criteria->compare('limite_credito_dollar_autorizado',$this->limite_credito_dollar_autorizado,true);
		//$criteria->condition = "";		
		//$criteria->order = "";
		
		
				
		Yii::app()->session['Creditos_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Creditos the static model class
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
