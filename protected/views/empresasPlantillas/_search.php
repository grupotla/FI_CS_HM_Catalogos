<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'country',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'logo',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'edicion',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'titulo',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'nombre_empresa',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'nit',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'sistema',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textAreaRow($model,'direccion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->checkBoxRow($model,'activo'); ?>

	<?php echo $form->textFieldRow($model,'creacion_user',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'creacion_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'modifica_user',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'modifica_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fact_elect_email',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'codigo_fact_electronica',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'telefonos',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'excountry',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'coloader',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textAreaRow($model,'observaciones',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'doc_id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->checkBoxRow($model,'trackactivo'); ?>

	<?php echo $form->textFieldRow($model,'trackpuerto',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'trackmailserver',array('class'=>'span5','maxlength'=>40)); ?>

	<?php echo $form->textFieldRow($model,'trackauth',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'trackfromaddress',array('class'=>'span5','maxlength'=>100)); ?>


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
