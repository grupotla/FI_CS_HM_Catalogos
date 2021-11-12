<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'defusers-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'COD_USER'),
)); ?>

	<!-- <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p> -->

	<?php echo $form->errorSummary($model); ?>

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


	<?php //ob_start(); ?>
	<?php //$section1 = ob_get_contents(); ob_end_clean(); ?>
		
    <?php /*echo TbHtml::tabbableTabs(array(
        array('label' => 'Datos Generales', 'content' => $section1, 'active' => true),
    ), array('placement' => TbHtml::TABS_PLACEMENT_LEFT ) );*/ ?>


<?php if (!$this->asDialog) : ?>

	<div class="form-actions">

		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
			'icon'=>$model->isNewRecord ? 'icon-file icon-white' : 'icon-pencil icon-white',
		)); ?>

	</div>
	
<?php /*else: ?>
	
	
	<?php echo CHtml::ajaxSubmitButton($model->isNewRecord ? 'Create' : 'Save',$_SERVER['REQUEST_URI'],array(	
				'update'=>'.modal-body',
   				//'type'=>'POST','dataType'=>'json','beforeSend' => 'function(data){ }', 'success' => 'js:function(data){ }',
            	'error' => 'function(data) {                   
    	        	alert(data.responseText);
	            }',
            ),
			array('style'=>'display:none'
	)); */ ?>
		
<?php endif; ?>
	

<?php $this->endWidget(); ?>
