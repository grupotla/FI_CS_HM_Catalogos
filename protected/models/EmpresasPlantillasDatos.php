<?php

/**
 * This is the model class for table "empresas_plantillas_datos".
 *
 * The followings are the available columns in table 'empresas_plantillas_datos':
 * @property integer $id
 * @property string $country
 * @property string $sistema
 * @property string $doc_id
 * @property integer $id_etiqueta
 * @property string $etiqueta_style
 * @property string $campo_tabla
 * @property string $campo_style
 * @property string $formato_campo
 * @property string $campo_tabla_right
 * @property integer $orden
 * @property boolean $activo
 */
class EmpresasPlantillasDatos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empresas_plantillas_datos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_etiqueta', 'required'),
			array('id_etiqueta, orden', 'numerical', 'integerOnly'=>true),
			array('country', 'length', 'max'=>5),
			array('sistema', 'length', 'max'=>30),
			array('doc_id, etiqueta_style, campo_style', 'length', 'max'=>10),
			array('campo_tabla, campo_tabla_right', 'length', 'max'=>50),
			array('formato_campo', 'length', 'max'=>20),
			array('activo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, country, sistema, doc_id, id_etiqueta, etiqueta_style, campo_tabla, campo_style, formato_campo, campo_tabla_right, orden, activo', 'safe', 'on'=>'search'),
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
			//'etiquetas' => array(self::HAS_MANY, 'EmpresasPlantillasEtiquetas', '', 'foreignKey' => array('etiqueta_id'=>'etiqueta_id')),
			//'plantilla' => array(self::BELONGS_TO, 'EmpresasPlantillas', '', 'foreignKey' => array('country'=>'country', 'sistema'=>'sistema', 'doc_id'=>'doc_id')),
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
			'doc_id' => 'Doc',
			'id_etiqueta' => 'Id Etiqueta',
			'etiqueta_style' => 'Etiqueta Style',
			'campo_tabla' => 'Campo Tabla',
			'campo_style' => 'Campo Style',
			'formato_campo' => 'Formato Campo',
			'campo_tabla_right' => 'Campo Tabla Right',
			'orden' => 'Orden',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('country',$this->country,true,'ILIKE');
		$criteria->compare('sistema',$this->sistema,true,'ILIKE');
		$criteria->compare('doc_id',$this->doc_id,true,'ILIKE');
		$criteria->compare('id_etiqueta',$this->id_etiqueta);
		$criteria->compare('etiqueta_style',$this->etiqueta_style,true,'ILIKE');
		$criteria->compare('campo_tabla',$this->campo_tabla,true,'ILIKE');
		$criteria->compare('campo_style',$this->campo_style,true,'ILIKE');
		$criteria->compare('formato_campo',$this->formato_campo,true,'ILIKE');
		$criteria->compare('campo_tabla_right',$this->campo_tabla_right,true,'ILIKE');
		$criteria->compare('orden',$this->orden);
		$criteria->compare('activo',$this->activo);
		Yii::app()->session['EmpresasPlantillasDatos_records'] = $criteria;		

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
	 * @return EmpresasPlantillasDatos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
