<?php
$this->breadcrumbs=array(
	'Contactos Divisiones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('app','List').' ContactosDivisiones','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>Yii::t('app','Manage').' ContactosDivisiones','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1><?php echo Yii::t('app','Create'); ?>  ContactosDivisiones</h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>