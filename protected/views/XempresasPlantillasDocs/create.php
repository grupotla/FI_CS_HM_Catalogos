<?php
$this->breadcrumbs=array(
	Yii::t('app','EmpresasPlantillasDocs')=>array('index'),	
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('app','List').' '.Yii::t('app','EmpresasPlantillasDocs'),'url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>Yii::t('app','Manage').' '.Yii::t('app','EmpresasPlantillasDocs'),'url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1><?php echo Yii::t('app','Create').' '.Yii::t('app','EmpresasPlantillasDocs'); ?> </h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>