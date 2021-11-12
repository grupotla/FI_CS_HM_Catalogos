<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'contactos-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'id_cliente'),
)); ?>

	<!-- <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p> -->

<?php if(Yii::app()->user->hasFlash('error')): ?>
	<br>
	<div class="alert alert-error">
	<button class="close" data-dismiss="alert" type="button">×</button>
		<?php echo Yii::app()->user->getFlash('error'); ?>
	</div>
<?php else: ?>
<?php endif; ?>

	<?php echo $form->errorSummary($model); ?>








<?php ob_start(); ?>

<br>

	<?php echo $form->textFieldRow($model,'id_cliente',array('class'=>'span5','data-inputmask-alias'=>"integer", 'readonly'=>true)); ?>

	<?php echo $form->textFieldRow($model,'nombres',array('class'=>'span5', 'data-inputmask-alias'=>'address')); ?>

	<?php echo $form->textFieldRow($model,'telefono',array('class'=>'span5', 'data-inputmask-alias'=>"telefono")); ?>

	<?php echo $form->textFieldRow($model,'fax',array('class'=>'span5', 'data-inputmask-alias'=>"telefono")); ?>

	<?php //echo $form->textFieldRow($model,'email',array('class'=>'span5', 'data-inputmask-alias'=>'')); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5', 'type'=>'email')); ?>

	<?php //echo "<center><font color=" . (ZHtml::isValidEmail($model->email) ? "green>Email valido" : "red>Email invalido") . "</font></center>"; ?>

	<?php  $section0 = ob_get_contents(); ob_end_clean(); ?>



	<?php ob_start(); ?>

	<?php echo $form->checkBoxRow($model,'activo'); ?>

	<?php //echo $form->textFieldRow($model,'cargo',array('class'=>'span5','maxlength'=>60)); ?>

	<?php $sql = "
SELECT distinct case when cargo ilike '%s' and substr(upper(trim(cargo)),LENGTH(trim(cargo))-1,1) NOT IN ('E','P') then
substr(cargo,1,LENGTH(cargo)-1) else cargo end FROM (
SELECT distinct UPPER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(TRIM(cargo),'á','a'),'Á','a'),'í','i'),'Í','i'),'ó','o'),'Ó','o')) AS cargo
FROM contactos WHERE LENGTH(TRIM(cargo)) > 5 AND TRIM(cargo) NOT ILIKE '%xx%' AND TRIM(cargo) NOT ILIKE '%@%'
 AND TRIM(cargo) NOT ILIKE '%-%' AND TRIM(cargo) NOT ILIKE '%9%'
 AND TRIM(cargo) NOT ILIKE '%8%' AND TRIM(cargo) NOT ILIKE '%7%'
 AND TRIM(cargo) NOT ILIKE '%6%' AND TRIM(cargo) NOT ILIKE '%5%'
 AND TRIM(cargo) NOT ILIKE '%4%' AND TRIM(cargo) NOT ILIKE '%3%'
 AND TRIM(cargo) NOT ILIKE '%2%' AND TRIM(cargo) NOT ILIKE '%1%'
 AND TRIM(cargo) NOT ILIKE '%0%' AND TRIM(cargo) NOT ILIKE '%.%'
) X ORDER BY cargo ";

//$sql = "select distinct cargo from contactos limit 20";

//print_r($model::model()->findBySQL($sql));

