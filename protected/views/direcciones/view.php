<?php
$this->breadcrumbs=array(
	'Direcciones'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Direcciones','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>'Create Direcciones','url'=>array('create', 'button'=>1,'text'=>'Create Direcciones'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	array('label'=>'Update Direcciones','url'=>array('update', 'button'=>2,'text'=>'Update Direcciones','id'=>$model->id_direccion), 'icon'=>TbHtml::ICON_PENCIL . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['update'] == 1 ? true : false),
	//array('label'=>'Delete Direcciones','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_direccion),'confirm'=>'¿Esta seguro que quiere borrar este registro?'), 'icon'=>TbHtml::ICON_TRASH . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>'Manage Direcciones','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1>View Direcciones #<?php echo $model->id_direccion; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_direccion',
		'id_nivel_geografico',
		'direccion_completa',
		'id_cliente',
		'address',
		'city',
		'state',
		'zipcode',
		'name',		
		'group',
		'url',
		'image',
		'lat',
		'lng',
		'email',
		'id_tipo_direccion',
		'boletines',
		'activo',
		'phone_number',
	),
)); ?>
