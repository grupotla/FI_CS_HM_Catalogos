<?php

/**
 * This is the model class for table "proveedores".
 *
 * The followings are the available columns in table 'proveedores':
 * @property string $numero
 * @property integer $empresa
 * @property string $nit
 * @property string $nombre
 * @property string $descripcion
 * @property string $provision
 * @property string $cuenta
 * @property integer $status
 * @property integer $bienes
 * @property integer $local
 * @property integer $fovial
 * @property string $direccion
 * @property string $contacto
 * @property string $telefono
 * @property string $fax
 * @property string $correo
 * @property string $observacion
 * @property integer $dias
 * @property integer $usuario
 * @property integer $usuario2
 * @property string $modificado
 * @property integer $tiporegimen
 * @property string $nit2
 * @property integer $requiere_oc
 * @property string $monto
 * @property string $tipo
 * @property string $id_pais
 */
class Proveedores extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'proveedores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('nombre, empresa, id_pais, nit, direccion, descripcion, tiporegimen, tipo', 'required'),
			array('nombre, empresa, id_pais, nit, direccion, descripcion, tiporegimen', 'required'),
			array('empresa, status, bienes, local, fovial, dias, usuario, usuario2, usuario3, tiporegimen, requiere_oc', 'numerical', 'integerOnly'=>true),
			
			array(Yii::app()->session['permisos'][Yii::app()->controller->id]['fields'].'usuario, usuario2, usuario3, modificado, creado, autorizado', 'disabled'), 			
			array('nit, contacto, nit2', 'length', 'max'=>30),
			array('nombre, descripcion, direccion', 'length', 'max'=>75),
			array('provision, cuenta', 'length', 'max'=>15),
			//array('telefono, fax, tipo', 'length', 'max'=>20),
			array('telefono, fax', 'length', 'max'=>20),
			array('correo', 'length', 'max'=>230),
			array('observacion', 'length', 'max'=>100),
			array('monto', 'length', 'max'=>10),
			array('id_pais', 'length', 'max'=>2),
			array('modificado, creado, autorizado, permanente', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			//array('numero, empresa, nit, nombre, descripcion, provision, cuenta, status, bienes, local, fovial, direccion, contacto, telefono, fax, correo, observacion, dias, usuario, usuario2, usuario3, modificado, creado, autorizado, tiporegimen, nit2, requiere_oc, monto, tipo, id_pais, permanente', 'safe', 'on'=>'search'),

			array('numero, empresa, nit, nombre, descripcion, provision, cuenta, status, bienes, local, fovial, direccion, contacto, telefono, fax, correo, observacion, dias, usuario, usuario2, usuario3, modificado, creado, autorizado, tiporegimen, nit2, requiere_oc, monto, id_pais, permanente', 'safe', 'on'=>'search'),
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
			'tiporegimen0' => array(self::BELONGS_TO, 'Tiporegimen', 'tiporegimen'),
			'idPais' => array(self::BELONGS_TO, 'Paises', 'id_pais'),
			'empresa0' => array(self::BELONGS_TO, 'Empresas', 'empresa'),
			'usuario00' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'usuario'),
			'usuario02' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'usuario2'),
			'usuario03' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'usuario3'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'numero' => 'Id Proveedor',
			'empresa' => 'Empresa',
			'nit' => 'Codigo Tributario',
			'nombre' => 'Nombre Proveedor',
			'descripcion' => 'Descripcion',
			'provision' => 'Provision',
			'cuenta' => 'Cuenta',
			'status' => 'Status',
			'bienes' => 'Bienes',
			'local' => 'Local',
			'fovial' => 'Fovial',
			'direccion' => 'Direccion',
			'contacto' => 'Contacto',
			'telefono' => 'Telefono',
			'fax' => 'Fax',
			'correo' => 'Correo',
			'observacion' => 'Observacion',
			'dias' => 'Dias',
			'usuario' => 'Usuario Creacion',
			'usuario2' => 'Usuario Modifica',
			'usuario3' => 'Usuario Autoriza',
			'modificado' => 'Fecha Modifica',
			'autorizado' => 'Fecha Autoriza',
			'tiporegimen' => 'Tiporegimen',
			'nit2' => 'Nit2',
			'requiere_oc' => 'Requiere Oc',
			'monto' => 'Monto',
			//'tipo' => 'Tipo',
			'id_pais' => 'Id Pais',
			'permanente' => 'Permanente',
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

		$criteria->compare('numero',$this->numero);
		$criteria->compare('empresa',$this->empresa);
		$criteria->compare('nit',$this->nit,true,'ILIKE');
		$criteria->compare('nombre',$this->nombre,true,'ILIKE');
		$criteria->compare('descripcion',$this->descripcion,true,'ILIKE');
		$criteria->compare('provision',$this->provision,true,'ILIKE');
		$criteria->compare('cuenta',$this->cuenta,true,'ILIKE');
		$criteria->compare('status',$this->status);
		$criteria->compare('bienes',$this->bienes);
		$criteria->compare('local',$this->local);
		$criteria->compare('fovial',$this->fovial);
		$criteria->compare('direccion',$this->direccion,true,'ILIKE');
		$criteria->compare('contacto',$this->contacto,true,'ILIKE');
		$criteria->compare('telefono',$this->telefono,true,'ILIKE');
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('dias',$this->dias);
		$criteria->compare('usuario',$this->usuario);
		$criteria->compare('usuario2',$this->usuario2);
		$criteria->compare('usuario3',$this->usuario2);
		$criteria->compare('modificado',$this->modificado,true);
		$criteria->compare('creado',$this->modificado,true);
		$criteria->compare('autorizado',$this->modificado,true);
		$criteria->compare('tiporegimen',$this->tiporegimen);
		$criteria->compare('nit2',$this->nit2,true);
		$criteria->compare('requiere_oc',$this->requiere_oc);
		$criteria->compare('monto',$this->monto,true);
		//$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('id_pais',$this->id_pais,true);
		$criteria->compare('permanente',$this->permanente);
		//$criteria->condition = "";		
		//$criteria->order = "";
		
		//
		//		
		//Yii::app()->session['Proveedores_records'] = $criteria;		
		
		Yii::app()->session['Proveedores_records'] = $criteria;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'numero DESC',
			),						
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Proveedores the static model class
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
