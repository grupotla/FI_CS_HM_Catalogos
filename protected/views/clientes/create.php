<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Create',
);


if (!isset($direcciones)) $direcciones = true;


$this->menu=array(
	array('label'=>Yii::t('app','List').' Clientes','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>Yii::t('app','Manage').' Clientes','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>Yii::t('app','Create').' Clientes','url'=>array('create'), 'icon'=>TbHtml::ICON_BOOK . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1><?php echo Yii::t('app','Create'); ?> 
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
?>		

		<?php /*$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),
			'icon'=>$model->isNewRecord ? 'icon-file icon-white' : 'icon-pencil icon-white',
			'htmlOptions'=>array('style'=>isset($modify) ? 'display:none' : 'display:inline'),
		)); */?>
		
		
</h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form', array('model'=>$model,'direcciones'=>$direcciones,)); ?>