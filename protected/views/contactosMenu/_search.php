<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'mn_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'mn_sort',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'mn_parent',CHtml::listData(ContactosMenu::model()->findAll(array("condition"=>"","order"=>"")),'mn_id','mn_title_short'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'mn_title_short',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'mn_title_long',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->dropDownListRow($model,'mn_viewer',CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"","order"=>"")),'indice',''), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'mn_control',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'mn_action',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'mn_layout',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'mn_st',CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"","order"=>"")),'indice',''), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'mn_us_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'mn_dt',array('class'=>'span5')); ?>


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
