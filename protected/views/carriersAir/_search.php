<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'CarrierID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Name',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->dateFieldRow($model,'CreatedDate',array('class'=>'span2')); ?>

	<?php echo $form->textFieldRow($model,'CreatedTime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Expired',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CarrierCode',array('class'=>'span5','maxlength'=>5)); ?>

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

	<?php echo $form->textFieldRow($model,'Countries',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'ver_ChargeType2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_ChargeType2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_ValChargeType2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_ValChargeType2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ver_OtherChargeType2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hor_OtherChargeType2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'OtherChargesPrintType',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ComisionRate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'GroupID',array('class'=>'span5')); ?>

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

	<?php echo $form->textFieldRow($model,'date_auth',array('class'=>'span5')); ?>


<?php if (!$this->asDialog) : ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>
<?php endif; ?>
	

<?php $this->endWidget(); ?>
