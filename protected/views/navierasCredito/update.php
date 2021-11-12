<?php
$this->breadcrumbs=array(
	'Navieras Creditos'=>array('index'),
	$model->id_nav_cred=>array('view','id'=>$model->id_nav_cred),
	'Update',
);

$this->menu=array(
	array('label'=>'List NavierasCredito','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>'Create NavierasCredito','url'=>array('create', 'button'=>1, 'text'=>'Create NavierasCredito'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> 
	
	isset(Yii::app()->session['permisos'][Yii::app()->controller->id]) ?
	(Yii::app()->session['p']['create'] == 1 ? true : false) : false
	),
	
	array('label'=>'View NavierasCredito','url'=>array('view','id'=>$model->id_nav_cred), 'icon'=>TbHtml::ICON_EYE_OPEN . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>'Manage NavierasCredito','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1>Update NavierasCredito <?php echo $model->id_nav_cred; ?></h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>