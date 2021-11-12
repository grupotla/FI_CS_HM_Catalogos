<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
    'type'=>'horizontal',
	'enableClientValidation'=>true,
	'focus'=>array($model,'username'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>	

	<?php echo $_GET['nombre_nuevo']; ?>
	
	<input type="text" style="display:none">

	<?php echo $form->textFieldRow($model,'username',array('autocomplete'=>'off')); ?>

    <!-- disables autocomplete -->
    
    <input type="password" style="display:none">

	<?php echo $form->passwordFieldRow($model,'password',array(
        'hint'=>'',
    )); ?>

<?php $this->endWidget(); ?>





<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form1',
)); ?>

	<div class="form-actions">
                
		<?php $this->widget('bootstrap.widgets.TbButton', array(			
            'buttonType'=>'submit',
            'type'=>'danger',
            'label'=>'Cancelar',
            'icon'=>'icon-remove icon-white'
        ));  ?>

        <?php echo CHtml::link('<span class="icon-ok icon-white"></span> Autorizar','#',array('class'=>'btn btn-small btn-success','onclick'=>'$("#login-form").submit()','style'=>'float:right')); ?>
	        
	</div>

<?php $this->endWidget(); ?>




</div><!-- form -->
