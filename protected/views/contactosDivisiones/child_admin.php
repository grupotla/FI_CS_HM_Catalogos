
<?php  $this->asDialog = true; ?> 

<?php  $dataProvider = new CArrayDataProvider($rawData=$model->divisiones, array()); ?> 

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
	'id'=>'contactos-divisiones-grid',
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
			'template'=>'{update}', //{delete}',
			
			'header' => CHtml::link('<span class="icon-plus icon-white"></span>',Yii::app()->controller->createUrl('/ContactosDivisiones/create',array('CATALOGO'=>$CATALOGO,'id_catalogo'=>$id_catalogo)),array('title'=>'Agregar division de contacto','class'=>'btn btn-small btn-primary','onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t('app','Create').' ContactosDivisiones",1); return false; }', 'style' => 'display:' . (Yii::app()->session['permisos']['contactosDivisiones']['contactosDivisiones']['create'] == 1 ? 'inline' : 'none;'))),			
            //'htmlOptions'=>array('style'=>'width:20px;text-align:center;'),
            
            'htmlOptions' => array('style'=>'white-space:nowrap;'),
            
            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/ContactosDivisiones/update", array("id"=>$data->primaryKey))',
                	 	"icon" => "icon-pencil icon-white",
						'options'=>array(
							"class"=>"btn btn-small btn-info", 
							
							'title'=>'Editar Registro',
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t('app','Update').' ContactosDivisiones",2); return false; }',
	                    ),
	                    'visible' => Yii::app()->session['permisos']['contactosDivisiones']['contactosDivisiones']['update'] == 1 ? 'true' : 'false',
                   	),
                   	
                'delete'=> array(                			
                	 	'url'=>'$this->grid->controller->createUrl("/ContactosDivisiones/delete", array("id"=>$data->primaryKey))',	
               			'icon'=>'icon-trash icon-white',
               			'options'=>array(
               				"class"=>"btn btn-small btn-danger",
                		),
                		'visible' => Yii::app()->session['permisos']['contactosDivisiones']['contactosDivisiones']['delete'] == 1 ? 'true' : 'false',
                	),
                		                   	
                /*'delete'=>
                    array(            
                	 	'url'=>'$this->grid->controller->createUrl("/ContactosDivisiones/delete", array("id"=>$data->primaryKey))',),*/
            ),				
		),
		
		array('name'=>'id', 'name'=>'ID', 'type'=>'raw', 'value' => (Yii::app()->session['root'] ? 'CHtml::link($data->id, "http://localhost/adminer-4.0.3.php?pgsql=10.10.1.20&username=dbmaster&db=master-aimar&ns=public&select=contactos_divisiones&columns[0][fun]=&columns[0][col]=&where[0][col]=id&where[0][op]=%3D&where[0][val]=".$data->id."&where[01][col]=&where[01][op]=%3D&where[01][val]=&order[0]=&limit=50&text_length=100", array("class"=>"btn btn-small btn-info btn-block", "title"=>"Editar Division", "target"=>"_blank"))' : '$data->id'),),
		
		array('name'=>'id_catalogo', 'name'=>'User', 'type'=>'raw', 'value' => (Yii::app()->session['root'] ? 'CHtml::link($data->id_catalogo, "http://localhost/adminer-4.0.3.php?pgsql=10.10.1.20&username=dbmaster&db=master-aimar&ns=public&select=usuarios_empresas&columns[0][fun]=&columns[0][col]=&where[0][col]=id_usuario&where[0][op]=%3D&where[0][val]=".$data->id_catalogo."&where[01][col]=&where[01][op]=%3D&where[01][val]=&order[0]=&limit=50&text_length=100", array("class"=>"btn btn-small btn-info btn-block", "title"=>"Editar Usuario", "target"=>"_blank"))' : '$data->id_catalogo'),),
				
		array('name'=>'nombre','header'=>'Nombre'),
		array('name'=>'telefono','header'=>'Telefono'),
		
		array('name'=>'tipo_persona','header'=>'Tipo','value'=> 'isset($data->tipoPersona) ? $data->tipoPersona->descripcion : $data->tipo_persona '),
		
		array('name'=>'cargo','header'=>'Cargo'),
		array('name'=>'area','header'=>'Area','value'=>'str_replace(","," ",str_replace("[","",str_replace("]","",str_replace("\"","",$data->area))))'),
		
		array('name'=>'pais','header'=>'Pais','value'=>'str_replace(","," ",str_replace("[","",str_replace("]","",str_replace("\"","",$data->pais))))'),
						
		array('name'=>'status','header'=>'Status','value'=> 'isset($data->status0) ? $data->status0->descripcion : $data->status '),
		array('name'=>'copia','header'=>'Copia'),
		array('name'=>'rechazo','header'=>'Rechazo'),

		array('name'=>'email','header'=>'Emails','type'=>'raw','value'=>'"<span title=\"Email Principal\" style=\"color:navy;font-weight:bolder\">" . $data->email . "</span> " . str_replace("{","",str_replace("}","",str_replace(","," ",str_replace("[","",str_replace("]","",str_replace("\"","",$data->contactoxpais))))))'),
		

		
		
		
		//Yii::app()->controller->createUrl('create',array('CATALOGO'=>1,'id_catalogo'=>1)),
		
		//array('title'=>'Agregar division de contacto','class'=>'btn btn-small btn-primary', 'style' => 'display:' . (Yii::app()->session['permisos']['contactosDivisiones']['contactosDivisiones']['create'] == 1 ? 'inline' : 'none;'))
		
		
		//array('name'=>'email','header'=>'Email'),
		
		//array('name'=>'contactoxpais','header'=>'Emails x Pais','value'=>'str_replace(","," ",str_replace("[","",str_replace("]","",str_replace("\"","",$data->contactoxpais))))'),
				
		
		/*
		'id_contacto',
		//array('name'=>'catalogo','value'=> 'isset($data->catalogo0) ? $data->catalogo0-> : $data->catalogo '),
		
		'impexp',
		'carga',
		'tranship',

		
		'fecha',
		'usuario',
		//array('name'=>'area_enum','value'=> 'isset($data->areaEnum) ? $data->areaEnum-> : $data->area_enum '),
		//array('name'=>'impexp_enum','value'=> 'isset($data->impexpEnum) ? $data->impexpEnum-> : $data->impexp_enum '),
		//array('name'=>'carga_enum','value'=> 'isset($data->cargaEnum) ? $data->cargaEnum-> : $data->carga_enum '),
		
		
		'fax',
		
		*/

	),
)); ?>


<?php  $this->asDialog = false; ?> 