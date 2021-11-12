<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'agente_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'agente',array('class'=>'span5')); ?>

	<?php echo $form->checkBoxRow($model,'activo'); ?>

	<?php echo $form->textFieldRow($model,'direccion',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'telefono',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'fax',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'correo',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'contacto',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'contabilidad_id',array('class'=>'span5')); ?>

	<?php echo $form->dateFieldRow($model,'fecha_creacion',array('class'=>'span2')); ?>

	<?php echo $form->textFieldRow($model,'hora_creacion',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_grupo',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_usuario_creacion',CHtml::listData(UsuariosEmpresas::model()->findAll(array("condition"=>"","order"=>"")),'id_usuario','pw_name'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'id_usuario_modificacion',CHtml::listData(UsuariosEmpresas::model()->findAll(array("condition"=>"","order"=>"")),'id_usuario','pw_name'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'accountno',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'iatano',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'defaultval',array('class'=>'span5','maxlength'=>8)); ?>

	<?php echo $form->textFieldRow($model,'countries',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->dropDownListRow($model,'id_network',CHtml::listData(Networks::model()->findAll(array("condition"=>"","order"=>"")),'id_network','descripcion'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'tiporegimen',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'dias',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nit',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'nit2',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'fecha_modificacion',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fam_agente',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'pais_terrestre_auto',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->checkBoxRow($model,'es_neutral'); ?>

	<?php echo $form->textFieldRow($model,'puesto',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->dropDownListRow($model,'agentes_grupo_id',CHtml::listData(AgentesGrupo::model()->findAll(array("condition"=>"","order"=>"")),'agentes_grupo_id',''), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'monto',array('class'=>'span5','maxlength'=>12)); ?>


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
