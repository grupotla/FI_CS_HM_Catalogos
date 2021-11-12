<?php
$this->breadcrumbs=array(
	'Navieras'=>array('index'),
	$model->id_naviera,
);

$this->menu=array(
	
	array('label'=>Yii::t('app','List').' Navieras','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' Navieras','url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' Navieras'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','Update').' Navieras','url'=>array('update', 'button'=>2, 'text'=>Yii::t('app','Update').' Navieras','id'=>$model->id_naviera), 'icon'=>TbHtml::ICON_PENCIL . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['update'] == 1 ? true : false),
	
	//array('label'=>Yii::t('app','Delete').' Navieras','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_naviera),'confirm'=>'¿Esta seguro que quiere borrar este registro?'), 'icon'=>TbHtml::ICON_TRASH . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' Navieras','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1><?php echo Yii::t('app','View'); ?>  Navieras #<?php echo $model->id_naviera; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_naviera',
		'nombre',
		'activo',
		'tiporegimen',
		'dias',
		'nit',
		'nit2',
		'id_pais',
		'monto',
	),
)); ?>
