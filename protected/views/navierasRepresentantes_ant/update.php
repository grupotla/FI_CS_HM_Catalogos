<?php
$this->breadcrumbs=array(
	'NavierasRepresentantes'=>array('index'),
	$model->id_naviera=>array('view','id'=>$model->id_naviera),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('app','List').' Representantes','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' Representantes','url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' Navieras'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','View').' Representantes','url'=>array('view','id'=>$model->id_naviera), 'icon'=>TbHtml::ICON_EYE_OPEN . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' Representantes','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1><?php echo Yii::t('app','Update'); ?>  Representantes <small><?php echo $model->id_naviera." - ".$model->nombre; ?></small></h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>