?>

	<?php echo $form->dropDownListRow($model,'cargo',CHtml::listData(Contactos::model()->findAllBySql($sql),'cargo','cargo'), array('prompt' => '-- Seleccione --')); ?>



	<?php
	$people = ContactosEnums::model()->findAll(array("condition"=>"status = 'activo' AND catalogo='persona' AND campo_ref = 'CONTACTOS'","order"=>"descripcion"));

	$arr_html = array();
	$arr_html['class'] = 'input-medium';
	if (count($people) > 1)
		$arr_html['prompt'] = ' -- Seleccione -- ';
	//else
	//	$arr_html['style'] = 'display:none';
	?>


	<?php echo $form->dropDownListRow($model,'tipo_persona',CHtml::listData($people,'indice','descripcion'), $arr_html); ?>


	<?php  $section1 = ob_get_contents(); ob_end_clean(); ?>




	<?php ob_start(); ?>
	
	<?php //echo $form->textAreaRow($model,'area',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textAreaRow($model,'impexp',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textAreaRow($model,'carga',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->checkBoxListInlineRow($model,'area_enum',CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"catalogo='area'","order"=>"")),'indice','descripcion'), array('prompt' => '-- Seleccione --', 'class'=>'label_area')); ?>

	<?php //if ($catalogo == "USUARIO") { 
		echo $form->checkBoxListInlineRow($model,'carga_enum',CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"catalogo='carga'","order"=>"")),'indice','descripcion'), array('prompt' => '-- Seleccione --', 'class'=>'label_carga'));
	//} ?>


	
<?php echo $form->checkBoxListInlineRow($model,'impexp_enum',CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"catalogo='impexp'","order"=>"")),'indice','descripcion'), array('prompt' => '-- Seleccione --', 'class'=>'label_impexp')); ?>


	<?php //if ($catalogo == "USUARIO") echo $form->checkBoxRow($model,'tranship'); ?>

	<?php echo CHtml::script("
	$('label[for=Contactos_area_enum]').click(function(e){
		if ($('.label_area').attr('checked') == undefined) { $('.label_area').attr('checked','checked'); } else { $('.label_area').removeAttr('checked'); }
	});

	$('label[for=Contactos_impexp_enum]').click(function(e){
		if ($('.label_impexp').attr('checked') == undefined) { $('.label_impexp').attr('checked','checked'); } else { $('.label_impexp').removeAttr('checked'); }
	});

	$('label[for=Contactos_carga_enum]').click(function(e){
		if ($('.label_carga').attr('checked') == undefined) { $('.label_carga').attr('checked','checked'); } else { $('.label_carga').removeAttr('checked'); }
	});

		"); ?>

	<?php if ($model->isNewRecord) { //inicializa checkboxes

		echo CHtml::script("
		$('label[for=Contactos_area_enum]').click();
		$('label[for=Contactos_impexp_enum]').click();
		$('label[for=Contactos_carga_enum]').click();
		");
	}	?>

	<?php  $section2 = ob_get_contents(); ob_end_clean(); ?>







	<?php ob_start(); ?>


	<?php echo $form->textFieldRow($model,'id_usuario_ingreso',array('class'=>'span5','value'=> $model->usuarioCreacion ? $model->usuarioCreacion->pw_gecos : $model->id_usuario_ingreso)); ?>

	<?php echo $form->textFieldRow($model,'ingreso',array('class'=>'span5','value'=>date("d/m/Y h:i:s",strtotime($model->ingreso)))); ?>

	<?php echo $form->textFieldRow($model,'id_usuario_modifica',array('class'=>'span5','value'=>$model->usuarioModificacion ? $model->usuarioModificacion->pw_gecos : $model->id_usuario_modifica)); ?>

	<?php echo $form->textFieldRow($model,'modifica',array('class'=>'span5','value'=>date("d/m/Y h:i:s",strtotime($model->modifica)))); ?>

	<?php  $section3 = ob_get_contents(); ob_end_clean(); ?>











    <?php echo TbHtml::tabbableTabs(array(
        array('label' => 'Generales', 'content' => $section0, 'active' => true),
        array('label' => 'Tipo', 'content' => $section1,),
        array('label' => 'Segmentos', 'content' => $section2,),
        array('label' => 'Usuario', 'content' => $section3,),
    ), array('placement' => TbHtml::TABS_PLACEMENT_LEFT ) ); ?>





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
