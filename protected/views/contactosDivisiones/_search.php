<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_catalogo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_contacto',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'catalogo',CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"","order"=>"")),'indice',''), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'telefono',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'area',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'impexp',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'carga',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->checkBoxRow($model,'tranship'); ?>

	<?php echo $form->textAreaRow($model,'pais',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'fecha',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'usuario',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'status',CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"","order"=>"")),'indice',''), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'area_enum',CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"","order"=>"")),'indice',''), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'impexp_enum',CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"","order"=>"")),'indice',''), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'carga_enum',CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"","order"=>"")),'indice',''), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'tipo_persona',CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"","order"=>"")),'indice',''), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'copia',CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"","order"=>"")),'indice',''), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'rechazo',CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"","order"=>"")),'indice',''), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textAreaRow($model,'contactoxpais',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'fax',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->textFieldRow($model,'cargo',array('class'=>'span5','maxlength'=>60)); ?>


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
