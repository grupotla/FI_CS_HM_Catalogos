<?php
$this->breadcrumbs=array(
	Yii::t('app','Intercompanys')=>array('index'),	
	$model->id_intercompany=>array('view','id'=>$model->id_intercompany),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','List').' '.Yii::t('app','Intercompanys'),'url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' '.Yii::t('app','Intercompanys'),'url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' '.Yii::t('app','Intercompanys')), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','View').' '.Yii::t('app','Intercompanys'),'url'=>array('view','id'=>$model->id_intercompany), 'icon'=>TbHtml::ICON_EYE_OPEN . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' '.Yii::t('app','Intercompanys'),'url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1><?php echo Yii::t('app','Update').' '.Yii::t('app','Intercompanys'); ?>   #<?php echo $model->id_intercompany; ?></h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>