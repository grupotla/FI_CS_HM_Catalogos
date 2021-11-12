<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'clientes-tit-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'id_pais'),
)); ?>

	<!-- <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p> -->

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'id_tipo_identificacion_tributaria',array('class'=>'span3','readonly'=>true)); ?>

	<?php //echo $form->textFieldRow($model,'id_pais',array('class'=>'span5','maxlength'=>5)); ?>
	
	<?php echo $form->dropDownListRow($model,'id_pais',CHtml::listData(Empresas::model()->findAll(array("condition"=>"activo='t' and nombre_pais <> ''","order"=>"id_empresa")), 'pais_iso', 'nombre_pais'),	
		array(
		'class'=>'span3',
		//'prompt'=>''
		)
		
	); ?>

	<?php echo $form->textFieldRow($model,'tipo',array('class'=>'span3','maxlength'=>35)); ?>

	<?php echo $form->dropDownListRow($model,'estado',array("1"=>"Activo","0"=>"Inactivo"),array('class'=>'span3')); ?>


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
