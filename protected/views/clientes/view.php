<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->id_cliente,
);

$this->menu=array(

	array('label'=>Yii::t('app','List').' Clientes','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),

	array('label'=>Yii::t('app','Create').' Clientes','url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' Clientes'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),

	//array('label'=>Yii::t('app','Update').' Clientes','url'=>array('update', 'button'=>2, 'text'=>Yii::t('app','Update').' Clientes','id'=>$model->id_cliente), 'icon'=>TbHtml::ICON_PENCIL . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['update'] == 1 ? true : false),

	//array('label'=>Yii::t('app','Delete').' Clientes','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cliente),'confirm'=>'¿Esta seguro que quiere borrar este registro?'), 'icon'=>TbHtml::ICON_TRASH . " " . TbHtml::ICON_COLOR_WHITE),

	array('label'=>Yii::t('app','Manage').' Clientes','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1><?php echo Yii::t('app','View'); ?>  Clientes #<?php echo $model->id_cliente; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_cliente',
		'codigo_tributario',
		'nombre_cliente',
		'nombre_facturar',

		'es_consigneer',
		'es_shipper',
		'es_coloader',

		'id_pais',

		'id_tipo_cliente',
		'id_grupo',
		'id_cobrador',

		array('name'=>'id_vendedor','value'=>$model->id_vendedor . " - " . $model->idVendedor->pw_gecos),

		'id_estatus',
		'id_frecuencia',
		'id_credito',
		'fecha_creacion',
		'hora_creacion',
		'id_clase',
		'id_anterior',
		'id_usuario_creacion',
		'fecha_uvisita',
		'usr',
		'pwd',
		'id_sales_support',
		'ultima_fecha_descarga',
		'encuesta_id',
		'encuesta',

		'id_regimen',
		'codigo_tributario2',
		'observacion',
		'id_usuario_modificacion',
		'fecha_modificado',
		'ultimo_tipo_movimiento',
		'ultimo_movimiento_asegurado',
		'requiere_rubro_alias',
		'id_vendedor_grh',
		'id_sales_support_grh',
		'ref_interna_pricing',
		'con_cotizacion',
		'marca',
		'email',

		'incluir_saldo',
		'cto_id',
		'cto_fecha',
		'id_documento',
		'id_estatus_bk',
		'id_cliente_ref',
		//array('name'=>'unificador_recibe','value'=>"<span style='background:red;color:white'>".(isset($model->uniEntrega->idEntrega) ? $model->uniEntrega->tul_cli_recibe_id . " - " . $model->uniEntrega->idEntrega->nombre_cliente : "")."</span>",'type'=>'raw',),
		//array('name'=>'unificador_entrega','value'=>"<span style='background:red;color:white'>".(isset($model->uniRecibe->idRecibe) ? $model->uniRecibe->tul_cli_entrega_id . " - " . $model->uniRecibe->idRecibe->nombre_cliente : "")."</span>",'type'=>'raw',),
	),
)); ?>



<?php
/*$row1 = Yii::app()->baw->createCommand("select * from tbl_unificador_log where tul_cli_entrega_id = '{$model->id_cliente}'")->queryAll();
$row2 = Yii::app()->baw->createCommand("select * from tbl_unificador_log where tul_cli_recibe_id = '{$model->id_cliente}'")->queryAll();
/*$entrega=TblUnificadorLog::model()->find("tul_cli_entrega_id = '".$model->id_cliente."'");
$recibe=TblUnificadorLog::model()->find("tul_cli_recibe_id = '".$model->id_cliente."'");
echo "Entrega : " . (isset($entrega['tul_cli_recibe_id']) ?  $entrega['tul_cli_recibe_id'] : "") . "<br>";
echo "Recibe : " . (isset($recibe['tul_cli_entrega_id']) ? $recibe['tul_cli_entrega_id'] : "") . "<br>";
*/
?>
<h2>Unificador Entrego a : </h2>
<?php $this->renderPartial('child_admin',array('model'=>$model->uniEntrega2)); ?>
<br>


<h2>Unificador Recibio de : </h2>
<?php $this->renderPartial('child_admin',array('model'=>$model->uniRecibe2)); ?>
<br>

<h2>Direcciones</h2>
<?php $this->renderPartial('/direcciones/child_admin',array('model'=>$model)); ?>
<br>

<h2>Aereo</h2>
<?php $this->renderPartial('/clientesAereo/child_admin',array('model'=>$model)); ?>
<br>

<h2>Contactos</h2>
<?php $this->renderPartial('/contactos/child_admin',array('model'=>$model)); ?>
