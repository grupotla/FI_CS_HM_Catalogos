<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_naviera',CHtml::listData(Navieras::model()->findAll(array("condition"=>"","order"=>"")),'id_naviera','nit'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'id_naviera_representante',CHtml::listData(Navieras::model()->findAll(array("condition"=>"","order"=>"")),'id_naviera','nit'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->checkBoxRow($model,'activo'); ?>

	<?php echo $form->textFieldRow($model,'user_insert',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_insert',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'user_update',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_update',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'user_auth',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_auth',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'observaciones',array('class'=>'span5')); ?>


<?php if (!$this->asDialog) : ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>
<?php endif; ?>
	

<?php $this->endWidget(); ?>
