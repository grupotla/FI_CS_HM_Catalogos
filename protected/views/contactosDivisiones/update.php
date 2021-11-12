<?php
$this->breadcrumbs=array(
	'Contactos Divisiones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('app','List').' ContactosDivisiones','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array(
	'label'=>Yii::t('app','Create').' ContactosDivisiones',
	'url'=>array('create', 'button'=>1, 
	'text'=>Yii::t('app','Create').' ContactosDivisiones'), 
	'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, 
	"visible"=> 
	
	isset(Yii::app()->session['permisos'][Yii::app()->controller->id]) ?
	(Yii::app()->session['p']['create'] == 1 ? true : false) : false),
	
	array('label'=>Yii::t('app','View').' ContactosDivisiones','url'=>array('view','id'=>$model->id), 'icon'=>TbHtml::ICON_EYE_OPEN . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' ContactosDivisiones','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1><?php echo Yii::t('app','Update'); ?>  ContactosDivisiones <?php echo $model->id; ?></h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>