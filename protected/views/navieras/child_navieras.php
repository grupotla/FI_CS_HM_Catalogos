
<?php  $this->asDialog = true; ?> 

<?php  $dataProvider = new CArrayDataProvider($rawData=$model->representantes_navieras, array()); ?> 

<?php 	
		/*$criteria=new CDbCriteria;
		$criteria->condition = "id_cliente=".$model->id_cliente;								
		$dataProvider = new CActiveDataProvider('Direcciones', array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'id_direccion ASC',
			),			
		));*/
?> 

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'navieras-grid',
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
		array('name'=>'id','cssClassExpression'=>'$data->activo ? "" : "off"',),

		array('name'=>'id_naviera_representante',
			'value'=>'$data->id_naviera_representante . " - " . $data->idNavieraRepresentante->nombre',
			'cssClassExpression'=>'$data->activo == 1 ? "" : "off"',
		),
		
		array('name'=>'id_naviera', 'type'=>'raw', 'value' => 'CHtml::link($data->id_naviera . " - " . $data->idNaviera->nombre, 
			array("/navieras/update","id"=>$data->id_naviera) , 
			array("title"=>"Ver Naviera",))',
			'cssClassExpression'=>'$data->activo == 1 ? "" : "off"',
		),

		array('name'=>'activo', 'value'=>'$data->activo ? "activo" : "inactivo"','cssClassExpression'=>'$data->activo ? "" : "off"'),
		
		array('name'=>'observaciones', 'cssClassExpression'=>'$data->activo ? "" : "off"'),
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',			
			'template'=>'{update} {delete}',
			'header' => CHtml::link('<span class="icon-plus icon-white"></span>',Yii::app()->controller->createUrl('/NavierasRepresentantes/create', array('id_naviera'=>0, 'id_representante'=>$model->id_naviera)),array('class'=>'btn btn-info','onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t("app","Vincular").' NAvieras",1); return false; }', 'style' => 'float:left;display:' . (Yii::app()->session['permisos']['navieras']['navieras']['create'] == 1 ? 'inline' : 'none'))),			

			'htmlOptions'=>array('style'=>'white-space: nowrap;'),

            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/NavierasRepresentantes/update", array("id"=>$data->primaryKey, "id_naviera"=>0, "id_representante"=>$data->id_naviera_representante))',
                	 	'icon'=>'icon-pencil icon-white',
						'options'=>array(
							'class'=>'btn btn-info',
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t("app","Vincular").' Navieras",2); return false; }',
	                    ),
	                    //'visible' => Yii::app()->session['permisos']['navieras']['navieras']['update'] == 1 ? 'true' : 'false',
	                    'visible' => '$data->activo ? true : false',


                   	),
                   	
                'delete'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/NavierasRepresentantes/delete", array("id"=>$data->primaryKey, "id_naviera"=>$data->id_naviera, "id_naviera_representante"=>$data->id_naviera_representante ))',  

                	 	'icon'=>'icon-trash icon-white',
						'options'=>array(
							'class'=>'btn btn-warning',
	                    ),
                	 	//'visible' => '$data->activo ? true : false',
                	 	//'click' => 'function(){ return confirm("Confirme esta accion porfavor");}'
                	 ), 
            ),				
		),
	),
)); ?>


<?php  $this->asDialog = false; ?> 