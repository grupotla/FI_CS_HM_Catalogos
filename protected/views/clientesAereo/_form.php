<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'clientes-aereo-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'id_cliente'),
)); ?>


<?php if(Yii::app()->user->hasFlash('error')): ?>
	<br>
	<div class="alert alert-error">
	<button class="close" data-dismiss="alert" type="button">×</button>
		<?php echo Yii::app()->user->getFlash('error'); ?>
	</div>
<?php else: ?>
<?php endif; ?>

	<!-- <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p> -->

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'id_cliente',array('class'=>'span5','data-inputmask-alias'=>"integer", 'readonly'=>true)); ?>

	<?php echo $form->textFieldRow($model,'no_cuenta',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->textFieldRow($model,'no_iata',array('class'=>'span5','maxlength'=>60)); ?>


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
		)); ?>

<?php /*else: ?>


	<?php echo CHtml::ajaxSubmitButton($model->isNewRecord ? 'Create' : 'Save',$_SERVER['REQUEST_URI'],array(
				'update'=>'.modal-body',
   				//'type'=>'POST','dataType'=>'json','beforeSend' => 'function(data){ }', 'success' => 'js:function(data){ }',
            	'error' => 'function(data) {
    	        	alert(data.responseText);
	            }',
            ),
			array('style'=>'display:none'
	)); */?>


	</div>

<?php endif; ?>


<?php $this->endWidget(); ?>
