<?php if(Yii::app()->user->hasFlash('notice')): ?>

<div class="flash-notice">
	<?php echo Yii::app()->user->getFlash('notice'); ?>
</div>

<?php //else: ?>
<?php endif; ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'carriers-air-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'Countries'),
)); ?>

	<!-- <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p> -->

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropDownListRow($model,'Countries',CHtml::listData(Paises::model()->findAll(array("condition"=>"oficina_aimar='true'","order"=>"descripcion")),'codigo','descripcion'), array('class'=>'span5', 'prompt' => '-- Seleccione --')); ?>

	<?php //echo $form->dropDownListRow($model,'Countries',CHtml::listData(Empresas::model()->findAll(array("condition"=>"activo='t'","order"=>"")),'pais_iso','nombre_empresa'), array('class'=>'span5', 'prompt' => '-- Seleccione --')); ?>

	<?php echo $form->textFieldRow($model,'Name',array('class'=>'span5','maxlength'=>45, 'data-inputmask-alias'=>"address")); ?>

	<?php echo $form->textFieldRow($model,'CarrierCode',array('class'=>'span5','maxlength'=>5, 'data-inputmask-alias'=>"codigo")); ?>

	<?php //echo $form->textFieldRow($model,'codigo',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'ComisionRate',array('class'=>'span5', 'data-inputmask-alias'=>"decimal")); ?>

	<?php //echo $form->textFieldRow($model,'comision',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Expired',array('value'=>$model->Expired == 0 ? 'On' : "Off",'class'=>'span2','disabled'=>true, 

	'style'=>$model->isNewRecord ? 'display:none' : ''

)); ?>
		


	<div class="form-actions">

		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'),
			'icon'=>$model->isNewRecord ? 'icon-file icon-white' : 'icon-pencil icon-white',
			'htmlOptions'=>array('style'=>isset($modify) ? 'display:none' : 'display:inline',
			'name'=>'btnSave',
			),
			
		)); ?>
		

		<?php if ( (Yii::app()->user->name == "admin" || Yii::app()->session['p']['auth'] == 1) && !$model->isNewRecord && $model->activo == false) { ?>
		
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'success',
					'label'=> Yii::t('app','Activar') . " " . Yii::t('app','Supervisor'),
					'icon'=>'icon-ok icon-white',
					'htmlOptions'=>array(
					'style'=>isset($modify) ? 'display:none' : 'display:inline', 
					'confirm'=>'Confirmar Activar Linea Aerea ?',
					'name'=>'btnAuth',
					),			
				)); ?>

		<?php } elseif ( (Yii::app()->user->name == "admin" || Yii::app()->session['p']['auth'] == 1) && !$model->isNewRecord && $model->activo == true) { ?>

				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'danger',
					'label'=> Yii::t('app','Desactivar') . " " . Yii::t('app','Supervisor'),
					'icon'=>'icon-remove icon-white',
					'htmlOptions'=>array(
					'style'=>isset($modify) ? 'display:none' : 'display:inline', 
					'confirm'=>'Confirmar Desactivar Linea Aerea ?',
					'name'=>'btnDes',
					),			
				)); ?>
				
		
		<?php } else { ?>
		
						
		<?php } ?>		

	</div>


	<?php if ((Yii::app()->user->name == "admin" || Yii::app()->session['p']['auth'] == 1) && !$model->isNewRecord ): ?>


	<?php echo $form->textFieldRow($model,'user_insert',array('class'=>'span5','value'=>($model->user_insert > 0 ? (isset($model->usuario0) ? $model->usuario0->pw_gecos : $model->user_insert) : ''),'disabled'=>true)); ?>

	<?php echo $form->textFieldRow($model,'date_insert',array('class'=>'span5','value'=>$model->date_insert ? date("d/m/Y h:i:s",strtotime($model->date_insert)) : '','disabled'=>true)); ?>


	<?php echo $form->textFieldRow($model,'user_update',array('class'=>'span5','value'=>($model->user_update > 0 ? (isset($model->usuario1) ? $model->usuario1->pw_gecos : $model->user_update) : ''),'disabled'=>true)); ?>

	<?php echo $form->textFieldRow($model,'date_update',array('class'=>'span5','value'=>$model->date_update ? date("d/m/Y h:i:s",strtotime($model->date_update)) : '','disabled'=>true)); ?>


	<?php echo $form->textFieldRow($model,'user_auth',array('class'=>'span5','value'=>($model->user_auth > 0 ? (isset($model->usuario2) ? $model->usuario2->pw_gecos : $model->user_auth) : ''),'disabled'=>true)); ?>

	<?php echo $form->textFieldRow($model,'date_auth',array('class'=>'span5','value'=>$model->date_auth ? date("d/m/Y h:i:s",strtotime($model->date_auth)) : '','disabled'=>true)); ?>


	<?php endif; ?>		


	<?php //echo $form->textFieldRow($model,'GroupID',array('class'=>'span5')); ?>

	<?php //echo $form->dateFieldRow($model,'CreatedDate',array('class'=>'span2')); ?>

	<?php //echo $form->textFieldRow($model,'CreatedTime',array('class'=>'span5')); ?>



