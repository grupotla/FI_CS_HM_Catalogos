<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'contactos-divisiones-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'id_catalogo'),
)); ?>


	<!-- <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p> -->

	<?php echo $form->errorSummary($model); ?>


<?php
if ($model->isNewRecord)
	$catalogo = $_GET['CATALOGO'];
else
	$catalogo = $model->catalogo;
?>

	<?php ob_start(); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5', 'data-inputmask-alias'=>'address')); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5', 'data-inputmask-alias'=>'')); ?>

	<?php //echo "<center><font color=" . (ZHtml::isValidEmail($model->email) ? "green>Email valido" : "red>Email invalido") . "</font></center>"; ?>

	<?php echo $form->textFieldRow($model,'telefono',array('class'=>'span5', 'data-inputmask-alias'=>"telefono")); ?>

	<?php echo $form->textFieldRow($model,'fax',array('class'=>'span5', 'data-inputmask-alias'=>"telefono",'maxlength'=>60)); ?>

	<?php echo $form->dropDownListRow($model,'cargo',array("GERENCIA"=>"GERENCIA","CONTABILIDAD"=>"CONTABILIDAD","COMPRAS"=>"COMPRAS","COMPRAS"=>"COMPRAS","VENTAS"=>"VENTAS","IMPOR"=>"IMPORT","EXPORT"=>"EXPORT","IMP/EXP"=>"IMP/EXP"), array('prompt' => '-- Seleccione --')); ?>

	<?php  $section1 = ob_get_contents(); ob_end_clean(); ?>



	<?php ob_start(); ?>
