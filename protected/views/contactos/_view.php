<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('contacto_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->contacto_id),array('view','id'=>$data->contacto_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->id_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombres')); ?>:</b>
	<?php echo CHtml::encode($data->nombres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax')); ?>:</b>
	<?php echo CHtml::encode($data->fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cargo')); ?>:</b>
	<?php echo CHtml::encode($data->cargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_ingreso')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_ingreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ingreso')); ?>:</b>
	<?php echo CHtml::encode($data->ingreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_modifica')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_modifica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modifica')); ?>:</b>
	<?php echo CHtml::encode($data->modifica); ?>
	<br />

	*/ ?>

</div>