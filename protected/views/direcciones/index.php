<?php
$this->breadcrumbs=array(
	'Direcciones',
);

$this->menu=array(
	array('label'=>'Create Direcciones','url'=>array('create', 'button'=>1,'text'=>'Create Direcciones'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	array('label'=>'Manage Direcciones','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1>Direcciones</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
