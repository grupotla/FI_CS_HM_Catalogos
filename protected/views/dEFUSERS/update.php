<?php
$this->breadcrumbs=array(
	Yii::t('app','DEFUSERS')=>array('index'),	
	$model->COD_USER=>array('view','id'=>$model->COD_USER),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','List').' '.Yii::t('app','DEFUSERS'),'url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' '.Yii::t('app','DEFUSERS'),'url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' '.Yii::t('app','DEFUSERS')), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','View').' '.Yii::t('app','DEFUSERS'),'url'=>array('view','id'=>$model->COD_USER), 'icon'=>TbHtml::ICON_EYE_OPEN . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' '.Yii::t('app','DEFUSERS'),'url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1><?php echo Yii::t('app','Update').' '.Yii::t('app','DEFUSERS'); ?>   #<?php echo $model->COD_USER; ?></h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>