
<?php  $this->asDialog = true; ?> 

<?php  //$dataProvider = new CArrayDataProvider($rawData=$model->carriersCreditos, array()); ?> 

<?php 	
		$criteria=new CDbCriteria;
		$criteria->condition = "carrier_id=".$model->CarrierID;								
		$dataProvider = new CActiveDataProvider('CarriersCredito', array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'id_car_cred ASC',
			),			
		));
?> 

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'carriers-credito-grid',
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
		//'id_car_cred',
		array('name'=>'carrier_id','value'=> 'isset($data->carrier) ? $data->carrier->name : $data->carrier_id '),
		array('name'=>'id_empresa','value'=> 'isset($data->idEmpresa) ? $data->idEmpresa->nombre_empresa : $data->id_empresa '),
		'activo',
		'secuencia',
		array('name'=>'id_usuario','value'=> 'isset($data->idUsuario) ? $data->idUsuario->pw_name : $data->id_usuario '),
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
			'template'=>'{update} {delete}',
			'header' => CHtml::link('<span class="icon-plus icon-white"></span>',Yii::app()->controller->createUrl('/CarriersCredito/create',array("carrier_id"=>$model->CarrierID,"button"=>1, "text" => "Create CarriersCredito")),array('class'=>'btn btn-small btn-primary','onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"Create CarriersCredito",1); return false; }', 'style' => 'display:' . (Yii::app()->session['permisos']['carriersCredito']['carriersCredito']['create'] == 1 ? 'inline' : 'none'))),			
			
			'htmlOptions' => array('style'=>'white-space:nowrap;'),
			
            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/CarriersCredito/update", array("id"=>$data->primaryKey,"button"=>2, "text" => "Update CarriersCredito"))',
                	 	"icon" => "icon-pencil icon-white",
						'options'=>array(
    						"class"=>"btn btn-small btn-info", 
    						'title'=>'Editar Registro',
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"Update CarriersCredito",2); return false; }',
	                    ),
	                    'visible' => Yii::app()->session['permisos']['carriersCredito']['carriersCredito']['update'] == 1 ? 'true' : 'false',
                   	),
                'delete'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/CarriersCredito/delete", array("id"=>$data->primaryKey))',  
               			'icon'=>'icon-trash icon-white',
               			'options'=>array(
               				"class"=>"btn btn-small btn-danger",
                		),
	                    'visible' => Yii::app()->session['permisos']['carriersCredito']['carriersCredito']['delete'] == 1 ? 'true' : 'false',
                	),                   	
            ),				
		),
	),
)); ?>


<?php  $this->asDialog = false; ?> 