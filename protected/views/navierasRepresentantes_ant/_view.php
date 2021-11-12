<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_naviera')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_naviera),array('view','id'=>$data->id_naviera)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tiporegimen')); ?>:</b>
	<?php echo CHtml::encode($data->tiporegimen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dias')); ?>:</b>
	<?php echo CHtml::encode($data->dias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nit')); ?>:</b>
	<?php echo CHtml::encode($data->nit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nit2')); ?>:</b>
	<?php echo CHtml::encode($data->nit2); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pais')); ?>:</b>
	<?php echo CHtml::encode($data->id_pais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto')); ?>:</b>
	<?php echo CHtml::encode($data->monto); ?>
	<br />

	*/ ?>

</div>