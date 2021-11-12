<?php
$this->breadcrumbs=array(
	'Navieras Creditos'=>array('index'),
	'Manage',
);

$this->menu=array(
	
	array('label'=>'List NavierasCredito','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>'Create NavierasCredito','url'=>array('create','button'=>1, 'text'=>'Create NavierasCredito'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, 'visible'=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	//array('label'=>'Advanced Search','url'=>array('search'), 'icon'=>TbHtml::ICON_SEARCH . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>'Excel','url'=>array('GenerateExcel'), 'icon'=>TbHtml::ICON_TH . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['excel'] == 1 ? true : false),
	
	array('label'=>'Pdf','url'=>array('GeneratePdf'), 'icon'=>TbHtml::ICON_BOOK . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['pdf'] == 1 ? true : false),	
);
?>


<h1>Manage Navieras Creditos</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'navieras-credito-grid',
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
		'id_nav_cred',
		//array('name'=>'id_naviera','value'=> 'isset($data->idNaviera) ? $data->idNaviera->nit : $data->id_naviera '),
		//array('name'=>'id_empresa','value'=> 'isset($data->idEmpresa) ? $data->idEmpresa->nombre_empresa : $data->id_empresa '),
		'activo',
		'secuencia',
		//array('name'=>'id_usuario','value'=> 'isset($data->idUsuario) ? $data->idUsuario->pw_name : $data->id_usuario '),
		/*
		'ingreso',
		'id_usuario_modifica',
		'modifica',
		'id_usuario_borrado',
		'borrado',
		'dias',
		'monto',
		'observaciones',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',			
			'template'=>'{update}{view}',
            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("update", array("id"=>$data->primaryKey,"button"=>2, "text" => "Update NavierasCredito"))',
						'options'=>array(    						
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"Update NavierasCredito",2); return false;}',
	                    ),
	                    'visible'=>Yii::app()->session['p']['update'] == 1 ? 'true' : 'false',
                   	),
            ),				
		),
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
	$.fn.yiiGridView.update('navieras-credito-grid', {
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
