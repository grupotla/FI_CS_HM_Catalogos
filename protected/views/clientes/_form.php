<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'clientes-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'id_pais'),
	'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>

	<!-- <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p> -->




<?php

if (!isset($direcciones)) $direcciones = true;

if(Yii::app()->user->hasFlash('error')):
?>
	<br>
	<div class="alert alert-error">
	<button class="close" data-dismiss="alert" type="button">×</button>
		<?php echo Yii::app()->user->getFlash('error'); ?>
	</div>
<?php //else: ?>
<?php endif; ?>

	<?php echo $form->errorSummary($model); ?>

	<?php

	//echo "<br><br><br>model=(".$model->es_consigneer.")(".$model->es_shipper.")(".$model->es_coloader.")<br>";

	//if (isset($_POST['Clientes']))
	//echo "post=(".$_POST['Clientes']['es_consigneer'].")(".$_POST['Clientes']['es_shipper'].")(".$_POST['Clientes']['es_coloader'].")<br>";

	//trae valores en new despues que selecciono alguno
	$hay_tipo = isset($_POST['Clientes']['es_consigneer']) || isset($_POST['Clientes']['es_shipper']) || isset($_POST['Clientes']['es_coloader']);

	//$hay_tipo = $model->es_consigneer + $model->es_shipper + $model->es_coloader;


	//echo "(hay_tipo=".$hay_tipo.")(es_new=".$model->isNewRecord.")";


	?>


<!-- //////////////////////////////////////////////////////////TIPO//////////////////////////////////////////////////////// -->

	<?php //$hay_tipo = isset($_POST['Clientes']['es_consigneer']) || isset($_POST['Clientes']['es_shipper']) || isset($_POST['Clientes']['es_coloader']); ?>

	<?php ob_start(); ?>

	<?php if ($hay_tipo) { ?>


		<?php echo $form->checkBoxRow($model,'es_consigneer',array('disabled'=>$model->isNewRecord,'onclick'=>'javascript:if ($(this).attr("checked")) { $("#Clientes_es_coloader").attr("checked",false); }')); ?>
		<?php echo $form->checkBoxRow($model,'es_shipper',array('disabled'=>$model->isNewRecord,'onclick'=>'javascript:if ($(this).attr("checked")) { $("#Clientes_es_coloader").attr("checked",false); }')); ?>
		<?php echo $form->checkBoxRow($model,'es_coloader',array('disabled'=>$model->isNewRecord,'onclick'=>'javascript:if ($(this).attr("checked")) { $("#Clientes_es_shipper").attr("checked",false); $("#Clientes_es_consigneer").attr("checked",false); }')); ?>

		<?php if ($model->isNewRecord) { ?>
				<?php //echo $form->hiddenField($model,'es_consigneer',array('value'=>$_POST['Clientes']['es_consigneer'])); ?>
				<?php //echo $form->hiddenField($model,'es_shipper',array('value'=>$_POST['Clientes']['es_shipper'])); ?>
				<?php //echo $form->hiddenField($model,'es_coloader',array('value'=>$_POST['Clientes']['es_coloader'])); ?>

				<?php echo $form->hiddenField($model,'es_consigneer'); ?>
				<?php echo $form->hiddenField($model,'es_shipper'); ?>
				<?php echo $form->hiddenField($model,'es_coloader'); ?>

		<?php } ?>


		<?php echo $form->hiddenField($model,'id_vendedor',array('value'=>$model->isNewRecord ? '508' : $model->id_vendedor)); ?>


	<?php } else { ?>


	<?php echo $form->radioButtonrow($model,'es_consigneer',array('onclick'=>'javascript:if ($(this).attr("checked")) { $("#Clientes_es_shipper").attr("checked",false); $("#Clientes_es_coloader").attr("checked",false); }')); ?>

	<?php echo $form->radioButtonrow($model,'es_shipper',array('onclick'=>'javascript:if ($(this).attr("checked")) { $("#Clientes_es_consigneer").attr("checked",false); $("#Clientes_es_coloader").attr("checked",false); }')); ?>

	<?php echo $form->radioButtonrow($model,'es_coloader',array('onclick'=>'javascript:if ($(this).attr("checked")) { $("#Clientes_es_shipper").attr("checked",false); $("#Clientes_es_consigneer").attr("checked",false); } '));  ?>


	<?php //echo $form->checkBoxRow($model,'es_consigneer',array('onclick'=>'javascript:if ($(this).attr("checked")) { $("#Clientes_es_shipper").attr("checked",false); $("#Clientes_es_coloader").attr("checked",false); $("#clientes-form").submit(); } else { $("#Clientes_es_shipper").attr("checked",false); $("#Clientes_es_coloader").attr("checked",false); }')); ?>

	<?php //echo $form->checkBoxRow($model,'es_shipper',array('onclick'=>'javascript:if ($(this).attr("checked")) { $("#Clientes_es_consigneer").attr("checked",false); $("#Clientes_es_coloader").attr("checked",false); $("#clientes-form").submit(); } else { $("#Clientes_es_consigneer").attr("checked",false); $("#Clientes_es_coloader").attr("checked",false); }')); ?>

	<?php //echo $form->checkBoxRow($model,'es_coloader',array('onclick'=>'javascript:if ($(this).attr("checked")) { $("#Clientes_es_shipper").attr("checked",false); $("#Clientes_es_consigneer").attr("checked",false); $("#clientes-form").submit(); } else { $("#Clientes_es_shipper").attr("checked",false); $("#Clientes_es_consigneer").attr("checked",false); } '));  ?>

	<?php } ?>

	<?php $set_['tipo']['panel'] = ob_get_contents(); ob_end_clean(); ?>












	<?php
		$seguir = true;
		/*if (Yii::app()->user->name == "admin" || Yii::app()->session['p']['admin'] == 1) {

		} else {*/
			//$MasterUsuarios=UsuariosEmpresas::model()->findByPk(Yii::app()->user->id);

			//echo "(".$model->id_pais.")(".Yii::app()->session['pais'].")";

			if (trim($model->id_pais) != substr(Yii::app()->session['pais'],0,2)) {
				$Empresas=Empresas::model()->find("activo = 't' AND pais_iso = '".trim($model->id_pais)."'");
				if ($Empresas)
					$seguir = false;
			}
		//}
	?>





	<!-- //////////////////////////////////////////////////GENERALES////////////////////////////////////////////////////// -->

