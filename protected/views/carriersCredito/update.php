<?php
$this->breadcrumbs=array(
	'Carriers Creditos'=>array('index'),
	$model->id_car_cred=>array('view','id'=>$model->id_car_cred),
	'Update',
);

$this->menu=array(
	array('label'=>'List CarriersCredito','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>'Create CarriersCredito','url'=>array('create', 'button'=>1, 'text'=>'Create CarriersCredito'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>'View CarriersCredito','url'=>array('view','id'=>$model->id_car_cred), 'icon'=>TbHtml::ICON_EYE_OPEN . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>'Manage CarriersCredito','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1>Update CarriersCredito <?php echo $model->id_car_cred; ?></h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>