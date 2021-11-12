<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'navieras-representantes-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'id_naviera_representante'),
)); ?>

	<!-- <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p> -->

	<?php //echo "($id_naviera)($id_representante)"?>

	<?php echo $form->errorSummary($model); ?>


	<!-- NAVIERA -->

	<?php if ($id_naviera > 0) {
		$model->id_naviera = $id_naviera;
		echo $form->hiddenField($model,'id_naviera',array('value'=>$id_naviera)); 
	} ?>

	<?php echo $form->dropDownListRow($model,'id_naviera',CHtml::listData(Navieras::model()->findAll(array("condition"=>"parent_id = 1 AND activo = 't'","order"=>"nombre")),'id_naviera','codename'), array('prompt' => '-- Seleccione --', 'disabled'=> $id_naviera > 0 ? 'true' : '' )); ?>



	<!-- REPRESENTANTE -->

	<?php if ($id_representante > 0) {
		$model->id_naviera_representante = $id_representante;
		echo $form->hiddenField($model,'id_naviera_representante',array('value'=>$id_representante)); 
	} ?>

	<?php echo $form->dropDownListRow($model,'id_naviera_representante',CHtml::listData(Navieras::model()->findAll(array("condition"=>"parent_id <> 1 AND activo = 't'","order"=>"nombre")),'id_naviera','namecode'), array('prompt' => '-- Seleccione --', 'disabled'=> 
	$id_representante > 0 ? 'true' : '')); ?>

	<?php if (Yii::app()->user->name == "admin" || Yii::app()->session['p']['admin'] == 1)
		echo $form->checkBoxRow($model,'activo'); ?>
		
	<?php echo $form->textFieldRow($model,'observaciones',array('class'=>'span5', 'data-inputmask-alias'=>'address')); ?>	

	<?php /*echo $form->textFieldRow($model,'user_insert',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_insert',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'user_update',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_update',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'user_auth',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_auth',array('class'=>'span5')); */ ?>
	

<?php $this->endWidget(); ?>
