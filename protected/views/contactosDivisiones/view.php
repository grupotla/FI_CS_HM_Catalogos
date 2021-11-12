<?php
$this->breadcrumbs=array(
	'Contactos Divisiones'=>array('index'),
	$model->id,
);

$this->menu=array(
	
	array('label'=>Yii::t('app','List').' ContactosDivisiones','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' ContactosDivisiones','url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' ContactosDivisiones'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','Update').' ContactosDivisiones','url'=>array('update', 'button'=>2, 'text'=>Yii::t('app','Update').' ContactosDivisiones','id'=>$model->id), 'icon'=>TbHtml::ICON_PENCIL . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['update'] == 1 ? true : false),
	
	//array('label'=>Yii::t('app','Delete').' ContactosDivisiones','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que quiere borrar este registro?'), 'icon'=>TbHtml::ICON_TRASH . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' ContactosDivisiones','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1><?php echo Yii::t('app','View'); ?>  ContactosDivisiones #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_catalogo',
		'id_contacto',
		'catalogo',
		'nombre',
		'email',
		'telefono',
		'area',
		'impexp',
		'carga',
		'tranship',
		'pais',
		'fecha',
		'usuario',
		'status',
		'area_enum',
		'impexp_enum',
		'carga_enum',
		'tipo_persona',
		'copia',
		'rechazo',
		'contactoxpais',
		'fax',
		'cargo',
	),
)); ?>
