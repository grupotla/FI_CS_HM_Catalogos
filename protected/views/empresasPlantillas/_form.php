<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'empresas-plantillas-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'country'),
)); ?>

	<!-- <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p> -->

	<?php echo $form->errorSummary($model); ?>	

	<?php echo $form->hiddenField($model,'flag') ?>
	<?php echo $model->isNewRecord ? $form->hiddenField($model,'titulo') : "" ?>	

<!--  DATOS GENERALES -->

	<?php ob_start(); ?>

	<?php echo $form->dropDownListRow($model,'country',CHtml::listData(Empresas::model()->findAll(array("condition"=>"activo = 't'","order"=>"nombre_empresa")),'pais_iso','nombre_empresa'),
		array('prompt' => '-- Seleccione --','disabled'=>$model->country_disabled)
	); ?>

	<?php echo $model->country_disabled ? $form->hiddenField($model,'country') : ""; ?>


	<?php echo $form->dropDownListRow($model,'sistema',CHtml::listData(EmpresasPlantillasDocs::model()->findAll(array("condition"=>"","order"=>"sistema")),'sistema','sistema'),
		array('prompt' => '-- Seleccione --',
			'prompt'=>'Seleccione Modulo',			
			'ajax' => array(
				'type'=>'POST', 
				'url'=>$this->createUrl('loaddocs'),
				'success' => 'function(data){ 
					$("#EmpresasPlantillas_doc_id").html(data); 
					$("#EmpresasPlantillas_titulo").val("");
				}',
				'data'=>array('country'=>$model->country, 'sistema'=>'js:this.value'),
			)
		)		
	) ?>

	<?php /*echo $form->dropDownListRow($model,'sistema',
		array(
			"AEREO"			=>"AEREO",
			"BAW"			=>"BAW",
			"FCL"			=>"Maritimo FCL",
			"LCL"			=>"Maritimo LCL",
			"TERRESTRE"		=>"TERRESTRE",
			"WMS"			=>"eWMS",
			"CUSTOMER"		=>"CUSTOMER",
			"PREEMBARQUE"	=>"PREEMBARQUE",
		),
		array(
			'prompt'=>'Seleccione Modulo',

			//'onchange'=>'this.form.submit();',
			
			'ajax' => array(
				'type'=>'POST', 
				//'url'=>Yii::app()->createUrl('loaddocs'), //or $this->createUrl('loadcities') if '$this' extends CController
				'url'=>$this->createUrl('loaddocs'),
				
				//'update'=>'#EmpresasPlantillas_doc_id', 				
				'success' => 'function(data){ 
					$("#EmpresasPlantillas_doc_id").html(data); 
					$("#EmpresasPlantillas_titulo").val("");
					
				}',
				'data'=>array('country'=>$model->country, 'sistema'=>'js:this.value'),
			)
		)
	);*/ ?>

	<?php echo $form->dropDownListRow($model,'doc_id',array(),
		array(
			'ajax' => array(
				'type'=>'POST', 			
				'url'=>$this->createUrl('loadref'),
				'success' => 'function(data){
					$("#EmpresasPlantillas_titulo").val(data);					
					$("#EmpresasPlantillas_flag").val(1);						
					$("#empresas-plantillas-form").submit();
				}',
				'data'=>array('country'=>$model->country, 'sistema'=>$model->sistema, 'id'=>'js:this.value'),
				//'error' => 'function(a,b,c){ console.log(a); console.log(b); console.log(c); }'
			)
		)
); ?>	

	<?php echo $model->sistema == "FCL" ? $form->dropDownListRow($model,'ocean_id_naviera',CHtml::listData(Navieras::model()->findAll(array("condition"=>"activo = 't'","order"=>"nombre")),'id_naviera','nombre'),
		array('prompt' => '-- Seleccione --')
	) : '' ?>

	<?php echo $form->textFieldRow($model,'logo_alto',array('class'=>'span5', 'data-inputmask-alias'=>"integer")); ?>

	<?php echo $form->textFieldRow($model,'logo_ancho',array('class'=>'span5', 'data-inputmask-alias'=>"integer")); ?>

	<?php echo $model->sistema == "FCL" || $model->sistema == "LCL" ? $form->textFieldRow($model,'ocean_codigo_iso',array('class'=>'span5','maxlength'=>20)) : ''; ?>		

<script>

//if ('.intval($model->isNewRecord).' == 1)						
//if ($("#EmpresasPlantillas_sistema").val() == "FCL" || $("#EmpresasPlantillas_sistema").val() == "LCL")						


function loaddocs(){
	$.ajax({
        url: '<?=$this->createUrl('loaddocs')?>',
        type: "POST",
		data: 'country=' + '<?=$model->country?>' + '&' + 'sistema=' + '<?=$model->sistema?>', 		
        success: function (data) {		   			
		   $("#EmpresasPlantillas_doc_id").html(data); 					//llena combo box
		   $("#EmpresasPlantillas_doc_id").val("<?=$model->doc_id?>");  //selecciona 
		   loadref();
        },
        error: function(jqXHR, textStatus, errorThrown) {
		   //console.log(textStatus, errorThrown);		   
		   alert("loaddocs : " + jqXHR.responseText);
        }
	});
}

loaddocs();

