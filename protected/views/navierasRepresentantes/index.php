<?php
$this->breadcrumbs=array(
	Yii::t('app','NavierasRepresentantes'),
);

$this->menu=array(
	
	array('label'=>Yii::t('app','Create').' '.Yii::t('app','NavierasRepresentantes'),'url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' '.Yii::t('app','NavierasRepresentantes')), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','Manage').' '.Yii::t('app','NavierasRepresentantes'),'url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1><?php echo Yii::t('app','List').' '.Yii::t('app','NavierasRepresentantes'); ?> </h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
