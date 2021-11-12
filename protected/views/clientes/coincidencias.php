<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'coincidencias-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	//'focus'=>array($model,'codigo_tributario'),
)); 
?>

	<!-- <div class="form-actions"> -->
                
		<?php $this->widget('bootstrap.widgets.TbButton', array(			
            'buttonType'=>'submit',
            'type'=>'primary',
            //'label'=>'Autorizar Creacion Cliente Nuevo',
            'label'=>$titulo,
            'icon'=>'icon-user icon-white',
            'htmlOptions'=>array('style'=>'float:left'),
        ));  ?>

		<?php $this->widget('bootstrap.widgets.TbButton', array(			
            'buttonType'=>'button',
            'type'=>'danger',
            'label'=>'',
            'icon'=>'icon-remove icon-white',
            'htmlOptions'=>array('onclick'=>'javascript:window.parent.$("#cru_dialog").dialog("close");','style'=>'float:right')
        ));  ?>
        
	<!-- </div> -->

<?php //echo $_GET['field']." a comparar : ".$_GET['nombre_nuevo']?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'clientes-grid',
	'dataProvider'=>$dataProvider,
	'type' => 'hover striped bordered condensed',	
	'template' => "{summary}\n{pager}\n{items}\n{summary}\n{pager}",	
	'htmlOptions'=>array('style'=>'cursor: pointer;'),
	'pager'=>array(
		'class' => 'bootstrap.widgets.TbPager',
		'displayFirstAndLast' => true,
		//'class' 		 => 'CLinkPager', 
        'header'         => '',
        'firstPageLabel' => TbHtml::icon(TbHtml::ICON_FAST_BACKWARD),
        'prevPageLabel'  => TbHtml::icon(TbHtml::ICON_STEP_BACKWARD),
        'nextPageLabel'  => TbHtml::icon(TbHtml::ICON_STEP_FORWARD),
        'lastPageLabel'  => TbHtml::icon(TbHtml::ICON_FAST_FORWARD),
    ), 	
	'columns'=>array(
		array(		
			'value'=>'CHtml::radioButton("id_cliente",false,array("value" => $data->id_cliente, "onclick" => "$(\"#coincidencias-form\").submit();"))',
			'type'=>'raw',
		),
		
		/*array('name'=>'Codigo','value'=>'$data->id_cliente'),
		array('name'=>'Nit','value'=>'$data->codigo_tributario'),
		array('name'=>'Nombre Cliente','value'=>'$data->nombre_cliente'),		
		array('name'=>'Nombre Facturar','value'=>'$data->nombre_facturar'),		
		array('name'=>'Tipo','value'=> 'isset($data->idTipoCliente)?$data->idTipoCliente->descripcion:$data->id_tipo_cliente'),
		array('name'=>'Pais','value'=>'$data->id_pais'),		
		array('name'=>'ultimo_tipo_movimiento','header'=>'%'),
		array('name'=>'cto_id','header'=>'c>count/2'),		
		*/
		

				
		
		array('name' => 'id_cliente', 'header'=>'Cliente'),
		array('name' => 'codigo_tributario', 'header'=>'Nit'),
		array('name' => 'nombre_cliente', 'header'=>'Nombre'),
		array('name' => 'nombre_facturar', 'header'=>'Facturar'),		
		array('name' => 'id_pais', 'header'=>'Pais'),
		//array('name' => 'id_tipo_cliente', 'header'=>'Tipo'),
		array('name' => 'ultimo_tipo_movimiento', 'header'=>'%'),
		array('name' => 'cto_id', 'header'=>'w'),
		
		
	),
)); ?>

<?php $this->endWidget(); ?>


<script>		
	/*$('.auth-clientes').click(function(e){
		var target = $(this).attr('data-target');
		if (target == '#myModal')
			$("#myModalHelp-close").click();
        $(target).find('.modal-body').load($(this).attr('href')); 		
	    e.preventDefault(); // avoid to execute the actual submit of the form.	
	});*/
</script>


