<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement) {
		continue;	
	} else {
		$campo = $column->name;
		break;
	}
}
?>
<?php echo "<?php \$form=\$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'focus'=>array(\$model,'$campo'),
)); ?>\n"; ?>

	<!-- <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p> -->

	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
?>
	<?php echo "<?php echo ".$this->generateActiveRow($this->modelClass,$column)."; ?>\n"; ?>

<?php
}
?>

	<?php echo "<?php //ob_start(); ?>\n"; ?>
	<?php echo "<?php //\$section1 = ob_get_contents(); ob_end_clean(); ?>\n"; ?>
		
    <?php echo "<?php /*echo TbHtml::tabbableTabs(array(
        array('label' => 'Datos Generales', 'content' => \$section1, 'active' => true),
    ), array('placement' => TbHtml::TABS_PLACEMENT_LEFT ) );*/ ?>\n"; ?>


<?php echo "<?php if (!\$this->asDialog) : ?>\n"; ?>

	<div class="form-actions">

		<?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>\$model->isNewRecord ? 'Create' : 'Save',
			'icon'=>\$model->isNewRecord ? 'icon-file icon-white' : 'icon-pencil icon-white',
		)); ?>\n"; ?>

	</div>
	
<?php echo "<?php /*else: ?>\n"; ?>	
	
	<?php echo "<?php echo CHtml::ajaxSubmitButton(\$model->isNewRecord ? 'Create' : 'Save',\$_SERVER['REQUEST_URI'],array(	
				'update'=>'.modal-body',
   				//'type'=>'POST','dataType'=>'json','beforeSend' => 'function(data){ }', 'success' => 'js:function(data){ }',
            	'error' => 'function(data) {                   
    	        	alert(data.responseText);
	            }',
            ),
			array('style'=>'display:none'
	)); */ ?>\n"; ?>
		
<?php echo "<?php endif; ?>\n"; ?>	

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>
