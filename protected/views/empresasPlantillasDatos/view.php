<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'empresas-plantillas-datos-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,	
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'empresas-plantillas-datos-grid',
	'dataProvider'=>$gridDataProvider,
	'type' => 'hover striped bordered condensed',
	'template'=>"{items}",	
	'columns'=>array(				
		array('name'=>'label', 'header'=>'Nombre del Campo', 'type'=>'raw'),		
		array('name'=>'orden', 'header'=>'Orden', 'type'=>'raw'),
		array('name'=>'chk', 'header'=>'Incluir', 'type'=>'raw'),
	),
)); ?>

<?php $this->endWidget(); ?>


<?php
/* $this->menu=array(
	array('label'=>Yii::t('app','List').' '.Yii::t('app','EmpresasPlantillasDatos'),'url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>Yii::t('app','Create').' '.Yii::t('app','EmpresasPlantillasDatos'),'url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' '.Yii::t('app','EmpresasPlantillasDatos')), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	array('label'=>Yii::t('app','Update').' '.Yii::t('app','EmpresasPlantillasDatos'),'url'=>array('update', 'button'=>2, 'text'=>Yii::t('app','Update').' '.Yii::t('app','EmpresasPlantillasDatos'),'id'=>$model->id), 'icon'=>TbHtml::ICON_PENCIL . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['update'] == 1 ? true : false),
	array('label'=>Yii::t('app','Delete').' '.Yii::t('app','EmpresasPlantillasDatos'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que quiere borrar este registro?'), 'icon'=>TbHtml::ICON_TRASH . " " . TbHtml::ICON_COLOR_WHITE),	
	array('label'=>Yii::t('app','Manage').' '.Yii::t('app','EmpresasPlantillasDatos'),'url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1><?php echo Yii::t('app','View').' '.Yii::t('app','EmpresasPlantillasDatos'); ?>   #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'country',
		'sistema',
		'doc_id',
		'id_etiqueta',
		'etiqueta_style',
		'campo_tabla',
		'campo_style',
		'formato_campo',
		'campo_tabla_right',
		'orden',
		'activo',
	),
)); */ ?>
