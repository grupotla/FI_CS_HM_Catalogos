<?php
$this->breadcrumbs=array(
	'Usuarios Empresases'=>array('index'),
	$model->id_usuario=>array('view','id'=>$model->id_usuario),
	'Divisiones',
);

$this->menu=array(
	array('label'=>'List UsuariosEmpresas','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>'Create UsuariosEmpresas','url'=>array('create', 'button'=>1, 'text'=>'Create UsuariosEmpresas'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>'View UsuariosEmpresas','url'=>array('view','id'=>$model->id_usuario), 'icon'=>TbHtml::ICON_EYE_OPEN . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>'Manage UsuariosEmpresas','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>


	<h1>Divisiones Contactos #<?php echo $model->id_usuario . " " . $model->pw_name; ?></h1>

	<?php $this->renderPartial('/contactosDivisiones/child_admin',array('model'=>$model, 'CATALOGO'=>'USUARIO', 'id_catalogo'=>$model->id_usuario)); ?>

