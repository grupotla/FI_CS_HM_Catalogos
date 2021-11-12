<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cliente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_cliente),array('view','id'=>$data->id_cliente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_cuenta')); ?>:</b>
	<?php echo CHtml::encode($data->no_cuenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_iata')); ?>:</b>
	<?php echo CHtml::encode($data->no_iata); ?>
	<br />


</div>