<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'empresas-parametros-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'country'),
	'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>

	<!-- <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p> -->
	<?php echo $form->errorSummary($model); ?>
	<?php //echo $form->textFieldRow($model,'country',array('class'=>'span5','maxlength'=>5)); ?>

	<!-- BASICA -->
	<?php ob_start(); ?>
	<?php echo $form->dropDownListRow($model,'country',CHtml::listData(Empresas::model()->findAll(array("condition"=>"activo = 't'","order"=>"pais_iso, nombre_empresa")),'pais_iso','company'),
		array('prompt' => '-- Seleccione --')
	); ?>
	<?php echo $form->textFieldRow($model,'nit',array('class'=>'span5', 'data-inputmask-alias'=>'nit','maxlength'=>50)); ?>
	<?php echo $form->textFieldRow($model,'nombre_empresa',array('class'=>'span5', 'data-inputmask-alias'=>'address','maxlength'=>100)); ?>		
	<?php echo $form->textAreaRow($model,'direccion',array('rows'=>6, 'cols'=>40, 'class'=>'span8', 'style'=>'width:60%')); ?>
	<?php  $section1 = ob_get_contents(); ob_end_clean(); ?>

	<!-- GENERALES -->
	<?php ob_start(); ?>
	<?php echo $form->textFieldRow($model,'telefonos',array('class'=>'span5', 'data-inputmask-alias'=>'telefono', 'maxlength'=>50)); ?>
	<?php echo $form->textFieldRow($model,'home_page',array('class'=>'span5', 'data-inputmask-alias'=>'webpage', 'maxlength'=>60)); ?>
	<?php echo $form->textFieldRow($model,'dominio',array('class'=>'span5', 'data-inputmask-alias'=>'webpage', 'maxlength'=>60)); ?>
	<?php echo $form->textFieldRow($model,'firma',array('class'=>'span5', 'data-inputmask-alias'=>'address','maxlength'=>60)); ?>
	<?php echo $form->radioButtonListRow($model,'activo', array('1'=>'Activo', '0'=>'Inactivo')); ?>	
	<?php  $section9 = ob_get_contents(); ob_end_clean(); ?>

	<!-- LOGO -->
	<?php ob_start(); ?>
<!--
	<div class="control-group "><label class="control-label" for="EmpresasPlantillas_logo">Logo</label>
		<div class="controls">
-->
		<?php echo $form->fileField($model,'logo',array('onchange'=>'js:readURL(this);')); ?>
		<?php echo $form->hiddenField($model,'logoupdate', array('value'=>$model->logo)); ?>		
		<?php $default_image = "iVBORw0KGgoAAAANSUhEUgAAAHMAAAB8CAYAAABaFY8zAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAABMSSURBVHhe7Z13rBRFHMcHsKNREXtvIFbEgoolMSKW2LAQDWCLLZKIYCwgSFSsKLZEwBK7EZVEo+gfioANjCUq9gYIighYURThuZ8f+z2H9e7d3Xs39+727TfZ3O3s7OzM/OZXZ3a2TUMElyEVaBv/ZkgBMmKmCBkxU4SMmClCRswUISNmihDENaHINm3axGcrzlsr/H4IjSCcWc0GZPgPQYMGf/31l5s0aVJ8lqFnz55ulVVWic8qj6BiFmJ26tTJrbnmmvGV1oF//vnnf0SbM2eOW7hwoVt99dXjlMojOGfusccebt1113V///23a9eunaUvW7bMftMItTGJuXPnuu+++y6oCgpKTEborrvumiNmx44d4yutBwsWLHDt27d3X331VTqIiZg99NBD3TXXXBNfaR2AS2+55RY3YcIE48xvv/22fnXmH3/84bp16+bWXntt16tXLzdy5Mg4R+vB0KFD3cSJE92iRYvczJkzg3JmUNekkP7IEAZBI0AZMauLIMSU5K43q5V6B9A6VUMWAUqAur/zzjtu8ODB7sADD3Tdu3c3vffll1/a9VomdiZmPUDIJ5980vXu3ds9//zzbsmSJSZdnnjiCXfEEUe4N954o6YHalBi1hs++ugjd8kll7gNN9zQLHANxg022MCOs846y/3www+WVouoG50pfRZSzN1///32CxE5VH/9/vjjj27q1Kn2vxZRNzqTMlUuwYgQRCVK06FDByNeciByvtVWW7kvvvgiTqk91KXOJGCNOCQoUQkkB0ahev/555/xv9pEUGImR3e5yMd9dOh5553nbr31VjdlypQ4tXkQx++7777ut99+s/8+QWnHGmusYTMfe+65Z5xaHohNh0bN60yVJdF68cUXu+nTp7sePXq4YcOGuZ9++smuC/kGQKno16+f/dLx6nyIutpqq1nAfP/997cYc1OeQRmhEVRnNrcB0pN0HgHq66+/3r388sumuxYvXux+//13d/fdd8e5V0DPbgq23HJLc0Oo97x586z8X375xXzMnXbayT3yyCNVIUpTEVTMVgJwJAS655573J133mkuAhwPx+A+MCsh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"; ?>
		<img id="logo" src="data:image/jpeg;base64,<?=$model->isNewRecord ? $default_image : (empty($model->logo) ? $default_image : $model->logo)?>" style="border:1px solid silver;padding:5px;display:block;margin:5px;"/>

