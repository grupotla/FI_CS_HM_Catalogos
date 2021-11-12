
<?php  $this->asDialog = true; ?>

<?php  //$dataProvider = new CArrayDataProvider($rawData=$model->navierasCreditos, array()); ?>

<?php
		$criteria=new CDbCriteria;
		$criteria->condition = "id_naviera=".$model->id_naviera;
		$dataProvider = new CActiveDataProvider('NavierasCredito', array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'id_nav_cred ASC',
			),
		));
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'navieras-credito-grid',
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
		//'id_nav_cred',
		array('name'=>'id_naviera','value'=> 'isset($data->idNaviera) ? $data->idNaviera->nombre : $data->id_naviera '),
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
			'header' => CHtml::link('<span class="icon-plus icon-white"></span>',Yii::app()->controller->createUrl('/NavierasCredito/create',array("id_naviera"=>$model->id_naviera,"button"=>1, "text" => "Create NavierasCredito")),array('class'=>'btn btn-small btn-primary','onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"Create NavierasCredito",1); return false; }', 'style' => 'display:' . (Yii::app()->session['permisos']['navierasCredito']['navierasCredito']['create'] == 1 ? 'inline' : 'none'))),			

			'htmlOptions' => array('style'=>'white-space:nowrap;'),

            'buttons'=>array(
                'update'=>
                    array(
                	 	'url'=>'$this->grid->controller->createUrl("/NavierasCredito/update", array("id"=>$data->primaryKey,"button"=>2, "text" => "Update NavierasCredito"))',
                	 	"icon" => "icon-pencil icon-white",
						'options'=>array(
    						"class"=>"btn btn-small btn-info",
    						'title'=>'Editar Registro',
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"Update NavierasCredito",2); return false; }',
	                    ),
	                    'visible' => Yii::app()->session['permisos']['navierasCredito']['navierasCredito']['update'] == 1 ? 'true' : 'false',
                   	),
                'delete'=>
                    array(
                	 	'url'=>'$this->grid->controller->createUrl("/NavierasCredito/delete", array("id"=>$data->primaryKey))',

               			'icon'=>'icon-trash icon-white',
               			'options'=>array(
               				"class"=>"btn btn-small btn-danger",
                		),
                		'visible' => Yii::app()->session['permisos']['navierasCredito']['navierasCredito']['delete'] == 1 ? 'true' : 'false',
                	),
            ),
		),
	),
)); ?>


<?php  $this->asDialog = false; ?>
