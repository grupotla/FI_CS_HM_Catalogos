<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->id_cliente=>array('view','id'=>$model->id_cliente),
	'Modifica',
);

$this->menu=array(
	array('label'=>Yii::t('app','List').' Clientes','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' Clientes','url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' Clientes'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','View').' Clientes','url'=>array('view','id'=>$model->id_cliente), 'icon'=>TbHtml::ICON_EYE_OPEN . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' Clientes','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1><?php //echo Yii::t('app','Modifica'); ?> 
<?php
if (isset($_POST['Clientes'])) {
	if ($_POST['Clientes']['es_shipper'] == 1) echo "Shipper";
	else
	if ($_POST['Clientes']['es_consigneer'] == 1) echo "Consigneer";
	else
	if ($_POST['Clientes']['es_coloader'] == 1) echo "Coloader";
	else
	echo "Clientes";
} else 
	echo "Clientes";	

echo " <small>".$model->id_cliente." - ".$model->nombre_cliente."</small>";	
?>		
</h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form',array('model'=>$model,'modify'=>1)); ?>