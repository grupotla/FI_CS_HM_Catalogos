<?php
$this->breadcrumbs=array(
	'Contactos Menus',
);

$this->menu=array(
	
	array('label'=>'Create ContactosMenu','url'=>array('create', 'button'=>1, 'text'=>'Create ContactosMenu'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>'Manage ContactosMenu','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1>Contactos Menus</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
