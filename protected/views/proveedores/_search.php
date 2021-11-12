<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'numero',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'empresa',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nit',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>75)); ?>

	<?php echo $form->textFieldRow($model,'descripcion',array('class'=>'span5','maxlength'=>75)); ?>

	<?php echo $form->textFieldRow($model,'provision',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'cuenta',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'bienes',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'local',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fovial',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'direccion',array('class'=>'span5','maxlength'=>75)); ?>

	<?php echo $form->textFieldRow($model,'contacto',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'telefono',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'fax',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'correo',array('class'=>'span5','maxlength'=>230)); ?>

	<?php echo $form->textFieldRow($model,'observacion',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'dias',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'usuario',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'usuario2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'modificado',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'tiporegimen',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nit2',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'requiere_oc',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'monto',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'tipo',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'id_pais',array('class'=>'span5','maxlength'=>2)); ?>


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
