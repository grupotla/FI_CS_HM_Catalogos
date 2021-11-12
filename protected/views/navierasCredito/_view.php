<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_nav_cred')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_nav_cred),array('view','id'=>$data->id_nav_cred)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_naviera')); ?>:</b>
	<?php echo CHtml::encode($data->id_naviera); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_empresa')); ?>:</b>
	<?php echo CHtml::encode($data->id_empresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secuencia')); ?>:</b>
	<?php echo CHtml::encode($data->secuencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ingreso')); ?>:</b>
	<?php echo CHtml::encode($data->ingreso); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_modifica')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_modifica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modifica')); ?>:</b>
	<?php echo CHtml::encode($data->modifica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_borrado')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_borrado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('borrado')); ?>:</b>
	<?php echo CHtml::encode($data->borrado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dias')); ?>:</b>
	<?php echo CHtml::encode($data->dias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto')); ?>:</b>
	<?php echo CHtml::encode($data->monto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	*/ ?>

</div>