<br><br>
	<?php echo $form->radioButtonListInlineRow($model,'status',CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"catalogo='status'","order"=>"")),'indice','descripcion'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->radioButtonListInlineRow($model,'copia',CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"catalogo='sino'","order"=>"")),'indice','descripcion'), array('prompt' => '-- Seleccione --')); ?>

	<?php if ($catalogo == "USUARIO") echo $form->radioButtonListInlineRow($model,'rechazo',CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"catalogo='sino'","order"=>"")),'indice','descripcion'), array('prompt' => '-- Seleccione --')); ?>


	<?php
	$people = ContactosEnums::model()->findAll(array("condition"=>"status = 'activo' AND catalogo='persona' AND campo_ref = '$catalogo'","order"=>"descripcion"));

	$arr_html = array();
	$arr_html['class'] = 'input-medium';
	if (count($people) > 1)
		$arr_html['prompt'] = ' -- Seleccione -- ';
	//else
	//	$arr_html['style'] = 'display:none';
	?>


	<?php echo $form->dropDownListRow($model,'tipo_persona',CHtml::listData($people,'indice','descripcion'), $arr_html); ?>

	<?php  $section2 = ob_get_contents(); ob_end_clean(); ?>








	<?php ob_start(); ?>

	<?php //echo $form->textAreaRow($model,'area',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textAreaRow($model,'impexp',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textAreaRow($model,'carga',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->checkBoxListInlineRow($model,'area_enum',CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"catalogo='area'","order"=>"")),'indice','descripcion'), array('prompt' => '-- Seleccione --', 'class'=>'label_area')); ?>

	<?php if ($catalogo == "USUARIO") { echo $form->checkBoxListInlineRow($model,'carga_enum',CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"catalogo='carga'","order"=>"")),'indice','descripcion'), array('prompt' => '-- Seleccione --', 'class'=>'label_carga'));
	} ?>

	<?php echo $form->checkBoxListInlineRow($model,'impexp_enum',CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"catalogo='impexp'","order"=>"")),'indice','descripcion'), array('prompt' => '-- Seleccione --', 'class'=>'label_impexp')); ?>

	<?php if ($catalogo == "USUARIO") echo $form->checkBoxRow($model,'tranship'); ?>




	<?php echo CHtml::script("
	$('label[for=ContactosDivisiones_area_enum]').click(function(e){
		if ($('.label_area').attr('checked') == undefined) { $('.label_area').attr('checked','checked'); } else { $('.label_area').removeAttr('checked'); }
	});

	$('label[for=ContactosDivisiones_impexp_enum]').click(function(e){
		if ($('.label_impexp').attr('checked') == undefined) { $('.label_impexp').attr('checked','checked'); } else { $('.label_impexp').removeAttr('checked'); }
	});

	$('label[for=ContactosDivisiones_carga_enum]').click(function(e){
		if ($('.label_carga').attr('checked') == undefined) { $('.label_carga').attr('checked','checked'); } else { $('.label_carga').removeAttr('checked'); }
	});

		"); ?>


	<?php if ($model->isNewRecord) { //inicializa checkboxes

		echo CHtml::script("
		$('label[for=ContactosDivisiones_area_enum]').click();
		$('label[for=ContactosDivisiones_impexp_enum]').click();
		$('label[for=ContactosDivisiones_carga_enum]').click();
		");
	}	?>

	<?php  $section3 = ob_get_contents(); ob_end_clean(); ?>







	<?php ob_start(); ?>

	<?php
	//$usuarios_paises = CHtml::listData(UsuariosPaises::model()->findAll(array("condition"=>"activo = 't'","order"=>"nombre")), 'pais', 'nombre');
	$usuarios_paises = CHtml::listData(Empresas::model()->findAll(array("condition"=>"activo = 't'","order"=>"pais_iso")), 'pais_iso', 'nombre_empresa');

	$usuarios_paises_fix = null;
	foreach ($usuarios_paises as $key => $value)
		$usuarios_paises_fix[trim($key)] = '<img src="images/flags/' . strtolower(substr($key,0,2)) . '-flag.gif" style="height:16px"> ' . trim($value);
	?>

	<?php echo $form->checkBoxListInlineRow($model,'pais',$usuarios_paises_fix,array('class'=>'label_pais')); ?>
	<?php //echo $form->checkBoxListRow($model,'pais',$usuarios_paises_fix,array('class'=>'label_pais')); ?>

	<?php echo CHtml::script("
	$('label[for=ContactosDivisiones_pais]').css('width','50px');
	$('label[for=ContactosDivisiones_pais]').css('display','inline');

	$('#tab_4 .control-group .controls').css('display','inline');
	$('#tab_4 .control-group .controls label').css('width','180px');
	$('#tab_4 .control-group .controls label').css('height','30px');

	$('label[for=ContactosDivisiones_pais]').click(function(e){
		if ($('.label_pais').attr('checked') == undefined) { $('.label_pais').attr('checked','checked'); } else { $('.label_pais').removeAttr('checked'); }
	});
		"); ?>

	<?php $section4 = ob_get_contents(); ob_end_clean(); ?>








	<?php ob_start(); ?>

	<?php //echo $form->textAreaRow($model,'contactoxpais',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php $index = 0;
		$obj = json_decode($model->contactoxpais,true);
		foreach ($usuarios_paises as $key => $value) {
	    	$key = trim($key);
			echo '<div class="control-group">';
			echo '<label class="control-label" style="text-align:left; width:20%" ><img src="images/flags/'.strtolower(substr($key,0,2)).'-flag.gif" style="height:16px"> '.$key.'</label>';
			echo CHtml::activeTextField($model,'['.$key.']contactoxpais',array('maxlength'=>128,
			'class'=>'EmailType',
			'placeholder'=>'Email para '.$key, 'value'=>isset($obj[$key]) ? $obj[$key] : "", 'style'=>'width:75%;float:right'));
			echo '</div>';
			$index++;
		} ?>

	<?php  $section5 = ob_get_contents(); ob_end_clean(); ?>


	<?php ob_start(); ?>

	<?php echo $form->textFieldRow($model,'catalogo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_catalogo',array('class'=>'span5', 'data-inputmask-alias'=>"integer")); ?>

	<?php echo $form->textFieldRow($model,'id_contacto',array('class'=>'span5', 'data-inputmask-alias'=>"integer")); ?>

	<?php echo $form->textFieldRow($model,'fecha',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'usuario',array('class'=>'span5','data-inputmask-alias'=>"integer", "value"=>Yii::app()->user->id)); ?>

	<?php  $section6 = ob_get_contents(); ob_end_clean(); ?>



    <?php echo TbHtml::tabbableTabs(array(
        array('label' => 'Generales', 'content' => $section1, 'active' => true),
        array('label' => 'Acciones', 'content' => $section2,),
        array('label' => 'Segmentos', 'content' => $section3,),
        array('label' => 'Paises', 'content' => $section4,),
        array('label' => 'Emails', 'content' => $section5, 'visible' => $catalogo == "USUARIO" ? true : false),
        array('label' => 'Usuario', 'content' => $section6,),
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
	)); */ ?>

<?php endif; ?>

<?php echo CHtml::script("
$('input[type=checkbox]').css('width','2em');
$('input[type=radio]').css('width','2em');
"); ?>


<?php $this->endWidget(); ?>

<script>
$('#btn-save-modal').attr('title','Save');
</script>
