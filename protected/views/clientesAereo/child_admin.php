
<?php  $this->asDialog = true; ?> 

<?php  //$dataProvider = new CArrayDataProvider($rawData=$model->aereos, array()); ?> 

<?php	
		$criteria=new CDbCriteria;
		$criteria->condition = "id_cliente=".$model->id_cliente;								
		$dataProvider = new CActiveDataProvider('ClientesAereo', array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'no_cuenta ASC',
			),			
		));
?> 

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'clientes-aereo-grid',
	'dataProvider'=>$dataProvider,
	'type' => 'hover striped bordered condensed',
	'selectableRows'=>1,	
	'template' => "{summary}\n{pager}\n{items}",//\n{summary}\n{pager}",	
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
		//'id_cliente',
		'no_cuenta',
		'no_iata',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',			
			'template'=>'{update} {delete}',
			'header' => CHtml::link('<span class="icon-plus icon-white"></span>',Yii::app()->controller->createUrl('/ClientesAereo/create',array("id_cliente" => $model->id_cliente, "button"=>1, "text" => "Crear ClientesAereo")),array('class'=>'btn btn-small btn-primary','onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"Crear ClientesAereo",1); return false; }', 'style' => 'display:' . (Yii::app()->session['permisos']['clientesAereo']['clientesAereo']['create'] == 1 && Yii::app()->controller->action->id <> 'view' ? 'inline' : 'none'))),			
			
			'htmlOptions' => array('style'=>'white-space:nowrap;'),
			
            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/ClientesAereo/update", array("id"=>$data->primaryKey, "button"=>2,"text" => "Update ClientesAereo"))',                	 	
                	 	"icon" => "icon-pencil icon-white",
						'options'=>array(
    						"class"=>"btn btn-small btn-info", 
    						'title'=>'Editar Registro',
    	                    
    						
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"Update ClientesAereo",2); return false; }',
	                    ),
	                    'visible' => Yii::app()->session['permisos']['clientesAereo']['clientesAereo']['update'] == 1 && Yii::app()->controller->action->id <> 'view' ? 'true' : 'false',
                   	),
                'delete'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/ClientesAereo/delete", array("id"=>$data->primaryKey))',                   			'icon'=>'icon-trash icon-white',
               			'options'=>array(
               				"class"=>"btn btn-small btn-danger",
                		),
	                    'visible' => Yii::app()->session['permisos']['clientesAereo']['clientesAereo']['delete'] == 1 && Yii::app()->controller->action->id <> 'view' ? 'true' : 'false',
                	),                   	
            ),				
		),
	),
)); ?>


<?php  $this->asDialog = false; ?> 