<script>

function PaisAction(data) {

		console.log(data);

		/*var div = $('#Clientes_codigo_tributario').parent().parent();
		if (data.nit == 'show') {
				$(div).show();
				$('#codigo_tributario').show();
		} else {
				$(div).hide();
				$('#codigo_tributario').hide();
		}*/

		var codigo_t = 0;
		var ide_t = 0;

		if (data.nit == 'show')
			codigo_t = 1;

		if (data.ide == 'show')
			 ide_t = 1;

		if (data.pais == 'empty') {

				//if ($('#Clientes_id_pais').val() != '< ?=$model->id_pais?>') {
				if ($('#Clientes_id_pais').val() != data.id_pais_ant) {

						$('#Clientes_id_pais_em_').html(data.msg);
						//$('#Clientes_id_pais_em_').show();
						$('#Clientes_id_pais_em_').slideUp( 10 ).delay( 800 ).fadeIn( 10 );

						if (data.isNewRecord == '1')
							$('#Clientes_id_pais').val('');
						else
							$('#Clientes_id_pais').val(data.id_pais_ant);

						codigo_t = 0;
						ide_t = 0;
				}
		}



		var div = $('#Clientes_id_tipo_identificacion_tributaria').parent().parent();
		//if (data.ide == 'show') {
		if (ide_t == 1) {
				$(div).show();
				//$('#codigo_tributario').show(); //2017-04-10 comentarizado caso N1, si no tiene identificacion tributaria
				$('#Clientes_id_tipo_identificacion_tributaria').html(data.combo);
				codigo_t = 1;
				if (data.isNewRecord == '0')
						$('#Clientes_id_tipo_identificacion_tributaria').val(data.id_tipo_identificacion_tributaria);

		} else {
				$(div).hide();
				//$('#codigo_tributario').hide();
				$('#Clientes_id_tipo_identificacion_tributaria').html('');
				codigo_t = 0;
		}

		div = $('#Clientes_codigo_tributario').parent().parent();
		if (codigo_t == 1) {
				$(div).show();
				$('#codigo_tributario').show();
		} else {
				$(div).hide();
				$('#codigo_tributario').hide();
		}


		/*if (data.grabar == '0')
			$('#btnSave').prop('disabled',true);
		else
			$('#btnSave').prop('disabled',false);*/
}

