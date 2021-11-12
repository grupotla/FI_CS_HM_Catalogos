
<?php  $this->asDialog = true; ?>

<?php
		$dataProvider = new CArrayDataProvider($rawData=$model, array(
			'pagination'=>false,
		));
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'clientes-grid',
	'dataProvider'=>$dataProvider,
	'type' => 'hover striped bordered condensed',
	'selectableRows'=>1,
	'template' => "{summary}\n{pager}\n{items}\n{summary}\n{pager}",
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'pager'=>array(
		'class' => 'bootstrap.widgets.TbPager',
		'displayFirstAndLast' => true,
		//'class' 		 => 'CLinkPager',
        'header'         => '',
        'firstPageLabel' => TbHtml::icon(TbHtml::ICON_FAST_BACKWARD),
        'prevPageLabel'  => TbHtml::icon(TbHtml::ICON_STEP_BACKWARD),
        'nextPageLabel'  => TbHtml::icon(TbHtml::ICON_STEP_FORWARD),
        'lastPageLabel'  => TbHtml::icon(TbHtml::ICON_FAST_FORWARD),
    ),
	'columns'=>array(
/*
		'tul_cli_entrega_id',
		'tul_cli_recibe_id',
		'tul_usu_id',
		'tul_tpi_id',
		'tul_pai_id',
		'tul_fecha_creacion',
		'tul_estado',
*/

		array('name'=>'tul_cli_entrega_id','header'=>'ID'),

		array('name'=>'Cliente Entrega','value'=>'$data["idEntrega"]["nombre_cliente"]'),

		array('name'=>'tul_cli_recibe_id','header'=>'ID'),

		array('name'=>'Cliente Recibe','value'=>'$data["idRecibe"]["nombre_cliente"]'),

		array('name'=>'tul_usu_id','header'=>'Usuario'),
		array('name'=>'tul_tpi_id','header'=>'Tpi'),
		array('name'=>'tul_pai_id','header'=>'Pai'),
		array('name'=>'tul_fecha_creacion','header'=>'Fecha'),
		array('name'=>'tul_estado','header'=>'Estado'),


		//array('name'=>'id_cliente','value'=> 'isset($data->idCliente) ? $data->idCliente->codigo_tributario : $data->id_cliente '),
		/*
		'codigo_tributario',
		'nombre_cliente',
		'nombre_facturar',
		'id_vendedor',
		//array('name'=>'id_tipo_cliente','value'=> 'isset($data->idTipoCliente) ? $data->idTipoCliente->descripcion : $data->id_tipo_cliente '),
		/*
		//array('name'=>'id_grupo','value'=> 'isset($data->idGrupo) ? $data->idGrupo->nombre_grupo : $data->id_grupo '),
		//array('name'=>'id_cobrador','value'=> 'isset($data->idCobrador) ? $data->idCobrador->nombre_cobrador : $data->id_cobrador '),
		'id_estatus',
		'es_consigneer',
		'es_shipper',
		'id_frecuencia',
		//array('name'=>'id_credito','value'=> 'isset($data->idCredito) ? $data->idCredito->limite_credito_local : $data->id_credito '),
		'fecha_creacion',
		'hora_creacion',
		//array('name'=>'id_clase','value'=> 'isset($data->idClase) ? $data->idClase->descripcion : $data->id_clase '),
		'id_anterior',
		'id_usuario_creacion',
		'fecha_uvisita',
		'usr',
		'pwd',
		'id_sales_support',
		'ultima_fecha_descarga',
		'encuesta_id',
		'encuesta',
		//array('name'=>'id_pais','value'=> 'isset($data->idPais) ? $data->idPais->descripcion : $data->id_pais '),
		//array('name'=>'id_regimen','value'=> 'isset($data->idRegimen) ? $data->idRegimen->descripcion_regimen : $data->id_regimen '),
		'codigo_tributario2',
		'observacion',
		'id_usuario_modificacion',
		'fecha_modificado',
		//array('name'=>'ultimo_tipo_movimiento','value'=> 'isset($data->ultimoTipoMovimiento) ? $data->ultimoTipoMovimiento->descripcion : $data->ultimo_tipo_movimiento '),
		'ultimo_movimiento_asegurado',
		'requiere_rubro_alias',
		'id_vendedor_grh',
		'id_sales_support_grh',
		'ref_interna_pricing',
		'con_cotizacion',
		'marca',
		'email',
		'es_coloader',
		'incluir_saldo',
		//array('name'=>'cto_id','value'=> 'isset($data->cto) ? $data->cto->cto_nombre : $data->cto_id '),
		'cto_fecha',
		'id_documento',
		'id_estatus_bk',
		'id_cliente_ref',
		*/
		/*
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}', //{delete}',
			'header' => CHtml::link('<span class="icon-plus icon-white"></span>',Yii::app()->controller->createUrl('/Clientes/create'),array('class'=>'btn btn-small btn-primary','onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t("app","Update").' Clientes",1); return false; }', 'style' => 'display:' . (Yii::app()->session['permisos']['clientes']['clientes']['create'] == 1 ? 'inline' : 'none'))),
            'buttons'=>array(
                'update'=>
                    array(
                	 	'url'=>'$this->grid->controller->createUrl("/Clientes/update", array("id"=>$data->primaryKey))',
						'options'=>array(
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t("app","Update").' Clientes",2); return false; }',
	                    ),
	                    'visible' => Yii::app()->session['permisos']['clientes']['clientes']['update'] == 1 ? 'true' : 'false',
                   	),
                'delete'=>
                    array(
                	 	'url'=>'$this->grid->controller->createUrl("/Clientes/delete", array("id"=>$data->primaryKey))',),
            ),
		),*/
	),
)); ?>


<?php  $this->asDialog = false; ?>
