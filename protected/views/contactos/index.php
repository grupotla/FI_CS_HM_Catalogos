<?php
$this->breadcrumbs=array(
	'Contactoses',
);

$this->menu=array(
	array('label'=>'Create Contactos','url'=>array('create', 'button'=>1,'text'=>'Create Contactos'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	array('label'=>'Manage Contactos','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1>Contactoses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
