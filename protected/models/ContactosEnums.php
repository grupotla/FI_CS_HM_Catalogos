<?php

/**
 * This is the model class for table "contactos_enums".
 *
 * The followings are the available columns in table 'contactos_enums':
 * @property integer $id
 * @property string $indice
 * @property string $descripcion
 * @property string $status
 * @property string $catalogo
 * @property string $tabla_ref
 * @property string $campo_ref
 *
 * The followings are the available model relations:
 * @property ContactosDivisiones[] $contactosDivisiones
 * @property ContactosDivisiones[] $contactosDivisiones1
 * @property ContactosDivisiones[] $contactosDivisiones2
 * @property ContactosDivisiones[] $contactosDivisiones3
 * @property ContactosDivisiones[] $contactosDivisiones4
 * @property ContactosDivisiones[] $contactosDivisiones5
 * @property ContactosDivisiones[] $contactosDivisiones6
 * @property ContactosDivisiones[] $contactosDivisiones7
 * @property ContactosMenu[] $contactosMenus
 * @property ContactosMenu[] $contactosMenus1
 * @property ContactosUsersMenu[] $contactosUsersMenus
 */
class ContactosEnums extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contactos_enums';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('indice, descripcion, status, catalogo, tabla_ref, campo_ref', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, indice, descripcion, status, catalogo, tabla_ref, campo_ref', 'safe', 'on'=>'search'),
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
			'contactosDivisiones' => array(self::HAS_MANY, 'ContactosDivisiones', 'area_enum'),
			'contactosDivisiones1' => array(self::HAS_MANY, 'ContactosDivisiones', 'carga_enum'),
			'contactosDivisiones2' => array(self::HAS_MANY, 'ContactosDivisiones', 'catalogo'),
			'contactosDivisiones3' => array(self::HAS_MANY, 'ContactosDivisiones', 'copia'),
			'contactosDivisiones4' => array(self::HAS_MANY, 'ContactosDivisiones', 'impexp_enum'),
			'contactosDivisiones5' => array(self::HAS_MANY, 'ContactosDivisiones', 'rechazo'),
			'contactosDivisiones6' => array(self::HAS_MANY, 'ContactosDivisiones', 'status'),
			'contactosDivisiones7' => array(self::HAS_MANY, 'ContactosDivisiones', 'tipo_persona'),
			'contactosMenus' => array(self::HAS_MANY, 'ContactosMenu', 'mn_st'),
			'contactosMenus1' => array(self::HAS_MANY, 'ContactosMenu', 'mn_viewer'),
			'contactosUsersMenus' => array(self::HAS_MANY, 'ContactosUsersMenu', 'um_st'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id contactos_enums',
			'indice' => 'Indice',
			'descripcion' => 'Descripcion',
			'status' => 'Status',
			'catalogo' => 'Tipo Catalogo',
			'tabla_ref' => 'Tabla Referencia',
			'campo_ref' => 'Campo Referencia',
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
		$criteria->compare('indice',$this->indice,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('catalogo',$this->catalogo,true);
		$criteria->compare('tabla_ref',$this->tabla_ref,true);
		$criteria->compare('campo_ref',$this->campo_ref,true);
		//$criteria->condition = "";		
		//$criteria->order = "";
		
		
				
		Yii::app()->session['ContactosEnums_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ContactosEnums the static model class
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
