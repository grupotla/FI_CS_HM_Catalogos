<?php
$this->breadcrumbs=array(	
	Yii::t('app','Intercompanys')=>array('index'),	
	Yii::t('app','Manage'),
);

$this->menu=array(
	
	array('label'=>Yii::t('app','List').' '.Yii::t('app','Intercompanys'),'url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' '.Yii::t('app','Intercompanys'),'url'=>array('create','button'=>1, 'text'=>Yii::t('app','Create').' '.Yii::t('app','Intercompanys')), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, 'visible'=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	//array('label'=>Yii::t('app','Search'),'url'=>array('search'), 'icon'=>TbHtml::ICON_SEARCH . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Excel'),'url'=>array('GenerateExcel'), 'icon'=>TbHtml::ICON_TH . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['excel'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','Pdf'),'url'=>array('GeneratePdf'), 'icon'=>TbHtml::ICON_BOOK . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['pdf'] == 1 ? true : false),	
);
?>


<h1><?php echo Yii::t('app','Manage').' '.Yii::t('app','Intercompanys'); ?> </h1>

	



<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'intercompanys-grid',
	'dataProvider'=>$model->search(),
	'type' => 'hover striped bordered condensed',
	'selectableRows'=>1,	
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
	'filter'=>$model,
	'columns'=>array(
	
	

		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',			
			'template'=>'{update} {view} {modify}',
			'header'=>'::&nbsp;Acciones&nbsp;::',		

            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("update", array("id"=>$data->primaryKey))',
                	 	'icon'=>'icon-pencil icon-white',
						'options'=>array(    						
							'title'=>'Editar',
							"class"=>"btn btn-small btn-warning",											
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t("app","Update").' Intercompanys",2); return false;}',
	                    ),
	                    'visible'=>Yii::app()->session['p']['update'] == 1 ? 'true' : 'false',
                   	),
                   	
                'modify'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("view", array("id"=>$data->primaryKey))',
                	 	'icon'=>'icon-cog icon-white',
						'options'=>array(    	
							'title'=>'Modificar Otros Datos',
							"class"=>"btn btn-small btn-success",											
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t("app","Update").' Intercompanys",2); return false;}',
	                    ),
	                    'visible'=>Yii::app()->session['p']['update'] == 1 ? 'false' : 'true',
                   	),
                   	                   	
                'view'=> array(                			
                			'icon'=>'icon-eye-open icon-white',
                			'options'=>array(
                				"class"=>"btn btn-small btn-info",
                			),
                		),                    	
            ),				
		),
			
		
		array('name'=>'id_intercompany', 'cssClassExpression'=>'$data->activo == 1 ? "on" : "off"'),				
		array('name'=>'countries', 'cssClassExpression'=>'$data->activo == 1 ? "on" : "off"'),
		array('name'=>'id_empresa_baw', 'cssClassExpression'=>'$data->activo == 1 ? "on" : "off"', 'value'=>'isset($data->empresa0) ? $data->id_empresa_baw . " - " . $data->empresa0->nombre_empresa : $data->id_empresa_baw'),
		array('name'=>'nombre_intercompany', 'cssClassExpression'=>'$data->activo == 1 ? "on" : "off"'),
		array('name'=>'nit', 'cssClassExpression'=>'$data->activo == 1 ? "on" : "off"'),
		//'tiporegimen',
		array('name'=>'nombre_comercial', 'cssClassExpression'=>'$data->activo == 1 ? "on" : "off"'),
		array('name'=>'direccion', 'cssClassExpression'=>'$data->activo == 1 ? "on" : "off"'),
		array('name'=>'activo', 'value'=>'$data->activo == 1 ? "On" : "Off"', 'cssClassExpression'=>'$data->activo == 1 ? "on" : "off"','filter'=>array('1'=>'On','0'=>'Off')),
		/*
	
		'fecha_creacion',
		'usuario_creacion',
		'activo',
		
		'ruc',
		*/
		/*
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',			
			'template'=>'{update}{view}',
            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("update", array("id"=>$data->primaryKey))',
						'options'=>array(    						
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t("app","Update").' Intercompanys",2); return false;}',
	                    ),
	                    'visible'=>Yii::app()->session['p']['update'] == 1 ? 'true' : 'false',
                   	),
            ),				
		),
		*/
	),
)); ?>

<?php
/*Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	$('#myModalSearch').modal('show');
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('intercompanys-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php ob_start(); ?>

<p>
Opcionalmente puedes ingresar operadores de comparacion (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada una de tus valores de busqueda para especificar como debe realizarse la comparacion.
</p>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $render_search = ob_get_contents(); ob_end_clean(); ?>

<?php $this->widget('bootstrap.widgets.TbModal', array(
		    'id' => 'myModalSearch',           
		    'header' => 'Modal Heading',
		    'htmlOptions'=>array('style'=>'width:75%; left:35%;'),    
		    'content' => $render_search,
		    'footer' => array(
		        //TbHtml::button('Save Changes', array('id'=>'btn-save-modal', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
		        TbHtml::button('Close', array('id'=>'myModalSearch-close','data-dismiss' => 'modal')),
		    ),    
		)
	);	*/ ?> 
