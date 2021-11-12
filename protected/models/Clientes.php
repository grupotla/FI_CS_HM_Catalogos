<?php

/**
 * This is the model class for table "clientes".
 *
 * The followings are the available columns in table 'clientes':
 * @property string $id_cliente
 * @property string $codigo_tributario
 * @property string $nombre_cliente
 * @property string $nombre_facturar
 * @property string $id_vendedor
 * @property integer $id_tipo_cliente
 * @property integer $id_grupo
 * @property integer $id_cobrador
 * @property integer $id_estatus
 * @property boolean $es_consigneer
 * @property boolean $es_shipper
 * @property integer $id_frecuencia
 * @property integer $id_credito
 * @property string $fecha_creacion
 * @property double $hora_creacion
 * @property string $id_clase
 * @property string $id_anterior
 * @property string $id_usuario_creacion
 * @property string $fecha_uvisita
 * @property string $usr
 * @property string $pwd
 * @property string $id_sales_support
 * @property string $ultima_fecha_descarga
 * @property integer $encuesta_id
 * @property integer $encuesta
 * @property string $id_pais
 * @property integer $id_regimen
 * @property string $codigo_tributario2
 * @property string $observacion
 * @property string $id_usuario_modificacion
 * @property string $fecha_modificado
 * @property string $ultimo_tipo_movimiento
 * @property boolean $ultimo_movimiento_asegurado
 * @property integer $requiere_rubro_alias
 * @property string $id_vendedor_grh
 * @property string $id_sales_support_grh
 * @property string $ref_interna_pricing
 * @property boolean $con_cotizacion
 * @property integer $marca
 * @property string $email
 * @property boolean $es_coloader
 * @property boolean $incluir_saldo
 * @property integer $cto_id
 * @property string $cto_fecha
 * @property integer $id_documento
 * @property integer $id_estatus_bk
 * @property string $id_cliente_ref
 *
 * The followings are the available model relations:
 * @property TarifasComisiones[] $tarifasComisiones
 * @property ShippersSolicitudTemp[] $shippersSolicitudTemps
 * @property ShippersSolicitud[] $shippersSolicituds
 * @property ServicioXOrigenCliente[] $servicioXOrigenClientes
 * @property Routings[] $routings
 * @property Routings[] $routings1
 * @property Routings[] $routings2
 * @property Routings[] $routings3
 * @property PerfilCliente[] $perfilClientes
 * @property OtrosServiciosCliente[] $otrosServiciosClientes
 * @property Direcciones[] $direcciones
 * @property DestinosCliente[] $destinosClientes
 * @property CreditosClientes[] $creditosClientes
 * @property CreditoClienteBaw[] $creditoClienteBaws
 * @property ClientesCuentas[] $clientesCuentases
 * @property ClientesAduana[] $clientesAduanas
 * @property CliTelefonos[] $cliTelefonoses
 * @property Grupos $idGrupo
 * @property Cobradores $idCobrador
 * @property Transporte $ultimoTipoMovimiento
 * @property ClasesCliente $idClase
 * @property Creditos $idCredito
 * @property Clientes $idCliente
 * @property Clientes $clientes
 * @property Paises $idPais
 * @property RegimenTributario $idRegimen
 * @property ClientesOperacionesTipo $cto
 * @property TiposCliente $idTipoCliente
 */
