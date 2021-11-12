<?php
$this->breadcrumbs=array(
	Yii::t('app','UsuariosEmpresas')=>array('index'),	
	Yii::t('app','Manage'),
);

$this->menu=array(
	
	array('label'=>Yii::t('app','List').' '.Yii::t('app','UsuariosEmpresas'),'url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' '.Yii::t('app','UsuariosEmpresas'),'url'=>array('create','button'=>1, 'text'=>Yii::t('app','Create').' UsuariosEmpresas'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, 'visible'=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	//array('label'=>Yii::t('app','Search').' '.Yii::t('app','UsuariosEmpresas'),'url'=>array('search'), 'icon'=>TbHtml::ICON_SEARCH . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Excel'),'url'=>array('GenerateExcel'), 'icon'=>TbHtml::ICON_TH . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['excel'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','Pdf'),'url'=>array('GeneratePdf'), 'icon'=>TbHtml::ICON_BOOK . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['pdf'] == 1 ? true : false),	
);
?>


<h1><?php echo Yii::t('app','Manage').' '.Yii::t('app','UsuariosEmpresas'); ?> </h1>

	



<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'usuarios-empresas-grid',
	'dataProvider'=>$model->search(),
	'type' => 'hover striped bordered condensed',
	'selectableRows'=>1,	
	'template' => "{summary}\n{pager}\n{items}\n{summary}\n{pager}",	
	'htmlOptions'=>array('style'=>'cursor: pointer;', 'class1'=>'btn btn-primary btn-small btn-block'),
	

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
			'header'=>'::&nbsp;Acciones&nbsp;::',
			'template'=>'{update} {menu} {division} {view}',
			'htmlOptions'=>array('style'=>'white-space: nowrap;'),
            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("update", array("id"=>$data->primaryKey))',
                	 	
                	 	'icon'=>'icon-pencil icon-white',
						'options'=>array(
							'title'=>'Editar',
							"class"=>"btn btn-small btn-success",
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t("app","Update").' UsuariosEmpresas",2); return false;}',
	                    ),
	                    'visible'=>Yii::app()->session['p']['update'] == 1 ? 'true' : 'false',
                   	),
                'menu'=> array(
                			'url'=>'$this->grid->controller->createUrl("menu", array("id"=>$data->primaryKey))',
                			'icon'=>'icon-tasks icon-white',
                			'options'=>array(
                			"class"=>"btn btn-small btn-warning",
                			'title'=>'Opciones de Menu'),
                		),
                'division'=> array(
                			'url'=>'$this->grid->controller->createUrl("division", array("id"=>$data->primaryKey))',
                			'icon'=>'icon-th-large icon-white',
                			'options'=>array(
                				"class"=>"btn btn-small btn-danger",
                				'title'=>'Divisiones Contactos'
                			),
                		),                   	
                'view'=> array(                			
                			'icon'=>'icon-eye-open icon-white',
                			'options'=>array(
                				"class"=>"btn btn-small btn-primary",
                			),
                		),  
            ),				
		),
			
		
		
		array('name'=>'id_usuario', 'type'=>'raw', 'value' => (Yii::app()->session['root'] ? 'CHtml::link($data->id_usuario, "http://localhost/adminer-4.0.3.php?pgsql=10.10.1.20&username=dbmaster&db=master-aimar&ns=public&select=usuarios_empresas&columns[0][fun]=&columns[0][col]=&where[0][col]=id_usuario&where[0][op]=%3D&where[0][val]=".$data->id_usuario."&where[01][col]=&where[01][op]=%3D&where[01][val]=&order[0]=&limit=50&text_length=100" , array("class"=>"btn btn-small btn-info btn-block", "title"=>"Editar Usuario", "target"=>"_blank"))' : '$data->id_usuario'),
		//'htmlOptions'=>array('style'=>'white-space:nowrap'),
		
		'headerHtmlOptions'=>array('style'=>'white-space:nowrap;'),
		
		),
		
		array('name'=>'pw_name', 'htmlOptions'=>array('style'=>'white-space: nowrap;')),
		
		'dominio',
		
		array('name'=>'pw_gecos', 'htmlOptions'=>array('style'=>'white-space: nowrap;')),
		
		array('name'=>'tipo_usuario','value'=> 'isset($data->tipoUsuario) ? $data->tipoUsuario->descripcion_usuario : $data->tipo_usuario '),

		//array('name'=>'pais','value'=> 'isset($data->pais0) ? $data->pais0->nombre : $data->pais '),
		'pais',
		
		'level',
		'pw_activo',
		'locode',
		/*
		'pw_uid',
		'pw_gid',		
		'pw_passwd',
		'pw_dir',
		'pw_shell',
		'pw_codigo_tributario',
		'pw_correo',
		//array('name'=>'id_usuario_reg','value'=> 'isset($data->idUsuarioReg) ? $data->idUsuarioReg->pw_name : $data->id_usuario_reg '),
		'modificado',
		
		'planilla_numero',
		'pw_ultimo_acceso',
		'pw_passwd_dias',
		'pw_passwd_fecha',
		'pw_user_ip',
		'pw_sis_id',
		*/
		
	),
)); ?>






<?php  
Yii::app()->clientScript->registerScript("menu", "
$(document).ready(function() {
	
   	/*$(\"input[name='UsuariosEmpresas[id_usuario]'\").css('width','60px');
	$('.items tbody tr td').css('font-size', '10px');*/

});
"); 
?>

<?php
/*Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	$('#myModalSearch').modal('show');
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('usuarios-empresas-grid', {
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
