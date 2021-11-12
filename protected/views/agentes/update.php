<?php
$this->breadcrumbs=array(
	'Agentes'=>array('index'),
	$model->agente_id=>array('view','id'=>$model->agente_id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('app','List').' Agentes','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' Agentes','url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' Agentes'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','View').' Agentes','url'=>array('view','id'=>$model->agente_id), 'icon'=>TbHtml::ICON_EYE_OPEN . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' Agentes','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1><?php echo Yii::t('app','Update'); ?>  Agentes <small><?php echo $model->agente_id." - ".$model->agente; ?></small></h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>