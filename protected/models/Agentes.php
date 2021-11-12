<?php

/**
 * This is the model class for table "agentes".
 *
 * The followings are the available columns in table 'agentes':
 * @property string $agente_id
 * @property string $agente
 * @property boolean $activo
 * @property string $direccion
 * @property string $telefono
 * @property string $fax
 * @property string $correo
 * @property string $contacto
 * @property integer $contabilidad_id
 * @property string $fecha_creacion
 * @property string $hora_creacion
 * @property string $id_grupo
 * @property string $id_usuario_creacion
 * @property string $id_usuario_modificacion
 * @property string $accountno
 * @property string $iatano
 * @property string $defaultval
 * @property string $countries
 * @property string $id_network
 * @property integer $tiporegimen
 * @property integer $dias
 * @property string $nit
 * @property string $nit2
 * @property string $fecha_modificacion
 * @property integer $fam_agente
 * @property string $pais_terrestre_auto
 * @property boolean $es_neutral
 * @property string $puesto
 * @property integer $agentes_grupo_id
 * @property string $monto
 *
 * The followings are the available model relations:
 * @property TarifasComisiones[] $tarifasComisiones
 * @property Routings[] $routings
 * @property AgentesRebates[] $agentesRebates
 * @property AgentesContactos[] $agentesContactoses
 * @property UsuariosEmpresas $idUsuarioCreacion
 * @property UsuariosEmpresas $idUsuarioModificacion
 * @property Networks $idNetwork
 * @property AgentesGrupo $agentesGrupo
 */
