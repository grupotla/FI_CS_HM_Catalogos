
<?php  $this->asDialog = true; ?> 

<?php  $dataProvider = new CArrayDataProvider($rawData=$model->EmpresasParametros, array()); ?> 

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
	'id'=>'empresas-parametros-grid',
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
		'country',
		'nit',
		'nombre_empresa',
		'direccion',
		'telefonos',
		/*
		'home_page',
		'fact_elect_email',
		'fact_elect_codigo',
		'logo',
		'activo',
		'creacion_user',
		'creacion_date',
		'modifica_user',
		'modifica_date',
		'trackactivo',
		'trackpuerto',
		'trackmailserver',
		'trackauth',
		'trackfromaddress',
		'trackpassword',
		'ocean_error_reporting_mail',
		'ocean_idioma_id',
		'ocean_dias_notificar_arribo',
		'ocean_factor_riesgo_pais',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',			
			'template'=>'{update}', //{delete}',
			'header' => CHtml::link('<span class="icon-plus icon-white"></span>',Yii::app()->controller->createUrl('/EmpresasParametros/create'),array('class'=>'btn btn-small btn-primary','onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t('app','Create').' '.Yii::t('app','EmpresasParametros').'",1); return false; }', 'style' => 'display:' . (Yii::app()->session['permisos']['empresasParametros']['empresasParametros']['create'] == 1 ? 'inline' : 'none'))),			
            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/EmpresasParametros/update", array("id"=>$data->primaryKey))',
						'options'=>array(
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t('app','Update').' '.Yii::t('app','EmpresasParametros').'",2); return false; }',
	                    ),
	                    'visible' => Yii::app()->session['permisos']['empresasParametros']['empresasParametros']['update'] == 1 ? 'true' : 'false',
                   	),
                'delete'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/EmpresasParametros/delete", array("id"=>$data->primaryKey))',),                   	
            ),				
		),
	),
)); ?>


<?php  $this->asDialog = false; ?> 