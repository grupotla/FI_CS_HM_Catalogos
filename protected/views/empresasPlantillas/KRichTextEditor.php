<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'empresas-parametros-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'observaciones'),
)); ?>
	
		<?php Yii::import('ext.krichtexteditor.KRichTextEditor');
		$this->widget('KRichTextEditor', array(
			'model' => $model,
			'value' => $model->isNewRecord ? '' : $model->observaciones,
			'attribute' => 'observaciones',
			'options' => array(
				'theme_advanced_resizing' => 'true',
				'theme_advanced_statusbar_location' => 'bottom',
				'theme_advanced_blockformats' => 'p,address,pre,h1,h2,h3,h4,h5,h6',
			),
		));?>			
			
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Actualizar',
			'icon'=>'icon-pencil icon-white',
			//'htmlOptions'=>array('onclick'=>'javascript:window.parent.$("#cru_dialog").dialog("close");',)
		)); ?>
			
		<?php echo $form->hiddenField($model,'id',array('value'=>$model->id)); ?>
			
<?php $this->endWidget(); ?>