</script>

<?php ob_start(); ?>

	<?php
		if ($seguir == false)
			echo $form->hiddenField($model,'id_pais',array('value'=>$model->id_pais));
	 ?>

	<?php echo $form->dropDownListRow($model,'id_pais',CHtml::listData(Paises::model()->findAll(array("condition"=>"LENGTH(codigo) = 2","order"=>"descripcion")),'codigo','descripcion'),
		array('prompt' => '-- Seleccione --','disabled'=>!$seguir,
			//'onchange'=>'alert(this.value);'
			'ajax' => array(
						'type'=>'POST',
						'dataType'=>'json',
						'url'=>Yii::app()->createUrl('ClientesTIT/loadtit'),
						//'update'=>'#Clientes_id_tipo_identificacion_tributaria',
						'success' => "function(data){
									PaisAction(data);
						}",
						'data'=>array('id_pais'=>'js:this.value',
						'id_pais_ant'=>$model->id_pais,
						'isNewRecord'=>($model->isNewRecord ? 1 : 0),
						'isShipper'=>($model->es_shipper ? 1 : 0),
						'isConsigneer'=>($model->es_consigneer ? 1 : 0),
						'isColoader'=>($model->es_coloader ? 1 : 0),
						'id_tipo_identificacion_tributaria'=>$model->id_tipo_identificacion_tributaria),
				)
		)
	); ?>

	<?php echo CHtml::activelink($model,'pencil_nombre','<span class="icon-pencil"></span>',array('href'=>Yii::app()->controller->createUrl('edit',array('id_cliente' => $model->id_cliente)), 'id'=>'nombre_cliente', 'class'=>'pencil-button btn btn-small btn-warning','style'=>'float:left','data-toggle'=>'modal', 'data-target'=>'#myModalEdit','title'=>'Editar Nombre Cliente')); ?>
	<?php echo $form->textFieldRow($model,'nombre_cliente',array('class'=>'span5','maxlength'=>150)); ?>


	<!-- /////////////////////////////////NO ES SHIPPER/////////////////////////////-->

	<?php //if ($model->es_shipper==0 || ($model->es_consigneer==1 && $model->es_shipper==1) || $model->es_coloader==1): ?>
	<?php if ($model->es_consigneer==1 || $model->es_coloader==1): //2017-04-05 ?>

	<?php echo CHtml::activelink($model,'pencil_facturar','<span class="icon-pencil"></span>',array('href'=>Yii::app()->controller->createUrl('edit',array('id_cliente' => $model->id_cliente)), 'id'=>'nombre_facturar', 'class' =>'pencil-button btn btn-small btn-warning','style'=>'float:left','data-toggle'=>'modal', 'data-target'=>'#myModalEdit','title'=>'Editar Nombre Facturar')); ?>
	<?php echo $form->textFieldRow($model,'nombre_facturar',array('class'=>'span5','maxlength'=>150)); ?>


	<?php echo CHtml::activelink($model,'pencil_tributario','<span class="icon-pencil"></span>',array('href'=>Yii::app()->controller->createUrl('edit',array('id_cliente' => $model->id_cliente)), 'id'=>'codigo_tributario', 'class' => 'pencil-button btn btn-small btn-warning','style'=>'float:left','data-toggle'=>'modal', 'data-target'=>'#myModalEdit','title'=>'Editar Codigo Tributario')); ?>
	<?php echo $form->textFieldRow($model,'codigo_tributario',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'codigo_tributario2',array('class'=>'span5', 'data-inputmask-alias'=>"nit",'maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'email',array('class'=>'span5 EmailType','maxlength'=>120)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5', 'data-inputmask-alias'=>'','maxlength'=>120, 'placeholder'=>'ingrese email valido')); ?>

	<?php 			if ($model->isNewRecord || $direcciones == false): ?>
	<?php 			echo $form->textAreaRow($model,'direccion_completa',array('class'=>'span5', 'data-inputmask-alias'=>"address",'maxlength'=>250)); ?>
	<?php 			endif; ?>

	<?php echo $form->dropDownListRow($model,'id_tipo_identificacion_tributaria',array()); ?>
	<?php

    echo CHtml::script("
$.ajax({
  type: 'POST',
	dataType: 'json',
  url: '" . Yii::app()->createUrl('ClientesTIT/loadtit') . "',
  data: 'id_pais=" . (isset($_POST['Clientes']['id_pais']) ? $_POST['Clientes']['id_pais'] : "") . "&id_pais_ant=" . $model->id_pais . "&id_tipo_identificacion_tributaria=" . $model->id_tipo_identificacion_tributaria . "&isNewRecord=" . ($model->isNewRecord ? 1 : 0) . '&isShipper=' . ($model->es_shipper ? 1 : 0) . "&isConsigneer=" . ($model->es_consigneer ? 1 : 0) . "&isColoader=" . ($model->es_coloader ? 1 : 0) . "',
	success: function(data){
							PaisAction(data);
          },
  error: function(err){
          alert('failure '+err); }
 });");
	?>

	<?php endif; ?>
	<!-- /////////////////////////////////ES SHIPPER/////////////////////////////-->

<script>
$('.pencil-button').click(function(e){
	try {
		var ide = $(this).attr('id');
		if ($(this).attr('disabled'))
			return false;
		if ($('#Clientes_id_pais').val() == '') {
			//$('#Clientes_' + ide).attr("placeholder", "Seleccione Pais");
			//alert('Primero Seleccione Pais');
			$('#Clientes_id_pais').focus();
			return false;
		}
		//var valor = $('#Clientes_' + ide ).val();
		var valor = $('#Clientes_' + ide ).val().replace(/&/g, '!!!');
		var url = $(this).attr('href') + "&dato=" + valor + "&field=" + ide;
		//alert(url);
		var tit = $('label[for=Clientes_' + ide + ']').text();
		var opt = {
			modal: true,
			width: 500,
			height: 250,
			position: { my: "center", at: "center", of: window },
			title:tit,
			};
		crud_frame_adjust(url, '', 0, opt);
		$('#update-data').hide();
		$('#create-data').hide();
	} catch(err) {
		console.log(err);
	    return false;
	}
});

/* esta validacion esta en javascript
$('#Clientes_email').blur(function(e){
				var str =  $(this).val();
				var emails = str.split(';');
				var text = '';
				for (var i in emails) {
					console.log(i);
  				console.log(emails[i]);
					if (text != '')
						text = text + ';';
					if (EmailFalse(emails[i]))
						text = text + emails[i];
				}
				$(this).val(text);
				console.log($(this).val());
	});
	*/
</script>

	<?php $datos1 = ob_get_contents(); ob_end_clean(); ?>

	<?php ob_start(); ?>


	<!-- ///////////////////////////////// NO ES SHIPPER/////////////////////////////-->

	<?php // if ($model->es_shipper==0 || ($model->es_consigneer==1 && $model->es_shipper==1) || $model->es_coloader==1): ?>
	<?php if ($model->es_consigneer==1 || $model->es_coloader==1): //2017-04-05 ?>

	<?php echo $form->textFieldRow($model,'observacion',array('class'=>'span5', 'data-inputmask-alias'=>"address")); ?>

	<?php echo $form->dropDownListRow($model,'id_tipo_cliente',CHtml::listData(TiposCliente::model()->findAll(array("condition"=>"","order"=>"")),'id_tipo_cliente','descripcion'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'id_regimen',CHtml::listData(RegimenTributario::model()->findAll(array("condition"=>"","order"=>"")),'id_regimen','descripcion_regimen'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'id_vendedor',CHtml::listData(UsuariosEmpresas::model()->findAll(array("condition"=>"tipo_usuario = '1' AND pw_activo = '1'","order"=>"pw_gecos")),'id_usuario','pw_gecos'), array('prompt' => '-- Seleccione --', 'disabled'=>true)); ?>

	<?php echo $form->dropDownListRow($model,'id_grupo',CHtml::listData(Grupos::model()->findAll(array("condition"=>"","order"=>"")),'id_grupo','nombre_grupo'), array('prompt' => '-- Seleccione --')); ?>

	<?php endif; ?>
	<!-- /////////////////////////////////ES SHIPPER/////////////////////////////-->


	<?php
		/*echo $form->dropDownListRow($model,'id_estatus', $model->isNewRecord ? array('2'=>'Inactivo') :
		array('0'=>'N/A', '1'=>'Activo', '2'=>'Inactivo', '3'=>'Bloqueado'),
		array('disabled'=>true));*/
	?>

	<?php echo $form->textFieldRow($model,'id_estatus',array('value'=>$model->id_estatus == 1 ? '1 - Activo' : "$model->id_estatus - Inactivo",'class'=>'span2','disabled'=>true)); ?>
	<?php echo $form->hiddenField($model,'id_estatus',array('value'=>$model->isNewRecord ? 2 : $model->id_estatus)); ?>


	<?php $datos2 = ob_get_contents(); ob_end_clean(); ?>


	<?php
	if (isset($_POST['Clientes']))
	if ($_POST['Clientes']['es_coloader'] == 1) {
	?>

	<!-- LOGO -->
	<?php ob_start();

	$logo = "";
	$PathLogo = "";
	
set_error_handler(
    function ($severity, $message, $file, $line) {
        throw new ErrorException($message, $severity, $severity, $file, $line);
    }
);

	try {

		$sql = "SELECT PathLogo FROM LogosColoader WHERE ColoaderID = ".intval($model->id_cliente);
		//echo $sql . "<br>";

		$PathLogo = Yii::app()->terrestre->createCommand($sql)->queryScalar();				
		//if (!empty($PathLogo))
			//if (is_file($PathLogo)) 
			{
				//echo "(entro)";
				$imagedata = file_get_contents($PathLogo);
				$logo = base64_encode($imagedata);

				$model->logo = base64_encode($imagedata);
			}// else echo "(NO)";
		//}

	} catch (Exception $e) {
		echo $e->getMessage() . "<br>";
	}

	restore_error_handler();

	?>
<!--
	<div class="control-group "><label class="control-label" for="EmpresasPlantillas_logo">Logo</label>
		<div class="controls">
-->
		<?php echo $form->fileField($model,'logo',array('onchange'=>'js:readURL(this);')); ?>
		<?php echo $form->hiddenField($model,'logoupdate', array('value'=>$logo)); ?>		
		<?php $default_image = "iVBORw0KGgoAAAANSUhEUgAAAHMAAAB8CAYAAABaFY8zAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAABMSSURBVHhe7Z13rBRFHMcHsKNREXtvIFbEgoolMSKW2LAQDWCLLZKIYCwgSFSsKLZEwBK7EZVEo+gfioANjCUq9gYIighYURThuZ8f+z2H9e7d3Xs39+727TfZ3O3s7OzM/OZXZ3a2TUMElyEVaBv/ZkgBMmKmCBkxU4SMmClCRswUISNmihDENaHINm3axGcrzlsr/H4IjSCcWc0GZPgPQYMGf/31l5s0aVJ8lqFnz55ulVVWic8qj6BiFmJ26tTJrbnmmvGV1oF//vnnf0SbM2eOW7hwoVt99dXjlMojOGfusccebt1113V///23a9eunaUvW7bMftMItTGJuXPnuu+++y6oCgpKTEborrvumiNmx44d4yutBwsWLHDt27d3X331VTqIiZg99NBD3TXXXBNfaR2AS2+55RY3YcIE48xvv/22fnXmH3/84bp16+bWXntt16tXLzdy5Mg4R+vB0KFD3cSJE92iRYvczJkzg3JmUNekkP7IEAZBI0AZMauLIMSU5K43q5V6B9A6VUMWAUqAur/zzjtu8ODB7sADD3Tdu3c3vffll1/a9VomdiZmPUDIJ5980vXu3ds9//zzbsmSJSZdnnjiCXfEEUe4N954o6YHalBi1hs++ugjd8kll7gNN9zQLHANxg022MCOs846y/3www+WVouoG50pfRZSzN1///32CxE5VH/9/vjjj27q1Kn2vxZRNzqTMlUuwYgQRCVK06FDByNeciByvtVWW7kvvvgiTqk91KXOJGCNOCQoUQkkB0ahev/555/xv9pEUGImR3e5yMd9dOh5553nbr31VjdlypQ4tXkQx++7777ut99+s/8+QWnHGmusYTMfe+65Z5xaHohNh0bN60yVJdF68cUXu+nTp7sePXq4YcOGuZ9++smuC/kGQKno16+f/dLx6nyIutpqq1nAfP/997cYc1OeQRmhEVRnNrcB0pN0HgHq66+/3r388sumuxYvXux+//13d/fdd8e5V0DPbgq23HJLc0Oo97x586z8X375xXzMnXbayT3yyCNVIUpTEVTMVgJwJAS655573J133mkuAhwPx+A+MCsh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"; ?>
		<img id="logo" src="data:image/jpeg;base64,<?=$model->isNewRecord ? $default_image : (empty($model->logo) ? $default_image : $model->logo)?>" style="border:1px solid silver;padding:5px;display:block;margin:5px;"/>
		
		<?php 
	
		echo basename($PathLogo).PHP_EOL . "<br>";

		?>

<script>
function readURL(input) {
        if (input.files && input.files[0]) {
			console.log(input.files[0].type);
			if (input.files[0].type == 'image/jpeg' || input.files[0].type == 'image/png' || input.files[0].type == 'image/bmp' || input.files[0].type == 'image/gif') {
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
				alert('El tipo de la imagen es invalida');				
			}
        }
    }
</script>			
<!--		
		</div>
	</div>	
-->
	<?php  $datos3 = ob_get_contents(); ob_end_clean(); ?>

	<?php  
	}
	?>

	<!-- //////////////////////////////////////////////////GENERALES TABS//////////////////////////////////////////////// -->
	<?php ob_start(); ?>

<?php 



		$tabs = null; 		
		$tabs['Primarios'] = array('content' => isset($datos1) ? $datos1 : '');
		$tabs['Secundarios'] = array('content' => isset($datos2) ? $datos2 : '');

		if (isset($_POST['Clientes']))
		if ($_POST['Clientes']['es_coloader'] == 1)
		$tabs['Logo'] = array('content' => isset($datos3) ? $datos3 : ''); 		

$this->widget('zii.widgets.jui.CJuiTabs',array(
	'tabs'=>$tabs,
	/*array(
        'Primarios'=> isset($datos1) ? $datos1 : '',
		'Secundarios'=> isset($datos2) ? $datos2 : '',		
    ),*/
    'headerTemplate' => '<li><a href="{url}" title="">{title}</a></li>',
    // additional javascript options for the tabs plugin
    'options'=>array(
        //'collapsible'=>true,
        'heightStyle', 'fill', //auto fill content
    ),
)); ?>
	<?php //echo $form->dateFieldRow($model,'fecha_uvisita',array('class'=>'span2', 'id'=>'fecha_uvisita')); ?>

	<?php $set_['generales']['panel'] = ob_get_contents(); ob_end_clean(); ?>








	<!-- //////////////////////////////////////////////////DIRECCIONES////////////////////////////////////////////////////// -->

	<?php ob_start(); ?>

	<?php if (!$model->isNewRecord) $this->renderPartial('/direcciones/child_admin',array('model'=>$model)); ?>

	<?php $set_['direcciones']['panel'] = ob_get_contents(); ob_end_clean(); ?>



	<!-- //////////////////////////////////////////////////AEREO////////////////////////////////////////////////////// -->

	<?php ob_start(); ?>

	<?php if (!$model->isNewRecord) $this->renderPartial('/clientesAereo/child_admin',array('model'=>$model)); ?>

	<?php $set_['clientesAereo']['panel'] = ob_get_contents(); ob_end_clean(); ?>



	<!-- //////////////////////////////////////////////////CONTACTOS////////////////////////////////////////////////////// -->

	<?php ob_start(); ?>

	<?php if (!$model->isNewRecord) $this->renderPartial('/contactos/child_admin',array('model'=>$model)); ?>

	<?php $set_['contactos']['panel'] = ob_get_contents(); ob_end_clean(); ?>



	<!-- //////////////////////////////////////////////////USUARIOS////////////////////////////////////////////////////// -->


	<?php ob_start(); ?>

	<?php echo $form->textFieldRow($model,'id_usuario_creacion',array('class'=>'span5','value'=> $model->usuarioCreacion ? $model->usuarioCreacion->pw_gecos : $model->id_usuario_creacion)); ?>

	<?php echo $form->textFieldRow($model,'fecha_creacion',array('class'=>'span5','value'=>date("d/m/Y",strtotime($model->fecha_creacion))
	, 'disabled'=>true
)); ?>

	<?php echo $form->textFieldRow($model,'hora_creacion',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_usuario_modificacion',array('class'=>'span5','value'=>

empty($model->fecha_modificado) ? '' :  
(
	$model->usuarioModificacion ? $model->usuarioModificacion->pw_gecos : $model->id_usuario_modificacion))); ?>

	<?php echo $form->textFieldRow($model,'fecha_modificado',array('class'=>'span5','value'=>

empty($model->fecha_modificado) ? '' :  

	date("d/m/Y h:i:s",strtotime($model->fecha_modificado)))); ?>

	<?php $section6 = ob_get_contents(); ob_end_clean(); ?>







	<!-- //////////////////////////////////////////////////BOTON////////////////////////////////////////////////////// -->



	<?php ob_start(); ?>

	<div class="form-actions">
	
		<?php if (Yii::app()->user->name == "admin") { ?>
	
	
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'type'=>'success',
				
				'label'=> ($model->id_estatus != 1 ? Yii::t('app','Activar') : ($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'))) . " " . Yii::t('app','Admin'),
				
				'icon'=> ($model->id_estatus != 1 ? 'icon-ok icon-white' : ($model->isNewRecord ? 'icon-file icon-white' : 'icon-cog icon-white')) . " " . Yii::t('app','Admin'),
				
				'htmlOptions'=>array(
				//'style'=>isset($modify) ? 'display:none' : 'display:inline', 
				'confirm'=>$model->id_estatus != 1 ?  'Confirmar Activar Cliente ?' : 'Confirmar '.($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save')).' Cliente',
				'name'=>'btnAuth',
				),			
			)); ?>
				
		<?php } else { ?>
		
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'label'=>$model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),
				'icon'=>$model->isNewRecord ? 'icon-file icon-white' : 'icon-pencil icon-white',
				'htmlOptions'=>array('style'=>isset($modify) ? 'display:none' : 'display:inline','id'=>'btnSave'
				,'disabled' => !$seguir
				,'title' => !$seguir ? 'No puede modificar datos' : ''
	 			,'class'=>$seguir ? 'btn-primary' : ''
			),
			)); ?>		
		
		<?php } ?>		

	</div>

	<?php $section7 = ob_get_contents(); ob_end_clean(); ?>









	<!-- //////////////////////////////////////////////////ACCORDEON////////////////////////////////////////////////////// -->

	<?php

	//echo "<br><br>(".$hay_tipo.")";

	/*echo "<pre>";
	print_r(Yii::app()->session['permisos']);
	echo "</pre>";*/



	$tabs = array();
	//$first = 0;
	$active = false;
	foreach (Yii::app()->session['permisos'] as $main => $controles) {

		foreach ($controles as $key => $paneles) {
			//if (!isset($paneles['main'])) //el main es solo para habilitar botones en vistas
			//if ($key <> 'fields' and $key <> 'stat') {

			if (isset($set_[$key]) && isset($paneles['activo']) )
			if ($paneles['activo'] == 1) {
				$set_[$key]['active'] = false;

				//$key == tipo, $key == generales


				$set_[$key]['visible'] = $main == Yii::app()->controller->id ?
					($key == "generales" && $model->isNewRecord && !$hay_tipo ? false : true)
				: !$model->isNewRecord;	//aun new record se debe mostrar

				if ($active == false) { //activa solo uno


					if ($model->isNewRecord) { //create

						if ($hay_tipo) {

							if ($key == "generales") {
								$set_[$key]['active'] = true;
								$active = true;
							}

						} else {

							if ($key == "tipo") {
								$set_[$key]['active'] = true;
								$active = true;
							}
						}

					} else {

						/*if(!$direcciones) {

							if ($key == "direcciones") {
								$set_[$key]['active'] = true;
								$active = true;
							}

						} else {
						*/
							if ($key == "generales") {
								$set_[$key]['active'] = true;
								$active = true;
							}
						//}
					}
				}

				if ($main == Yii::app()->controller->id) $set_[$key]['panel'] .= $section7;

				$tabs[] = array('label' => $paneles['panel'], 'content' => $set_[$key]['panel'], 'active' => $set_[$key]['active'], 'visible' => $set_[$key]['visible']);
			}

		}
	}

	$tabs[] = array('label' => 'Usuarios', 'content' => $section6, 'active' => !$active, 'visible' => !$model->isNewRecord);

	?>

    <?php echo TbHtml::tabbableTabs($tabs, array('placement' => TbHtml::TABS_PLACEMENT_LEFT ) ); ?>






