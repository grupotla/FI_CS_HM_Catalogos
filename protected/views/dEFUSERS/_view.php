<div class="form-actions">

	<b><?php echo CHtml::encode($data->getAttributeLabel('COD_USER')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->COD_USER),array('view','id'=>$data->COD_USER)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FIRSTNAME')); ?>:</b>
	<?php echo CHtml::encode($data->FIRSTNAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LASTNAME')); ?>:</b>
	<?php echo CHtml::encode($data->LASTNAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COD_GROUP')); ?>:</b>
	<?php echo CHtml::encode($data->COD_GROUP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PASSWORD')); ?>:</b>
	<?php echo CHtml::encode($data->PASSWORD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PASSWORD_EXPIRES')); ?>:</b>
	<?php echo CHtml::encode($data->PASSWORD_EXPIRES); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('CHANGE_PASSWORD')); ?>:</b>
	<?php echo CHtml::encode($data->CHANGE_PASSWORD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PASSWORD_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->PASSWORD_DATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_CARD')); ?>:</b>
	<?php echo CHtml::encode($data->ID_CARD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BLOOD_TYPE')); ?>:</b>
	<?php echo CHtml::encode($data->BLOOD_TYPE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COMMENTS')); ?>:</b>
	<?php echo CHtml::encode($data->COMMENTS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_TYPE')); ?>:</b>
	<?php echo CHtml::encode($data->USER_TYPE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EXTERNAL_USER')); ?>:</b>
	<?php echo CHtml::encode($data->EXTERNAL_USER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />

	*/ ?>

</div>