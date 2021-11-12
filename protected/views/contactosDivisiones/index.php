<?php
$this->breadcrumbs=array(
	'Contactos Divisiones',
);

$this->menu=array(
	
	array('label'=>Yii::t('app','Create').' ContactosDivisiones','url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' ContactosDivisiones'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','Manage').' ContactosDivisiones','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1><?php echo Yii::t('app','List'); ?> Contactos Divisiones</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
