<?php
$this->breadcrumbs=array(
	'Agentes'=>array('index'),
	$model->agente_id,
);

$this->menu=array(
	
	array('label'=>Yii::t('app','List').' Agentes','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' Agentes','url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' Agentes'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','Update').' Agentes','url'=>array('update', 'button'=>2, 'text'=>Yii::t('app','Update').' Agentes','id'=>$model->agente_id), 'icon'=>TbHtml::ICON_PENCIL . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['update'] == 1 ? true : false),
	
	//array('label'=>Yii::t('app','Delete').' Agentes','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->agente_id),'confirm'=>'¿Esta seguro que quiere borrar este registro?'), 'icon'=>TbHtml::ICON_TRASH . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' Agentes','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1><?php echo Yii::t('app','View'); ?>  Agentes #<?php echo $model->agente_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'agente_id',
		'agente',
		'activo',
		'direccion',
		'telefono',
		'fax',
		'correo',
		'contacto',
		'contabilidad_id',
		'fecha_creacion',
		'hora_creacion',
		'id_grupo',
		'id_usuario_creacion',
		'id_usuario_modificacion',
		'accountno',
		'iatano',
		'defaultval',
		'countries',
		'id_network',
		'tiporegimen',
		'dias',
		'nit',
		'nit2',
		'fecha_modificacion',
		'fam_agente',
		'pais_terrestre_auto',
		'es_neutral',
		'puesto',
		'agentes_grupo_id',
		'monto',
	),
)); ?>
