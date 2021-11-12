
<?php  $this->asDialog = true; ?> 

<?php  $dataProvider = new CArrayDataProvider($rawData=$model->UsuariosEmpresas, array()); ?> 

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
	'id'=>'usuarios-empresas-grid',
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
		'id_usuario',
		'pw_name',
		'pw_passwd',
		'pw_uid',
		'pw_gid',
		'pw_gecos',
		/*
		'pw_dir',
		'pw_shell',
		//array('name'=>'tipo_usuario','value'=> 'isset($data->tipoUsuario) ? $data->tipoUsuario->descripcion_usuario : $data->tipo_usuario '),
		//array('name'=>'pais','value'=> 'isset($data->pais0) ? $data->pais0->nombre : $data->pais '),
		'dominio',
		'level',
		'pw_activo',
		'pw_codigo_tributario',
		'pw_correo',
		//array('name'=>'id_usuario_reg','value'=> 'isset($data->idUsuarioReg) ? $data->idUsuarioReg->pw_name : $data->id_usuario_reg '),
		'modificado',
		'locode',
		'planilla_numero',
		'pw_ultimo_acceso',
		'pw_passwd_dias',
		'pw_passwd_fecha',
		'pw_user_ip',
		'pw_sis_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',			
			'template'=>'{update}', //{delete}',
			'header' => CHtml::link('<span class="icon-plus icon-white"></span>',Yii::app()->controller->createUrl('/UsuariosEmpresas/create'),array('class'=>'btn btn-small btn-primary','onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t('app','Create').' '.Yii::t('app','UsuariosEmpresas').'",1); return false; }', 'style' => 'display:' . (Yii::app()->session['permisos']['usuariosEmpresas']['usuariosEmpresas']['create'] == 1 ? 'inline' : 'none'))),			
            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/UsuariosEmpresas/update", array("id"=>$data->primaryKey))',
						'options'=>array(
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t('app','Update').' '.Yii::t('app','UsuariosEmpresas').'",2); return false; }',
	                    ),
	                    'visible' => Yii::app()->session['permisos']['usuariosEmpresas']['usuariosEmpresas']['update'] == 1 ? 'true' : 'false',
                   	),
                'delete'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("/UsuariosEmpresas/delete", array("id"=>$data->primaryKey))',),                   	
            ),				
		),
	),
)); ?>


<?php  $this->asDialog = false; ?> 