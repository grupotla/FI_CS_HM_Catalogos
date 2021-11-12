<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id_nav_cred',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_naviera',CHtml::listData(Navieras::model()->findAll(array("condition"=>"","order"=>"")),'id_naviera','nit'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'id_empresa',CHtml::listData(Empresas::model()->findAll(array("condition"=>"","order"=>"")),'id_empresa','nombre_empresa'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->checkBoxRow($model,'activo'); ?>

	<?php echo $form->textFieldRow($model,'secuencia',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_usuario',CHtml::listData(UsuariosEmpresas::model()->findAll(array("condition"=>"","order"=>"")),'id_usuario','pw_name'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'ingreso',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_usuario_modifica',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'modifica',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_usuario_borrado',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'borrado',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'dias',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'monto',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'observaciones',array('class'=>'span5','maxlength'=>75)); ?>


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
