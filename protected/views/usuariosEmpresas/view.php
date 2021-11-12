<?php
$this->breadcrumbs=array(	
	Yii::t('app','UsuariosEmpresas')=>array('index'),		
	$model->id_usuario,
);

$this->menu=array(
	
	array('label'=>Yii::t('app','List').' '.Yii::t('app','UsuariosEmpresas'),'url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' '.Yii::t('app','UsuariosEmpresas'),'url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' '.Yii::t('app','UsuariosEmpresas')), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','Update').' '.Yii::t('app','UsuariosEmpresas'),'url'=>array('update', 'button'=>2, 'text'=>Yii::t('app','Update').' '.Yii::t('app','UsuariosEmpresas'),'id'=>$model->id_usuario), 'icon'=>TbHtml::ICON_PENCIL . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['update'] == 1 ? true : false),
	
	//array('label'=>Yii::t('app','Delete').' '.Yii::t('app','UsuariosEmpresas'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario),'confirm'=>'¿Esta seguro que quiere borrar este registro?'), 'icon'=>TbHtml::ICON_TRASH . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' '.Yii::t('app','UsuariosEmpresas'),'url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<h1><?php echo Yii::t('app','View').' '.Yii::t('app','UsuariosEmpresas'); ?>   #<?php echo $model->id_usuario; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_usuario',
		'pw_name',
		'pw_passwd',
		'pw_uid',
		'pw_gid',
		'pw_gecos',
		'pw_dir',
		'pw_shell',
		'tipo_usuario',
		'pais',
		'dominio',
		'level',
		'pw_activo',
		'pw_codigo_tributario',
		'pw_correo',
		'id_usuario_reg',
		'modificado',
		'locode',
		'planilla_numero',
		'pw_ultimo_acceso',
		'pw_passwd_dias',
		'pw_passwd_fecha',
		'pw_user_ip',
		'pw_sis_id',
	),
)); ?>
