<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'contactos-menu-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'mn_sort'),
)); ?>

	<!-- <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p> -->

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropDownListRow($model,'mn_parent',CHtml::listData(ContactosMenu::model()->findAll(array("condition"=>"","order"=>"")),'mn_id','mn_title_short'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'mn_sort',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'mn_title_short',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'mn_title_long',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->dropDownListRow($model,'mn_viewer',CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"catalogo='viewer'","order"=>"")),'indice','descripcion'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'mn_control',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'mn_action',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'mn_layout',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'mn_st',CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"catalogo='status'","order"=>"")),'indice','descripcion'), array('prompt' => '-- Seleccione --')); ?>

	<?php //echo $form->textFieldRow($model,'mn_us_id',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'mn_dt',array('class'=>'span5')); ?>


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
