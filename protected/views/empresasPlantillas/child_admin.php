
<?php  $this->asDialog = true; ?> 

<?php  $dataProvider = new CArrayDataProvider($rawData=$model->plantillas, array()); ?> 

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
	'id'=>'empresas-plantillas-grid',
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
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',			
			'template'=>'{update} {delete}',
			'header' => CHtml::link('<span class="icon-plus icon-white"></span>',Yii::app()->controller->createUrl('/EmpresasPlantillas/create',array("country" => $model->country, "button"=>1,"text" => Yii::t('app','Create')." Plantillas")),array('class'=>'btn btn-small btn-primary','onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t('app','Create').' '.Yii::t('app','EmpresasPlantillas').'",1); return false; }', 
			'style'=>'width:60px;'
			)),			
			
            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/EmpresasPlantillas/update", array("id"=>$data->primaryKey, "button"=>2,"text" => "'.Yii::t('app','Update').' Plantillas"))',
						 'icon'=>'icon-pencil icon-white',
						 'options'=>array(
							//"style"=>"text-alignment:left",
							"class"=>"btn btn-small btn-info",
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t('app','Update').' '.Yii::t('app','EmpresasPlantillas').'",2); return false; }',
	                    ),
	                    'visible' => 'true', //Yii::app()->session['permisos']['empresasPlantillas']['empresasPlantillas']['update'] == 1 ? 'true' : 'false',
					   ),
/*
				'campos'=>
					   array(                    	
							'url'=>'$this->grid->controller->createUrl("/EmpresasPlantillasDatos/view", array("country"=>$data->country, "sistema"=>$data->sistema, "doc_id"=>$data->doc_id, "text" => "'.Yii::t('app','Update').' Plantillas"))',
							'icon'=>'icon-file icon-white',
							'options'=>array(
								//"style"=>"text-alignment:left",
							   "class"=>"btn btn-small btn-warning",
							   'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t('app','Update').' '.Yii::t('app','EmpresasPlantillas').'",0); return false; }',
						   ),
						   'visible' => '$data->sistema == "FCL" || $data->sistema == "LCL"? true : false', //Yii::app()->session['permisos']['empresasPlantillas']['empresasPlantillas']['update'] == 1 ? 'true' : 'false',
						  ),
   					 */  
                'delete'=>
                    array(                    	
						 'url'=>'$this->grid->controller->createUrl("/EmpresasPlantillas/delete", array("id"=>$data->primaryKey))',
						 'icon'=>'icon-trash icon-white',
						 'options'=>array(
							//"style"=>"text-alignment:left",
							"class"=>"btn btn-small btn-danger",
    						//'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t('app','Update').' '.Yii::t('app','EmpresasPlantillas').'",2); return false; }',
	                    ),
					),
            ),				
		),

		array(
			'header' => 'DOCS',
			'name'  => 'id',
			'value' => '($data->sistema == "FCL" || $data->sistema == "LCL") ?  
			CHtml::link("<span class=\"icon-file icon-white\"></span>",
				Yii::app()->createUrl("EmpresasPlantillasDatos/view"			
					,array("country"=>$data->country, "sistema"=>$data->sistema, "doc_id"=>$data->doc_id, "text" => "'.Yii::t("app","Update").' Plantillas")					
				)	
				,array(
					"class"=>"btn btn-small btn-warning",
					"onclick"=>"crud_frame_adjust($(this).attr(\"href\"),\''.Yii::t('app','Update').' '.Yii::t('app','EmpresasPlantillas').'\',0); return false;",
				)
			) : ""'
			,'type'  => 'raw'
		),
		array(
			'name'=>'sistema'
			,'header'=>'Modulo'
		),		
/*
		array(
			'name'=>'id_vendedor',
			'filter' => CHtml::listData( Clientes::model()->findAllBySql("select distinct id_vendedor from clientes order by id_vendedor"), 'id_vendedor', 'id_vendedor'),
			'value'=>'count($data->direcciones) > 0 ? "<span title=\"".$data->id_vendedor."\">".$data->idVendedor->pw_gecos."<span>" : "<span title=\"No se ha ingresado direccion\">".$data->idVendedor->pw_gecos."</span>"','type'=>'raw',
			'headerHtmlOptions'=>array('style'=>'white-space:nowrap;'),
			'cssClassExpression'=>'count($data->direcciones) == 0 ? "red" : ($data->id_estatus == 1 ? "on" : ($data->id_estatus == 2 ? "off" : "out"))'
		),
*/
		array('name'=>'doc_id','value'=> 'isset($data->doc_id) ? (isset($data->docs->nombre) ? $data->doc_id . " - " . $data->docs->nombre : "") : $data->doc_id', 'header'=>'Plantilla'),
		array('name'=>'titulo', 'header'=>'Titulo'),
		array('name'=>'edicion', 'header'=>'Edición'),
		'activo',
	),
)); ?>


<?php  $this->asDialog = false; ?> 