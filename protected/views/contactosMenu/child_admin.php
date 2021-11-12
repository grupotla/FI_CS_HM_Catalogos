
<?php  $this->asDialog = true; ?> 

<?php  $dataProvider = new CArrayDataProvider($rawData=$model->contactos-menu, array()); ?> 

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'contactos-menu-grid',
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
		'mn_id',
		'mn_sort',
		'mn_parent',
		'mn_title_short',
		'mn_title_long',
		'mn_viewer',
		/*
		'mn_control',
		'mn_action',
		'mn_layout',
		'mn_st',
		'mn_us_id',
		'mn_dt',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',			
			'template'=>'{update}', //{delete}',
			'header' => CHtml::link('<span class="icon-plus icon-white"></span>',Yii::app()->controller->createUrl('/ContactosMenu/create',array("button"=>1, "text" => "Create ContactosMenu")),array('class'=>'btn btn-small btn-primary','onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"Create ContactosMenu",1); return false; }', 'style' => 'display:' . (Yii::app()->session['permisos']['contactosMenu']['contactosMenu']['create'] == 1 ? 'inline' : 'none'))),			
            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/ContactosMenu/update", array("id"=>$data->primaryKey,"button"=>2, "text" => "Update ContactosMenu"))',                	 	
                       	
						'options'=>array(
    	                    
    						
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"Update ContactosMenu",2); return false; }',
	                    ),
	                    'visible' => Yii::app()->session['permisos']['contactosMenu']['contactosMenu']['update'] == 1 ? 'true' : 'false',
	                    /*
	                    
	                    
	                    
                   	),
                'delete'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/ContactosMenu/delete", array("id"=>$data->primaryKey))',                        	),                   	
            ),				
		),
	),
)); ?>


<?php  $this->asDialog = false; ?> 