<?php
$this->breadcrumbs=array(	
	Yii::t('app','EmpresasParametros')=>array('index'),	
	Yii::t('app','Manage'),
);

$this->menu=array(
	
	//array('label'=>Yii::t('app','List').' '.Yii::t('app','EmpresasParametros'),'url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' '.Yii::t('app','EmpresasParametros'),'url'=>array('create','button'=>1, 'text'=>Yii::t('app','Create').' '.Yii::t('app','EmpresasParametros')), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, //'visible'=> Yii::app()->session['p']['create'] == 1 ? true : false
),
	
	//array('label'=>Yii::t('app','Search'),'url'=>array('search'), 'icon'=>TbHtml::ICON_SEARCH . " " . TbHtml::ICON_COLOR_WHITE),
	
	//array('label'=>Yii::t('app','Excel'),'url'=>array('GenerateExcel'), 'icon'=>TbHtml::ICON_TH . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['excel'] == 1 ? true : false),
	
	//array('label'=>Yii::t('app','Pdf'),'url'=>array('GeneratePdf'), 'icon'=>TbHtml::ICON_BOOK . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['pdf'] == 1 ? true : false),	
);
?>


<h1><?php echo Yii::t('app','Manage').' '.Yii::t('app','EmpresasParametros'); ?> </h1>

	



<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'empresas-parametros-grid',
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
			'template'=>'{update}',
            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("update", array("id"=>$data->primaryKey))',
						 'icon'=>'icon-pencil icon-white',
						 'options'=>array(    			
							"class"=>"btn btn-small btn-warning",				
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t("app","Update").' EmpresasParametros",2); return false;}',
	                    ),
	                    'visible'=>'true'//Yii::app()->session['p']['update'] == 1 ? 'true' : 'false',
                   	),
            ),				
		),		
		//'id',

		array(
			'name'=>'activo'
			,'value'=>'$data->activo == 1 ? "Act" : "Inac"'
			,'type'=>'raw'
			//,'headerHtmlOptions'=>array('style'=>'white-space:nowrap;','title'=>'Status')
			,'cssClassExpression'=>'$data->activo == 1 ? "on" : "off"'
			,'filter'=>		
						array(
							"1"			=>"Act",
							"0"			=>"Inac",
						)					
		),		
		'country',
		'nit',
		'nombre_empresa',
		//'direccion',
		'telefonos',
		//'activo',

		'home_page',

		array(
			'name'=>'trackactivo'
			,'header'=>'Tracking On/Off'
			,'value'=>'$data->trackactivo == 1 ? "On" : "Off"'
			,'type'=>'raw'
			,'cssClassExpression'=>'$data->trackactivo == 1 ? "on" : "off"'
			,'filter'=>		
						array(
							"1"			=>"On",
							"0"			=>"Off",
						)					
		),

		'trackmailserver',

		/*
		'fact_elect_email',
		'fact_elect_codigo',
		'logo',
		'creacion_user',
		'creacion_date',
		'modifica_user',
		'modifica_date',
		
		'trackpuerto',
		
		'trackauth',
		'trackfromaddress',
		'trackpassword',
		'ocean_error_reporting_mail',
		'ocean_idioma_id',
		'ocean_dias_notificar_arribo',
		'ocean_factor_riesgo_pais',
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
	$.fn.yiiGridView.update('empresas-parametros-grid', {
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
