<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'navieras-credito-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'id_naviera'),
)); ?>

	<!-- <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p> -->

	<?php echo $form->errorSummary($model); ?>

	<?php ob_start(); ?>

	<?php echo $form->textFieldRow($model,'id_naviera',array('class'=>'span5','data-inputmask-alias'=>"integer", 'readonly'=>true)); ?>

	<?php echo $form->dropDownListRow($model,'id_empresa',CHtml::listData(Empresas::model()->findAll(array("condition"=>"","order"=>"")),'id_empresa','nombre_empresa'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->checkBoxRow($model,'activo'); ?>

	<?php echo $form->textFieldRow($model,'secuencia',array('class'=>'span5')); ?>

	<?php $section1 = ob_get_contents(); ob_end_clean(); ?>


	<?php ob_start(); ?>

	<?php echo $form->textFieldRow($model,'dias',array('class'=>'span5', 'data-inputmask-alias'=>"integer")); ?>

	<?php echo $form->textFieldRow($model,'monto',array('class'=>'span5', 'data-inputmask-alias'=>"currency", 'data-inputmask-digits'=>"2", "data-inputmask-groupSeparator"=>',', "data-inputmask-autoGroup"=>true, 'data-inputmask-removeMaskOnSubmit' => true, "data-inputmask-autoUnmask"=> true ,'maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'observaciones',array('class'=>'span5','maxlength'=>75)); ?>

	<?php $section2 = ob_get_contents(); ob_end_clean(); ?>


	<?php ob_start(); ?>

	<?php echo $form->textFieldRow($model,'id_usuario',array('class'=>'span5','value'=>$model->idUsuario ? $model->idUsuario->pw_gecos : $model->id_usuario)); ?>

	<?php echo $form->textFieldRow($model,'ingreso',array('class'=>'span5','value'=>date("d/m/Y h:i:s",strtotime($model->ingreso)))); ?>

	<?php echo $form->textFieldRow($model,'id_usuario_modifica',array('class'=>'span5','value'=>$model->idUsuarioModifica ? $model->idUsuarioModifica->pw_gecos : $model->id_usuario_modifica)); ?>

	<?php echo $form->textFieldRow($model,'modifica',array('class'=>'span5','value'=>date("d/m/Y h:i:s",strtotime($model->modifica)))); ?>

	<?php echo $form->textFieldRow($model,'id_usuario_borrado',array('class'=>'span5','value'=>$model->idUsuarioBorrado ? $model->idUsuarioBorrado->pw_gecos : $model->id_usuario_borrado)); ?>

	<?php echo $form->textFieldRow($model,'borrado',array('class'=>'span5','value'=>date("d/m/Y h:i:s",strtotime($model->borrado)))); ?>

	<?php $section3 = ob_get_contents(); ob_end_clean(); ?>



    <?php echo TbHtml::tabbableTabs(array(
        array('label' => 'Generales', 'content' => $section1, 'active' => true),
        array('label' => 'Credito', 'content' => $section2),
        array('label' => 'Usuario', 'content' => $section3),
    ), array('placement' => TbHtml::TABS_PLACEMENT_LEFT ) ); ?>


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
	)); */?>

<?php endif; ?>



<?php $this->endWidget(); ?>

<script>
$('#btn-save-modal').attr('title','Save');
</script>