<?php $this->endWidget(); ?>


<?php /*
	<?php echo $form->textFieldRow($model,'ver_AWBNumber',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AWBNumber',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AccountShipperNo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AccountShipperNo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_ShipperData',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_ShipperData',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AccountConsignerNo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AccountConsignerNo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_ConsignerData',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_ConsignerData',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AgentData',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AgentData',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AccountInformation',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AccountInformation',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_IATANo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_IATANo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AccountAgentNo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AccountAgentNo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AirportDepID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AirportDepID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_RequestedRouting',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_RequestedRouting',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AirportToCode1',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AirportToCode1',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_CarrierID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_CarrierID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AirportToCode2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AirportToCode2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AirportToCode3',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AirportToCode3',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_CarrierCode2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_CarrierCode2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_CarrierCode3',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_CarrierCode3',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_CurrencyID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_CurrencyID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_ChargeType',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_ChargeType',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_ValChargeType',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_ValChargeType',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_OtherChargeType',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_OtherChargeType',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_DeclaredValue',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_DeclaredValue',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AduanaValue',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AduanaValue',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AirportDesID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AirportDesID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_FlightDate1',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_FlightDate1',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_FlightDate2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_FlightDate2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_SecuredValue',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_SecuredValue',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_HandlingInformation',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_HandlingInformation',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_Observations',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_Observations',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_NoOfPieces',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_NoOfPieces',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_Weights',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_Weights',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_WeightsSymbol',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_WeightsSymbol',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_Commodities',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_Commodities',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_ChargeableWeights',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_ChargeableWeights',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_CarrierRates',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_CarrierRates',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_CarriersubTot',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_CarriersubTot',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_NatureQtyGoods',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_NatureQtyGoods',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_TotNoOfPieces',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_TotNoOfPieces',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_TotWeight',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_TotWeight',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_TotCarrierRate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_TotCarrierRate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_TotChargeWeightPrepaid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_TotChargeWeightPrepaid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_TotChargeWeightCollect',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_TotChargeWeightCollect',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_TotChargeValuePrepaid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_TotChargeValuePrepaid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_TotChargeValueCollect',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_TotChargeValueCollect',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_TotChargeTaxPrepaid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_TotChargeTaxPrepaid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_TotChargeTaxCollect',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_TotChargeTaxCollect',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AnotherChargesAgentPrepaid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AnotherChargesAgentPrepaid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AnotherChargesAgentCollect',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AnotherChargesAgentCollect',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AnotherChargesCarrierPrepaid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AnotherChargesCarrierPrepaid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AnotherChargesCarrierCollect',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AnotherChargesCarrierCollect',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_TotPrepaid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_TotPrepaid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_TotCollect',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_TotCollect',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_TerminalFee',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_TerminalFee',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_CustomFee',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_CustomFee',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_FuelSurcharge',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_FuelSurcharge',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_SecurityFee',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_SecurityFee',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_PBA',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_PBA',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_TAX',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_TAX',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AdditionalChargeName1',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AdditionalChargeName1',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AdditionalChargeVal1',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AdditionalChargeVal1',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AdditionalChargeName2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AdditionalChargeName2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AdditionalChargeVal2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AdditionalChargeVal2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_Invoice',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_Invoice',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_ExportLic',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_ExportLic',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AgentContactSignature',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AgentContactSignature',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_Instructions',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_Instructions',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AgentSignature',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AgentSignature',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AWBDate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AWBDate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AirportCode',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AirportCode',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AdditionalChargeName3',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AdditionalChargeName3',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AdditionalChargeVal3',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AdditionalChargeVal3',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AdditionalChargeName4',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AdditionalChargeName4',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AdditionalChargeVal4',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AdditionalChargeVal4',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model,'ver_ChargeType2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_ChargeType2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_ValChargeType2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_ValChargeType2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_OtherChargeType2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_OtherChargeType2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'OtherChargesPrintType',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AWBNumber2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AWBNumber2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_AWBNumber3',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_AWBNumber3',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_id_cliente_order',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_id_cliente_order',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'activo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'user_insert',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_insert',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'user_update',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_update',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'user_auth',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_auth',array('class'=>'span5')); */ ?>

