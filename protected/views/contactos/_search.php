<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'contacto_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_cliente',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nombres',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'telefono',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fax',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5')); ?>

	<?php echo $form->checkBoxRow($model,'activo'); ?>

	<?php echo $form->textFieldRow($model,'cargo',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->textFieldRow($model,'id_usuario_ingreso',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ingreso',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_usuario_modifica',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'modifica',array('class'=>'span5')); ?>


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
