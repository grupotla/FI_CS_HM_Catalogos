<?php

/**
 * This is the model class for table "contactos".
 *
 * The followings are the available columns in table 'contactos':
 * @property string $contacto_id
 * @property string $id_cliente
 * @property string $nombres
 * @property string $telefono
 * @property string $fax
 * @property string $email
 * @property boolean $activo
 * @property string $cargo
 * @property integer $id_usuario_ingreso
 * @property string $ingreso
 * @property integer $id_usuario_modifica
 * @property string $modifica
 */
class Contactos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contactos';
	}

	public function primaryKey(){
        return 'contacto_id';
    }	
    
	
	public $id;
/*
	public $area;
	public $impexp;
	public $carga;
	public $area_enum;
	public $impexp_enum;
	public $carga_enum;	
*/

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_cliente, nombres, telefono, email, cargo, area, impexp, carga, area_enum, impexp_enum, carga_enum, tipo_persona', 'required'),
			array('id_usuario_ingreso, id_usuario_modifica, ingreso, modifica', 'disabled'),
			array('id_usuario_ingreso, id_usuario_modifica', 'numerical', 'integerOnly'=>true),
			array('cargo', 'length', 'max'=>60),
			array('id_cliente, nombres, telefono, fax, email, activo, ingreso, modifica', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('contacto_id, id_cliente, nombres, telefono, fax, email, activo, cargo, id_usuario_ingreso, ingreso, id_usuario_modifica, modifica, area, impexp, carga, area_enum, impexp_enum, carga_enum, tipo_persona', 'safe', 'on'=>'search'),
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
			'usuarioModificacion' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'id_usuario_modifica'),
			'usuarioCreacion' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'id_usuario_ingreso'),		

			'areaEnum' => array(self::BELONGS_TO, 'ContactosEnums', 'area_enum'),
			'cargaEnum' => array(self::BELONGS_TO, 'ContactosEnums', 'carga_enum'),
			'impexpEnum' => array(self::BELONGS_TO, 'ContactosEnums', 'impexp_enum'),
			'tipoPersona' => array(self::BELONGS_TO, 'ContactosEnums', 'tipo_persona'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'contacto_id' => 'Contacto',
			'id_cliente' => 'Id Cliente',
			'nombres' => 'Nombre Completo',
			'telefono' => 'Telefono',
			'fax' => 'Fax',
			'email' => 'Email',
			'activo' => 'Activo',
			'cargo' => 'Cargo',
			'id_usuario_ingreso' => 'Id Usuario Ingreso',
			'ingreso' => 'Ingreso',
			'id_usuario_modifica' => 'Id Usuario Modifica',
			'modifica' => 'Modifica',
			'area' => 'Area',
			'impexp' => 'Import / Export',
			'carga' => 'Carga',
			'area_enum' => 'Producto',
			'impexp_enum' => 'Imp Exp',
			'carga_enum' => 'Sub Producto',
			'tipo_persona' => 'Tipo Contacto',
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

		$criteria->compare('contacto_id',$this->contacto_id,true);
		$criteria->compare('id_cliente',$this->id_cliente,true);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('activo',$this->activo);
		$criteria->compare('cargo',$this->cargo,true);
		$criteria->compare('id_usuario_ingreso',$this->id_usuario_ingreso);
		$criteria->compare('ingreso',$this->ingreso,true);
		$criteria->compare('id_usuario_modifica',$this->id_usuario_modifica);
		$criteria->compare('modifica',$this->modifica,true);


		$criteria->compare('area',$this->area,true,'ILIKE');
		$criteria->compare('impexp',$this->impexp,true,'ILIKE');
		$criteria->compare('carga',$this->carga,true,'ILIKE');
		$criteria->compare('area_enum',$this->area_enum,true);
		$criteria->compare('impexp_enum',$this->impexp_enum,true);
		$criteria->compare('carga_enum',$this->carga_enum,true);
		$criteria->compare('tipo_persona',$this->tipo_persona,true,'ILIKE');

		//$criteria->condition = "";		
		//$criteria->order = "";
		
		
				
		Yii::app()->session['Contactos_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contactos the static model class
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
