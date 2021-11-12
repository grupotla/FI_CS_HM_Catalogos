<?php
$this->breadcrumbs=array(
	'Navieras Creditos',
);

$this->menu=array(
	
	array('label'=>'Create NavierasCredito','url'=>array('create', 'button'=>1, 'text'=>'Create NavierasCredito'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>'Manage NavierasCredito','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1>Navieras Creditos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