<script>
function readURL(input) {
        if (input.files && input.files[0]) {
			//console.log(input.files[0].type);
			if (input.files[0].type == 'image/jpeg') {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#logo')
						.attr('src', e.target.result)
						//.width(150)
						//.height(200);
				};
				reader.readAsDataURL(input.files[0]);					
			} else { 
				input.value = '';
				alert('El tipo de la imagen es invalida, solo imagenes jpg porfavor.');				
			}
        }
    }
</script>			
<!--		
		</div>
	</div>	
-->
	<?php  $section8 = ob_get_contents(); ob_end_clean(); ?>

	<!-- FACTURACION ELECTRONICA -->
	<?php ob_start(); ?>
	<h4>se refleja en la facturacion electronica del BAW</h4>
	<?php echo $form->textFieldRow($model,'fact_elect_codigo',array('class'=>'span5', 'data-inputmask-alias'=>'codigo','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'fact_elect_email',array('class'=>'span5', 'data-inputmask-alias'=>'','maxlength'=>100)); ?>

    <?php echo $form->textFieldRow($model,'fact_elect_certname',array('class'=>'span5','maxlength'=>60)); ?>

    <?php echo $form->textFieldRow($model,'fact_elect_certpass',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->radioButtonListRow($model,'fact_elect_dev', array('1'=>'PRODUCCION', '0'=>'PRUEBAS')); ?>

    <?php echo $form->textFieldRow($model,'fact_elect_user',array('class'=>'span5','maxlength'=>100)); ?>

    <?php echo $form->textFieldRow($model,'fact_elect_pass',array('class'=>'span5','maxlength'=>30)); ?>
	
	<?php  $section2 = ob_get_contents(); ob_end_clean(); ?>

	<!-- TRACKING -->
	<?php ob_start(); ?>
	<h4>parametros SMTP para envio correo</h4>
	<h4>aereo, maritimo, terrestre, preembarque, customer</h4>
	<?php //echo $form->checkBoxRow($model,'trackactivo'); ?>
	<?php echo $form->radioButtonListRow($model,'trackactivo', array('1'=>'Habilitado', '0'=>'Deshabilitado')); ?>
	<?php echo $form->textFieldRow($model,'trackpuerto',array('class'=>'span5', 'data-inputmask-alias'=>"integer")); ?>
	<?php echo $form->textFieldRow($model,'trackmailserver',array('class'=>'span5', 'data-inputmask-alias'=>"webpage",'maxlength'=>40)); ?>
	<?php //echo $form->textFieldRow($model,'trackauth',array('class'=>'span5')); ?>
	<?php echo $form->radioButtonListRow($model,'trackauth', array('1'=>'Si', '0'=>'No')); ?>
	<?php echo $form->textFieldRow($model,'trackfromaddress',array('class'=>'span5', 'data-inputmask-alias'=>'','maxlength'=>100)); ?>
	<?php echo $form->textFieldRow($model,'trackpassword',array('class'=>'span5', 'data-inputmask-alias'=>"",'maxlength'=>100)); ?>
	<?php  $section3 = ob_get_contents(); ob_end_clean(); ?>

	<!-- MARITIMO -->
	<?php ob_start(); ?>
	<h3>Segmento para Trafico Maritimo</h3>
	<?php echo $form->textFieldRow($model,'ocean_error_reporting_mail',array('class'=>'span5','maxlength'=>50)); ?>
	<?php echo $form->radioButtonListRow($model,'ocean_idioma_id', array('ES'=>'Español', 'EN'=>'Ingles')); ?>
	<?php echo $form->textFieldRow($model,'ocean_dias_notificar_arribo',array('class'=>'span5', 'data-inputmask-alias'=>"integer")); ?>
	<?php echo $form->textFieldRow($model,'ocean_factor_riesgo_pais',array('class'=>'span5', 'data-inputmask-alias'=>"integer",'maxlength'=>10)); ?>
	<?php  $section4 = ob_get_contents(); ob_end_clean(); ?>

	<!-- MANIFEST -->
	<?php ob_start(); ?>

    <?php echo $form->textFieldRow($model,'manifest_emisor',array('class'=>'span5','maxlength'=>50)); ?>

    <?php echo $form->textFieldRow($model,'manifest_codigo',array('class'=>'span5','maxlength'=>50)); ?>

    <?php echo $form->textFieldRow($model,'manifest_tipo',array('class'=>'span5','maxlength'=>5)); ?>

    <?php echo $form->textFieldRow($model,'manifest_pass',array('class'=>'span5','maxlength'=>30)); ?>

    <?php echo $form->textFieldRow($model,'ftp_server',array('class'=>'span5','maxlength'=>30)); ?>

    <?php echo $form->textFieldRow($model,'ftp_user',array('class'=>'span5','maxlength'=>30)); ?>

    <?php echo $form->textFieldRow($model,'ftp_pass',array('class'=>'span5','maxlength'=>30)); ?>

	<?php  $section0 = ob_get_contents(); ob_end_clean(); ?>

	<!-- SEGUROS -->
	<?php ob_start(); ?>
	<?php echo $form->textFieldRow($model,'insurance_codigo',array('class'=>'span5', 'data-inputmask-alias'=>"codigo",'maxlength'=>30)); ?>
	<?php  $section5 = ob_get_contents(); ob_end_clean(); ?>

	<!-- DETALLE DE PLANTILLAS ASIGNADAS -->
	<?php ob_start(); ?>
	<?php if (!$model->isNewRecord) $this->renderPartial('/empresasPlantillas/child_admin',array('model'=>$model)); ?>
	<?php  $section6 = ob_get_contents(); ob_end_clean(); ?>

	<!-- USUARIO -->
	<?php ob_start(); ?>
	<?php echo $form->textFieldRow($model,'creacion_user',array('class'=>'span5','readonly'=>true)); ?>
	<?php echo $form->textFieldRow($model,'creacion_date',array('class'=>'span5','readonly'=>true)); ?>
	<?php echo $form->textFieldRow($model,'modifica_user',array('class'=>'span5','readonly'=>true)); ?>
	<?php echo $form->textFieldRow($model,'modifica_date',array('class'=>'span5','readonly'=>true)); ?>
	<?php  $section7 = ob_get_contents(); ob_end_clean(); ?>

    <?php echo TbHtml::tabbableTabs(array(
        array('label' => 'Basicos', 'content' => $section1, 'active' => true),
        array('label' => 'Generales', 'content' => $section9, 'visible' => $model->isNewRecord ? false : true),
        array('label' => 'Logo', 'content' => $section8, 'visible' => $model->isNewRecord ? false : true),
        array('label' => 'Facturación e', 'content' => $section2, 'visible' => $model->isNewRecord ? false : true),
        array('label' => 'SMTP', 'content' => $section3, 'visible' => $model->isNewRecord ? false : true),
        array('label' => 'Manifiestos', 'content' => $section0, 'visible' => $model->isNewRecord ? false : true),
        array('label' => 'Maritimo', 'content' => $section4, 'visible' => $model->isNewRecord ? false : true),
        array('label' => 'Seguros', 'content' => $section5, 'visible' => $model->isNewRecord ? false : true),
        array('label' => 'Plantillas', 'content' => $section6, 'visible' => $model->isNewRecord ? false : true),
        array('label' => 'Usuario', 'content' => $section7, 'visible' => $model->isNewRecord ? false : true),
    ), array('placement' => TbHtml::TABS_PLACEMENT_LEFT ) ); ?>

	<?php //ob_start(); ?>
	<?php //$section1 = ob_get_contents(); ob_end_clean(); ?>
    <?php /*echo TbHtml::tabbableTabs(array(
        array('label' => 'Datos Generales', 'content' => $section1, 'active' => true),
    ), array('placement' => TbHtml::TABS_PLACEMENT_LEFT ) );*/ ?>

<?php if (!$this->asDialog) : ?>

	<!--<div class="form-actions">-->
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
			'icon'=>$model->isNewRecord ? 'icon-file icon-white' : 'icon-pencil icon-white',
		)); ?>

	<!-- </div> -->
	
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
	





<?php /*$this->widget('application.extensions.tinymce.SladekTinyMce'); ?>
 
 <script type="text/javascript">
	tinymce.init({
    selector: "textarea#EmpresasParametros_direccion",
	theme: "modern",
	menubar: false,
    width: 470,
    height: 200,
	toolbar: " undo redo ",	 
 }); 
 </script> 

<?php */$this->endWidget(); ?>