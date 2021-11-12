<?php
$this->breadcrumbs=array(	
	Yii::t('app','EmpresasParametros')=>array('index'),		
	$model->id,
);

$this->menu=array(
	
	//array('label'=>Yii::t('app','List').' '.Yii::t('app','EmpresasParametros'),'url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' '.Yii::t('app','EmpresasParametros'),'url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' '.Yii::t('app','EmpresasParametros')), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','Update').' '.Yii::t('app','EmpresasParametros'),'url'=>array('update', 'button'=>2, 'text'=>Yii::t('app','Update').' '.Yii::t('app','EmpresasParametros'),'id'=>$model->id), 'icon'=>TbHtml::ICON_PENCIL . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['update'] == 1 ? true : false),
	
	//array('label'=>Yii::t('app','Delete').' '.Yii::t('app','EmpresasParametros'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que quiere borrar este registro?'), 'icon'=>TbHtml::ICON_TRASH . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' '.Yii::t('app','EmpresasParametros'),'url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1><?php echo Yii::t('app','View').' '.Yii::t('app','EmpresasParametros'); ?>   #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'country',
		'nit',
		'nombre_empresa',
		'direccion',
		'telefonos',
		'home_page',
		'fact_elect_email',
		'fact_elect_codigo',
		'logo',
		'activo',
		'creacion_user',
		'creacion_date',
		'modifica_user',
		'modifica_date',
		'trackactivo',
		'trackpuerto',
		'trackmailserver',
		'trackauth',
		'trackfromaddress',
		'trackpassword',
		'ocean_error_reporting_mail',
		'ocean_idioma_id',
		'ocean_dias_notificar_arribo',
		'ocean_factor_riesgo_pais',
	),
)); ?>
