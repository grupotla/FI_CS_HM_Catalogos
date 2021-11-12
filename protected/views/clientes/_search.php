<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->dropDownListRow($model,'id_cliente',CHtml::listData(Clientes::model()->findAll(array("condition"=>"","order"=>"")),'id_cliente','codigo_tributario'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'codigo_tributario',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'nombre_cliente',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'nombre_facturar',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'id_vendedor',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_tipo_cliente',CHtml::listData(TiposCliente::model()->findAll(array("condition"=>"","order"=>"")),'id_tipo_cliente','descripcion'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'id_grupo',CHtml::listData(Grupos::model()->findAll(array("condition"=>"","order"=>"")),'id_grupo','nombre_grupo'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'id_cobrador',CHtml::listData(Cobradores::model()->findAll(array("condition"=>"","order"=>"")),'id_cobrador','nombre_cobrador'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'id_estatus',array('class'=>'span5')); ?>

	<?php echo $form->checkBoxRow($model,'es_consigneer'); ?>

	<?php echo $form->checkBoxRow($model,'es_shipper'); ?>

	<?php echo $form->textFieldRow($model,'id_frecuencia',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_credito',CHtml::listData(Creditos::model()->findAll(array("condition"=>"","order"=>"")),'id_credito','limite_credito_local'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dateFieldRow($model,'fecha_creacion',array('class'=>'span2')); ?>

	<?php echo $form->textFieldRow($model,'hora_creacion',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_clase',CHtml::listData(ClasesCliente::model()->findAll(array("condition"=>"","order"=>"")),'id_clase','descripcion'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'id_anterior',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_usuario_creacion',array('class'=>'span5')); ?>

	<?php echo $form->dateFieldRow($model,'fecha_uvisita',array('class'=>'span2')); ?>

	<?php echo $form->textFieldRow($model,'usr',array('class'=>'span5','maxlength'=>40)); ?>

	<?php echo $form->textFieldRow($model,'pwd',array('class'=>'span5','maxlength'=>35)); ?>

	<?php echo $form->textFieldRow($model,'id_sales_support',array('class'=>'span5')); ?>

	<?php echo $form->dateFieldRow($model,'ultima_fecha_descarga',array('class'=>'span2')); ?>

	<?php echo $form->textFieldRow($model,'encuesta_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'encuesta',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_pais',CHtml::listData(Paises::model()->findAll(array("condition"=>"","order"=>"")),'codigo','descripcion'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'id_regimen',CHtml::listData(RegimenTributario::model()->findAll(array("condition"=>"","order"=>"")),'id_regimen','descripcion_regimen'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'codigo_tributario2',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'observacion',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_usuario_modificacion',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha_modificado',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'ultimo_tipo_movimiento',CHtml::listData(Transporte::model()->findAll(array("condition"=>"","order"=>"")),'id_transporte','descripcion'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->checkBoxRow($model,'ultimo_movimiento_asegurado'); ?>

	<?php echo $form->textFieldRow($model,'requiere_rubro_alias',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_vendedor_grh',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_sales_support_grh',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ref_interna_pricing',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->checkBoxRow($model,'con_cotizacion'); ?>

	<?php echo $form->textFieldRow($model,'marca',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>120)); ?>

	<?php echo $form->checkBoxRow($model,'es_coloader'); ?>

	<?php echo $form->checkBoxRow($model,'incluir_saldo'); ?>

	<?php echo $form->dropDownListRow($model,'cto_id',CHtml::listData(ClientesOperacionesTipo::model()->findAll(array("condition"=>"","order"=>"")),'cto_id','cto_nombre'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'cto_fecha',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_documento',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_estatus_bk',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_cliente_ref',array('class'=>'span5')); ?>


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
