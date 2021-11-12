<?php
$this->breadcrumbs=array(
	'Agentes',
);

$this->menu=array(
	
	array('label'=>Yii::t('app','Create').' Agentes','url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' Agentes'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','Manage').' Agentes','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1><?php echo Yii::t('app','List'); ?> Agentes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
