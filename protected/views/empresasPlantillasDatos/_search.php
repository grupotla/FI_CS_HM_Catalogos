<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'country',CHtml::listData(EmpresasPlantillas::model()->findAll(array("condition"=>"","order"=>"")),'country','logo'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'sistema',CHtml::listData(EmpresasPlantillas::model()->findAll(array("condition"=>"","order"=>"")),'sistema','logo'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'doc_id',CHtml::listData(EmpresasPlantillas::model()->findAll(array("condition"=>"","order"=>"")),'doc_id','logo'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'id_etiqueta',CHtml::listData(EmpresasPlantillasEtiquetas::model()->findAll(array("condition"=>"","order"=>"")),'id','etiqueta_id'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'etiqueta_style',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'campo_tabla',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'campo_style',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'formato_campo',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'campo_tabla_right',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'orden',array('class'=>'span5')); ?>

	<?php echo $form->checkBoxRow($model,'activo'); ?>


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
