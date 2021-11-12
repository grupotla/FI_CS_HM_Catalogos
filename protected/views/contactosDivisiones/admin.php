<?php
$this->breadcrumbs=array(
	'Contactos Divisiones'=>array('index'),
	'Manage',
);

$this->menu=array(

	array('label'=>Yii::t('app','List').' ContactosDivisiones','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),

	array('label'=>Yii::t('app','Create').' ContactosDivisiones','url'=>array('create','button'=>1, 'text'=>Yii::t('app','Create').' ContactosDivisiones'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, 'visible'=> Yii::app()->session['p']['create'] == 1 ? true : false),

	//array('label'=>Yii::t('app','Search'),'url'=>array('search'), 'icon'=>TbHtml::ICON_SEARCH . " " . TbHtml::ICON_COLOR_WHITE),

	array('label'=>Yii::t('app','Excel'),'url'=>array('GenerateExcel'), 'icon'=>TbHtml::ICON_TH . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['excel'] == 1 ? true : false),

	array('label'=>Yii::t('app','Pdf'),'url'=>array('GeneratePdf'), 'icon'=>TbHtml::ICON_BOOK . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['pdf'] == 1 ? true : false),
);
?>



<h1><?php echo Yii::t('app','Manage'); ?> Contactos Divisiones</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'contactos-divisiones-grid',
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
			'template'=>' {update} ',			
			//'header'=>'Accion',
            'buttons'=>array(
                'update'=>
                    array(
                	 	'url'=>'$this->grid->controller->createUrl("update", array("id"=>$data->primaryKey))',
                	 	"icon"=>"icon-pencil icon-white",
						'options'=>array(
							"class"=>"btn btn-small btn-info",
							'title'=>'Editar Registro',
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t("app","Update").' ContactosDivisiones",2); return false;}',
	                    ),
	                    'visible'=>Yii::app()->session['p']['update'] == 1 ? 'true' : 'false',
                   	),
            ),
		),

		array('name'=>'id', 'type'=>'raw', 'value' => (Yii::app()->session['root'] ? 'CHtml::link($data->id, "http://localhost/adminer-4.0.3.php?pgsql=10.10.1.20&username=dbmaster&db=master-aimar&ns=public&select=contactos_divisiones&columns[0][fun]=&columns[0][col]=&where[0][col]=id&where[0][op]=%3D&where[0][val]=".$data->id."&where[01][col]=&where[01][op]=%3D&where[01][val]=&order[0]=&limit=50&text_length=100", array("class"=>"btn btn-small btn-info btn-block", "title"=>"Editar Division", "target"=>"_blank"))' : '$data->id')),


		array('name'=>'id_catalogo', 'type'=>'raw', 'value' => (Yii::app()->session['root'] ? 'CHtml::link($data->id_catalogo, "http://localhost/adminer-4.0.3.php?pgsql=10.10.1.20&username=dbmaster&db=master-aimar&ns=public&select=usuarios_empresas&columns[0][fun]=&columns[0][col]=&where[0][col]=id_usuario&where[0][op]=%3D&where[0][val]=".$data->id_catalogo."&where[01][col]=&where[01][op]=%3D&where[01][val]=&order[0]=&limit=50&text_length=100" , array("class"=>"btn btn-small btn-info btn-block", "title"=>"Editar Usuario", "target"=>"_blank"))' : '$data->id_catalogo'),

		'headerHtmlOptions'=>array('style'=>'white-space:nowrap;'),
		),

		array('name'=>'nombre','headerHtmlOptions'=>array('style'=>'white-space:nowrap;'),),
		array('name'=>'telefono'),

		array('name'=>'tipo_persona','value'=> 'isset($data->tipoPersona) ? $data->tipoPersona->descripcion : $data->tipo_persona '),

		array('name'=>'cargo'),
		array('name'=>'area','value'=>'str_replace(","," ",str_replace("[","",str_replace("]","",str_replace("\"","",$data->area))))'),

		array('name'=>'pais','value'=>'str_replace(","," ",str_replace("[","",str_replace("]","",str_replace("\"","",$data->pais))))'),

		array('name'=>'status','value'=> 'isset($data->status0) ? $data->status0->descripcion : $data->status '),

		array('name'=>'copia'),

		array('name'=>'rechazo'),

		array('name'=>'email','type'=>'raw','value'=>'

		"<span title=\"Email Principal\" style=\"color:navy;font-weight:bolder\">" . $data->email . "</span> " .

		(trim(str_replace("{","",str_replace("}","",str_replace(","," ",str_replace("[","",str_replace("]","",str_replace("\"","",$data->contactoxpais))))))) == "0" ? "" :

		trim(str_replace("{","",str_replace("}","",str_replace(","," ",str_replace("[","",str_replace("]","",str_replace("\"","",$data->contactoxpais))))))))

		'),
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
	$.fn.yiiGridView.update('contactos-divisiones-grid', {
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
