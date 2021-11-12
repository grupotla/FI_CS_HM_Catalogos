<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'carrier_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->dropDownListRow($model,'countries',CHtml::listData(Paises::model()->findAll(array("condition"=>"","order"=>"")),'codigo','descripcion'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'carriercode',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'tiporegimen',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'dias',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nit',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'nit2',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->checkBoxRow($model,'activo'); ?>

	<?php echo $form->textFieldRow($model,'monto',array('class'=>'span5','maxlength'=>12)); ?>


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
