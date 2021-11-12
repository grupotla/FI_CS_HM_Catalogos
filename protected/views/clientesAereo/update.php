<?php
$this->breadcrumbs=array(
	'Clientes Aereos'=>array('index'),
	$model->id_cliente=>array('view','id'=>$model->id_cliente),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientesAereo','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>'Create ClientesAereo','url'=>array('create', 'button'=>1,'text'=>'Create ClientesAereo'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	array('label'=>'View ClientesAereo','url'=>array('view','id'=>$model->id_cliente), 'icon'=>TbHtml::ICON_EYE_OPEN . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>'Manage ClientesAereo','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1>Update ClientesAereo <?php echo $model->id_cliente; ?></h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>