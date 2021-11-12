<?php

/**
 * This is the model class for table "empresas_plantillas_docs".
 *
 * The followings are the available columns in table 'empresas_plantillas_docs':
 * @property integer $id
 * @property string $country
 * @property string $sistema
 * @property integer $orden
 * @property string $doc_id
 * @property string $tipo_code
 * @property integer $code
 * @property string $nombre
 * @property string $descripcion
 */
class EmpresasPlantillasDocs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empresas_plantillas_docs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('orden, code', 'numerical', 'integerOnly'=>true),
			array('country', 'length', 'max'=>5),
			array('sistema, tipo_code', 'length', 'max'=>30),
			array('doc_id', 'length', 'max'=>10),
			array('nombre', 'length', 'max'=>60),
			array('descripcion', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, country, sistema, orden, doc_id, tipo_code, code, nombre, descripcion', 'safe', 'on'=>'search'),
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
			'country' => 'Country',
			'sistema' => 'Sistema',
			'orden' => 'Orden',
			'doc_id' => 'Doc',
			'tipo_code' => 'Tipo Code',
			'code' => 'Code',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
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
		$criteria->compare('country',$this->country,true,'ILIKE');
		$criteria->compare('sistema',$this->sistema,true,'ILIKE');
		$criteria->compare('orden',$this->orden);
		$criteria->compare('doc_id',$this->doc_id,true,'ILIKE');
		$criteria->compare('tipo_code',$this->tipo_code,true,'ILIKE');
		$criteria->compare('code',$this->code);
		$criteria->compare('nombre',$this->nombre,true,'ILIKE');
		$criteria->compare('descripcion',$this->descripcion,true,'ILIKE');
		Yii::app()->session['EmpresasPlantillasDocs_records'] = $criteria;		

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
	 * @return EmpresasPlantillasDocs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
