<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'navieras-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'nombre'),
)); ?>

	<!-- <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p> -->

	<?php echo $form->errorSummary($model); ?>

	<?php ob_start(); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5', 'data-inputmask-alias'=>'address')); ?>


	<?php echo $form->dropDownListRow($model,'id_naviera_group',CHtml::listData(Navieras::model()->findAll(array("condition"=>"","order"=>"nombre")),'id_naviera','nombre'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'id_pais',CHtml::listData(Paises::model()->findAll(array("condition"=>"LENGTH(codigo) = 2","order"=>"descripcion")),'codigo','descripcion'), array('prompt' => '-- Seleccione --')); ?>

	<?php //echo $form->checkBoxRow($model,'activo'); ?>

	<?php echo $form->textFieldRow($model,'activo',array('value'=>$model->activo == true ? 'On' : "Off",'class'=>'span2','disabled'=>true)); ?>

	<?php echo $form->dropDownListRow($model,'tiporegimen',CHtml::listData(Tiporegimen::model()->findAll(array("condition"=>"","order"=>"")),'numero','nombre'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'nit',array('class'=>'span5', 'data-inputmask-alias'=>"nit",'maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'nit2',array('class'=>'span5', 'data-inputmask-alias'=>"nit",'maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'dias',array('class'=>'span5', 'data-inputmask-alias'=>"integer")); ?>

	<?php echo $form->textFieldRow($model,'monto',array('class'=>'span5', 'data-inputmask-alias'=>"currency", 'data-inputmask-digits'=>"2", "data-inputmask-groupSeparator"=>',', "data-inputmask-autoGroup"=>true, 'data-inputmask-removeMaskOnSubmit' => true, "data-inputmask-autoUnmask"=> true ,'maxlength'=>12)); ?>

	<?php $set_['generales']['panel'] = ob_get_contents(); ob_end_clean(); ?>


	<?php ob_start(); ?>

	<?php //if (!$model->isNewRecord) $this->renderPartial('/navierasCredito/child_admin',array('model'=>$model)); ?>

	<?php $set_['navierasCredito']['panel'] = ob_get_contents(); ob_end_clean(); ?>



	<?php ob_start(); ?>

	<?php echo $form->textFieldRow($model,'user_insert',array('class'=>'span5','value'=>($model->user_insert > 0 ? (isset($model->usuario0) ? $model->usuario0->pw_gecos : $model->user_insert) : ''),'disabled'=>true)); ?>

	<?php echo $form->textFieldRow($model,'date_insert',array('class'=>'span5','value'=>$model->date_insert ? date("d/m/Y h:i:s",strtotime($model->date_insert)) : '','disabled'=>true)); ?>


	<?php echo $form->textFieldRow($model,'user_update',array('class'=>'span5','value'=>($model->user_update > 0 ? (isset($model->usuario1) ? $model->usuario1->pw_gecos : $model->user_update) : ''),'disabled'=>true)); ?>

	<?php echo $form->textFieldRow($model,'date_update',array('class'=>'span5','value'=>$model->date_update ? date("d/m/Y h:i:s",strtotime($model->date_update)) : '','disabled'=>true)); ?>


	<?php echo $form->textFieldRow($model,'user_auth',array('class'=>'span5','value'=>($model->user_auth > 0 ? (isset($model->usuario2) ? $model->usuario2->pw_gecos : $model->user_auth) : ''),'disabled'=>true)); ?>

	<?php echo $form->textFieldRow($model,'date_auth',array('class'=>'span5','value'=>$model->date_auth ? date("d/m/Y h:i:s",strtotime($model->date_auth)) : '','disabled'=>true)); ?>


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
		

		<?php if ( (Yii::app()->user->name == "admin" || Yii::app()->session['p']['auth'] == 1) && !$model->isNewRecord && $model->activo == false) { ?>
		
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'success',
					'label'=> Yii::t('app','Activar') . " " . Yii::t('app','Supervisor'),
					'icon'=>'icon-ok icon-white',
					'htmlOptions'=>array(
					'style'=>isset($modify) ? 'display:none' : 'display:inline', 
					'confirm'=>'Confirmar Activar Naviera ?',
					'name'=>'btnAuth',
					),			
				)); ?>

		<?php } elseif ( (Yii::app()->user->name == "admin" || Yii::app()->session['p']['auth'] == 1) && !$model->isNewRecord && $model->activo == true) { ?>

				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'danger',
					'label'=> Yii::t('app','Desactivar') . " " . Yii::t('app','Supervisor'),
					'icon'=>'icon-remove icon-white',
					'htmlOptions'=>array(
					'style'=>isset($modify) ? 'display:none' : 'display:inline', 
					'confirm'=>'Confirmar Desactivar Naviera ?',
					'name'=>'btnDes',
					),			
				)); ?>
				
		
		<?php } else { ?>
		
						
		<?php } ?>		

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


<?php /*if (!$this->asDialog) : ?>

	<div class="form-actions">

		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),
			'icon'=>$model->isNewRecord ? 'icon-file icon-white' : 'icon-pencil icon-white',
			'htmlOptions'=>array('style'=>isset($modify) ? 'display:none' : 'display:inline'),
		)); ?>

<?php else: ?>

	<?php echo CHtml::ajaxSubmitButton($model->isNewRecord ? 'Create' : 'Save',$_SERVER['REQUEST_URI'],array(
				'update'=>'.modal-body',
   				//'type'=>'POST','dataType'=>'json','beforeSend' => 'function(data){ }', 'success' => 'js:function(data){ }',
            	'error' => 'function(data) {
    	        	alert(data.responseText);
	            }',
            ),
			array('style'=>'display:none'
	)); ?>


<script>
$('#btn-save-modal').attr('title','Save');
</script>


<?php endif; */ ?>


	</div>

<?php $this->endWidget(); ?>
