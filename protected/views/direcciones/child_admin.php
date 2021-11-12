
<?php  $this->asDialog = true; ?> 

<?php  //$dataProvider = new CArrayDataProvider($rawData=$model->direcciones, array()); ?> 


<?php	
		$criteria=new CDbCriteria;
		$criteria->condition = "id_cliente=".$model->id_cliente;								
		$dataProvider = new CActiveDataProvider('Direcciones', array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'id_direccion ASC',
			),			
		));
?> 
<style>
	.silver {
		color:silver;
	}
</style>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'direcciones-grid',
	'dataProvider'=>$dataProvider,
	'type' => 'hover striped bordered condensed',
	'selectableRows'=>1,	
	'template' => "{summary}\n{pager}\n{items}",//\n{summary}\n{pager}",	
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
		//'id_cliente',
		//'id_direccion',
		
		array('name'=>'Pais','value'=> 'isset($data->idNivelGeografico) ? $data->idNivelGeografico->idPais->descripcion : $data->id_nivel_geografico','cssClassExpression'=>'$data->activo == 0 ? "silver" : ""'),
		
		
		array('name'=>'direccion_completa','cssClassExpression'=>'$data->activo == 0 ? "silver" : ""'),

		//array('name'=>'address','cssClassExpression'=>'$data->activo == 0 ? "silver" : ""'),

		//array('name'=>'city','cssClassExpression'=>'$data->activo == 0 ? "silver" : ""'),
		
		array('name'=>'id_nivel_geografico','value'=> 'isset($data->idNivelGeografico) ? $data->idNivelGeografico->id_pais . " - " . $data->idNivelGeografico->nivel1 : $data->id_nivel_geografico','cssClassExpression'=>'$data->activo == 0 ? "silver" : ""'),
		
		array('name'=>'state','cssClassExpression'=>'$data->activo == 0 ? "silver" : ""'),
		array('name'=>'phone_number','cssClassExpression'=>'$data->activo == 0 ? "silver" : ""'),
		
		array('name'=>'activo', 'value'=>'$data->activo == 1 ? "Si" : "No"','cssClassExpression'=>'$data->activo == 0 ? "silver" : ""'),
		/*		
		'zipcode',
		'name',		
		'group',
		'url',
		'image',
		'lat',
		'lng',
		'email',
		'id_tipo_direccion',
		'boletines',
		'phone_number',
		*/
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',			
			
			'template'=>'{update} {delete}',
			'header' => CHtml::link('<span class="icon-plus icon-white"></span>',Yii::app()->controller->createUrl('/Direcciones/create',array("id_cliente" => $model->id_cliente, "id_pais" => $model->id_pais, "button"=>1,"text" => "Crear Direcciones")),array('class'=>'btn btn-small btn-primary','onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"Crear Direcciones",1); return false; }', 'style' => 'display:' . (Yii::app()->session['permisos']['direcciones']['direcciones']['create'] == 1 && Yii::app()->controller->action->id <> 'view' ? 'inline' : 'none'))),			
			
			
			'htmlOptions' => array('style'=>'white-space:nowrap;'),
			
            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/Direcciones/update", array("id"=>$data->primaryKey, "id_pais" => "'.$model->id_pais.'", "button"=>2, "text" => "Update Direcciones"))',                	 	
                	 	
                	 	"icon" => "icon-pencil icon-white",
						'options'=>array(
    						"class"=>"btn btn-small btn-info", 
    						'title'=>'Editar Registro',
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"Update Direcciones",2); return false; }',
	                    ),
	                    'visible' => Yii::app()->session['permisos']['direcciones']['direcciones']['update'] == 1 && Yii::app()->controller->action->id <> 'view' ? 'true' : 'false',
	                    
                   	),
                'delete'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/Direcciones/delete", array("id"=>$data->primaryKey))',      
               			'icon'=>'icon-trash icon-white',
               			'options'=>array(
               				"class"=>"btn btn-small btn-danger",
                		),                	 	
	                    'visible' => Yii::app()->session['permisos']['direcciones']['direcciones']['delete'] == 1 && Yii::app()->controller->action->id <> 'view' ? 'true' : 'false',
                	 	
                	),                   	
            ),				
		),
	),
)); ?>


<?php  $this->asDialog = false; ?> 