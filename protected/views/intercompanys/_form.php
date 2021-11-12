<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'intercompanys-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'nombre_intercompany'),
)); ?>

	<!-- <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p> -->

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropDownListRow($model,'countries',CHtml::listData(Paises::model()->findAll(array("condition"=>"LENGTH(codigo) = 2","order"=>"descripcion")),'codigo','descripcion'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'id_empresa_baw',CHtml::listData(Empresas::model()->findAll(array("condition"=>"activo='t'","order"=>"nombre_empresa")),'id_empresa','nombre_empresa'), array('prompt' => '-- Seleccione --')); ?>
	
	
	<?php echo $form->textFieldRow($model,'nombre_intercompany',array('class'=>'span5','maxlength'=>150)); ?>
	
	
	<?php echo $form->textFieldRow($model,'nombre_comercial',array('class'=>'span5','maxlength'=>150)); ?>


	<?php echo $form->textFieldRow($model,'nit',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'direccion',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->dropDownListRow($model,'tiporegimen',CHtml::listData(Tiporegimen::model()->findAll(array("condition"=>"","order"=>"")),'numero','nombre'), array('prompt' => '-- Seleccione --')); ?>
	

	<?php echo $form->textFieldRow($model,'ruc',array('class'=>'span5','maxlength'=>30)); ?>




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
	
	
	
	

	<?php echo $form->textFieldRow($model,'usuario_creacion',array('class'=>'span5','value'=>($model->usuario_creacion > 0 ? (isset($model->usuario00) ? $model->usuario00->pw_gecos : $model->usuario_creacion) : ''),'disabled'=>true)); ?>

	<?php echo $form->textFieldRow($model,'fecha_creacion',array('class'=>'span5','value'=>$model->fecha_creacion ? date("d/m/Y h:i:s",strtotime($model->fecha_creacion)) : '','disabled'=>true)); ?>
	
	


	<?php echo $form->checkBoxRow($model,'activo'); ?>

	
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
