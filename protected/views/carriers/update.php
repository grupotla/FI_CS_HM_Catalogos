<?php
$this->breadcrumbs=array(
	'Carriers'=>array('index'),
	$model->name=>array('view','id'=>$model->carrier_id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('app','List').' Carriers','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' Carriers','url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' Carriers'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','View').' Carriers','url'=>array('view','id'=>$model->carrier_id), 'icon'=>TbHtml::ICON_EYE_OPEN . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' Carriers','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1><?php echo Yii::t('app','Update'); ?>  Carriers <small><?php echo $model->carrier_id." - ".$model->name; ?></small></h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>