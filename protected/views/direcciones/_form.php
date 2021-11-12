<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'direcciones-form',
	'type'=>'horizontal',
	/*
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	*/
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'id_nivel_geografico'),
)); ?>





<?php if(Yii::app()->user->hasFlash('error')): ?>
	<br>
	<div class="alert alert-error">
	<button class="close" data-dismiss="alert" type="button">×</button>
		<?php echo Yii::app()->user->getFlash('error'); ?>
	</div>
<?php else: ?>
<?php endif; ?>

	<!-- <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p> -->

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->dropDownListRow($model,'id_cliente',CHtml::listData(Clientes::model()->findAll(array("condition"=>"","order"=>"")),'id_cliente','codigo_tributario'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'id_cliente',array('class'=>'input-small', 'data-inputmask-alias'=>"integer")); ?>

	<?php echo $form->dropDownListRow($model,'id_nivel_geografico',CHtml::listData(NivelesGeograficos::model()->findAll(array("condition"=>"id_pais = '".$_REQUEST['id_pais']."'","order"=>"nivel1")),'id_nivel','nivel1'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'phone_number',array('class'=>'span5', 'data-inputmask-alias'=>"telefono",'maxlength'=>100)); ?>

	<?php echo $form->textAreaRow($model,'direccion_completa',array('class'=>'span5', 'data-inputmask-alias'=>'address','maxlength'=>250,)); ?>

	<?php echo $form->textAreaRow($model,'address',array('class'=>'span5', 'data-inputmask-alias'=>'address','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'city',array('class'=>'span5', 'data-inputmask-alias'=>'address', 'maxlength'=>35)); ?>

	<?php echo $form->textFieldRow($model,'state',array('class'=>'span5', 'data-inputmask-alias'=>'address', 'maxlength'=>35)); ?>

	<?php echo $form->textFieldRow($model,'zipcode',array('class'=>'span5', 'data-inputmask-alias'=>'numero','maxlength'=>35)); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5', 'data-inputmask-alias'=>'address','maxlength'=>65)); ?>

	<?php //echo $form->textFieldRow($model,'phone number',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'url',array('class'=>'span5', 'data-inputmask-alias'=>'url', 'maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'image',array('class'=>'span5', 'data-inputmask-alias'=>'numero', 'maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'lat',array('class'=>'span5', 'data-inputmask-alias'=>'numero')); ?>

	<?php echo $form->textFieldRow($model,'lng',array('class'=>'span5', 'data-inputmask-alias'=>'numero')); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5', 'data-inputmask-alias'=>'','maxlength'=>50)); ?>

	<?php echo $form->dropDownListRow($model,'id_tipo_direccion',CHtml::listData(TipoDireccion::model()->findAll(array("condition"=>"","order"=>"")),'id_tipo_direccion','descripcion_tipo'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->checkBoxRow($model,'boletines'); ?>

	<?php echo $form->checkBoxRow($model,'activo'); ?>



	<?php //ob_start(); ,array('value'=>$model->activo == 1 ? 'true' : 'false') ?>
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
		)); ?>

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

	</div>
<?php endif; ?>



<?php $this->endWidget(); ?>
