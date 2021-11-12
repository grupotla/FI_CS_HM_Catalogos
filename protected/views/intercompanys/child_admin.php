
<?php  $this->asDialog = true; ?> 

<?php  $dataProvider = new CArrayDataProvider($rawData=$model->Intercompanys, array()); ?> 

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
	'id'=>'intercompanys-grid',
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
		'id_intercompany',
		'nombre_intercompany',
		'nit',
		'tiporegimen',
		'direccion',
		'countries',
		/*
		'id_empresa_baw',
		'fecha_creacion',
		'usuario_creacion',
		'activo',
		'nombre_comercial',
		'ruc',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',			
			'template'=>'{update}', //{delete}',
			'header' => CHtml::link('<span class="icon-plus icon-white"></span>',Yii::app()->controller->createUrl('/Intercompanys/create'),array('class'=>'btn btn-small btn-primary','onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t('app','Create').' '.Yii::t('app','Intercompanys').'",1); return false; }', 'style' => 'display:' . (Yii::app()->session['permisos']['intercompanys']['intercompanys']['create'] == 1 ? 'inline' : 'none'))),			
            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/Intercompanys/update", array("id"=>$data->primaryKey))',
						'options'=>array(
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t('app','Update').' '.Yii::t('app','Intercompanys').'",2); return false; }',
	                    ),
	                    'visible' => Yii::app()->session['permisos']['intercompanys']['intercompanys']['update'] == 1 ? 'true' : 'false',
                   	),
                'delete'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/Intercompanys/delete", array("id"=>$data->primaryKey))',),                   	
            ),				
		),
	),
)); ?>


<?php  $this->asDialog = false; ?> 