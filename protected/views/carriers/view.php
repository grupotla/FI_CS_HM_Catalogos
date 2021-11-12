<?php
$this->breadcrumbs=array(
	'Carriers'=>array('index'),
	$model->name,
);

$this->menu=array(
	
	array('label'=>Yii::t('app','List').' Carriers','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' Carriers','url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' Carriers'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','Update').' Carriers','url'=>array('update', 'button'=>2, 'text'=>Yii::t('app','Update').' Carriers','id'=>$model->carrier_id), 'icon'=>TbHtml::ICON_PENCIL . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['update'] == 1 ? true : false),
	
	//array('label'=>Yii::t('app','Delete').' Carriers','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->carrier_id),'confirm'=>'¿Esta seguro que quiere borrar este registro?'), 'icon'=>TbHtml::ICON_TRASH . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' Carriers','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1><?php echo Yii::t('app','View'); ?>  Carriers #<?php echo $model->carrier_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'carrier_id',
		'name',
		'countries',
		'carriercode',
		'tiporegimen',
		'dias',
		'nit',
		'nit2',
		'activo',
		'monto',
	),
)); ?>
