<?php
$this->breadcrumbs=array(
	Yii::t('app','EmpresasPlantillas')=>array('index'),	
	Yii::t('app','Create'),
);

$this->menu=array(
	//array('label'=>Yii::t('app','List').' '.Yii::t('app','EmpresasPlantillas'),'url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>Yii::t('app','Manage').' '.Yii::t('app','EmpresasPlantillas'),'url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1><?php echo Yii::t('app','Create').' '.Yii::t('app','EmpresasPlantillas'); ?> </h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>