<?php $this->endWidget(); ?>



	<?php /* echo $form->dropDownListRow($model,'id_cobrador',CHtml::listData(Cobradores::model()->findAll(array("condition"=>"","order"=>"")),'id_cobrador','nombre_cobrador'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'id_frecuencia',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_credito',CHtml::listData(Creditos::model()->findAll(array("condition"=>"","order"=>"")),'id_credito','limite_credito_local'), array('prompt' => '-- Seleccione --')); ?>



	<?php echo $form->dropDownListRow($model,'id_clase',CHtml::listData(ClasesCliente::model()->findAll(array("condition"=>"","order"=>"")),'id_clase','descripcion'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'id_anterior',array('class'=>'span5')); ?>

	<?php //echo $form->dateFieldRow($model,'fecha_uvisita',array('class'=>'span2')); ?>

	<?php echo $form->textFieldRow($model,'usr',array('class'=>'span5','maxlength'=>40)); ?>

	<?php echo $form->textFieldRow($model,'pwd',array('class'=>'span5','maxlength'=>35)); ?>

	<?php echo $form->textFieldRow($model,'id_sales_support',array('class'=>'span5')); ?>

	<?php //echo $form->dateFieldRow($model,'ultima_fecha_descarga',array('class'=>'span2')); ?>

	<?php echo $form->textFieldRow($model,'encuesta_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'encuesta',array('class'=>'span5')); ?>



	<?php echo $form->dropDownListRow($model,'ultimo_tipo_movimiento',CHtml::listData(Transporte::model()->findAll(array("condition"=>"","order"=>"")),'id_transporte','descripcion'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->checkBoxRow($model,'ultimo_movimiento_asegurado'); ?>

	<?php echo $form->textFieldRow($model,'requiere_rubro_alias',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_vendedor_grh',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_sales_support_grh',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ref_interna_pricing',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->checkBoxRow($model,'con_cotizacion'); ?>

	<?php echo $form->textFieldRow($model,'marca',array('class'=>'span5')); ?>

	<?php echo $form->checkBoxRow($model,'incluir_saldo'); ?>

	<?php echo $form->dropDownListRow($model,'cto_id',CHtml::listData(ClientesOperacionesTipo::model()->findAll(array("condition"=>"","order"=>"")),'cto_id','cto_nombre'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'cto_fecha',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_documento',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_estatus_bk',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_cliente_ref',array('class'=>'span5')); */ ?>
