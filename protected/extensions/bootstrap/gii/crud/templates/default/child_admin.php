<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
 
 if(function_exists('lcfirst') === false) {
    function lcfirst($str) {
        $str[0] = strtolower($str[0]);
        return $str;
    }
}

$rel1 = $this->generateLinks();

//$Relations = $this->generateRelations();
/*echo "<pre>";
print_r($Relations);
echo "</pre>";*/
/*
echo "<?php\n\$dato = array();\n";
		foreach($Relations as $key => $value){ 
			foreach($value as $j => $items){
				$ChildModel = '';
				foreach($items as $i => $item){ 			
					if ($i == 'ChildModel')
						$ChildModel = $item;
				}
				foreach($items as $i => $item){ 			
					echo "\$dato['$key']['$ChildModel']['$i'] = '".$item."';\n";		
				}
			}
		}
echo "echo \$dato[get_class(\$model)]['".$this->modelClass."']['ChildRel']; ?>"; 
*/
?>

<?php echo "<?php "?> $this->asDialog = true; <?php echo "?>"?> 

<?php echo "<?php "?> $dataProvider = new CArrayDataProvider($rawData=$model-><?php echo $this->modelClass; ?>, array()); <?php echo "?>"?> 

<?php echo "<?php "?>	
		/*$criteria=new CDbCriteria;
		$criteria->condition = "id_cliente=".$model->id_cliente;								
		$dataProvider = new CActiveDataProvider('Direcciones', array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'id_direccion ASC',
			),			
		));*/
?> 

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider'=>$dataProvider,
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
	'columns'=>array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
		
	if($column->isForeignKey == 1)
		echo "\t\t//array('name'=>'{$column->name}','value'=> 'isset(\$data->{$rel1[$column->name]['relationName']}) ? \$data->{$rel1[$column->name]['relationName']}->{$rel1[$column->name]['desc']} : \$data->{$column->name} '),\n";
	else		
		echo "\t\t'".$column->name."',\n";

		//echo "\t\t//array('name'=>'{$column->name}', 'header'=>''),\n";

}
if($count>=7)
	echo "\t\t*/\n";
?>
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',			
			'template'=>'{update}', //{delete}',
			'header' => CHtml::link('<span class="icon-plus icon-white"></span>',Yii::app()->controller->createUrl('/<?php echo $this->modelClass; ?>/create'),array('class'=>'btn btn-small btn-primary','onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t('app','Create').' '.Yii::t('app','<?php echo $this->modelClass; ?>').'",1); return false; }', 'style' => 'display:' . (Yii::app()->session['permisos']['<?php echo lcfirst($this->modelClass); ?>']['<?php echo lcfirst($this->modelClass); ?>']['create'] == 1 ? 'inline' : 'none'))),			
            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/<?php echo $this->modelClass; ?>/update", array("id"=>$data->primaryKey))',
						'options'=>array(
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t('app','Update').' '.Yii::t('app','<?php echo $this->modelClass; ?>').'",2); return false; }',
	                    ),
	                    'visible' => Yii::app()->session['permisos']['<?php echo lcfirst($this->modelClass); ?>']['<?php echo lcfirst($this->modelClass); ?>']['update'] == 1 ? 'true' : 'false',
                   	),
                'delete'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/<?php echo $this->modelClass; ?>/delete", array("id"=>$data->primaryKey))',),                   	
            ),				
		),
	),
)); ?>


<?php echo "<?php "?> $this->asDialog = false; <?php echo "?>"?> 