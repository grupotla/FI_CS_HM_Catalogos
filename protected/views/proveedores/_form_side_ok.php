<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ComponentsBootstrap/bootstrap.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ComponentsBootstrap/docs.css" rel="stylesheet">

<style>
.active a:first-child {	
	*background-color:rgb(0,136,204);	
}

.bs-docs-sidebar ul li a {
	border:1px solid rgb(210,210,210);	
	height:24px;	
	padding-top:0px;	
	padding-bottom:4px;	
	margin-bottom:1px;
	background-color:rgb(230,230,230);
}

.bs-docs-sidebar ul li.active a:first-child {
	*background-color:rgb(0,136,204);
}

.bs-docs-sidebar ul li ul li a {
	border:0px;
	border-bottom:1px solid rgb(230,230,230);	
	background-color:rgb(245,245,245);
}

</style>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'proveedores-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'id_pais'),
)); ?>
	
	
	
<!-- Beginning Docs -->

<div class="container bs-docs-container" style="padding:0px">
<div class="row" style="padding:0px">





	<!-- Beginning Menu -->

	<div class="col-md-3" role="complementary" style="padding:0px">
		<nav class="bs-docs-sidebar hidden-print hidden-sm hidden-xs affix" style="padding:0px;background-color:rgb(250,250,250)">
		  
		<ul class="nav bs-docs-sidenav">
			<li class="active"><a href="#tab_2">Informacion General</a></li>
			<li><a href="#tab_3">Datos de Credito</a></li>
			<li><a href="#tab_4">Contactos</a></li>
			<li><a href="#tab_5">Otros</a></li>
			<li><a href="#tab_6">Usuarios</a></li>
			<!--<li><a href="#tab_7">Acciones</a></li>-->
			
			<a href="#top" class="back-to-top"> Back to top </a>
			

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
		</ul>

		</nav>
	</div>
	<!-- Ending Menu -->


	
	<!-- Begining Content -->
	<div class="col-md-9" role="main">
	<div class="bs-docs-section">


	

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

	<?php echo $form->textFieldRow($model,'descripcion',array('class'=>'span5','maxlength'=>75, 'data-inputmask-alias'=>"address")); ?>

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

	<?php echo $form->textFieldRow($model,'observacion',array('class'=>'span5','maxlength'=>100, 'data-inputmask-alias'=>"address")); ?>

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


<?php /*		
<!----------------------------------------------->

		<section id="tab_7">
          <div class="page-header">
            <h1>Acciones</h1>
          </div>

	<div class="form-actions span7">

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
		*/ ?>

		

<!----------------------------------------------->




	<!-- Ending Content -->
	</div>
	</div>

	
	
<!-- Ending Docs -->
</div>
</div>


<?php $this->endWidget(); ?>


<footer class="bs-docs-footer">
<div class="container">

<a href="<?=$_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">Restore</a>


</div>
</footer>



<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ComponentsBootstrap2/jquery.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ComponentsBootstrap/bootstrap.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ComponentsBootstrap/docs.js"></script>


