<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
//$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	Yii::t('app','".$this->modelClass."')=>array('index'),	
	Yii::t('app','Create'),
);\n";
?>

$this->menu=array(
	array('label'=>Yii::t('app','List').' '.Yii::t('app','<?php echo $this->modelClass; ?>'),'url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	array('label'=>Yii::t('app','Manage').' '.Yii::t('app','<?php echo $this->modelClass; ?>'),'url'=>array('admin'), 'icon'=>TbHtml::ICON_COG . " " . TbHtml::ICON_COLOR_WHITE),
);
?>

<?php echo "<?php if (!\$this->asDialog) : ?>\n"; ?>

<h1><?php echo "<?php echo Yii::t('app','Create').' '.Yii::t('app','".$this->modelClass."'); ?>"; ?> </h1>

<?php echo "<?php endif; ?>\n"; ?>	

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
