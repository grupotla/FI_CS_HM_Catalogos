<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id_intercompany',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nombre_intercompany',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'nit',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'tiporegimen',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'direccion',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'countries',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'id_empresa_baw',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha_creacion',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'usuario_creacion',array('class'=>'span5')); ?>

	<?php echo $form->checkBoxRow($model,'activo'); ?>

	<?php echo $form->textFieldRow($model,'nombre_comercial',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'ruc',array('class'=>'span5','maxlength'=>30)); ?>


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