function loadref(){
	$.ajax({
        url: '<?=$this->createUrl('loadref')?>',
        type: "POST",
		//data: 'id=' + '<?=$model->sistema == "FCL" || $model->sistema == "LCL" ? $model->doc_id : $model->id?>' + '&' + 'country=' + '<?=$model->country?>' + '&' + 'sistema=' + '<?=$model->sistema?>', 		
		data: 'id=' + '<?=$model->doc_id?>' + '&' + 'country=' + '<?=$model->country?>' + '&' + 'sistema=' + '<?=$model->sistema?>', 		
        success: function (data) {				
			if ($("#EmpresasPlantillas_titulo").val() == '')
				$("#EmpresasPlantillas_titulo").val(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
			alert("loadref : " + jqXHR.responseText);
        }
    });
}

</script>

<?php  $section1 = ob_get_contents(); ob_end_clean(); ?>




<!--  DOCUMENTO -->

	<?php ob_start(); ?>	
	<?php echo $form->textFieldRow($model,'edicion',array('class'=>'span5', 'data-inputmask-alias'=>'address','maxlength'=>30)); ?>
	<?php echo $form->textFieldRow($model,'titulo',array('class'=>'span5', 'data-inputmask-alias'=>'address','maxlength'=>100)); ?>
	<?php echo $form->dropDownListRow($model,'activo', array('1'=>'Activo', '0'=>'Inactivo')); ?>	
	<?php  $section2 = ob_get_contents(); ob_end_clean(); ?>


	<?php
	$contenido_tipo = 0;
	if (!$model->isNewRecord) {
		$docs=EmpresasPlantillasDocs::model()->findByPk($model->doc_id);
		$contenido_tipo = intval($docs->tipo_code);
		//echo "****************************(" . $model->doc_id . ")(" . $docs->tipo_code . ")";	
	}
	?>

<!-- CONTENIDO  -->	
	<?php ob_start(); ?>
	<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>40, 'class'=>'span8')); ?>
	<?php  $section3 = ob_get_contents(); ob_end_clean(); ?>

<!-- USUARIO -->
	<?php ob_start(); ?>
	<?php echo $form->textFieldRow($model,'creacion_user',array('class'=>'span5','readonly'=>true)); ?>
	<?php echo $form->textFieldRow($model,'creacion_date',array('class'=>'span5','readonly'=>true)); ?>
	<?php echo $form->textFieldRow($model,'modifica_user',array('class'=>'span5','readonly'=>true)); ?>
	<?php echo $form->textFieldRow($model,'modifica_date',array('class'=>'span5','readonly'=>true)); ?>
	<?php  $section4 = ob_get_contents(); ob_end_clean(); ?>

	<!-- ocean_requerimiento_partidas -->
	<?php ob_start(); ?>
	<?php echo $form->textArea($model,'ocean_requerimiento_partidas',array('rows'=>14, 'cols'=>50, 'class'=>'span8')); ?>
	<?php  $section6 = ob_get_contents(); ob_end_clean(); ?>

	<!-- ocean_cuentas_bancarias -->
	<?php ob_start(); ?>
	<?php echo $form->textArea($model,'ocean_cuentas_bancarias',array('rows'=>14, 'cols'=>50, 'class'=>'span8')); ?>	
	<?php  $section7 = ob_get_contents(); ob_end_clean(); ?>


	<!-- campos maritimo -->
	<?php ob_start(); ?>
	<?php //if (!$model->isNewRecord) $this->renderPartial('/empresasPlantillasDatos/view',array('plantilla'=>$model)); ?>
	<?php  $section8 = ob_get_contents(); ob_end_clean(); ?>

	<?php  
	echo TbHtml::tabbableTabs(array(
        array('label' => 'Generales', 'content' => $section1, 'active' => true),
        array('label' => 'Documento', 'content' => $section2, 'visible' => !$model->isNewRecord),
		array('label' => 'Contenido', 'content' => $section3, 'visible' => $contenido_tipo == 0 ? false : true),		
		array('label' => 'Requerimiento Partidas', 'content' => $section6, 'visible' => $model->sistema == "FCL" || $model->sistema == "LCL" ? true : false),
		array('label' => 'Cuentas Bancarias', 'content' => $section7, 'visible' => $model->sistema == "FCL" || $model->sistema == "LCL" ? true : false),		
        array('label' => 'Usuario', 'content' => $section4, 'visible' => !$model->isNewRecord),
    ), array('placement' => TbHtml::TABS_PLACEMENT_LEFT ) ); ?>





<?php if (!$this->asDialog) : ?>

	<div class="form-actions">

		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'danger',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
			'icon'=>$model->isNewRecord ? 'icon-file icon-white' : 'icon-pencil icon-white',
		)); ?>

	</div>
	
<?php 


/*else: ?>
	
	
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
	




<?php $this->widget('application.extensions.tinymce.SladekTinyMce'); ?>

<?php //if ($model->sistema != "FCL" && $model->sistema != "LCL") { 
	
	if ($contenido_tipo == 1) {
?>

<script type="text/javascript">
	
	tinymce.init({
    selector: "textarea#EmpresasPlantillas_observaciones",
	theme: "modern",
	//menubar: false,
    width: 430,
    height: 110,
    plugins: [
         //"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",  //view
         //"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking", //tools
		 //"table contextmenu directionality emoticons template paste textcolor"
		 "table"
   ],
   content_css: "css/content.css",
 	toolbar: "formatselectformatselect fontselect fontsizeselect styleselect | undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | preview | forecolor backcolor", 
  

   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 
 </script> 

<?php } ?>

<?php $this->endWidget(); ?>