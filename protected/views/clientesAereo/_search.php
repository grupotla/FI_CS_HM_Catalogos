<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id_cliente',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'no_cuenta',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->textFieldRow($model,'no_iata',array('class'=>'span5','maxlength'=>60)); ?>


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
