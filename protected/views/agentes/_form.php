<!-- <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p> -->

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'agentes-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'countries'),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php ob_start(); ?>




	<?php echo $form->dropDownListRow($model,'countries',CHtml::listData(Paises::model()->findAll(array("condition"=>"","order"=>"descripcion")),'codigo','descripcion'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'agente',array('class'=>'span5', 'maxlength'=>80, 'data-inputmask-alias'=>"address")); ?>

<?php /*
	<div class="control-group">
		<?php echo $form->labelEx($model,'agente',array("class"=>"control-label")); ?>
		<?php //echo $form->textField($model,'name'); ?>		
		<div class="controls">
		<?php $this->widget("ext.maskedInput.MaskedInput", array(
                "model" => $model,
                "attribute" => "agente", 
                //"mask"=>"dd/mm/yyyy",
                "clientOptions"=>array("alias"=>"dd/mm/yyyy")
            )); ?>
    	<?php echo $form->error($model,'agente'); ?>
        </div>
	</div> */ ?>


	<?php echo $form->textFieldRow($model,'contacto',array('class'=>'span5', 'maxlength'=>50, 'data-inputmask-alias'=>"address",)); ?>

	<?php echo $form->textFieldRow($model,'correo',array('class'=>'span5', 'maxlength'=>250, 'data-inputmask-alias'=>'', )); ?>

	<?php //echo $form->textFieldRow($model,'puesto',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->dropDownListRow($model,'puesto',CHtml::listData(agentes::model()->findAllBySql("SELECT distinct puesto as puesto FROM agentes WHERE puesto IS NOT NULL AND puesto <> '' ORDER BY puesto LIMIT 150"),'puesto','puesto'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'direccion',array('class'=>'span5', 'maxlength'=>250, 'data-inputmask-alias'=>"address", )); ?>

<?php /*
	
	<div class="control-group">
		<?php echo $form->labelEx($model,'direccion',array("class"=>"control-label")); ?>
		<?php //echo $form->textField($model,'name'); ?>		
		<div class="controls">
		<?php $this->widget("ext.maskedInput.MaskedInput", array(
                "model" => $model,
                "attribute" => "direccion",
                //"clientOptions"=>array("greedy"=>false)  
                //"mask" => "(99) 9999[9]-9999"  
                //"clientOptions" => array("alias" =>  "date")
                //"clientOptions" => array("alias" =>  "yyyy-mm-dd")
            )); ?>
    	<?php echo $form->error($model,'direccion'); ?>
        </div>
	</div> */ ?>

	<?php echo $form->textFieldRow($model,'telefono',array('class'=>'span5', 'maxlength'=>30, 'data-inputmask-alias'=>"telefono")); ?>

	<?php echo $form->textFieldRow($model,'fax',array('class'=>'span5', 'maxlength'=>30, 'data-inputmask-alias'=>"telefono" )); ?>



	<?php echo $form->checkBoxRow($model,'activo'); ?>

	<?php echo $form->dropDownListRow($model,'id_network',CHtml::listData(Networks::model()->findAll(array("condition"=>"","order"=>"descripcion")),'id_network','descripcion'), array('prompt' => '-- Seleccione --')); ?>

	<?php //echo $form->dropDownListRow($model,'id_grupo',CHtml::listData(Grupos::model()->findAll(array("condition"=>"","order"=>"nombre_grupo")),'id_grupo','nombre_grupo'), array('prompt' => '-- Seleccione --')); Ticket#2016110404000471 — Fwd: Id Grupo ingreso de Agentes
?>

	<?php $set_['generales']['panel'] = ob_get_contents(); ob_end_clean(); ?>

	<?php ob_start(); ?>

	<?php echo $form->textFieldRow($model,'nit',array('class'=>'span5','maxlength'=>30,'data-inputmask-alias'=>"nit", )); ?>


	<?php echo $form->textFieldRow($model,'nit2',array('class'=>'span5','maxlength'=>30,'data-inputmask-alias'=>"nit",)); ?>

	<?php echo $form->dropDownListRow($model,'tiporegimen',CHtml::listData(RegimenTributario::model()->findAll(array("condition"=>"","order"=>"descripcion_regimen")),'id_regimen','descripcion_regimen'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->checkBoxRow($model,'es_neutral'); ?>

	<?php echo $form->textFieldRow($model,'dias',array('class'=>'span5','data-inputmask-alias'=>"integer", 'maxlength'=>4)); ?>

	<?php echo $form->textFieldRow($model,'monto',array('class'=>'span5','maxlength'=>12,
	'data-inputmask-alias'=>"currency", 
	'data-inputmask-digits'=>"2",
	"data-inputmask-groupSeparator"=>',',
	"data-inputmask-autoGroup"=>true,	
	'data-inputmask-removeMaskOnSubmit' => true,
	"data-inputmask-autoUnmask"=> true,
)); ?>

	<?php echo $form->textFieldRow($model,'iatano',array('class'=>'span5', 'data-inputmask-alias'=>"codigo",'maxlength'=>25 )); ?>





	<?php $set_['comerciales']['panel'] = ob_get_contents(); ob_end_clean(); ?>



	<?php ob_start(); ?>

	<?php echo $form->dropDownListRow($model,'agentes_grupo_id',CHtml::listData(AgentesGrupo::model()->findAll(array("condition"=>"","order"=>"agente")),'agentes_grupo_id','agente'), array('prompt' => '-- Seleccione --')); ?>


	<?php echo $form->textFieldRow($model,'contabilidad_id',array('class'=>'span5', 'data-inputmask-alias'=>"integer")); ?>


	<?php echo $form->textFieldRow($model,'accountno',array('class'=>'span5', 'maxlength'=>25, 'data-inputmask-alias'=>"address")); ?>

	<?php echo $form->textFieldRow($model,'defaultval',array('class'=>'span5','maxlength'=>8, 'data-inputmask-alias'=>"integer")); ?>

	<?php echo $form->textFieldRow($model,'fam_agente',array('class'=>'span5', 'data-inputmask-alias'=>"integer")); ?>

	<?php echo $form->textFieldRow($model,'pais_terrestre_auto',array('class'=>'span5','maxlength'=>2)); ?>



	<?php $set_['otros']['panel'] = ob_get_contents(); ob_end_clean(); ?>




	<?php 	ob_start(); ?>

	<?php $this->renderPartial('/contactosDivisiones/child_admin',array('model'=>$model, 'CATALOGO'=>'AGENTE', 'id_catalogo'=>$model->agente_id)); ?>

	<?php  $set_['contactosDivisiones']['panel'] = ob_get_contents(); ob_end_clean(); ?>



	<?php ob_start(); ?>

	<?php echo $form->textFieldRow($model,'id_usuario_creacion',array('class'=>'span5','value'=>$model->usuarioCreacion ? $model->usuarioCreacion->pw_gecos : $model->id_usuario_creacion)); ?>

	<?php echo $form->textFieldRow($model,'fecha_creacion',array('class'=>'span5','value'=>date("d/m/Y",strtotime($model->fecha_creacion)))); ?>

	<?php echo $form->textFieldRow($model,'hora_creacion',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_usuario_modificacion',array('class'=>'span5','value'=>$model->usuarioModificacion ? $model->usuarioModificacion->pw_gecos : $model->id_usuario_modificacion)); ?>

	<?php echo $form->textFieldRow($model,'fecha_modificacion',array('class'=>'span5','value'=>date("d/m/Y h:i:s",strtotime($model->fecha_modificacion)))); ?>

	<?php $section5 = ob_get_contents(); ob_end_clean(); ?>



	<?php ob_start(); ?>

	<div class="form-actions">

		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),
			'icon'=>$model->isNewRecord ? 'icon-file icon-white' : 'icon-pencil icon-white',
			'htmlOptions'=>array('style'=>isset($modify) ? 'display:none' : 'display:inline'),
		)); ?>

	</div>

	<?php $section7 = ob_get_contents(); ob_end_clean(); ?>

	<?php
	$active = false;
	$tabs = array();
	foreach (Yii::app()->session['permisos'] as $main => $controles) {
		foreach ($controles as $key => $paneles) {
			if (isset($set_[$key]) && isset($paneles['activo']) )
			if ($paneles['activo'] == 1) {
				$set_[$key]['active'] = false;
				$set_[$key]['visible'] = $main == Yii::app()->controller->id ? true : !$model->isNewRecord;	//aun new record se debe mostrar
				if ($active == false) { //activa solo uno
					$set_[$key]['active'] = true;
					$active = true;
				}

				if ($main == Yii::app()->controller->id) $set_[$key]['panel'] .= $section7;

				$tabs[] = array('label' => $paneles['panel'], 'content' => $set_[$key]['panel'], 'active' => $set_[$key]['active'], 'visible' => $set_[$key]['visible']);
			}
		}
	}

	$tabs[] = array('label' => 'Usuarios', 'content' => $section5, 'active' => !$active, 'visible' => !$model->isNewRecord);

	?>

    <?php echo TbHtml::tabbableTabs($tabs, array('placement' => TbHtml::TABS_PLACEMENT_LEFT ) ); ?>




<?php //if (!$this->asDialog) : ?>


<?php /* else: ?>
	<?php echo CHtml::ajaxSubmitButton($model->isNewRecord ? 'Create' : 'Save',$_SERVER['REQUEST_URI'],array(
				'update'=>'.modal-body',
   				//'type'=>'POST','dataType'=>'json','beforeSend' => 'function(data){ }', 'success' => 'js:function(data){ }',
            	'error' => 'function(data) {
    	        	alert(data.responseText);
	            }',
            ),
			array('style'=>'display:none'
	)); */?>

<?php //endif; ?>



<?php $this->endWidget(); ?>
