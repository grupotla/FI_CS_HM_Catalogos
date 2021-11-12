<?php

/**
 * This is the model class for table "clientes_tipo_identificacion_tributaria".
 *
 * The followings are the available columns in table 'clientes_tipo_identificacion_tributaria':
 * @property integer $id_tipo_identificacion_tributaria
 * @property string $id_pais
 * @property string $tipo
 * @property integer $estado
 */
class ClientesTIT extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public function primaryKey(){
	       return 'id_tipo_identificacion_tributaria';
	}

	public function tableName()
	{
		return 'clientes_tipo_identificacion_tributaria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('estado', 'numerical', 'integerOnly'=>true),
			array('id_pais', 'length', 'max'=>5),
			array('tipo', 'length', 'max'=>35),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_tipo_identificacion_tributaria, id_pais, tipo, estado', 'safe', 'on'=>'search'),
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
			'id_tipo_identificacion_tributaria' => 'TIT',
			'id_pais' => 'Pais',
			'tipo' => 'Descripcion',
			'estado' => 'Estado',
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

		$criteria->compare('id_tipo_identificacion_tributaria',$this->id_tipo_identificacion_tributaria);
		$criteria->compare('id_pais',$this->id_pais,true,'ILIKE');
		$criteria->compare('tipo',$this->tipo,true,'ILIKE');
		$criteria->compare('estado',$this->estado);
		Yii::app()->session['ClientesTIT_records'] = $criteria;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'id_tipo_identificacion_tributaria ASC',
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
	 * @return ClientesTIT the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
