<?php
$this->breadcrumbs=array(
	'Contactoses'=>array('index'),
	$model->contacto_id,
);

$this->menu=array(
	array('label'=>'List Contactos','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>'Create Contactos','url'=>array('create', 'button'=>1,'text'=>'Create Contactos'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	array('label'=>'Update Contactos','url'=>array('update', 'button'=>2,'text'=>'Update Contactos','id'=>$model->contacto_id), 'icon'=>TbHtml::ICON_PENCIL . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['update'] == 1 ? true : false),
	//array('label'=>'Delete Contactos','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->contacto_id),'confirm'=>'¿Esta seguro que quiere borrar este registro?'), 'icon'=>TbHtml::ICON_TRASH . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>'Manage Contactos','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1>View Contactos #<?php echo $model->contacto_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'contacto_id',
		'id_cliente',
		'nombres',
		'telefono',
		'fax',
		'email',
		'activo',
		'cargo',
		'id_usuario_ingreso',
		'ingreso',
		'id_usuario_modifica',
		'modifica',
	),
)); ?>
