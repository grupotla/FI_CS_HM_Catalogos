<div class="form-actions">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_naviera')); ?>:</b>
	<?php echo CHtml::encode($data->id_naviera); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_naviera_representante')); ?>:</b>
	<?php echo CHtml::encode($data->id_naviera_representante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_insert')); ?>:</b>
	<?php echo CHtml::encode($data->user_insert); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_insert')); ?>:</b>
	<?php echo CHtml::encode($data->date_insert); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_update')); ?>:</b>
	<?php echo CHtml::encode($data->user_update); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_update')); ?>:</b>
	<?php echo CHtml::encode($data->date_update); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_auth')); ?>:</b>
	<?php echo CHtml::encode($data->user_auth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_auth')); ?>:</b>
	<?php echo CHtml::encode($data->date_auth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	*/ ?>

</div>