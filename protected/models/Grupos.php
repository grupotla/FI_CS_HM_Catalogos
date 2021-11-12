<?php

/**
 * This is the model class for table "grupos".
 *
 * The followings are the available columns in table 'grupos':
 * @property string $id_grupo
 * @property string $nombre_grupo
 * @property integer $id_estatus
 * @property string $fecha_creacion
 * @property string $hora_creacion
 *
 * The followings are the available model relations:
 * @property Estatus $idEstatus
 * @property ClientesEquitrans[] $clientesEquitrans
 * @property Clientes[] $clientes
 */
class Grupos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'grupos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_estatus', 'required'),
			array('id_estatus', 'numerical', 'integerOnly'=>true),
			array('nombre_grupo', 'length', 'max'=>150),
			array('fecha_creacion, hora_creacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_grupo, nombre_grupo, id_estatus, fecha_creacion, hora_creacion', 'safe', 'on'=>'search'),
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
			'clientesEquitrans' => array(self::HAS_MANY, 'ClientesEquitrans', 'id_grupo'),
			'clientes' => array(self::HAS_MANY, 'Clientes', 'id_grupo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_grupo' => 'Id Grupo',
			'nombre_grupo' => 'Nombre Grupo',
			'id_estatus' => 'Id Estatus',
			'fecha_creacion' => 'Fecha Creacion',
			'hora_creacion' => 'Hora Creacion',
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

		$criteria->compare('id_grupo',$this->id_grupo,true);
		$criteria->compare('nombre_grupo',$this->nombre_grupo,true);
		$criteria->compare('id_estatus',$this->id_estatus);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('hora_creacion',$this->hora_creacion,true);
		//$criteria->condition = "";		
		//$criteria->order = "";
		
		
				
		Yii::app()->session['Grupos_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Grupos the static model class
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
