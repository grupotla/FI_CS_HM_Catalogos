<?php

/**
 * This is the model class for table "empresas_plantillas_etiquetas".
 *
 * The followings are the available columns in table 'empresas_plantillas_etiquetas':
 * @property integer $id
 * @property string $trafico
 * @property string $etiqueta_id
 * @property string $idioma_id
 * @property string $valor
 */
class EmpresasPlantillasEtiquetas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empresas_plantillas_etiquetas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('etiqueta_id, idioma_id, valor', 'required'),
			array('trafico', 'length', 'max'=>3),
			array('etiqueta_id', 'length', 'max'=>50),
			array('idioma_id', 'length', 'max'=>5),
			array('valor', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, trafico, etiqueta_id, idioma_id, valor', 'safe', 'on'=>'search'),
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
			//'datos' => array(self::BELONGS_TO, 'EmpresasPlantillasDatos', '', 'foreignKey' => array('id_etiqueta'=>'id_etiqueta')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'trafico' => 'Trafico',
			'etiqueta_id' => 'Etiqueta',
			'idioma_id' => 'Idioma',
			'valor' => 'Valor',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('trafico',$this->trafico,true,'ILIKE');
		$criteria->compare('etiqueta_id',$this->etiqueta_id,true,'ILIKE');
		$criteria->compare('idioma_id',$this->idioma_id,true,'ILIKE');
		$criteria->compare('valor',$this->valor,true,'ILIKE');
		Yii::app()->session['EmpresasPlantillasEtiquetas_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,			
			'sort'=>array(
			    'defaultOrder'=>'id ASC',
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
	 * @return EmpresasPlantillasEtiquetas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
