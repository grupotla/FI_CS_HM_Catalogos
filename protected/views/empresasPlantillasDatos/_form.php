<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'empresas-plantillas-datos-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'country'),
)); ?>

	<!-- <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p> -->

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropDownListRow($model,'country',CHtml::listData(EmpresasPlantillas::model()->findAll(array("condition"=>"","order"=>"")),'country','logo'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'sistema',CHtml::listData(EmpresasPlantillas::model()->findAll(array("condition"=>"","order"=>"")),'sistema','logo'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'doc_id',CHtml::listData(EmpresasPlantillas::model()->findAll(array("condition"=>"","order"=>"")),'doc_id','logo'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'id_etiqueta',CHtml::listData(EmpresasPlantillasEtiquetas::model()->findAll(array("condition"=>"trafico = 'LCL'","order"=>"valor")),'etiqueta_id','valor'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'etiqueta_style',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'campo_tabla',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'campo_style',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'formato_campo',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'campo_tabla_right',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'orden',array('class'=>'span5')); ?>

	<?php echo $form->checkBoxRow($model,'activo'); ?>


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
