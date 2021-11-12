<?php
$this->breadcrumbs=array(
	'Direcciones'=>array('index'),
	$model->name=>array('view','id'=>$model->id_direccion),
	'Update',
);

$this->menu=array(
	array('label'=>'List Direcciones','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>'Create Direcciones','url'=>array('create', 'button'=>1,'text'=>'Create Direcciones'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> 	
	isset(Yii::app()->session['p']) ?	
	Yii::app()->session['p']['create'] == 1 ? true : false	
	: false	
	),
	array('label'=>'View Direcciones','url'=>array('view','id'=>$model->id_direccion), 'icon'=>TbHtml::ICON_EYE_OPEN . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>'Manage Direcciones','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1>Update Direcciones <?php echo $model->id_direccion; ?></h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>