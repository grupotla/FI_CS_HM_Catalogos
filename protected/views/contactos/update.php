<?php
$this->breadcrumbs=array(
	'Contactoses'=>array('index'),
	$model->contacto_id=>array('view','id'=>$model->contacto_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Contactos','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>'Create Contactos','url'=>array('create', 'button'=>1,'text'=>'Create Contactos'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> 	
	isset(Yii::app()->session['permisos'][Yii::app()->controller->id]) ? (Yii::app()->session['p']['create'] == 1 ? true : false) : false),
	array('label'=>'View Contactos','url'=>array('view','id'=>$model->contacto_id), 'icon'=>TbHtml::ICON_EYE_OPEN . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>'Manage Contactos','url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php if (!$this->asDialog) : ?>

<h1>Update Contactos <?php echo $model->contacto_id; ?></h1>

<?php endif; ?>
	

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>