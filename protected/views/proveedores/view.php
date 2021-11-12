<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->numero,
);

$this->menu=array(
	
	array('label'=>Yii::t('app','List').' Proveedores','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' Proveedores','url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' Proveedores'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','Update').' Proveedores','url'=>array('update', 'button'=>2, 'text'=>Yii::t('app','Update').' Proveedores','id'=>$model->numero), 'icon'=>TbHtml::ICON_PENCIL . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['update'] == 1 ? true : false),
	
	//array('label'=>Yii::t('app','Delete').' Proveedores','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->numero),'confirm'=>'¿Esta seguro que quiere borrar este registro?'), 'icon'=>TbHtml::ICON_TRASH . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' Proveedores','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1><?php echo Yii::t('app','View'); ?>  Proveedores #<?php echo $model->numero; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'numero',
		'empresa',
		'nit',
		'nombre',
		'descripcion',
		'provision',
		'cuenta',
		'status',
		'bienes',
		'local',
		'fovial',
		'direccion',
		'contacto',
		'telefono',
		'fax',
		'correo',
		'observacion',
		'dias',
		'usuario',
		'usuario2',
		'modificado',
		'tiporegimen',
		'nit2',
		'requiere_oc',
		'monto',
		'tipo',
		'id_pais',
	),
)); ?>
