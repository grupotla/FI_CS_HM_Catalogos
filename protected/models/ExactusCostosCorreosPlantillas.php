<?php

/**
 * This is the model class for table "exactus_costos_correos_plantillas".
 *
 * The followings are the available columns in table 'exactus_costos_correos_plantillas':
 * @property integer $id
 * @property integer $id_correo_grupo
 * @property string $subject
 * @property string $body
 * @property boolean $activo
 */
class ExactusCostosCorreosPlantillas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'exactus_costos_correos_plantillas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_correo_grupo, subject, body', 'required'),
			array('id_correo_grupo, creacion_user, modifica_user, tipo_plantilla', 'numerical', 'integerOnly'=>true),
			array('subject', 'length', 'max'=>100),
			array('body, activo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_correo_grupo, subject, body, activo, creacion_user, modifica_user, creacion_date, modifica_date, tipo_plantilla', 'safe', 'on'=>'search'),
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
			'idCorreoGrupo' => array(self::BELONGS_TO, 'ExactusCostosCorreosGrupos', 'id_correo_grupo'),	
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_correo_grupo' => 'Empresa',
			'subject' => 'Subject',
			'body' => 'Body',
			'activo' => 'Activo',
			'creacion_user' => 'Creacion User',
			'modifica_user' => 'Modifica User',
			'creacion_date' => 'Creacion Date',
			'modifica_date' => 'Modifica Date',
			'tipo_plantilla' => 'Tipo Plantilla'
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
		$criteria->compare('id_correo_grupo',$this->id_correo_grupo);
		$criteria->compare('subject',$this->subject,true,'ILIKE');
		$criteria->compare('body',$this->body,true,'ILIKE');
		$criteria->compare('activo',$this->activo);
		Yii::app()->session['ExactusCostosCorreosPlantillas_records'] = $criteria;		

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
	 * @return ExactusCostosCorreosPlantillas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
