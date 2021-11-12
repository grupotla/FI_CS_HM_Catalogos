<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cliente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_cliente),array('view','id'=>$data->id_cliente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_tributario')); ?>:</b>
	<?php echo CHtml::encode($data->codigo_tributario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_facturar')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_facturar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vendedor')); ?>:</b>
	<?php echo CHtml::encode($data->id_vendedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_grupo')); ?>:</b>
	<?php echo CHtml::encode($data->id_grupo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cobrador')); ?>:</b>
	<?php echo CHtml::encode($data->id_cobrador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_estatus')); ?>:</b>
	<?php echo CHtml::encode($data->id_estatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('es_consigneer')); ?>:</b>
	<?php echo CHtml::encode($data->es_consigneer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('es_shipper')); ?>:</b>
	<?php echo CHtml::encode($data->es_shipper); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_frecuencia')); ?>:</b>
	<?php echo CHtml::encode($data->id_frecuencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_credito')); ?>:</b>
	<?php echo CHtml::encode($data->id_credito); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->hora_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_clase')); ?>:</b>
	<?php echo CHtml::encode($data->id_clase); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_anterior')); ?>:</b>
	<?php echo CHtml::encode($data->id_anterior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_uvisita')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_uvisita); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usr')); ?>:</b>
	<?php echo CHtml::encode($data->usr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pwd')); ?>:</b>
	<?php echo CHtml::encode($data->pwd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_sales_support')); ?>:</b>
	<?php echo CHtml::encode($data->id_sales_support); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ultima_fecha_descarga')); ?>:</b>
	<?php echo CHtml::encode($data->ultima_fecha_descarga); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('encuesta_id')); ?>:</b>
	<?php echo CHtml::encode($data->encuesta_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('encuesta')); ?>:</b>
	<?php echo CHtml::encode($data->encuesta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pais')); ?>:</b>
	<?php echo CHtml::encode($data->id_pais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_regimen')); ?>:</b>
	<?php echo CHtml::encode($data->id_regimen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_tributario2')); ?>:</b>
	<?php echo CHtml::encode($data->codigo_tributario2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion')); ?>:</b>
	<?php echo CHtml::encode($data->observacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_modificacion')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_modificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_modificado')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_modificado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ultimo_tipo_movimiento')); ?>:</b>
	<?php echo CHtml::encode($data->ultimo_tipo_movimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ultimo_movimiento_asegurado')); ?>:</b>
	<?php echo CHtml::encode($data->ultimo_movimiento_asegurado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('requiere_rubro_alias')); ?>:</b>
	<?php echo CHtml::encode($data->requiere_rubro_alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vendedor_grh')); ?>:</b>
	<?php echo CHtml::encode($data->id_vendedor_grh); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_sales_support_grh')); ?>:</b>
	<?php echo CHtml::encode($data->id_sales_support_grh); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_interna_pricing')); ?>:</b>
	<?php echo CHtml::encode($data->ref_interna_pricing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('con_cotizacion')); ?>:</b>
	<?php echo CHtml::encode($data->con_cotizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marca')); ?>:</b>
	<?php echo CHtml::encode($data->marca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('es_coloader')); ?>:</b>
	<?php echo CHtml::encode($data->es_coloader); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('incluir_saldo')); ?>:</b>
	<?php echo CHtml::encode($data->incluir_saldo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cto_id')); ?>:</b>
	<?php echo CHtml::encode($data->cto_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cto_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->cto_fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_documento')); ?>:</b>
	<?php echo CHtml::encode($data->id_documento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_estatus_bk')); ?>:</b>
	<?php echo CHtml::encode($data->id_estatus_bk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cliente_ref')); ?>:</b>
	<?php echo CHtml::encode($data->id_cliente_ref); ?>
	<br />

	*/ ?>

</div>
