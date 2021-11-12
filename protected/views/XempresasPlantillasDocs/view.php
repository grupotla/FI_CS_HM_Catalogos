<?php
$this->breadcrumbs=array(	
	Yii::t('app','EmpresasPlantillasDocs')=>array('index'),		
	$model->id,
);

$this->menu=array(
	
	array('label'=>Yii::t('app','List').' '.Yii::t('app','EmpresasPlantillasDocs'),'url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' '.Yii::t('app','EmpresasPlantillasDocs'),'url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' '.Yii::t('app','EmpresasPlantillasDocs')), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','Update').' '.Yii::t('app','EmpresasPlantillasDocs'),'url'=>array('update', 'button'=>2, 'text'=>Yii::t('app','Update').' '.Yii::t('app','EmpresasPlantillasDocs'),'id'=>$model->id), 'icon'=>TbHtml::ICON_PENCIL . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['update'] == 1 ? true : false),
	
	//array('label'=>Yii::t('app','Delete').' '.Yii::t('app','EmpresasPlantillasDocs'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que quiere borrar este registro?'), 'icon'=>TbHtml::ICON_TRASH . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' '.Yii::t('app','EmpresasPlantillasDocs'),'url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1><?php echo Yii::t('app','View').' '.Yii::t('app','EmpresasPlantillasDocs'); ?>   #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'country',
		'sistema',
		'orden',
		'doc_id',
		'tipo_code',
		'code',
		'nombre',
		'descripcion',
	),
)); ?>
