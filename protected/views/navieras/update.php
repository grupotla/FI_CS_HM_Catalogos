<?php
$this->breadcrumbs=array(
	'Navieras'=>array('index'),
	$model->id_naviera=>array('view','id'=>$model->id_naviera),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('app','List').' Navieras','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' Navieras','url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' Navieras'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','View').' Navieras','url'=>array('view','id'=>$model->id_naviera), 'icon'=>TbHtml::ICON_EYE_OPEN . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' Navieras','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php
	//$count = Yii::app()->db->createCommand("SELECT count(id_naviera) FROM Navieras WHERE parent_id=:id")->queryScalar(array(':id' => $model->id_naviera));
$count = 0;
$arr_nav[0] = "Naviera / Representante";
$arr_nav[1] = "Naviera";
$arr_nav[2] = "Representante";
?>

<?php if (!$this->asDialog) : ?>

<h1><?php echo Yii::t('app','Update'); ?>  <?php echo $arr_nav[$model->parent_id] ?> <small><?php echo $model->id_naviera." - ".$model->nombre; ?></small></h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form',array('model'=>$model,'count'=>$count)); ?>