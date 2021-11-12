<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->numero=>array('view','id'=>$model->numero),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('app','List').' Proveedores','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' Proveedores','url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' Proveedores'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','View').' Proveedores','url'=>array('view','id'=>$model->numero), 'icon'=>TbHtml::ICON_EYE_OPEN . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' Proveedores','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1><?php echo Yii::t('app','Update'); ?>  Proveedores <small><?php echo $model->numero." - ".$model->nombre; ?></small></h1>


<?php endif; ?>
	

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>