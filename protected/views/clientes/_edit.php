<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'search-clientes-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'dato'),
)); ?>


	<?php //echo $form->errorSummary($model);

	if ($model->field == "codigo_tributario") $kType = "nit"; else $kType = "address";
	if ($model->field == "codigo_tributario") $len = 30; else $len = 150;
	?>

		<!-- disables autocomplete -->
		<input type="text" style="display:none">

		<?php echo $form->textFieldRow($model,'dato',array('class'=>'span5','data-inputmask-alias'=>$kType,'maxlength'=>$len,'required'=>true,'autocomplete'=>'off')); ?>

		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
			'icon'=>'icon-search icon-white',
			//'htmlOptions'=>array('onclick'=>'javascript:window.parent.$("#cru_dialog").dialog("close");',)
		)); ?>

		<?php echo $form->hiddenField($model,'id_cliente',array('value'=>$id_cliente)); ?>
		<?php echo $form->hiddenField($model,'field'); ?>
		<?php echo $form->hiddenField($model,'asDialog'); ?>

<?php $this->endWidget(); ?>
