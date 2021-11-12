<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'navieras-representantes-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'id_naviera'),
)); ?>

	<!-- <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p> -->

	<?php echo "($id_naviera)($id_representante)"?>

	<?php echo $form->errorSummary($model); ?>

	<?php if ($id_naviera > 0) {
		$model->id_naviera = $id_naviera;
		echo $form->hiddenField($model,'id_naviera',array('value'=>$id_naviera)); 
	} ?>

	<?php echo $form->dropDownListRow($model,'id_naviera',CHtml::listData(Navieras::model()->findAll(array("condition"=>"parent_id=1","order"=>"nombre")),'id_naviera','nombre'), array('prompt' => '-- Seleccione --', 'disabled'=> $id_naviera > 0 ? 'true' : '' )); ?>



	<?php if ($id_representante > 0) {
		$model->id_naviera_representante = $id_representante;
		echo $form->hiddenField($model,'id_naviera_representante',array('value'=>$id_representante)); 
	} ?>

	<?php echo $form->dropDownListRow($model,'id_naviera_representante',CHtml::listData(Navieras::model()->findAll(array("condition"=>"parent_id=2","order"=>"nombre")),'id_naviera','nombre'), array('prompt' => '-- Seleccione --', 'disabled'=> 
	$id_representante > 0 ? 'true' : '')); ?>

	<?php echo $form->checkBoxRow($model,'activo'); ?>

	<?php /*echo $form->textFieldRow($model,'user_insert',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_insert',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'user_update',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_update',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'user_auth',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_auth',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'observaciones',array('class'=>'span5')); */?>


	<?php //ob_start(); ?>
	<?php //$section1 = ob_get_contents(); ob_end_clean(); ?>
		
    <?php /*echo TbHtml::tabbableTabs(array(
        array('label' => 'Datos Generales', 'content' => $section1, 'active' => true),
    ), array('placement' => TbHtml::TABS_PLACEMENT_LEFT ) );*/ ?>


<?php /*if (!$this->asDialog) : ?>

	<div class="form-actions">

		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
			'icon'=>$model->isNewRecord ? 'icon-file icon-white' : 'icon-pencil icon-white',
		)); ?>

	</div>
	
<?php */ /*else: ?>
	
	
	<?php echo CHtml::ajaxSubmitButton($model->isNewRecord ? 'Create' : 'Save',$_SERVER['REQUEST_URI'],array(	
				'update'=>'.modal-body',
   				//'type'=>'POST','dataType'=>'json','beforeSend' => 'function(data){ }', 'success' => 'js:function(data){ }',
            	'error' => 'function(data) {                   
    	        	alert(data.responseText);
	            }',
            ),
			array('style'=>'display:none'
	)); */ ?>
		
<?php //endif; ?>
	

<?php $this->endWidget(); ?>
