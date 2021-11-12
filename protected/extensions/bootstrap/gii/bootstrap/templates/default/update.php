<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
//$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	Yii::t('app','".$this->modelClass."')=>array('index'),	
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	Yii::t('app','Update'),
);\n";
?>

$this->menu=array(
	array('label'=>Yii::t('app','List').' '.Yii::t('app','<?php echo $this->modelClass; ?>'),'url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' '.Yii::t('app','<?php echo $this->modelClass; ?>'),'url'=>array('create', 'button'=>1, 'text'=>Yii::t('app','Create').' '.Yii::t('app','<?php echo $this->modelClass; ?>')), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','View').' '.Yii::t('app','<?php echo $this->modelClass; ?>'),'url'=>array('view','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>), 'icon'=>TbHtml::ICON_EYE_OPEN . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Manage').' '.Yii::t('app','<?php echo $this->modelClass; ?>'),'url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php echo "<?php if (!\$this->asDialog) : ?>\n"; ?>

<h1><?php echo "<?php echo Yii::t('app','Update').' '.Yii::t('app','".$this->modelClass."'); ?>"; ?>  <?php echo " #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?>
</h1>

<?php echo "<?php endif; ?>\n"; ?>	

<?php echo "<?php echo \$this->renderPartial('_form',array('model'=>\$model)); ?>"; ?>