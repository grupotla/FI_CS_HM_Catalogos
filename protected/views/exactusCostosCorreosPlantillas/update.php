<?php
$this->breadcrumbs=array(
	Yii::t('app','ExactusCorreos')=>array('index'),	
	$model->id=>array('view','id'=>$model->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	//array('label'=>Yii::t('app','List').' '.Yii::t('app','ExactusCorreos'),'url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' '.Yii::t('app','ExactusCorreos'),'url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' '.Yii::t('app','ExactusCorreos')), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	//array('label'=>Yii::t('app','View').' '.Yii::t('app','ExactusCorreos'),'url'=>array('view','id'=>$model->id), 'icon'=>TbHtml::ICON_EYE_OPEN . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' '.Yii::t('app','ExactusCorreos'),'url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1><?php echo Yii::t('app','Update').' '.Yii::t('app','ExactusCorreos'); ?>   #<?php echo $model->id; ?></h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>