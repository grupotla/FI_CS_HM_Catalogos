<?php
$this->breadcrumbs=array(
	'Navieras'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('app','List').' Navieras','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>Yii::t('app','Manage').' Navieras','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);

$arr_nav[0] = "Naviera / Representante";
$arr_nav[1] = "Naviera";
$arr_nav[2] = "Representante";
?>

<?php if (!$this->asDialog) : ?>

<h1><?php echo Yii::t('app','Create'); ?>  <?php echo $arr_nav[$model->parent_id]; ?></h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form', array('model'=>$model,'count'=>0)); ?>