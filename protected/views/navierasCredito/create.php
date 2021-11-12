<?php
$this->breadcrumbs=array(
	'Navieras Creditos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NavierasCredito','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>'Manage NavierasCredito','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1>Create NavierasCredito</h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>