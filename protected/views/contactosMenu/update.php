<?php
$this->breadcrumbs=array(
	'Contactos Menus'=>array('index'),
	$model->mn_id=>array('view','id'=>$model->mn_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ContactosMenu','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>'Create ContactosMenu','url'=>array('create', 'button'=>1, 'text'=>'Create ContactosMenu'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>'View ContactosMenu','url'=>array('view','id'=>$model->mn_id), 'icon'=>TbHtml::ICON_EYE_OPEN . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>'Manage ContactosMenu','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1>Update ContactosMenu <?php echo $model->mn_id; ?></h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>