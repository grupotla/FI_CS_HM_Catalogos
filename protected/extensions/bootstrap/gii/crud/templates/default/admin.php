<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
//$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(	
	Yii::t('app','".$this->modelClass."')=>array('index'),	
	Yii::t('app','Manage'),
);\n";
?>

$this->menu=array(
	
	array('label'=>Yii::t('app','List').' '.Yii::t('app','<?php echo $this->modelClass; ?>'),'url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' '.Yii::t('app','<?php echo $this->modelClass; ?>'),'url'=>array('create','button'=>1, 'text'=>Yii::t('app','Create').' '.Yii::t('app','<?php echo $this->modelClass; ?>')), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, 'visible'=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	//array('label'=>Yii::t('app','Search'),'url'=>array('search'), 'icon'=>TbHtml::ICON_SEARCH . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Excel'),'url'=>array('GenerateExcel'), 'icon'=>TbHtml::ICON_TH . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['excel'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','Pdf'),'url'=>array('GeneratePdf'), 'icon'=>TbHtml::ICON_BOOK . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['pdf'] == 1 ? true : false),	
);
?>


<h1><?php echo "<?php echo Yii::t('app','Manage').' '.Yii::t('app','".$this->modelClass."'); ?>"; ?> </h1>

<?php //echo $this->class2name($this->modelClass); ?>
	


<?php //echo $this->pluralize($this->class2name($this->modelClass)); ?>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
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
<?php
$rel = $this->generateLinks();
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
		
	if($column->isForeignKey == 1)
		echo "\t\t//array('name'=>'{$column->name}','value'=> 'isset(\$data->{$rel[$column->name]['relationName']}) ? \$data->{$rel[$column->name]['relationName']}->{$rel[$column->name]['desc']} : \$data->{$column->name} '),\n";
	else			
		if(stripos($column->dbType,'enum')!==false)			
			echo "\t\tarray('name'=>'{$column->name}','filter'=>ZHtml::enumDropDownList(\$model,'{$column->name}')),\n";
			//'htmlOptions' =>array('style' => 'width:30px',),
		else			
			echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',			
			'template'=>'{update}{view}',
            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("update", array("id"=>$data->primaryKey))',
						'options'=>array(    						
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t("app","Update").' <?php echo $this->modelClass; ?>",2); return false;}',
	                    ),
	                    'visible'=>Yii::app()->session['p']['update'] == 1 ? 'true' : 'false',
                   	),
            ),				
		),
	),
)); ?>

<?php echo "<?php\n"; ?>
/*Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	$('#myModalSearch').modal('show');
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo "<?php ob_start(); ?>\n"; ?>

<p>
Opcionalmente puedes ingresar operadores de comparacion (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada una de tus valores de busqueda para especificar como debe realizarse la comparacion.
</p>

<div class="search-form" style="display:none">
<?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->

<?php echo "<?php \$render_search = ob_get_contents(); ob_end_clean(); ?>\n"; ?>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbModal', array(
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
