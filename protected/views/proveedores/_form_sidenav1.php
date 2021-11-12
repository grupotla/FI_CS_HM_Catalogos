<!DOCTYPE html>
<html lang="en">
<head>

<style>
li a { border:1px solid silver; }
</style>

</head>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'proveedores-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'id_pais'),
)); ?>

	<!-- <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p> -->

	<?php echo $form->errorSummary($model); ?>

<body data-spy="scroll" data-target=".bs-docs-sidebar">

<div class="container">

    <!-- Docs nav
    ================================================== -->
    <div class="row">
      
      <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav affix">
		  <li><a href="#top" class="back-to-top"> Back to top </a>
          <li><a href="#tab_2"> Informacion General</a></li>
          <li><a href="#tab_3"> Datos de Credito</a></li>
          <li><a href="#tab_4"> Contactos</a></li>
          <li><a href="#tab_5"> Otros</a></li>
          <li><a href="#tab_6"> Usuarios</a></li>
          <li><a href="#tab_7"> Acciones</a></li>		  
        </ul>
      </div>
        
        
      <div class="span6">             

<!----------------------------------------------->

		<section id="tab_2">
          <div class="page-header">
            <h1>Informacion General</h1>
          </div>

	<?php echo $form->dropDownListRow($model,'id_pais',CHtml::listData(Paises::model()->findAll(array("condition"=>"LENGTH(codigo) = 2","order"=>"descripcion")),'codigo','descripcion'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->dropDownListRow($model,'empresa',CHtml::listData(Empresas::model()->findAll(array("condition"=>"activo='t'","order"=>"nombre_empresa")),'id_empresa','nombre_empresa'), array('prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5', 'data-inputmask-alias'=>'address','maxlength'=>75)); ?>

	<?php echo $form->textFieldRow($model,'direccion',array('class'=>'span5', 'data-inputmask-alias'=>"address",'maxlength'=>75)); ?>

	<?php echo $form->textFieldRow($model,'nit',array('class'=>'span5', 'data-inputmask-alias'=>"nit",'maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'nit2',array('class'=>'span5', 'data-inputmask-alias'=>"nit",'maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'descripcion',array('class'=>'span5','maxlength'=>75)); ?>

	<?php echo $form->dropDownListRow($model,'tiporegimen',CHtml::listData(Tiporegimen::model()->findAll(array("condition"=>"","order"=>"")),'numero','nombre'), array('prompt' => '-- Seleccione --')); ?>

	<?php //echo $form->dropDownListRow($model,'tipo',CHtml::listData(TipoProveedor::model()->findAll(array("condition"=>"","order"=>"descripcion")),'id_tipo_proveedor','descripcion'), array('prompt' => '-- Seleccione --')); ?>


	<?php echo $form->textFieldRow($model,'status',array('value'=>$model->status == 1 ? '1 - On' : "$model->status - Off",'class'=>'span2','disabled'=>true)); ?>

	<?php echo $form->checkBoxRow($model,'permanente'); ?>
		
		</section>



<!----------------------------------------------->

		<section id="tab_3">
          <div class="page-header">
            <h1>Datos de Credito</h1>
          </div>


	<?php echo $form->textFieldRow($model,'dias',array('class'=>'span5', 'data-inputmask-alias'=>"integer")); ?>

	<?php echo $form->textFieldRow($model,'monto',array('class'=>'span5', 'data-inputmask-alias'=>"currency", 'data-inputmask-digits'=>"2", "data-inputmask-groupSeparator"=>',', "data-inputmask-autoGroup"=>true, 'data-inputmask-removeMaskOnSubmit' => true, "data-inputmask-autoUnmask"=> true ,'maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'observacion',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'requiere_oc',array('class'=>'span5', 'data-inputmask-alias'=>"integer")); ?>


		</section>


<!----------------------------------------------->

		<section id="tab_4">
          <div class="page-header">
            <h1>Contactos</h1>
          </div>


	<?php echo $form->textFieldRow($model,'contacto',array('class'=>'span5', 'data-inputmask-alias'=>'address','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'correo',array('class'=>'span5', 'data-inputmask-alias'=>'','maxlength'=>230)); ?>

	<?php echo $form->textFieldRow($model,'telefono',array('class'=>'span5', 'data-inputmask-alias'=>"telefono",'maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'fax',array('class'=>'span5', 'data-inputmask-alias'=>"telefono",'maxlength'=>20)); ?>

		</section>


<!----------------------------------------------->

		<section id="tab_5">
          <div class="page-header">
            <h1>Otros</h1>
          </div>

	<?php echo $form->textFieldRow($model,'provision',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'cuenta',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'bienes',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'local',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fovial',array('class'=>'span5')); ?>


		</section>


<!----------------------------------------------->

		<section id="tab_6">
          <div class="page-header">
            <h1>Usuarios</h1>
          </div>

	<?php echo $form->textFieldRow($model,'usuario',array('class'=>'span5','value'=>($model->usuario > 0 ? (isset($model->usuario00) ? $model->usuario00->pw_gecos : $model->usuario) : ''),'disabled'=>true)); ?>

	<?php echo $form->textFieldRow($model,'creado',array('class'=>'span5','value'=>$model->creado ? date("d/m/Y h:i:s",strtotime($model->creado)) : '','disabled'=>true)); ?>

	<?php echo $form->textFieldRow($model,'usuario2',array('class'=>'span5','value'=>($model->usuario2 > 0 ? (isset($model->usuario02) ? $model->usuario02->pw_gecos : $model->usuario2) : ''),'disabled'=>true)); ?>

	<?php echo $form->textFieldRow($model,'modificado',array('class'=>'span5','value'=>$model->modificado ? date("d/m/Y h:i:s",strtotime($model->modificado)) : '','disabled'=>true)); ?>

	<?php echo $form->textFieldRow($model,'usuario3',array('class'=>'span5','value'=>($model->usuario3 > 0 ? (isset($model->usuario03) ? $model->usuario03->pw_gecos : $model->usuario3) : ''),'disabled'=>true)); ?>

	<?php echo $form->textFieldRow($model,'autorizado',array('class'=>'span5','value'=>$model->autorizado ? date("d/m/Y h:i:s",strtotime($model->autorizado)) : '','disabled'=>true)); ?>

		</section>


<!----------------------------------------------->

		<section id="tab_7">
          <div class="page-header">
            <h1>Acciones</h1>
          </div>

	<div class="form-actions span5">

		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),
			'icon'=>$model->isNewRecord ? 'icon-file icon-white' : 'icon-pencil icon-white',
			'htmlOptions'=>array('style'=>isset($modify) ? 'display:none' : 'display:inline'),
		)); ?>

		
		<?php if ( (Yii::app()->user->name == "admin" || Yii::app()->session['p']['auth'] == 1) && !$model->isNewRecord && $model->status == 0) { ?>
		
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'success',
					'label'=> Yii::t('app','Activar') . " " . Yii::t('app','Supervisor'),
					'icon'=>'icon-ok icon-white',
					'htmlOptions'=>array(
					'style'=>isset($modify) ? 'display:none' : 'display:inline', 
					'confirm'=>'Confirmar Activar Proveedor ?',
					'name'=>'btnAuth',
					),			
				)); ?>

		<?php } elseif ( (Yii::app()->user->name == "admin" || Yii::app()->session['p']['auth'] == 1) && !$model->isNewRecord && $model->status == 1) { ?>

				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'danger',
					'label'=> Yii::t('app','Desactivar') . " " . Yii::t('app','Supervisor'),
					'icon'=>'icon-remove icon-white',
					'htmlOptions'=>array(
					'style'=>isset($modify) ? 'display:none' : 'display:inline', 
					'confirm'=>'Confirmar Desactivar Proveedor ?',
					'name'=>'btnDes',
					),			
				)); ?>
				
		
		<?php } else { ?>
		
						
		<?php } ?>
		
	</div>

		</section>


<!----------------------------------------------->



      </div>
    </div>

  </div>

</body>




<?php $this->endWidget(); ?>





</html>