<div class="form-actions">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_intercompany')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_intercompany),array('view','id'=>$data->id_intercompany)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_intercompany')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_intercompany); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nit')); ?>:</b>
	<?php echo CHtml::encode($data->nit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tiporegimen')); ?>:</b>
	<?php echo CHtml::encode($data->tiporegimen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countries')); ?>:</b>
	<?php echo CHtml::encode($data->countries); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_empresa_baw')); ?>:</b>
	<?php echo CHtml::encode($data->id_empresa_baw); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_comercial')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_comercial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ruc')); ?>:</b>
	<?php echo CHtml::encode($data->ruc); ?>
	<br />

	*/ ?>

</div>