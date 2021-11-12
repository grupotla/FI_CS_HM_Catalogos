<?php
$this->breadcrumbs=array(
	'Carriers Creditos'=>array('index'),
	$model->id_car_cred,
);

$this->menu=array(
	
	array('label'=>'List CarriersCredito','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>'Create CarriersCredito','url'=>array('create', 'button'=>1, 'text'=>'Create CarriersCredito'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>'Update CarriersCredito','url'=>array('update', 'button'=>2, 'text'=>'Update CarriersCredito','id'=>$model->id_car_cred), 'icon'=>TbHtml::ICON_PENCIL . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['update'] == 1 ? true : false),
	
	//array('label'=>'Delete CarriersCredito','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_car_cred),'confirm'=>'¿Esta seguro que quiere borrar este registro?'), 'icon'=>TbHtml::ICON_TRASH . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>'Manage CarriersCredito','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1>View CarriersCredito #<?php echo $model->id_car_cred; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_car_cred',
		'carrier_id',
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
