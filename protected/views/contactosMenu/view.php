<?php
$this->breadcrumbs=array(
	'Contactos Menus'=>array('index'),
	$model->mn_id,
);

$this->menu=array(
	
	array('label'=>'List ContactosMenu','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>'Create ContactosMenu','url'=>array('create', 'button'=>1, 'text'=>'Create ContactosMenu'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>'Update ContactosMenu','url'=>array('update', 'button'=>2, 'text'=>'Update ContactosMenu','id'=>$model->mn_id), 'icon'=>TbHtml::ICON_PENCIL . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['update'] == 1 ? true : false),
	
	//array('label'=>'Delete ContactosMenu','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->mn_id),'confirm'=>'¿Esta seguro que quiere borrar este registro?'), 'icon'=>TbHtml::ICON_TRASH . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>'Manage ContactosMenu','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1>View ContactosMenu #<?php echo $model->mn_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'mn_id',
		'mn_sort',
		'mn_parent',
		'mn_title_short',
		'mn_title_long',
		'mn_viewer',
		'mn_control',
		'mn_action',
		'mn_layout',
		'mn_st',
		'mn_us_id',
		'mn_dt',
	),
)); ?>
