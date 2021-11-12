
<?php  $this->asDialog = true; ?> 

<?php  $dataProvider = new CArrayDataProvider($rawData=$model->navieras_representantes, array()); ?> 

<?php 	
		/*$criteria=new CDbCriteria;
		$criteria->condition = "id_cliente=".$model->id_cliente;								
		$dataProvider = new CActiveDataProvider('Navieras', array(
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
		//'id_naviera',
		//'id_naviera_representante',
		
		array('name'=>'id_naviera','value'=>'$data->id_naviera . " - " . $data->idNaviera->nombre',
			'cssClassExpression'=>'$data->activo ? "" : "off"',
		),
			
		array('name'=>'id_naviera_representante', 'type'=>'raw', 'value' => 'CHtml::link($data->id_naviera_representante . " - " . $data->idNavieraRepresentante->nombre, 
			array("/navieras/update","id"=>$data->id_naviera_representante) , 
			array("title"=>"Ver Representante",))',
			'cssClassExpression'=>'$data->activo == 1 ? "" : "off"',
		),

		/*array('name'=>'id_naviera_representante', 'type'=>'raw', 'value' => 'CHtml::link($data->id_naviera_representante, 
			array("/navieras/update","id"=>$data->id_naviera_representante) , 
			array("class"=>"btn btn-small btn-success btn-block", "title"=>"Editar Usuario", "target"=>"_blank"))' ,
			'headerHtmlOptions'=>array('style'=>'white-space:nowrap;'),
		),*/

		array('name'=>'activo', 'value'=>'$data->activo ? "activo" : "inactivo"','cssClassExpression'=>'$data->activo ? "" : "off"'),
		
		array('name'=>'observaciones', 'cssClassExpression'=>'$data->activo ? "" : "off"'),
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',			
			
			'header' => CHtml::link('<span class="icon-plus icon-white"></span>',Yii::app()->controller->createUrl('/NavierasRepresentantes/create', array('id_naviera'=>$model->id_naviera, 'id_representante'=>0)),array('class'=>'btn btn-success','onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t("app","Vincular").' Representantes",1); return false; }', 'style' => 'float:left;display:' . (Yii::app()->session['permisos']['navieras']['navieras']['create'] == 1 ? 'inline' : 'none'))),

            'htmlOptions'=>array('style'=>'white-space: nowrap;'),

			'template'=>'{update} {delete}',

            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/NavierasRepresentantes/update", array("id"=>$data->primaryKey, "id_naviera"=>$data->id_naviera, "id_representante"=>0 ))',
                	 	'icon'=>'icon-pencil icon-white',
						'options'=>array(
							'class'=>'btn btn-success',
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t("app","Vincular").' Representantes",2); return false; }',
	                    ),
	                    //'visible' => Yii::app()->session['permisos']['navieras']['navieras']['update'] == 1 ? 'true' : 'false',
	                    'visible' => '$data->activo ? true : false',
                   	),
                'delete'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/NavierasRepresentantes/delete", array("id"=>$data->primaryKey, "id_naviera"=>$data->id_naviera, "id_naviera_representante"=>$data->id_naviera_representante ))',
                	 	'icon'=>'icon-trash icon-white',
						'options'=>array(
							'class'=>'btn btn-danger',
							//'onclick' => 'function(){ return confirm("Confirme esta accion porfavor");}'                	 	
	                    ),                	 	
                	 	//'visible' => '$data->activo ? true : false',
                	 	//'click' => 'function(){ return confirm("Confirme esta accion porfavor");}'                	 	
                	 ),     
            ),				
		),
	),
)); ?>


<?php  $this->asDialog = false; ?> 