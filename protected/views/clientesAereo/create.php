<?php
$this->breadcrumbs=array(
	'Clientes Aereos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientesAereo','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>'Manage ClientesAereo','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1>Create ClientesAereo</h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>