class Clientes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'clientes';
	}

	public $dato;
	public $field;
	public $asDialog;
	public $direccion_completa;
	public $id;
	public $unificador_recibe;
	public $unificador_entrega;

	public $logo;
	public $logoupdate;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		//$permisos = ContactosUsersMenu::ModelBlockFields(6);
		//Yii::app()->session['permisos'] = $permisos;

		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.

		//if (substr(Yii::app()->session['pais'],0,2) == "CR")
		//	$dir1 = array('id_tipo_identificacion_tributaria, direccion_completa', 'required');
		//else
		//	$dir1 = array('direccion_completa', 'required');


		return array(
			array('id_tipo_identificacion_tributaria, direccion_completa', 'required'),

			//INSERT CONSIGNEER
			array('id_pais, nombre_cliente, nombre_facturar, codigo_tributario, email, id_vendedor','required', 'on'=>'ScenarioConsigneer'),
			array('nombre_cliente, nombre_facturar, codigo_tributario, fecha_creacion', 'readonly', 'on'=>'ScenarioConsigneer'),

			//INSERT SHIPPER
			array('id_pais, nombre_cliente', 'required', 'on'=>'ScenarioShipper'),
			array('nombre_cliente,fecha_creacion', 'readonly', 'on'=>'ScenarioShipper'),

			//UPDATE CONSIGNEER ADMIN
			array('id_pais, nombre_cliente, nombre_facturar, codigo_tributario, email, id_vendedor', 'required', 'on'=>'ScenarioConsigneerUpdateAdmin'),
			array('nombre_cliente, nombre_facturar, codigo_tributario, fecha_creacion', 'readonly', 'on'=>'ScenarioConsigneerUpdateAdmin'),

			//UPDATE SHIPPER ADMIN
			array('id_pais, nombre_cliente', 'required', 'on'=>'ScenarioShipperUpdateAdmin'),
			array('nombre_cliente,fecha_creacion', 'readonly', 'on'=>'ScenarioShipperUpdateAdmin'),


			//UPDATE CONSIGNEER USER
			array('id_pais, nombre_cliente, nombre_facturar, codigo_tributario, email, id_vendedor', 'required', 'on'=>'ScenarioConsigneerUpdateUser'),
			array('pencil_nombre, pencil_facturar, pencil_tributario,fecha_creacion', 'disabled', 'on'=>'ScenarioConsigneerUpdateUser'), //id_pais,  2016-11-08 la validacion paso al _form porque paises fuera de la reion pueden ser editados
			array('nombre_cliente, nombre_facturar, codigo_tributario', 'readonly', 'on'=>'ScenarioConsigneerUpdateUser'),
			//esto porque de shipper pueden cambiar a consigner y deben llenar los otros datos

			//UPDATE SHIPPER USER
			array('id_pais, nombre_cliente', 'required', 'on'=>'ScenarioShipperUpdateUser'),
			array('nombre_cliente, pencil_nombre, fecha_creacion', 'disabled', 'on'=>'ScenarioShipperUpdateUser'),//id_pais,  2016-11-08

			array(Yii::app()->session['permisos'][Yii::app()->controller->id]['fields'].'id_usuario_creacion, hora_creacion, id_usuario_modificacion, fecha_modificado', 'disabled'),

			array('dato, field', 'required', 'on'=>'ScenarioEdit'),

			array('id_tipo_cliente, id_grupo, id_cobrador, id_estatus, id_frecuencia, id_credito, encuesta_id, encuesta, id_regimen, requiere_rubro_alias, marca, cto_id, id_documento, id_estatus_bk, id_tipo_identificacion_tributaria', 'numerical', 'integerOnly'=>true),
			array('hora_creacion', 'numerical'),
			array('codigo_tributario', 'length', 'max'=>30),
			array('nombre_cliente, nombre_facturar', 'length', 'max'=>150),
			array('id_clase, id_pais', 'length', 'max'=>2),
			array('usr', 'length', 'max'=>40),
			array('pwd', 'length', 'max'=>35),
			array('codigo_tributario2', 'length', 'max'=>20),
			array('ref_interna_pricing', 'length', 'max'=>50),
			array('email', 'length', 'max'=>120),
			array('id_vendedor, es_consigneer, es_shipper, fecha_creacion, id_anterior, id_usuario_creacion, fecha_uvisita, id_sales_support, ultima_fecha_descarga, observacion, id_usuario_modificacion, fecha_modificado, ultimo_tipo_movimiento, ultimo_movimiento_asegurado, id_vendedor_grh, id_sales_support_grh, con_cotizacion, es_coloader, incluir_saldo, cto_fecha, id_cliente_ref, id_tipo_identificacion_tributaria', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_cliente, codigo_tributario, nombre_cliente, nombre_facturar, id_vendedor, id_tipo_cliente, id_grupo, id_cobrador, id_estatus, es_consigneer, es_shipper, id_frecuencia, id_credito, fecha_creacion, hora_creacion, id_clase, id_anterior, id_usuario_creacion, fecha_uvisita, usr, pwd, id_sales_support, ultima_fecha_descarga, encuesta_id, encuesta, id_pais, id_regimen, codigo_tributario2, observacion, id_usuario_modificacion, fecha_modificado, ultimo_tipo_movimiento, ultimo_movimiento_asegurado, requiere_rubro_alias, id_vendedor_grh, id_sales_support_grh, ref_interna_pricing, con_cotizacion, marca, email, es_coloader, incluir_saldo, cto_id, cto_fecha, id_documento, id_estatus_bk, id_cliente_ref, id_tipo_identificacion_tributaria', 'safe', 'on'=>'search'),
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
			/*'tarifasComisiones' => array(self::HAS_MANY, 'TarifasComisiones', 'id_cliente'),
			'shippersSolicitudTemps' => array(self::HAS_MANY, 'ShippersSolicitudTemp', 'id_shipper'),
			'shippersSolicituds' => array(self::HAS_MANY, 'ShippersSolicitud', 'id_shipper'),
			'servicioXOrigenClientes' => array(self::HAS_MANY, 'ServicioXOrigenCliente', 'id_cliente'),
			'routings' => array(self::HAS_MANY, 'Routings', 'id_cliente'),
			'routings1' => array(self::HAS_MANY, 'Routings', 'id_facturar'),
			'routings2' => array(self::HAS_MANY, 'Routings', 'id_shipper'),
			'routings3' => array(self::HAS_MANY, 'Routings', 'id_notify'),
			'perfilClientes' => array(self::HAS_MANY, 'PerfilCliente', 'id_cliente'),
			'otrosServiciosClientes' => array(self::HAS_MANY, 'OtrosServiciosCliente', 'id_cliente'),

			'destinosClientes' => array(self::HAS_MANY, 'DestinosCliente', 'id_cliente'),
			'creditosClientes' => array(self::HAS_MANY, 'CreditosClientes', 'id_cliente'),
			'creditoClienteBaws' => array(self::HAS_MANY, 'CreditoClienteBaw', 'ccb_id_cliente'),
			'clientesCuentases' => array(self::HAS_MANY, 'ClientesCuentas', 'id_cliente'),
			'clientesAduanas' => array(self::HAS_MANY, 'ClientesAduana', 'id_cliente'),
			'cliTelefonoses' => array(self::HAS_MANY, 'CliTelefonos', 'id_cliente'),
			'idGrupo' => array(self::BELONGS_TO, 'Grupos', 'id_grupo'),
			'idCobrador' => array(self::BELONGS_TO, 'Cobradores', 'id_cobrador'),
			'ultimoTipoMovimiento' => array(self::BELONGS_TO, 'Transporte', 'ultimo_tipo_movimiento'),
			'idClase' => array(self::BELONGS_TO, 'ClasesCliente', 'id_clase'),
			'idCredito' => array(self::BELONGS_TO, 'Creditos', 'id_credito'),
			'idCliente' => array(self::BELONGS_TO, 'Clientes', 'id_cliente'),
			'clientes' => array(self::HAS_ONE, 'Clientes', 'id_cliente'),

			'idRegimen' => array(self::BELONGS_TO, 'RegimenTributario', 'id_regimen'),
			'cto' => array(self::BELONGS_TO, 'ClientesOperacionesTipo', 'cto_id'),
			'idTipoCliente' => array(self::BELONGS_TO, 'TiposCliente', 'id_tipo_cliente'),
*/
			'direcciones' => array(self::HAS_MANY, 'Direcciones', 'id_cliente', 'order'=>'id_direccion ASC'),
			'aereos' => array(self::HAS_MANY, 'ClientesAereo', 'id_cliente', 'order'=>'no_cuenta ASC'),
			'contactos' => array(self::HAS_MANY, 'Contactos', 'id_cliente', 'order'=>'contacto_id ASC'),

			'usuarioModificacion' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'id_usuario_modificacion'),
			'usuarioCreacion' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'id_usuario_creacion'),

			'idVendedor' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'id_vendedor'),

