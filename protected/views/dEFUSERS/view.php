<?php
$this->breadcrumbs=array(	
	Yii::t('app','DEFUSERS')=>array('index'),		
	$model->COD_USER,
);

$this->menu=array(
	
	array('label'=>Yii::t('app','List').' '.Yii::t('app','DEFUSERS'),'url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' '.Yii::t('app','DEFUSERS'),'url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' '.Yii::t('app','DEFUSERS')), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','Update').' '.Yii::t('app','DEFUSERS'),'url'=>array('update', 'button'=>2, 'text'=>Yii::t('app','Update').' '.Yii::t('app','DEFUSERS'),'id'=>$model->COD_USER), 'icon'=>TbHtml::ICON_PENCIL . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['update'] == 1 ? true : false),
	
	//array('label'=>Yii::t('app','Delete').' '.Yii::t('app','DEFUSERS'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->COD_USER),'confirm'=>'¿Esta seguro que quiere borrar este registro?'), 'icon'=>TbHtml::ICON_TRASH . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' '.Yii::t('app','DEFUSERS'),'url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1><?php echo Yii::t('app','View').' '.Yii::t('app','DEFUSERS'); ?>   #<?php echo $model->COD_USER; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'COD_USER',
		'FIRSTNAME',
		'LASTNAME',
		'COD_GROUP',
		'PASSWORD',
		'STATUS',
		'PASSWORD_EXPIRES',
		'CHANGE_PASSWORD',
		'PASSWORD_DATE',
		'ID_CARD',
		'BLOOD_TYPE',
		'COMMENTS',
		'USER_TYPE',
		'EXTERNAL_USER',
		'id_usuario',
	),
)); ?>
