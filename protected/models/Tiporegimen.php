<?php

/**
 * This is the model class for table "tiporegimen".
 *
 * The followings are the available columns in table 'tiporegimen':
 * @property string $numero
 * @property integer $empresa
 * @property string $nombre
 * @property string $descripcion
 * @property integer $impuesto
 * @property integer $retencion
 * @property double $porcentaje
 * @property integer $status
 * @property string $modificado
 * @property integer $usuario
 * @property integer $usuario2
 * @property integer $usuario3
 */
class Tiporegimen extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tiporegimen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, descripcion, porcentaje', 'required'),
			array('empresa, impuesto, retencion, status, usuario, usuario2, usuario3', 'numerical', 'integerOnly'=>true),
			array('porcentaje', 'numerical'),
			array('nombre, descripcion', 'length', 'max'=>45),
			array('modificado', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('numero, empresa, nombre, descripcion, impuesto, retencion, porcentaje, status, modificado, usuario, usuario2, usuario3', 'safe', 'on'=>'search'),
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
			'numero' => 'Numero',
			'empresa' => 'Empresa',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'impuesto' => 'Impuesto',
			'retencion' => 'Retencion',
			'porcentaje' => 'Porcentaje',
			'status' => 'Status',
			'modificado' => 'Modificado',
			'usuario' => 'Usuario',
			'usuario2' => 'Usuario2',
			'usuario3' => 'Usuario3',
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

		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('empresa',$this->empresa);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('impuesto',$this->impuesto);
		$criteria->compare('retencion',$this->retencion);
		$criteria->compare('porcentaje',$this->porcentaje);
		$criteria->compare('status',$this->status);
		$criteria->compare('modificado',$this->modificado,true);
		$criteria->compare('usuario',$this->usuario);
		$criteria->compare('usuario2',$this->usuario2);
		$criteria->compare('usuario3',$this->usuario3);
		//$criteria->condition = "";		
		//$criteria->order = "";
		
		
				
		Yii::app()->session['Tiporegimen_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tiporegimen the static model class
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
