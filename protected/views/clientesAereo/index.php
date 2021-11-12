<?php
$this->breadcrumbs=array(
	'Clientes Aereos',
);

$this->menu=array(
	array('label'=>'Create ClientesAereo','url'=>array('create', 'button'=>1,'text'=>'Create ClientesAereo'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	array('label'=>'Manage ClientesAereo','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1>Clientes Aereos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
