<div class="form-actions">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CarrierID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CarrierID),array('view','id'=>$data->CarrierID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreatedDate')); ?>:</b>
	<?php echo CHtml::encode($data->CreatedDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreatedTime')); ?>:</b>
	<?php echo CHtml::encode($data->CreatedTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Expired')); ?>:</b>
	<?php echo CHtml::encode($data->Expired); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CarrierCode')); ?>:</b>
	<?php echo CHtml::encode($data->CarrierCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AWBNumber')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AWBNumber); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AWBNumber')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AWBNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AccountShipperNo')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AccountShipperNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AccountShipperNo')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AccountShipperNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_ShipperData')); ?>:</b>
	<?php echo CHtml::encode($data->ver_ShipperData); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_ShipperData')); ?>:</b>
	<?php echo CHtml::encode($data->hor_ShipperData); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AccountConsignerNo')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AccountConsignerNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AccountConsignerNo')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AccountConsignerNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_ConsignerData')); ?>:</b>
	<?php echo CHtml::encode($data->ver_ConsignerData); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_ConsignerData')); ?>:</b>
	<?php echo CHtml::encode($data->hor_ConsignerData); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AgentData')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AgentData); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AgentData')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AgentData); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AccountInformation')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AccountInformation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AccountInformation')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AccountInformation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_IATANo')); ?>:</b>
	<?php echo CHtml::encode($data->ver_IATANo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_IATANo')); ?>:</b>
	<?php echo CHtml::encode($data->hor_IATANo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AccountAgentNo')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AccountAgentNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AccountAgentNo')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AccountAgentNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AirportDepID')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AirportDepID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AirportDepID')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AirportDepID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_RequestedRouting')); ?>:</b>
	<?php echo CHtml::encode($data->ver_RequestedRouting); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_RequestedRouting')); ?>:</b>
	<?php echo CHtml::encode($data->hor_RequestedRouting); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AirportToCode1')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AirportToCode1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AirportToCode1')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AirportToCode1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_CarrierID')); ?>:</b>
	<?php echo CHtml::encode($data->ver_CarrierID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_CarrierID')); ?>:</b>
	<?php echo CHtml::encode($data->hor_CarrierID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AirportToCode2')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AirportToCode2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AirportToCode2')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AirportToCode2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AirportToCode3')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AirportToCode3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AirportToCode3')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AirportToCode3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_CarrierCode2')); ?>:</b>
	<?php echo CHtml::encode($data->ver_CarrierCode2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_CarrierCode2')); ?>:</b>
	<?php echo CHtml::encode($data->hor_CarrierCode2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_CarrierCode3')); ?>:</b>
	<?php echo CHtml::encode($data->ver_CarrierCode3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_CarrierCode3')); ?>:</b>
	<?php echo CHtml::encode($data->hor_CarrierCode3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_CurrencyID')); ?>:</b>
	<?php echo CHtml::encode($data->ver_CurrencyID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_CurrencyID')); ?>:</b>
	<?php echo CHtml::encode($data->hor_CurrencyID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_ChargeType')); ?>:</b>
	<?php echo CHtml::encode($data->ver_ChargeType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_ChargeType')); ?>:</b>
	<?php echo CHtml::encode($data->hor_ChargeType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_ValChargeType')); ?>:</b>
	<?php echo CHtml::encode($data->ver_ValChargeType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_ValChargeType')); ?>:</b>
	<?php echo CHtml::encode($data->hor_ValChargeType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_OtherChargeType')); ?>:</b>
	<?php echo CHtml::encode($data->ver_OtherChargeType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_OtherChargeType')); ?>:</b>
	<?php echo CHtml::encode($data->hor_OtherChargeType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_DeclaredValue')); ?>:</b>
	<?php echo CHtml::encode($data->ver_DeclaredValue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_DeclaredValue')); ?>:</b>
	<?php echo CHtml::encode($data->hor_DeclaredValue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AduanaValue')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AduanaValue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AduanaValue')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AduanaValue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AirportDesID')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AirportDesID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AirportDesID')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AirportDesID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_FlightDate1')); ?>:</b>
	<?php echo CHtml::encode($data->ver_FlightDate1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_FlightDate1')); ?>:</b>
	<?php echo CHtml::encode($data->hor_FlightDate1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_FlightDate2')); ?>:</b>
	<?php echo CHtml::encode($data->ver_FlightDate2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_FlightDate2')); ?>:</b>
	<?php echo CHtml::encode($data->hor_FlightDate2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_SecuredValue')); ?>:</b>
	<?php echo CHtml::encode($data->ver_SecuredValue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_SecuredValue')); ?>:</b>
	<?php echo CHtml::encode($data->hor_SecuredValue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_HandlingInformation')); ?>:</b>
	<?php echo CHtml::encode($data->ver_HandlingInformation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_HandlingInformation')); ?>:</b>
	<?php echo CHtml::encode($data->hor_HandlingInformation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_Observations')); ?>:</b>
	<?php echo CHtml::encode($data->ver_Observations); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_Observations')); ?>:</b>
	<?php echo CHtml::encode($data->hor_Observations); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_NoOfPieces')); ?>:</b>
	<?php echo CHtml::encode($data->ver_NoOfPieces); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_NoOfPieces')); ?>:</b>
	<?php echo CHtml::encode($data->hor_NoOfPieces); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_Weights')); ?>:</b>
	<?php echo CHtml::encode($data->ver_Weights); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_Weights')); ?>:</b>
	<?php echo CHtml::encode($data->hor_Weights); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_WeightsSymbol')); ?>:</b>
	<?php echo CHtml::encode($data->ver_WeightsSymbol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_WeightsSymbol')); ?>:</b>
	<?php echo CHtml::encode($data->hor_WeightsSymbol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_Commodities')); ?>:</b>
	<?php echo CHtml::encode($data->ver_Commodities); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_Commodities')); ?>:</b>
	<?php echo CHtml::encode($data->hor_Commodities); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_ChargeableWeights')); ?>:</b>
	<?php echo CHtml::encode($data->ver_ChargeableWeights); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_ChargeableWeights')); ?>:</b>
	<?php echo CHtml::encode($data->hor_ChargeableWeights); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_CarrierRates')); ?>:</b>
	<?php echo CHtml::encode($data->ver_CarrierRates); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_CarrierRates')); ?>:</b>
	<?php echo CHtml::encode($data->hor_CarrierRates); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_CarriersubTot')); ?>:</b>
	<?php echo CHtml::encode($data->ver_CarriersubTot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_CarriersubTot')); ?>:</b>
	<?php echo CHtml::encode($data->hor_CarriersubTot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_NatureQtyGoods')); ?>:</b>
	<?php echo CHtml::encode($data->ver_NatureQtyGoods); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_NatureQtyGoods')); ?>:</b>
	<?php echo CHtml::encode($data->hor_NatureQtyGoods); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_TotNoOfPieces')); ?>:</b>
	<?php echo CHtml::encode($data->ver_TotNoOfPieces); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_TotNoOfPieces')); ?>:</b>
	<?php echo CHtml::encode($data->hor_TotNoOfPieces); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_TotWeight')); ?>:</b>
	<?php echo CHtml::encode($data->ver_TotWeight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_TotWeight')); ?>:</b>
	<?php echo CHtml::encode($data->hor_TotWeight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_TotCarrierRate')); ?>:</b>
	<?php echo CHtml::encode($data->ver_TotCarrierRate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_TotCarrierRate')); ?>:</b>
	<?php echo CHtml::encode($data->hor_TotCarrierRate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_TotChargeWeightPrepaid')); ?>:</b>
	<?php echo CHtml::encode($data->ver_TotChargeWeightPrepaid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_TotChargeWeightPrepaid')); ?>:</b>
	<?php echo CHtml::encode($data->hor_TotChargeWeightPrepaid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_TotChargeWeightCollect')); ?>:</b>
	<?php echo CHtml::encode($data->ver_TotChargeWeightCollect); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_TotChargeWeightCollect')); ?>:</b>
	<?php echo CHtml::encode($data->hor_TotChargeWeightCollect); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_TotChargeValuePrepaid')); ?>:</b>
	<?php echo CHtml::encode($data->ver_TotChargeValuePrepaid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_TotChargeValuePrepaid')); ?>:</b>
	<?php echo CHtml::encode($data->hor_TotChargeValuePrepaid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_TotChargeValueCollect')); ?>:</b>
	<?php echo CHtml::encode($data->ver_TotChargeValueCollect); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_TotChargeValueCollect')); ?>:</b>
	<?php echo CHtml::encode($data->hor_TotChargeValueCollect); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_TotChargeTaxPrepaid')); ?>:</b>
	<?php echo CHtml::encode($data->ver_TotChargeTaxPrepaid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_TotChargeTaxPrepaid')); ?>:</b>
	<?php echo CHtml::encode($data->hor_TotChargeTaxPrepaid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_TotChargeTaxCollect')); ?>:</b>
	<?php echo CHtml::encode($data->ver_TotChargeTaxCollect); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_TotChargeTaxCollect')); ?>:</b>
	<?php echo CHtml::encode($data->hor_TotChargeTaxCollect); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AnotherChargesAgentPrepaid')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AnotherChargesAgentPrepaid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AnotherChargesAgentPrepaid')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AnotherChargesAgentPrepaid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AnotherChargesAgentCollect')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AnotherChargesAgentCollect); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AnotherChargesAgentCollect')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AnotherChargesAgentCollect); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AnotherChargesCarrierPrepaid')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AnotherChargesCarrierPrepaid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AnotherChargesCarrierPrepaid')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AnotherChargesCarrierPrepaid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AnotherChargesCarrierCollect')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AnotherChargesCarrierCollect); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AnotherChargesCarrierCollect')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AnotherChargesCarrierCollect); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_TotPrepaid')); ?>:</b>
	<?php echo CHtml::encode($data->ver_TotPrepaid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_TotPrepaid')); ?>:</b>
	<?php echo CHtml::encode($data->hor_TotPrepaid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_TotCollect')); ?>:</b>
	<?php echo CHtml::encode($data->ver_TotCollect); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_TotCollect')); ?>:</b>
	<?php echo CHtml::encode($data->hor_TotCollect); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_TerminalFee')); ?>:</b>
	<?php echo CHtml::encode($data->ver_TerminalFee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_TerminalFee')); ?>:</b>
	<?php echo CHtml::encode($data->hor_TerminalFee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_CustomFee')); ?>:</b>
	<?php echo CHtml::encode($data->ver_CustomFee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_CustomFee')); ?>:</b>
	<?php echo CHtml::encode($data->hor_CustomFee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_FuelSurcharge')); ?>:</b>
	<?php echo CHtml::encode($data->ver_FuelSurcharge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_FuelSurcharge')); ?>:</b>
	<?php echo CHtml::encode($data->hor_FuelSurcharge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_SecurityFee')); ?>:</b>
	<?php echo CHtml::encode($data->ver_SecurityFee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_SecurityFee')); ?>:</b>
	<?php echo CHtml::encode($data->hor_SecurityFee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_PBA')); ?>:</b>
	<?php echo CHtml::encode($data->ver_PBA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_PBA')); ?>:</b>
	<?php echo CHtml::encode($data->hor_PBA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_TAX')); ?>:</b>
	<?php echo CHtml::encode($data->ver_TAX); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_TAX')); ?>:</b>
	<?php echo CHtml::encode($data->hor_TAX); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AdditionalChargeName1')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AdditionalChargeName1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AdditionalChargeName1')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AdditionalChargeName1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AdditionalChargeVal1')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AdditionalChargeVal1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AdditionalChargeVal1')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AdditionalChargeVal1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AdditionalChargeName2')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AdditionalChargeName2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AdditionalChargeName2')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AdditionalChargeName2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AdditionalChargeVal2')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AdditionalChargeVal2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AdditionalChargeVal2')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AdditionalChargeVal2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_Invoice')); ?>:</b>
	<?php echo CHtml::encode($data->ver_Invoice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_Invoice')); ?>:</b>
	<?php echo CHtml::encode($data->hor_Invoice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_ExportLic')); ?>:</b>
	<?php echo CHtml::encode($data->ver_ExportLic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_ExportLic')); ?>:</b>
	<?php echo CHtml::encode($data->hor_ExportLic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AgentContactSignature')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AgentContactSignature); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AgentContactSignature')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AgentContactSignature); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_Instructions')); ?>:</b>
	<?php echo CHtml::encode($data->ver_Instructions); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_Instructions')); ?>:</b>
	<?php echo CHtml::encode($data->hor_Instructions); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AgentSignature')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AgentSignature); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AgentSignature')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AgentSignature); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AWBDate')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AWBDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AWBDate')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AWBDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AirportCode')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AirportCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AirportCode')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AirportCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AdditionalChargeName3')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AdditionalChargeName3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AdditionalChargeName3')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AdditionalChargeName3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AdditionalChargeVal3')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AdditionalChargeVal3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AdditionalChargeVal3')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AdditionalChargeVal3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AdditionalChargeName4')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AdditionalChargeName4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AdditionalChargeName4')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AdditionalChargeName4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AdditionalChargeVal4')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AdditionalChargeVal4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AdditionalChargeVal4')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AdditionalChargeVal4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Countries')); ?>:</b>
	<?php echo CHtml::encode($data->Countries); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_ChargeType2')); ?>:</b>
	<?php echo CHtml::encode($data->ver_ChargeType2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_ChargeType2')); ?>:</b>
	<?php echo CHtml::encode($data->hor_ChargeType2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_ValChargeType2')); ?>:</b>
	<?php echo CHtml::encode($data->ver_ValChargeType2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_ValChargeType2')); ?>:</b>
	<?php echo CHtml::encode($data->hor_ValChargeType2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_OtherChargeType2')); ?>:</b>
	<?php echo CHtml::encode($data->ver_OtherChargeType2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_OtherChargeType2')); ?>:</b>
	<?php echo CHtml::encode($data->hor_OtherChargeType2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OtherChargesPrintType')); ?>:</b>
	<?php echo CHtml::encode($data->OtherChargesPrintType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ComisionRate')); ?>:</b>
	<?php echo CHtml::encode($data->ComisionRate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GroupID')); ?>:</b>
	<?php echo CHtml::encode($data->GroupID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AWBNumber2')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AWBNumber2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AWBNumber2')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AWBNumber2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_AWBNumber3')); ?>:</b>
	<?php echo CHtml::encode($data->ver_AWBNumber3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_AWBNumber3')); ?>:</b>
	<?php echo CHtml::encode($data->hor_AWBNumber3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ver_id_cliente_order')); ?>:</b>
	<?php echo CHtml::encode($data->ver_id_cliente_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hor_id_cliente_order')); ?>:</b>
	<?php echo CHtml::encode($data->hor_id_cliente_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_insert')); ?>:</b>
	<?php echo CHtml::encode($data->user_insert); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_insert')); ?>:</b>
	<?php echo CHtml::encode($data->date_insert); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_update')); ?>:</b>
	<?php echo CHtml::encode($data->user_update); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_update')); ?>:</b>
	<?php echo CHtml::encode($data->date_update); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_auth')); ?>:</b>
	<?php echo CHtml::encode($data->user_auth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_auth')); ?>:</b>
	<?php echo CHtml::encode($data->date_auth); ?>
	<br />

	*/ ?>

</div>