<div class="form-actions">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sistema')); ?>:</b>
	<?php echo CHtml::encode($data->sistema); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doc_id')); ?>:</b>
	<?php echo CHtml::encode($data->doc_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_etiqueta')); ?>:</b>
	<?php echo CHtml::encode($data->id_etiqueta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('etiqueta_style')); ?>:</b>
	<?php echo CHtml::encode($data->etiqueta_style); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('campo_tabla')); ?>:</b>
	<?php echo CHtml::encode($data->campo_tabla); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('campo_style')); ?>:</b>
	<?php echo CHtml::encode($data->campo_style); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('formato_campo')); ?>:</b>
	<?php echo CHtml::encode($data->formato_campo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('campo_tabla_right')); ?>:</b>
	<?php echo CHtml::encode($data->campo_tabla_right); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orden')); ?>:</b>
	<?php echo CHtml::encode($data->orden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	*/ ?>

</div>