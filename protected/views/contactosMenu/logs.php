<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Manage',
);

$this->menu=array(

	array('label'=>Yii::t('app','List').' Clientes','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),

	array('label'=>Yii::t('app','Create').' Clientes','url'=>array('create','button'=>1, 'text'=>Yii::t('app','Create').' Clientes'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, 'visible'=> Yii::app()->session['p']['create'] == 1 ? true : false),

	//array('label'=>Yii::t('app','Search'),'url'=>array('search'), 'icon'=>TbHtml::ICON_SEARCH . " " . TbHtml::ICON_COLOR_WHITE),

	array('label'=>Yii::t('app','Excel'),'url'=>array('GenerateExcel'), 'icon'=>TbHtml::ICON_TH . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['excel'] == 1 ? true : false),

	array('label'=>Yii::t('app','Pdf'),'url'=>array('GeneratePdf'), 'icon'=>TbHtml::ICON_BOOK . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['pdf'] == 1 ? true : false),
);
?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'clientes-grid',
	'dataProvider'=>$dataProvider,
	'type' => 'hover striped bordered condensed',
	'template' => "{summary}\n{pager}\n{items}\n{summary}\n{pager}",
	'htmlOptions'=>array('style'=>'cursor: pointer;'),

	'filter' => $filtersForm,

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


		array('name'=>'post','type'=>'raw','filter'=>'','value'=>'

			$data["post"] == "" ?

			CHtml::link("<span class=\"icon-eye-open icon-white\"></span>","",array("class"=>"btn btn-small btn-block", "title"=>"","url"=>"",))

			:

			CHtml::link("<span class=\"icon-eye-open icon-white\"></span>","",array("class"=>"btn btn-small btn-warning btn-block", "title"=>"POST",
			"data-toggle"=>"modal", "data-target"=>"#myModal", "target"=>"_blank",
			"url"=>$this->grid->controller->createUrl("logsview", array("datos"=>$data["post"])),
			"onclick"=>"crud_frame_adjust($(this).attr(\"url\"),\"Ver Post\",0);",))
			'),



		array('name'=>'get','type'=>'raw','filter'=>'','value'=>'

			$data["get"] == "" ?

			CHtml::link("<span class=\"icon-eye-open icon-white\"></span>","",array("class"=>"btn btn-small btn-block", "title"=>"","url"=>"",))

			:

			CHtml::link("<span class=\"icon-eye-open icon-white\"></span>","",array("class"=>"btn btn-small btn-success btn-block", "title"=>"GET",
			"data-toggle"=>"modal", "data-target"=>"#myModal", "target"=>"_blank",
			"url"=>$this->grid->controller->createUrl("logsview", array("datos"=>$data["get"])),
			"onclick"=>"crud_frame_adjust($(this).attr(\"url\"),\"Ver Get\",0);",))

			'),

		'fecha',
		'hora',
		'id',
	    'nm',
	    'ip',

	    //'mn',

	    'ctrl',
	    'action',
			//'auth',

	    'post',

	    'get',





	),
)); ?>
