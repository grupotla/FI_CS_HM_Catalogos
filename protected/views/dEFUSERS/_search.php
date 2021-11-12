<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'COD_USER',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'FIRSTNAME',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'LASTNAME',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'COD_GROUP',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->passwordFieldRow($model,'PASSWORD',array('class'=>'span5','maxlength'=>40)); ?>

	<?php echo $form->checkBoxRow($model,'STATUS'); ?>

	<?php echo $form->checkBoxRow($model,'PASSWORD_EXPIRES'); ?>

	<?php echo $form->checkBoxRow($model,'CHANGE_PASSWORD'); ?>

	<?php echo $form->textFieldRow($model,'PASSWORD_DATE',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ID_CARD',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'BLOOD_TYPE',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'COMMENTS',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'USER_TYPE',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->checkBoxRow($model,'EXTERNAL_USER'); ?>

	<?php echo $form->textFieldRow($model,'id_usuario',array('class'=>'span5')); ?>


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
