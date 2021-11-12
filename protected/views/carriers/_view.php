<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('carrier_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->carrier_id),array('view','id'=>$data->carrier_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countries')); ?>:</b>
	<?php echo CHtml::encode($data->countries); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('carriercode')); ?>:</b>
	<?php echo CHtml::encode($data->carriercode); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('nit2')); ?>:</b>
	<?php echo CHtml::encode($data->nit2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto')); ?>:</b>
	<?php echo CHtml::encode($data->monto); ?>
	<br />

	*/ ?>

</div>