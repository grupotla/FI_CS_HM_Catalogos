<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'usuarios-empresas-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'pw_name'),
));

$model->pais = trim($model->pais);
?>

	<!-- <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p> -->

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'pw_name',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'pw_passwd',array('class'=>'span5','maxlength'=>40)); ?>

	<?php echo $form->textFieldRow($model,'pw_uid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'pw_gid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'pw_gecos',array('class'=>'span5','maxlength'=>48)); ?>

	<?php echo $form->textFieldRow($model,'pw_dir',array('class'=>'span5','maxlength'=>160)); ?>

	<?php echo $form->textFieldRow($model,'pw_shell',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->dropDownListRow($model,'tipo_usuario',CHtml::listData(DefinicionUsuario::model()->findAll(array("condition"=>"","order"=>"")),'id_def_usuario','descripcion_usuario'), array('prompt' => '-- Seleccione --')); ?>

	<?php //echo $form->dropDownListRow($model,'pais',CHtml::listData(UsuariosPaises::model()->findAll(array("condition"=>"activo = 't'","order"=>"nombre")),'pais','nombre'), array('prompt' => '-- Seleccione --')); ?>

	<?php //echo $form->dropDownListRow($model,'pais',CHtml::listData(UsuariosPaises::model()->findAllBySql("SELECT trim(pais) as pais, trim(nombre) as nombre FROM usuarios_paises WHERE activo = 't' ORDER BY nombre"),'pais','nombre'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'pais',CHtml::listData(Empresas::model()->findAll(array("condition"=>"activo = 't'","order"=>"pais_iso")), 'pais_iso', 'nombre_empresa'), array('prompt' => '-- Seleccione --')); ?>
	
	<?php echo $form->textFieldRow($model,'dominio',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'level',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'pw_activo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'pw_codigo_tributario',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'pw_correo',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_usuario_reg',CHtml::listData(UsuariosEmpresas::model()->findAll(array("condition"=>"","order"=>"")),'id_usuario','pw_name'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'modificado',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'locode',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'planilla_numero',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'pw_ultimo_acceso',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'pw_passwd_dias',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'pw_passwd_fecha',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'pw_user_ip',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'pw_sis_id',array('class'=>'span5')); ?>


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
