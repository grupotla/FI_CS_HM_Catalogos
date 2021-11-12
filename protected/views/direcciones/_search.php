<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id_direccion',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_nivel_geografico',CHtml::listData(NivelesGeograficos::model()->findAll(array("condition"=>"","order"=>"")),'id_nivel','nivel1'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'direccion_completa',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->dropDownListRow($model,'id_cliente',CHtml::listData(Clientes::model()->findAll(array("condition"=>"","order"=>"")),'id_cliente','codigo_tributario'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'city',array('class'=>'span5','maxlength'=>35)); ?>

	<?php echo $form->textFieldRow($model,'state',array('class'=>'span5','maxlength'=>35)); ?>

	<?php echo $form->textFieldRow($model,'zipcode',array('class'=>'span5','maxlength'=>35)); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>65)); ?>

	<?php //echo $form->textFieldRow($model,'phone number',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'group',array('class'=>'span5','maxlength'=>35)); ?>

	<?php echo $form->textFieldRow($model,'url',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'image',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'lat',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'lng',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->dropDownListRow($model,'id_tipo_direccion',CHtml::listData(TipoDireccion::model()->findAll(array("condition"=>"","order"=>"")),'id_tipo_direccion','descripcion_tipo'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->checkBoxRow($model,'boletines'); ?>

	<?php echo $form->checkBoxRow($model,'activo'); ?>

	<?php echo $form->textFieldRow($model,'phone_number',array('class'=>'span5','maxlength'=>100)); ?>


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
