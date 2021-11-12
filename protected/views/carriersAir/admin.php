<?php
$this->breadcrumbs=array(	
	Yii::t('app','CarriersAir')=>array('index'),	
	Yii::t('app','Manage'),
);

$this->menu=array(
	
	array('label'=>Yii::t('app','List').' '.Yii::t('app','CarriersAir'),'url'=>array('index'), 'icon'=>TbHtml::ICON_ALIGN_JUSTIFY . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Create').' '.Yii::t('app','CarriersAir'),'url'=>array('create','button'=>1, 'text'=>Yii::t('app','Create').' '.Yii::t('app','CarriersAir')), 'icon'=>TbHtml::ICON_FILE . " " . TbHtml::ICON_COLOR_WHITE, 'visible'=> Yii::app()->session['p']['create'] == 1 ? true : false),
	
	//array('label'=>Yii::t('app','Search'),'url'=>array('search'), 'icon'=>TbHtml::ICON_SEARCH . " " . TbHtml::ICON_COLOR_WHITE),
	
	array('label'=>Yii::t('app','Excel'),'url'=>array('GenerateExcel'), 'icon'=>TbHtml::ICON_TH . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['excel'] == 1 ? true : false),
	
	array('label'=>Yii::t('app','Pdf'),'url'=>array('GeneratePdf'), 'icon'=>TbHtml::ICON_BOOK . " " . TbHtml::ICON_COLOR_WHITE, "visible"=> Yii::app()->session['p']['pdf'] == 1 ? true : false),	
);
?>


<h1><?php echo Yii::t('app','Manage').' '.Yii::t('app','CarriersAir'); ?> </h1>

	



<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'carriers-air-grid',
	'dataProvider'=>$model->search(),
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
	'filter'=>$model,
	'columns'=>array(


		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',			
			'template'=>'{update} {view} {modify}',
			'header'=>'::&nbsp;Acciones&nbsp;::',		
            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("update", array("id"=>$data->primaryKey))',
						
                	 	'icon'=>'icon-pencil icon-white',
						'options'=>array(    						
							'title'=>'Editar',
							"class"=>"btn btn-small btn-warning",							
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t("app","Update").' Carriers",2); return false;}',
	                    ),
	                    'visible'=>Yii::app()->session['p']['update'] == 1 ? 'true' : 'false',
                   	),
                   	
                'modify'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("modify", array("id"=>$data->primaryKey))',
                	 	'icon'=>'icon-cog icon-white',
						'options'=>array(    	
							'title'=>'Modificar Otros Datos',
							"class"=>"btn btn-small btn-success",											
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t("app","Update").' Clientes",2); return false;}',
	                    ),
	                    'visible'=>Yii::app()->session['p']['update'] == 1 ? 'false' : 'true',
                   	),                   	
                   	
                'view'=> array(                			
                			'icon'=>'icon-eye-open icon-white',
                			'options'=>array(
                				"class"=>"btn btn-small btn-info",
                			),
                		),                    	
            ),				
		),

		array('name'=>'CarrierID','cssClassExpression'=>'$data->Expired==0?"on":"off"'),
		array('name'=>'Countries','cssClassExpression'=>'$data->Expired==0?"on":"off"',
		'filter' => CHtml::listData( Paises::model()->findAll(array("condition"=>"oficina_aimar='true'","order"=>"descripcion")), 'codigo','descripcion')

),

		array('name'=>'CarrierCode','cssClassExpression'=>'$data->Expired==0?"on":"off"'),
		array('name'=>'Name','cssClassExpression'=>'$data->Expired==0?"on":"off"'),
		array('name'=>'ComisionRate','cssClassExpression'=>'$data->Expired==0?"on":"off"'),
		array('name'=>'Expired','cssClassExpression'=>'$data->Expired==0?"on":"off"'),

		/*
		'GroupID',
		'CreatedDate',
		'CreatedTime',
		'ver_AWBNumber',
		'hor_AWBNumber',
		'ver_AccountShipperNo',
		'hor_AccountShipperNo',
		'ver_ShipperData',
		'hor_ShipperData',
		'ver_AccountConsignerNo',
		'hor_AccountConsignerNo',
		'ver_ConsignerData',
		'hor_ConsignerData',
		'ver_AgentData',
		'hor_AgentData',
		'ver_AccountInformation',
		'hor_AccountInformation',
		'ver_IATANo',
		'hor_IATANo',
		'ver_AccountAgentNo',
		'hor_AccountAgentNo',
		'ver_AirportDepID',
		'hor_AirportDepID',
		'ver_RequestedRouting',
		'hor_RequestedRouting',
		'ver_AirportToCode1',
		'hor_AirportToCode1',
		'ver_CarrierID',
		'hor_CarrierID',
		'ver_AirportToCode2',
		'hor_AirportToCode2',
		'ver_AirportToCode3',
		'hor_AirportToCode3',
		'ver_CarrierCode2',
		'hor_CarrierCode2',
		'ver_CarrierCode3',
		'hor_CarrierCode3',
		'ver_CurrencyID',
		'hor_CurrencyID',
		'ver_ChargeType',
		'hor_ChargeType',
		'ver_ValChargeType',
		'hor_ValChargeType',
		'ver_OtherChargeType',
		'hor_OtherChargeType',
		'ver_DeclaredValue',
		'hor_DeclaredValue',
		'ver_AduanaValue',
		'hor_AduanaValue',
		'ver_AirportDesID',
		'hor_AirportDesID',
		'ver_FlightDate1',
		'hor_FlightDate1',
		'ver_FlightDate2',
		'hor_FlightDate2',
		'ver_SecuredValue',
		'hor_SecuredValue',
		'ver_HandlingInformation',
		'hor_HandlingInformation',
		'ver_Observations',
		'hor_Observations',
		'ver_NoOfPieces',
		'hor_NoOfPieces',
		'ver_Weights',
		'hor_Weights',
		'ver_WeightsSymbol',
		'hor_WeightsSymbol',
		'ver_Commodities',
		'hor_Commodities',
		'ver_ChargeableWeights',
		'hor_ChargeableWeights',
		'ver_CarrierRates',
		'hor_CarrierRates',
		'ver_CarriersubTot',
		'hor_CarriersubTot',
		'ver_NatureQtyGoods',
		'hor_NatureQtyGoods',
		'ver_TotNoOfPieces',
		'hor_TotNoOfPieces',
		'ver_TotWeight',
		'hor_TotWeight',
		'ver_TotCarrierRate',
		'hor_TotCarrierRate',
		'ver_TotChargeWeightPrepaid',
		'hor_TotChargeWeightPrepaid',
		'ver_TotChargeWeightCollect',
		'hor_TotChargeWeightCollect',
		'ver_TotChargeValuePrepaid',
		'hor_TotChargeValuePrepaid',
		'ver_TotChargeValueCollect',
		'hor_TotChargeValueCollect',
		'ver_TotChargeTaxPrepaid',
		'hor_TotChargeTaxPrepaid',
		'ver_TotChargeTaxCollect',
		'hor_TotChargeTaxCollect',
		'ver_AnotherChargesAgentPrepaid',
		'hor_AnotherChargesAgentPrepaid',
		'ver_AnotherChargesAgentCollect',
		'hor_AnotherChargesAgentCollect',
		'ver_AnotherChargesCarrierPrepaid',
		'hor_AnotherChargesCarrierPrepaid',
		'ver_AnotherChargesCarrierCollect',
		'hor_AnotherChargesCarrierCollect',
		'ver_TotPrepaid',
		'hor_TotPrepaid',
		'ver_TotCollect',
		'hor_TotCollect',
		'ver_TerminalFee',
		'hor_TerminalFee',
		'ver_CustomFee',
		'hor_CustomFee',
		'ver_FuelSurcharge',
		'hor_FuelSurcharge',
		'ver_SecurityFee',
		'hor_SecurityFee',
		'ver_PBA',
		'hor_PBA',
		'ver_TAX',
		'hor_TAX',
		'ver_AdditionalChargeName1',
		'hor_AdditionalChargeName1',
		'ver_AdditionalChargeVal1',
		'hor_AdditionalChargeVal1',
		'ver_AdditionalChargeName2',
		'hor_AdditionalChargeName2',
		'ver_AdditionalChargeVal2',
		'hor_AdditionalChargeVal2',
		'ver_Invoice',
		'hor_Invoice',
		'ver_ExportLic',
		'hor_ExportLic',
		'ver_AgentContactSignature',
		'hor_AgentContactSignature',
		'ver_Instructions',
		'hor_Instructions',
		'ver_AgentSignature',
		'hor_AgentSignature',
		'ver_AWBDate',
		'hor_AWBDate',
		'ver_AirportCode',
		'hor_AirportCode',
		'ver_AdditionalChargeName3',
		'hor_AdditionalChargeName3',
		'ver_AdditionalChargeVal3',
		'hor_AdditionalChargeVal3',
		'ver_AdditionalChargeName4',
		'hor_AdditionalChargeName4',
		'ver_AdditionalChargeVal4',
		'hor_AdditionalChargeVal4',
		'ver_ChargeType2',
		'hor_ChargeType2',
		'ver_ValChargeType2',
		'hor_ValChargeType2',
		'ver_OtherChargeType2',
		'hor_OtherChargeType2',
		'OtherChargesPrintType',
		'ver_AWBNumber2',
		'hor_AWBNumber2',
		'ver_AWBNumber3',
		'hor_AWBNumber3',
		'ver_id_cliente_order',
		'hor_id_cliente_order',
		'activo',
		'user_insert',
		'date_insert',
		'user_update',
		'date_update',
		'user_auth',
		'date_auth',		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',			
			'template'=>'{update}{view}',
            'buttons'=>array(            	
                'update'=>
                    array(                    	
                	 	'url'=>'$this->grid->controller->createUrl("update", array("id"=>$data->primaryKey))',
						'options'=>array(    						
    						'onclick'=>'if ("' . $this->asDialog . '") { crud_frame_adjust($(this).attr("href"),"'.Yii::t("app","Update").' CarriersAir",2); return false;}',
	                    ),
	                    'visible'=>Yii::app()->session['p']['update'] == 1 ? 'true' : 'false',
                   	),
            ),				
		),*/
	),
)); ?>

<?php
/*Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	$('#myModalSearch').modal('show');
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('carriers-air-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php ob_start(); ?>

<p>
Opcionalmente puedes ingresar operadores de comparacion (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada una de tus valores de busqueda para especificar como debe realizarse la comparacion.
</p>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $render_search = ob_get_contents(); ob_end_clean(); ?>

<?php $this->widget('bootstrap.widgets.TbModal', array(
		    'id' => 'myModalSearch',           
		    'header' => 'Modal Heading',
		    'htmlOptions'=>array('style'=>'width:75%; left:35%;'),    
		    'content' => $render_search,
		    'footer' => array(
		        //TbHtml::button('Save Changes', array('id'=>'btn-save-modal', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
		        TbHtml::button('Close', array('id'=>'myModalSearch-close','data-dismiss' => 'modal')),
		    ),    
		)
	);	*/ ?> 
