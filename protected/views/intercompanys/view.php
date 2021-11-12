<?php
$this->breadcrumbs=array(	
	Yii::t('app','Intercompanys')=>array('index'),		
	$model->id_intercompany,
);

$this->menu=array(
	
	array('label'=>Yii::t('app','List').' '.Yii::t('app','Intercompanys'),'url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' '.Yii::t('app','Intercompanys'),'url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' '.Yii::t('app','Intercompanys')), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','Update').' '.Yii::t('app','Intercompanys'),'url'=>array('update', 'button'=>2, 'text'=>Yii::t('app','Update').' '.Yii::t('app','Intercompanys'),'id'=>$model->id_intercompany), 'icon'=>TbHtml::ICON_PENCIL . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['update'] == 1 ? true : false),
	
	//array('label'=>Yii::t('app','Delete').' '.Yii::t('app','Intercompanys'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_intercompany),'confirm'=>'¿Esta seguro que quiere borrar este registro?'), 'icon'=>TbHtml::ICON_TRASH . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' '.Yii::t('app','Intercompanys'),'url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1><?php echo Yii::t('app','View').' '.Yii::t('app','Intercompanys'); ?>   #<?php echo $model->id_intercompany; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_intercompany',
		'nombre_intercompany',
		'nit',
		'tiporegimen',
		'direccion',
		'countries',
		'id_empresa_baw',
		'fecha_creacion',
		'usuario_creacion',
		'activo',
		'nombre_comercial',
		'ruc',
	),
)); ?>