//'uniEntrega' => array(self::BELONGS_TO, 'TblUnificadorLog', '', 'foreignKey' => array('id_cliente'=>'tul_cli_entrega_id')),
//'uniRecibe' => array(self::BELONGS_TO, 'TblUnificadorLog', '', 'foreignKey' => array('id_cliente'=>'tul_cli_recibe_id')),

//'uniEntrega2' => array(self::HAS_MANY, 'TblUnificadorLog', '', 'foreignKey' => array('tul_cli_entrega_id'=>'id_cliente')),

			'uniEntrega2' => array(self::HAS_MANY, 'TblUnificadorLog', 'tul_cli_entrega_id'),

//'uniRecibe2' => array(self::HAS_MANY, 'TblUnificadorLog2', '', 'foreignKey' => array('tul_cli_recibe_id'=>'id_cliente')),

			'uniRecibe2' => array(self::HAS_MANY, 'TblUnificadorLog', 'tul_cli_recibe_id'),


			'contactos2' => array(self::HAS_ONE, 'Contactos', 'id_cliente',
			// 'condition'=>"activo='t'",
			'order'=>'contacto_id ASC'),


			'ClienteTIT' => array(self::BELONGS_TO, 'ClientesTIT', 'id_tipo_identificacion_tributaria'),

			'idPais' => array(self::BELONGS_TO, 'Paises', 'id_pais'),


		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cliente' => 'Id Cliente',
			'codigo_tributario' => 'Codigo Tributario',
			'nombre_cliente' => 'Nombre Cliente',
			'nombre_facturar' => 'Nombre Facturar',
			'id_vendedor' => 'Vendedor',
			'id_tipo_cliente' => 'Tipo Cliente',
			'id_grupo' => 'Id Grupo',
			'id_cobrador' => 'Id Cobrador',
			'id_estatus' => 'Estatus',
			'es_consigneer' => 'Consigneer',
			'es_shipper' => 'Shipper',
			'id_frecuencia' => 'Se agregó el valor por default 1 para que no presente problemas en las planificaciones de vendedores',
			'id_credito' => 'Id Credito',
			'fecha_creacion' => 'Fecha Creacion',
			'hora_creacion' => 'Hora Creacion',
			'id_clase' => 'Id Clase',
			'id_anterior' => 'Id Anterior',
			'id_usuario_creacion' => 'Usuario Creacion',
			'fecha_uvisita' => 'Fecha Uvisita',
			'usr' => 'se utiliza para almacenar el usuario que tendra acceso para visualizar su tracking',
			'pwd' => 'password para acceso a pagina de tracking',
			'id_sales_support' => 'Id Sales Support',
			'ultima_fecha_descarga' => 'fecha de descarga del producto del cliente',
			'encuesta_id' => 'tipo de encuesta (depto. servicio, depto. ventas)',
			'encuesta' => 'numero de encuesta en customer service',
			'id_pais' => 'Pais',
			'id_regimen' => 'Regimen Tributario',//'afecto a impuestos si/no',
			'codigo_tributario2' => 'Nit 1',
			'observacion' => 'Observacion / Giro',
			'id_usuario_modificacion' => 'Usuario Modifica',
			'fecha_modificado' => 'Fecha Modificacion',
			'ultimo_tipo_movimiento' => 'Ultimo Tipo Movimiento',
			'ultimo_movimiento_asegurado' => 'Ultimo Movimiento Asegurado',
			'requiere_rubro_alias' => 'Requiere Rubro Alias',
			'id_vendedor_grh' => 'Id Vendedor Grh',
			'id_sales_support_grh' => 'Id Sales Support Grh',
			'ref_interna_pricing' => 'Ref Interna Pricing',
			'con_cotizacion' => 'Con Cotizacion',
			'marca' => 'Marca',
			'email' => 'Email Factura Electronica',
			'es_coloader' => 'Coloader',
			'incluir_saldo' => 'Incluir Saldo',
			'cto_id' => 'Cto',
			'cto_fecha' => 'Cto Fecha',
			'id_documento' => 'Id Documento',
			'id_estatus_bk' => 'Id Estatus Bk',
			'id_cliente_ref' => 'Id Cliente Ref',
			'id_tipo_identificacion_tributaria' => 'Tipo Identidad Tributaria',
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

		$criteria->compare('id_cliente',$this->id_cliente);
		$criteria->compare('codigo_tributario',$this->codigo_tributario,true,'ILIKE');
		$criteria->compare('nombre_cliente',$this->nombre_cliente,true,'ILIKE');
		$criteria->compare('nombre_facturar',$this->nombre_facturar,true,'ILIKE');
		$criteria->compare('id_vendedor',$this->id_vendedor);
		$criteria->compare('id_tipo_cliente',$this->id_tipo_cliente);
		$criteria->compare('id_grupo',$this->id_grupo);
		$criteria->compare('id_cobrador',$this->id_cobrador);
		$criteria->compare('id_estatus',$this->id_estatus);
		$criteria->compare('es_consigneer',$this->es_consigneer);
		$criteria->compare('es_shipper',$this->es_shipper);
		$criteria->compare('id_frecuencia',$this->id_frecuencia);
		$criteria->compare('id_credito',$this->id_credito);
		$criteria->compare('fecha_creacion',$this->fecha_creacion);
		$criteria->compare('hora_creacion',$this->hora_creacion);
		$criteria->compare('id_clase',$this->id_clase,true);
		$criteria->compare('id_anterior',$this->id_anterior,true);
		$criteria->compare('id_usuario_creacion',$this->id_usuario_creacion,true);
		$criteria->compare('fecha_uvisita',$this->fecha_uvisita,true);
		$criteria->compare('usr',$this->usr,true);
		$criteria->compare('pwd',$this->pwd,true);
		$criteria->compare('id_sales_support',$this->id_sales_support,true);
		$criteria->compare('ultima_fecha_descarga',$this->ultima_fecha_descarga,true);
		$criteria->compare('encuesta_id',$this->encuesta_id);
		$criteria->compare('encuesta',$this->encuesta);
		$criteria->compare('id_pais',$this->id_pais,true,'ILIKE');
		$criteria->compare('id_regimen',$this->id_regimen);
		$criteria->compare('codigo_tributario2',$this->codigo_tributario2,true);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('id_usuario_modificacion',$this->id_usuario_modificacion,true);
		$criteria->compare('fecha_modificado',$this->fecha_modificado,true);
		$criteria->compare('ultimo_tipo_movimiento',$this->ultimo_tipo_movimiento,true);
		$criteria->compare('ultimo_movimiento_asegurado',$this->ultimo_movimiento_asegurado);
		$criteria->compare('requiere_rubro_alias',$this->requiere_rubro_alias);
		$criteria->compare('id_vendedor_grh',$this->id_vendedor_grh,true);
		$criteria->compare('id_sales_support_grh',$this->id_sales_support_grh,true);
		$criteria->compare('ref_interna_pricing',$this->ref_interna_pricing,true);
		$criteria->compare('con_cotizacion',$this->con_cotizacion);
		$criteria->compare('marca',$this->marca);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('es_coloader',$this->es_coloader);
		$criteria->compare('incluir_saldo',$this->incluir_saldo);
		$criteria->compare('cto_id',$this->cto_id);
		$criteria->compare('cto_fecha',$this->cto_fecha,true);
		$criteria->compare('id_documento',$this->id_documento);
		$criteria->compare('id_estatus_bk',$this->id_estatus_bk);
		$criteria->compare('id_cliente_ref',$this->id_cliente_ref,true);

		Yii::app()->session['Clientes_records'] = $criteria;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'id_cliente Desc',
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Clientes the static model class
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
