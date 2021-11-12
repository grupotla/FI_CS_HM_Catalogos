<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('mn_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->mn_id),array('view','id'=>$data->mn_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mn_sort')); ?>:</b>
	<?php echo CHtml::encode($data->mn_sort); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mn_parent')); ?>:</b>
	<?php echo CHtml::encode($data->mn_parent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mn_title_short')); ?>:</b>
	<?php echo CHtml::encode($data->mn_title_short); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mn_title_long')); ?>:</b>
	<?php echo CHtml::encode($data->mn_title_long); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mn_viewer')); ?>:</b>
	<?php echo CHtml::encode($data->mn_viewer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mn_control')); ?>:</b>
	<?php echo CHtml::encode($data->mn_control); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('mn_action')); ?>:</b>
	<?php echo CHtml::encode($data->mn_action); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mn_layout')); ?>:</b>
	<?php echo CHtml::encode($data->mn_layout); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mn_st')); ?>:</b>
	<?php echo CHtml::encode($data->mn_st); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mn_us_id')); ?>:</b>
	<?php echo CHtml::encode($data->mn_us_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mn_dt')); ?>:</b>
	<?php echo CHtml::encode($data->mn_dt); ?>
	<br />

	*/ ?>

</div>