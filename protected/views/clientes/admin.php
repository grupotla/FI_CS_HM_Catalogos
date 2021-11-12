<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Manage',
);

$this->menu=array(

	array('label'=>Yii::t('app','List').' Clientes','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),

	array('label'=>Yii::t('app','Create').' Clientes','url'=>array('create','button'=>1, 'text'=>Yii::t('app','Create').' Clientes'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, 'visible'=> Yii::app()->session['p']['create'] == 1 ? true : false),

	//array('label'=>Yii::t('app','Search'),'url'=>array('search'), 'icon'=>TbHtml::ICON_SEARCH . " " . TbHtml::ICON_COLOR_WHITE),

	array('label'=>Yii::t('app','Excel'),'url'=>array('GenerateExcel'), 'icon'=>TbHtml::ICON_TH . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['excel'] == 1 ? true : false),

	array('label'=>Yii::t('app','Pdf'),'url'=>array('GeneratePdf'), 'icon'=>TbHtml::ICON_BOOK . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['pdf'] == 1 ? true : false),
);
?>


<h1><?php echo Yii::t('app','Manage'); ?> Clientes</h1>



<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'clientes-grid',
	'dataProvider'=>$model->search(),
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
	'filter'=>$model,
	'columns'=>array(

		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {view} {modify}',
			'header'=>'::&nbsp;Acciones&nbsp;::',

            'buttons'=>array(
                'update'=>
                    array(
                	 	'url'=>'$this->grid->controller->createUrl("update", array("id"=>$data->primaryKey))',
                	 	'icon'=>'icon-pencil icon-white',
						'options'=>array(
							'title'=>'Editar',
							"class"=>"btn btn-small btn-warning",
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t("app","Update").' Clientes",2); return false;}',
	                    ),
	                    'visible'=>Yii::app()->session['p']['update'] == 1 ? 'true' : 'false',
                   	),

                'modify'=>
                    array(
                	 	'url'=>'$this->grid->controller->createUrl("modify", array("id"=>$data->primaryKey))',
                	 	'icon'=>'icon-cog icon-white',
						'options'=>array(
							'title'=>'Modificar Otros Datos',
							"class"=>"btn btn-small btn-success",
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t("app","Update").' Clientes",2); return false;}',
	                    ),
	                    'visible'=>Yii::app()->session['p']['update'] == 1 ? 'false' : 'true',
                   	),

                'view'=> array(
                			'icon'=>'icon-eye-open icon-white',
                			'options'=>array(
                				"class"=>"btn btn-small btn-info",
                			),
                		),
            ),
		),


				//array('name'=>'id_cliente','value'=>'$data->contactos2->nombres','header'=>'Contacto'),
				//array('name'=>'id_cliente','value'=>'$data->contactos2->telefono','header'=>'Telefono'),
				//array('name'=>'id_cliente','value'=>'$data->ClienteTIT->tipo','header'=>'Tipo Ide'),
				//'id_tipo_identificacion_tributaria',

		array('name'=>'id_cliente'
		,'value'=>'count($data->direcciones) > 0 ? $data->id_cliente : "<span title=\"No se ha ingresado direccion\">".$data->id_cliente."</span>"','type'=>'raw'
		,'headerHtmlOptions'=>array('style'=>'white-space:nowrap;')
		,'cssClassExpression'=>'count($data->direcciones) == 0 ? "red" : ($data->id_estatus == 1 ? "on" : ($data->id_estatus == 2 ? "off" : "out"))'
	),

		array('name'=>'codigo_tributario'
		,'value'=>'count($data->direcciones) > 0 ? $data->codigo_tributario : "<span title=\"No se ha ingresado direccion\">".$data->codigo_tributario."</span>"','type'=>'raw'
		,'headerHtmlOptions'=>array('style'=>'white-space:nowrap;')
		,'cssClassExpression'=>'count($data->direcciones) == 0 ? "red" : ($data->id_estatus == 1 ? "on" : ($data->id_estatus == 2 ? "off" : "out"))'
	),

		array('name'=>'nombre_cliente'
		,'value'=>'count($data->direcciones) > 0 ? $data->nombre_cliente : "<span title=\"No se ha ingresado direccion\">".$data->nombre_cliente."</span>"','type'=>'raw'
		,'headerHtmlOptions'=>array('style'=>'white-space:nowrap;')
		,'cssClassExpression'=>'count($data->direcciones) == 0 ? "red" : ($data->id_estatus == 1 ? "on" : ($data->id_estatus == 2 ? "off" : "out"))'
	),

		array('name'=>'nombre_facturar'
		,'value'=>'count($data->direcciones) > 0 ? $data->nombre_facturar : "<span title=\"No se ha ingresado direccion\">".$data->nombre_facturar."</span>"','type'=>'raw'
		,'headerHtmlOptions'=>array('style'=>'white-space:nowrap;')
		,'cssClassExpression'=>'count($data->direcciones) == 0 ? "red" : ($data->id_estatus == 1 ? "on" : ($data->id_estatus == 2 ? "off" : "out"))'
	),

		array('name'=>'id_estatus'
		,'value'=>'count($data->direcciones) > 0 ? ($data->id_estatus == 1 ? "Act" : ($data->id_estatus == 2 ? "Inac" : ($data->id_estatus == 3 ? "Bloq" : ""))) : "<span title=\"No se ha ingresado direccion\">".($data->id_estatus == 1 ? "Act" : ($data->id_estatus == 2 ? "Inac" : ($data->id_estatus == 3 ? "Bloq" : "")))."</span>"','type'=>'raw'
		,'headerHtmlOptions'=>array('style'=>'white-space:nowrap;','title'=>'Status')
		,'cssClassExpression'=>'count($data->direcciones) == 0 ? "red" : ($data->id_estatus == 1 ? "on" : ($data->id_estatus == 2 ? "off" : "out"))'
		,'header'=>'Stat','filter'=>array("1"=>"Activo","2"=>"Inactivo","3"=>"Bloqueado")
	),


		array('name'=>'es_consigneer'
		,'filter'=>array("1"=>"Si","0"=>"No"),'header'=>'Con'
		,'value'=>'count($data->direcciones) > 0 ? ($data->es_consigneer == 1 ? "Si" : "No") : "<span title=\"No se ha ingresado direccion\">".($data->es_consigneer == 1 ? "Si" : "No")."</span>"','type'=>'raw'
		,'headerHtmlOptions'=>array('style'=>'white-space:nowrap;','title'=>'Consignatario')
		,'cssClassExpression'=>'count($data->direcciones) == 0 ? "red" : ($data->id_estatus == 1 ? "on" : ($data->id_estatus == 2 ? "off" : "out"))'

	),

		array('name'=>'es_shipper'
		,'filter'=>array("1"=>"Si","0"=>"No"),'header'=>'Shi'
		,'value'=>'count($data->direcciones) > 0 ? ($data->es_shipper == 1 ? "Si" : "No") : "<span title=\"No se ha ingresado direccion\">".($data->es_shipper == 1 ? "Si" : "No")."</span>"','type'=>'raw'
		,'headerHtmlOptions'=>array('style'=>'white-space:nowrap;','title'=>'Shipper')
		,'cssClassExpression'=>'count($data->direcciones) == 0 ? "red" : ($data->id_estatus == 1 ? "on" : ($data->id_estatus == 2 ? "off" : "out"))'
	),

		array('name'=>'es_coloader'
		,'filter'=>array("1"=>"Si","0"=>"No"),'header'=>'Col'
		,'value'=>'count($data->direcciones) > 0 ? ($data->es_coloader == 1 ? "Si" : "No") : "<span title=\"No se ha ingresado direccion\">".($data->es_coloader == 1 ? "Si" : "No")."</span>"','type'=>'raw'
		,'headerHtmlOptions'=>array('style'=>'white-space:nowrap;','title'=>'Coloader')
		,'cssClassExpression'=>'count($data->direcciones) == 0 ? "red" : ($data->id_estatus == 1 ? "on" : ($data->id_estatus == 2 ? "off" : "out"))'
	),

		array('name'=>'id_pais','filter' => CHtml::listData( Clientes::model()->findAllBySql("select distinct id_pais from clientes order by id_pais"), 'id_pais', 'id_pais')
		,'value'=>'count($data->direcciones) > 0 ? "<span title=\"".$data->idPais->descripcion."\">".$data->id_pais."</span>" : "<span title=\"No se ha ingresado direccion\">".$data->id_pais."</span>"','type'=>'raw'
		,'headerHtmlOptions'=>array('style'=>'white-space:nowrap;')
		,'cssClassExpression'=>'count($data->direcciones) == 0 ? "red" : ($data->id_estatus == 1 ? "on" : ($data->id_estatus == 2 ? "off" : "out"))'
		),

		array('name'=>'id_vendedor','filter' => CHtml::listData( Clientes::model()->findAllBySql("select distinct id_vendedor from clientes order by id_vendedor"), 'id_vendedor', 'id_vendedor')
		,'value'=>'count($data->direcciones) > 0 ? "<span title=\"".$data->id_vendedor."\">".$data->idVendedor->pw_gecos."<span>" : "<span title=\"No se ha ingresado direccion\">".$data->idVendedor->pw_gecos."</span>"','type'=>'raw'
		,'headerHtmlOptions'=>array('style'=>'white-space:nowrap;')
		,'cssClassExpression'=>'count($data->direcciones) == 0 ? "red" : ($data->id_estatus == 1 ? "on" : ($data->id_estatus == 2 ? "off" : "out"))'
	),

		/*array('name'=>'id_tipo_cliente'
		,'value'=>'count($data->direcciones) > 0 ? "<span title=\"".$data->id_tipo_cliente."\">".(isset($data->idTipoCliente) ? $data->idTipoCliente->descripcion : $data->id_tipo_cliente)."<span>" : "<span title=\"No se ha ingresado direccion\">".(isset($data->idTipoCliente) ? $data->idTipoCliente->descripcion : $data->id_tipo_cliente)."</span>"','type'=>'raw'
		,'headerHtmlOptions'=>array('style'=>'white-space:nowrap;')
		,'cssClassExpression'=>'count($data->direcciones) == 0 ? "red" : ($data->id_estatus == 1 ? "on" : ($data->id_estatus == 2 ? "off" : "out"))'
		,'filter'=>CHtml::listData(TiposCliente::model()->findAll(array("condition"=>"","order"=>"")),'id_tipo_cliente','descripcion')
	),*/

		array('name'=>'fecha_creacion','header'=>'Creado'
		//,'value'=>'"<span title=\"".(count($data->direcciones) > 0 ? "" : "No se ha ingresado direccion")."\" style=\"color:".(count($data->direcciones) > 0 ? "rgb(51,51,51)" : "red")."\">".$data->fecha_creacion."</span>"','type'=>'raw','headerHtmlOptions'=>array('style'=>'white-space:nowrap;')


		,'filter' => CHtml::listData( Clientes::model()->findAllBySql("select distinct fecha_creacion from clientes order by fecha_creacion desc"), 'fecha_creacion', 'fecha_creacion')

		,'value'=>'count($data->direcciones) > 0 ? (isset($data->fecha_modificacion) ? "<span title=\"Fecha Modificacion : ".substr($data->fecha_modificacion,0,19)."\">".$data->fecha_creacion."</span>" : $data->fecha_creacion) : "<span title=\"No se ha ingresado direccion\">".$data->fecha_creacion."</span>"','type'=>'raw'
		,'htmlOptions'=>array('style'=>'white-space:nowrap;')
		,'cssClassExpression'=>'count($data->direcciones) == 0 ? "red" : ($data->id_estatus == 1 ? "on" : ($data->id_estatus == 2 ? "off" : "out"))'

	),



		//array('name'=>'unificador_recibe','value'=>'"<span style=background:red;color:white>".(isset($data->uniEntrega->idEntrega) ? $data->uniEntrega->tul_cli_recibe_id . " - " . $data->uniEntrega->idEntrega->nombre_cliente : "")."</span>"','type'=>'raw',),
		//array('name'=>'unificador_entrega','value'=>'"<span style=background:red;color:white>".(isset($data->uniRecibe->idRecibe) ? $data->uniRecibe->tul_cli_entrega_id . " - " . $data->uniRecibe->idRecibe->nombre_cliente : "")."</span>"','type'=>'raw',),


		//array('name'=>'entrega','value'=>'isset($data->uniRecibe->tul_cli_entrega_id) ? $data->uniRecibe->tul_cli_entrega_id : ""'),
		//array('name'=>'recibe','value'=>'isset($data->uniEntrega) ? $data->uniEntrega->tul_cli_recibe_id : ""'),

		//array('name'=>'id_pais','value'=> 'isset($data->idPais) ? $data->idPais->descripcion : $data->id_pais '),

		/*
		'id_vendedor',
		//array('name'=>'id_grupo','value'=> 'isset($data->idGrupo) ? $data->idGrupo->nombre_grupo : $data->id_grupo '),
		//array('name'=>'id_cobrador','value'=> 'isset($data->idCobrador) ? $data->idCobrador->nombre_cobrador : $data->id_cobrador '),
		'id_frecuencia',
		//array('name'=>'id_credito','value'=> 'isset($data->idCredito) ? $data->idCredito->limite_credito_local : $data->id_credito '),
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

		'incluir_saldo',
		//array('name'=>'cto_id','value'=> 'isset($data->cto) ? $data->cto->cto_nombre : $data->cto_id '),
		'cto_fecha',
		'id_documento',
		'id_estatus_bk',
		'id_cliente_ref',
		*/

	),
)); ?>

<?php
/*Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	$('#myModalSearch').modal('show');
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('clientes-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php ob_start(); ?>

<p>
Opcionalmente puedes ingresar operadores de comparacion (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada una de tus valores de busqueda para especificar como debe realizarse la comparacion.
</p>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $render_search = ob_get_contents(); ob_end_clean(); ?>

<?php $this->widget('bootstrap.widgets.TbModal', array(
		    'id' => 'myModalSearch',
		    'header' => 'Modal Heading',
		    'htmlOptions'=>array('style'=>'width:75%; left:35%;'),
		    'content' => $render_search,
		    'footer' => array(
		        //TbHtml::button('Save Changes', array('id'=>'btn-save-modal', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
		        TbHtml::button('Close', array('id'=>'myModalSearch-close','data-dismiss' => 'modal')),
		    ),
		)
	);	*/ ?>
