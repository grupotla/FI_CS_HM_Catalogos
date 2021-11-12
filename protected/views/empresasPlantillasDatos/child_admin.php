
<?php  $this->asDialog = true; ?> 

<?php  $dataProvider = new CArrayDataProvider($rawData=$model->EmpresasPlantillasDatos, array()); ?> 

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
	'id'=>'empresas-plantillas-datos-grid',
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
		'id',
		//array('name'=>'country','value'=> 'isset($data->country0) ? $data->country0->logo : $data->country '),
		//array('name'=>'sistema','value'=> 'isset($data->sistema0) ? $data->sistema0->logo : $data->sistema '),
		//array('name'=>'doc_id','value'=> 'isset($data->doc) ? $data->doc->logo : $data->doc_id '),
		//array('name'=>'id_etiqueta','value'=> 'isset($data->idEtiqueta) ? $data->idEtiqueta->etiqueta_id : $data->id_etiqueta '),
		'etiqueta_style',
		/*
		'campo_tabla',
		'campo_style',
		'formato_campo',
		'campo_tabla_right',
		'orden',
		'activo',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',			
			'template'=>'{update}', //{delete}',
			'header' => CHtml::link('<span class="icon-plus icon-white"></span>',Yii::app()->controller->createUrl('/EmpresasPlantillasDatos/create'),array('class'=>'btn btn-small btn-primary','onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t('app','Create').' '.Yii::t('app','EmpresasPlantillasDatos').'",1); return false; }', 'style' => 'display:' . (Yii::app()->session['permisos']['empresasPlantillasDatos']['empresasPlantillasDatos']['create'] == 1 ? 'inline' : 'none'))),			
            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/EmpresasPlantillasDatos/update", array("id"=>$data->primaryKey))',
						'options'=>array(
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t('app','Update').' '.Yii::t('app','EmpresasPlantillasDatos').'",2); return false; }',
	                    ),
	                    'visible' => Yii::app()->session['permisos']['empresasPlantillasDatos']['empresasPlantillasDatos']['update'] == 1 ? 'true' : 'false',
                   	),
                'delete'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/EmpresasPlantillasDatos/delete", array("id"=>$data->primaryKey))',),                   	
            ),				
		),
	),
)); ?>


<?php  $this->asDialog = false; ?> 