<?php
$this->breadcrumbs=array(
	Yii::t('app','UsuariosEmpresas')=>array('index'),	
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('app','List').' '.Yii::t('app','UsuariosEmpresas'),'url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>Yii::t('app','Manage').' '.Yii::t('app','UsuariosEmpresas'),'url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1><?php echo Yii::t('app','Create').' '.Yii::t('app','UsuariosEmpresas'); ?> </h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>