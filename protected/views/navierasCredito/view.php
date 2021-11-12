<?php
$this->breadcrumbs=array(
	'Navieras Creditos'=>array('index'),
	$model->id_nav_cred,
);

$this->menu=array(
	
	array('label'=>'List NavierasCredito','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>'Create NavierasCredito','url'=>array('create', 'button'=>1, 'text'=>'Create NavierasCredito'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>'Update NavierasCredito','url'=>array('update', 'button'=>2, 'text'=>'Update NavierasCredito','id'=>$model->id_nav_cred), 'icon'=>TbHtml::ICON_PENCIL . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['update'] == 1 ? true : false),
	
	//array('label'=>'Delete NavierasCredito','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_nav_cred),'confirm'=>'¿Esta seguro que quiere borrar este registro?'), 'icon'=>TbHtml::ICON_TRASH . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>'Manage NavierasCredito','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1>View NavierasCredito #<?php echo $model->id_nav_cred; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_nav_cred',
		'id_naviera',
		'id_empresa',
		'activo',
		'secuencia',
		'id_usuario',
		'ingreso',
		'id_usuario_modifica',
		'modifica',
		'id_usuario_borrado',
		'borrado',
		'dias',
		'monto',
		'observaciones',
	),
)); ?>
