<?php
$this->breadcrumbs=array(	
	Yii::t('app','ClientesTIT')=>array('index'),		
	$model->id_tipo_identificacion_tributaria,
);

$this->menu=array(
	
	array('label'=>Yii::t('app','List').' '.Yii::t('app','ClientesTIT'),'url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' '.Yii::t('app','ClientesTIT'),'url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' '.Yii::t('app','ClientesTIT')), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','Update').' '.Yii::t('app','ClientesTIT'),'url'=>array('update', 'button'=>2, 'text'=>Yii::t('app','Update').' '.Yii::t('app','ClientesTIT'),'id'=>$model->id_tipo_identificacion_tributaria), 'icon'=>TbHtml::ICON_PENCIL . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['update'] == 1 ? true : false),
	
	//array('label'=>Yii::t('app','Delete').' '.Yii::t('app','ClientesTIT'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_identificacion_tributaria),'confirm'=>'¿Esta seguro que quiere borrar este registro?'), 'icon'=>TbHtml::ICON_TRASH . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' '.Yii::t('app','ClientesTIT'),'url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1><?php echo Yii::t('app','View').' '.Yii::t('app','ClientesTIT'); ?>   #<?php echo $model->id_tipo_identificacion_tributaria; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_tipo_identificacion_tributaria',
		'id_pais',
		'tipo',
		'estado',
	),
)); ?>
