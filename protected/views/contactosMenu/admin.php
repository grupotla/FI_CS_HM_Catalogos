<?php
$this->breadcrumbs=array(
	'Contactos Menus'=>array('index'),
	'Manage',
);

$this->menu=array(
	
	array('label'=>'List ContactosMenu','url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>'Create ContactosMenu','url'=>array('create','button'=>1, 'text'=>'Create ContactosMenu'), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, 'visible'=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	//array('label'=>'Advanced Search','url'=>array('search'), 'icon'=>TbHtml::ICON_SEARCH . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>'Excel','url'=>array('GenerateExcel'), 'icon'=>TbHtml::ICON_TH . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['excel'] == 1 ? true : false),
	
	array('label'=>'Pdf','url'=>array('GeneratePdf'), 'icon'=>TbHtml::ICON_BOOK . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['pdf'] == 1 ? true : false),	
);
?>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<h1>Manage Contactos Menus</h1>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'contactos-menu-grid',
		'dataProvider'=>$gridDataProvider,
		'type' => 'hover striped bordered condensed',
		//'filter' => true,			

		//'template'=>"{items}",
	
		'columns'=>array(
			array('name'=>'id', 'header' => 'No'),
			array('name'=>'parent', 'header'=>'Menu', 'type'=>'raw', 'headerHtmlOptions'=>array('style'=>'width:150px'),),
			array('name'=>'child', 'header'=>'Opcion', 'type'=>'raw', 'headerHtmlOptions'=>array('style'=>'width:250px'),),
			array('name'=>'panel', 'header'=>'Paneles', 'type'=>'raw', 'headerHtmlOptions'=>array('style'=>'width:250px'),),
			array('name'=>'control', 'header'=>'Control', 'type'=>'raw', 'headerHtmlOptions'=>array('style'=>'width:100px'),),
			array('name'=>'sort', 'header' => 'Orden'),
			array('name'=>'view', 'header' => 'Acceso'),
			array('name'=>'action', 'header' => 'Vista'),
			array(
			'name'=>'stat', 
			'header' => 'Estatus',
			//'filter'=>CHtml::listData(ContactosEnums::model()->findAll(array("condition"=>"catalogo='status'","order"=>"")),'indice','descripcion'),
	
				
			),			
		),
		
	)); ?>
