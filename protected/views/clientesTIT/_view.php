<div class="form-actions">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_identificacion_tributaria')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_identificacion_tributaria),array('view','id'=>$data->id_tipo_identificacion_tributaria)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pais')); ?>:</b>
	<?php echo CHtml::encode($data->id_pais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />


</div>