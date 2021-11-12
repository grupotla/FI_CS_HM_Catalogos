
<?php  $this->asDialog = true; ?> 

<?php  $dataProvider = new CArrayDataProvider($rawData=$model->Agentes, array()); ?> 

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
	'id'=>'agentes-grid',
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
		'agente_id',
		'agente',
		'activo',
		'direccion',
		'telefono',
		'fax',
		/*
		'correo',
		'contacto',
		'contabilidad_id',
		'fecha_creacion',
		'hora_creacion',
		'id_grupo',
		//array('name'=>'id_usuario_creacion','value'=> 'isset($data->idUsuarioCreacion) ? $data->idUsuarioCreacion->pw_name : $data->id_usuario_creacion '),
		//array('name'=>'id_usuario_modificacion','value'=> 'isset($data->idUsuarioModificacion) ? $data->idUsuarioModificacion->pw_name : $data->id_usuario_modificacion '),
		'accountno',
		'iatano',
		'defaultval',
		'countries',
		//array('name'=>'id_network','value'=> 'isset($data->idNetwork) ? $data->idNetwork->descripcion : $data->id_network '),
		'tiporegimen',
		'dias',
		'nit',
		'nit2',
		'fecha_modificacion',
		'fam_agente',
		'pais_terrestre_auto',
		'es_neutral',
		'puesto',
		//array('name'=>'agentes_grupo_id','value'=> 'isset($data->agentesGrupo) ? $data->agentesGrupo-> : $data->agentes_grupo_id '),
		'monto',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',			
			'template'=>'{update}', //{delete}',
			'header' => CHtml::link('<span class="icon-plus icon-white"></span>',Yii::app()->controller->createUrl('/Agentes/create'),array('class'=>'btn btn-small btn-primary','onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t("app","Update").' Agentes",1); return false; }', 'style' => 'display:' . (Yii::app()->session['permisos']['agentes']['agentes']['create'] == 1 ? 'inline' : 'none'))),			
            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/Agentes/update", array("id"=>$data->primaryKey))',
						'options'=>array(
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t("app","Update").' Agentes",2); return false; }',
	                    ),
	                    'visible' => Yii::app()->session['permisos']['agentes']['agentes']['update'] == 1 ? 'true' : 'false',
                   	),
                'delete'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/Agentes/delete", array("id"=>$data->primaryKey))',),                   	
            ),				
		),
	),
)); ?>


<?php  $this->asDialog = false; ?> 