class Agentes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'agentes';
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{

		//$permisos = ContactosUsersMenu::ModelBlockFields(4);
		//Yii::app()->session['permisos'] = $permisos;				
		
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		

		//, id_grupo a solicitud de Roxana 2016-11-04 Ticket#2016110404000471 — Fwd: Id Grupo ingreso de Agentes 
		return array(
			array('countries, agente, direccion, correo, puesto, contacto, telefono, id_network', 'required'),
			
			
			array(
			
			(isset(Yii::app()->session['permisos'][Yii::app()->controller->id]) ? Yii::app()->session['permisos'][Yii::app()->controller->id]['fields'] : '') .'id_usuario_creacion, fecha_creacion, hora_creacion, id_usuario_modificacion, fecha_modificacion', 'disabled'), 
			
			array('contabilidad_id, tiporegimen, dias, fam_agente, agentes_grupo_id', 'numerical', 'integerOnly'=>true),
			array('direccion, correo', 'length', 'max'=>250),
			array('telefono, fax, nit, nit2, puesto', 'length', 'max'=>30),
			array('contacto', 'length', 'max'=>50),
			array('accountno, iatano', 'length', 'max'=>25),
			array('defaultval', 'length', 'max'=>8),
			array('countries', 'length', 'max'=>45),
			array('pais_terrestre_auto', 'length', 'max'=>2),
			array('monto', 'length', 'max'=>12),
			array('agente, activo, fecha_creacion, hora_creacion, id_grupo, id_usuario_creacion, id_usuario_modificacion, id_network, fecha_modificacion, es_neutral', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('agente_id, agente, activo, direccion, telefono, fax, correo, contacto, contabilidad_id, fecha_creacion, hora_creacion, id_grupo, id_usuario_creacion, id_usuario_modificacion, accountno, iatano, defaultval, countries, id_network, tiporegimen, dias, nit, nit2, fecha_modificacion, fam_agente, pais_terrestre_auto, es_neutral, puesto, agentes_grupo_id, monto', 'safe', 'on'=>'search'),
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
			'tarifasComisiones' => array(self::HAS_MANY, 'TarifasComisiones', 'id_agente'),
			'routings' => array(self::HAS_MANY, 'Routings', 'agente_id'),
			'agentesRebates' => array(self::HAS_MANY, 'AgentesRebates', 'agente_id'),
			//'agentesContactoses' => array(self::HAS_MANY, 'AgentesContactos', 'agente_id'),


			'idNetwork' => array(self::BELONGS_TO, 'Networks', 'id_network'),
			'agentesGrupo' => array(self::BELONGS_TO, 'AgentesGrupo', 'agentes_grupo_id'),
			
			'usuarioModificacion' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'id_usuario_modificacion'),
			'usuarioCreacion' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'id_usuario_creacion'),
			'idPais' => array(self::BELONGS_TO, 'Paises', 'countries'),
			'idRegimen' => array(self::BELONGS_TO, 'RegimenTributario', 'tiporegimen'),
		
					
			'divisiones' => array(self::HAS_MANY, 'ContactosDivisiones', '', 'foreignKey' => array('id_catalogo'=>'agente_id'),'condition'=>"catalogo = 'AGENTE'", 'order'=>'id ASC'),	
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'agente_id' => 'Id Agente',
			'agente' => 'Nombre Agente',
			'activo' => 'Activo',
			'direccion' => Yii::t('app','model.agentes.direccion'),
			'telefono' => 'Telefono',
			'fax' => 'Fax',
			'correo' => 'Correo',
			'contacto' => 'Nombre Contacto',
			'contabilidad_id' => 'ID Contabilidad',
			'fecha_creacion' => 'Fecha Creacion',
			'hora_creacion' => 'Hora Creacion',
			'id_grupo' => 'Id Grupo',
			'id_usuario_creacion' => 'Id Usuario Creacion',
			'id_usuario_modificacion' => 'Id Usuario Modificacion',
			'accountno' => 'Accountno',
			'iatano' => 'iatano',
			'defaultval' => 'Defaultval',
			'countries' => 'Countries',
			'id_network' => 'Id Network',
			'tiporegimen' => 'Tiporegimen',
			'dias' => 'Dias',
			'nit' => 'Nit',
			'nit2' => 'Nit2',
			'fecha_modificacion' => 'Fecha Modificacion',
			'fam_agente' => 'Fam Agente',
			'pais_terrestre_auto' => 'Pais Terrestre Auto',
			'es_neutral' => 'Es Neutral',
			'puesto' => 'Puesto',
			'agentes_grupo_id' => 'Agentes Grupo',
			'monto' => 'Monto',
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

		$criteria->compare('agente_id',$this->agente_id);
		$criteria->compare('agente',$this->agente,true,'ILIKE');
		$criteria->compare('activo',$this->activo);
		$criteria->compare('direccion',$this->direccion,true,'ILIKE');
		$criteria->compare('telefono',$this->telefono,true,'ILIKE');
		$criteria->compare('fax',$this->fax,true,'ILIKE');
		$criteria->compare('correo',$this->correo,true,'ILIKE');
		$criteria->compare('contacto',$this->contacto,true,'ILIKE');
		$criteria->compare('contabilidad_id',$this->contabilidad_id);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('hora_creacion',$this->hora_creacion,true);
		$criteria->compare('id_grupo',$this->id_grupo,true);
		$criteria->compare('id_usuario_creacion',$this->id_usuario_creacion,true);
		$criteria->compare('id_usuario_modificacion',$this->id_usuario_modificacion,true);
		$criteria->compare('accountno',$this->accountno,true);
		$criteria->compare('iatano',$this->iatano,true);
		$criteria->compare('defaultval',$this->defaultval,true);
		$criteria->compare('countries',$this->countries,true);
		$criteria->compare('id_network',$this->id_network,true);
		$criteria->compare('tiporegimen',$this->tiporegimen);
		$criteria->compare('dias',$this->dias);
		$criteria->compare('nit',$this->nit,true);
		$criteria->compare('nit2',$this->nit2,true);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);
		$criteria->compare('fam_agente',$this->fam_agente);
		$criteria->compare('pais_terrestre_auto',$this->pais_terrestre_auto,true);
		$criteria->compare('es_neutral',$this->es_neutral);
		$criteria->compare('puesto',$this->puesto,true);
		$criteria->compare('agentes_grupo_id',$this->agentes_grupo_id);
		$criteria->compare('monto',$this->monto,true);
		//$criteria->condition = "";		
		//$criteria->order = "";
		
		Yii::app()->session['Agentes_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'agente_id Desc',
			),						
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Agentes the static model class
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
