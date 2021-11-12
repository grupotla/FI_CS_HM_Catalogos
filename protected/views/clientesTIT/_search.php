<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id_tipo_identificacion_tributaria',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_pais',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'tipo',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'estado',array('class'=>'span5')); ?>


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
