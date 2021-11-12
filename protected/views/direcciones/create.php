<?php
$this->breadcrumbs=array(
	'Direcciones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Direcciones','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>'Manage Direcciones','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1>Create Direcciones</h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>