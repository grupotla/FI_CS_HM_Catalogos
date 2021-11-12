<?php
$this->breadcrumbs=array(
	'Clientes Aereos'=>array('index'),
	$model->id_cliente,
);

$this->menu=array(
	array('label'=>'List ClientesAereo','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>'Create ClientesAereo','url'=>array('create', 'button'=>1,'text'=>'Create ClientesAereo'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	array('label'=>'Update ClientesAereo','url'=>array('update', 'button'=>2,'text'=>'Update ClientesAereo','id'=>$model->id_cliente), 'icon'=>TbHtml::ICON_PENCIL . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['update'] == 1 ? true : false),
	//array('label'=>'Delete ClientesAereo','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cliente),'confirm'=>'¿Esta seguro que quiere borrar este registro?'), 'icon'=>TbHtml::ICON_TRASH . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>'Manage ClientesAereo','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1>View ClientesAereo #<?php echo $model->id_cliente; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_cliente',
		'no_cuenta',
		'no_iata',
	),
)); ?>
