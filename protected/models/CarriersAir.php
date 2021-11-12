<?php

/**
 * This is the model class for table "Carriers".
 *
 * The followings are the available columns in table 'Carriers':
 * @property double $CarrierID
 * @property string $Name
 * @property string $CreatedDate
 * @property double $CreatedTime
 * @property double $Expired
 * @property string $CarrierCode
 * @property double $ver_AWBNumber
 * @property double $hor_AWBNumber
 * @property double $ver_AccountShipperNo
 * @property double $hor_AccountShipperNo
 * @property double $ver_ShipperData
 * @property double $hor_ShipperData
 * @property double $ver_AccountConsignerNo
 * @property double $hor_AccountConsignerNo
 * @property double $ver_ConsignerData
 * @property double $hor_ConsignerData
 * @property double $ver_AgentData
 * @property double $hor_AgentData
 * @property double $ver_AccountInformation
 * @property double $hor_AccountInformation
 * @property double $ver_IATANo
 * @property double $hor_IATANo
 * @property double $ver_AccountAgentNo
 * @property double $hor_AccountAgentNo
 * @property double $ver_AirportDepID
 * @property double $hor_AirportDepID
 * @property double $ver_RequestedRouting
 * @property double $hor_RequestedRouting
 * @property double $ver_AirportToCode1
 * @property double $hor_AirportToCode1
 * @property double $ver_CarrierID
 * @property double $hor_CarrierID
 * @property double $ver_AirportToCode2
 * @property double $hor_AirportToCode2
 * @property double $ver_AirportToCode3
 * @property double $hor_AirportToCode3
 * @property double $ver_CarrierCode2
 * @property double $hor_CarrierCode2
 * @property double $ver_CarrierCode3
 * @property double $hor_CarrierCode3
 * @property double $ver_CurrencyID
 * @property double $hor_CurrencyID
 * @property double $ver_ChargeType
 * @property double $hor_ChargeType
 * @property double $ver_ValChargeType
 * @property double $hor_ValChargeType
 * @property double $ver_OtherChargeType
 * @property double $hor_OtherChargeType
 * @property double $ver_DeclaredValue
 * @property double $hor_DeclaredValue
 * @property double $ver_AduanaValue
 * @property double $hor_AduanaValue
 * @property double $ver_AirportDesID
 * @property double $hor_AirportDesID
 * @property double $ver_FlightDate1
 * @property double $hor_FlightDate1
 * @property double $ver_FlightDate2
 * @property double $hor_FlightDate2
 * @property double $ver_SecuredValue
 * @property double $hor_SecuredValue
 * @property double $ver_HandlingInformation
 * @property double $hor_HandlingInformation
 * @property double $ver_Observations
 * @property double $hor_Observations
 * @property double $ver_NoOfPieces
 * @property double $hor_NoOfPieces
 * @property double $ver_Weights
 * @property double $hor_Weights
 * @property double $ver_WeightsSymbol
 * @property double $hor_WeightsSymbol
 * @property double $ver_Commodities
 * @property double $hor_Commodities
 * @property double $ver_ChargeableWeights
 * @property double $hor_ChargeableWeights
 * @property double $ver_CarrierRates
 * @property double $hor_CarrierRates
 * @property double $ver_CarriersubTot
 * @property double $hor_CarriersubTot
 * @property double $ver_NatureQtyGoods
 * @property double $hor_NatureQtyGoods
 * @property double $ver_TotNoOfPieces
 * @property double $hor_TotNoOfPieces
 * @property double $ver_TotWeight
 * @property double $hor_TotWeight
 * @property double $ver_TotCarrierRate
 * @property double $hor_TotCarrierRate
 * @property double $ver_TotChargeWeightPrepaid
 * @property double $hor_TotChargeWeightPrepaid
 * @property double $ver_TotChargeWeightCollect
 * @property double $hor_TotChargeWeightCollect
 * @property double $ver_TotChargeValuePrepaid
 * @property double $hor_TotChargeValuePrepaid
 * @property double $ver_TotChargeValueCollect
 * @property double $hor_TotChargeValueCollect
 * @property double $ver_TotChargeTaxPrepaid
 * @property double $hor_TotChargeTaxPrepaid
 * @property double $ver_TotChargeTaxCollect
 * @property double $hor_TotChargeTaxCollect
 * @property double $ver_AnotherChargesAgentPrepaid
 * @property double $hor_AnotherChargesAgentPrepaid
 * @property double $ver_AnotherChargesAgentCollect
 * @property double $hor_AnotherChargesAgentCollect
 * @property double $ver_AnotherChargesCarrierPrepaid
 * @property double $hor_AnotherChargesCarrierPrepaid
 * @property double $ver_AnotherChargesCarrierCollect
 * @property double $hor_AnotherChargesCarrierCollect
 * @property double $ver_TotPrepaid
 * @property double $hor_TotPrepaid
 * @property double $ver_TotCollect
 * @property double $hor_TotCollect
 * @property double $ver_TerminalFee
 * @property double $hor_TerminalFee
 * @property double $ver_CustomFee
 * @property double $hor_CustomFee
 * @property double $ver_FuelSurcharge
 * @property double $hor_FuelSurcharge
 * @property double $ver_SecurityFee
 * @property double $hor_SecurityFee
 * @property double $ver_PBA
 * @property double $hor_PBA
 * @property double $ver_TAX
 * @property double $hor_TAX
 * @property double $ver_AdditionalChargeName1
 * @property double $hor_AdditionalChargeName1
 * @property double $ver_AdditionalChargeVal1
 * @property double $hor_AdditionalChargeVal1
 * @property double $ver_AdditionalChargeName2
 * @property double $hor_AdditionalChargeName2
 * @property double $ver_AdditionalChargeVal2
 * @property double $hor_AdditionalChargeVal2
 * @property double $ver_Invoice
 * @property double $hor_Invoice
 * @property double $ver_ExportLic
 * @property double $hor_ExportLic
 * @property double $ver_AgentContactSignature
 * @property double $hor_AgentContactSignature
 * @property double $ver_Instructions
 * @property double $hor_Instructions
 * @property double $ver_AgentSignature
 * @property double $hor_AgentSignature
 * @property double $ver_AWBDate
 * @property double $hor_AWBDate
 * @property double $ver_AirportCode
 * @property double $hor_AirportCode
 * @property double $ver_AdditionalChargeName3
 * @property double $hor_AdditionalChargeName3
 * @property double $ver_AdditionalChargeVal3
 * @property double $hor_AdditionalChargeVal3
 * @property double $ver_AdditionalChargeName4
 * @property double $hor_AdditionalChargeName4
 * @property double $ver_AdditionalChargeVal4
 * @property double $hor_AdditionalChargeVal4
 * @property string $Countries
 * @property double $ver_ChargeType2
 * @property double $hor_ChargeType2
 * @property double $ver_ValChargeType2
 * @property double $hor_ValChargeType2
 * @property double $ver_OtherChargeType2
 * @property double $hor_OtherChargeType2
 * @property double $OtherChargesPrintType
 * @property double $ComisionRate
 * @property double $GroupID
 * @property double $ver_AWBNumber2
 * @property double $hor_AWBNumber2
 * @property double $ver_AWBNumber3
 * @property double $hor_AWBNumber3
 * @property double $ver_id_cliente_order
 * @property double $hor_id_cliente_order
 * @property integer $activo
 * @property integer $user_insert
 * @property string $date_insert
 * @property integer $user_update
 * @property string $date_update
 * @property integer $user_auth
 * @property string $date_auth
 */
class CarriersAir extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Carriers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(

			array('Countries, Name, CarrierCode, ComisionRate', 'required'),

			array('activo, user_insert, user_update, user_auth', 'numerical', 'integerOnly'=>true),
			array('CreatedTime, Expired, ver_AWBNumber, hor_AWBNumber, ver_AccountShipperNo, hor_AccountShipperNo, ver_ShipperData, hor_ShipperData, ver_AccountConsignerNo, hor_AccountConsignerNo, ver_ConsignerData, hor_ConsignerData, ver_AgentData, hor_AgentData, ver_AccountInformation, hor_AccountInformation, ver_IATANo, hor_IATANo, ver_AccountAgentNo, hor_AccountAgentNo, ver_AirportDepID, hor_AirportDepID, ver_RequestedRouting, hor_RequestedRouting, ver_AirportToCode1, hor_AirportToCode1, ver_CarrierID, hor_CarrierID, ver_AirportToCode2, hor_AirportToCode2, ver_AirportToCode3, hor_AirportToCode3, ver_CarrierCode2, hor_CarrierCode2, ver_CarrierCode3, hor_CarrierCode3, ver_CurrencyID, hor_CurrencyID, ver_ChargeType, hor_ChargeType, ver_ValChargeType, hor_ValChargeType, ver_OtherChargeType, hor_OtherChargeType, ver_DeclaredValue, hor_DeclaredValue, ver_AduanaValue, hor_AduanaValue, ver_AirportDesID, hor_AirportDesID, ver_FlightDate1, hor_FlightDate1, ver_FlightDate2, hor_FlightDate2, ver_SecuredValue, hor_SecuredValue, ver_HandlingInformation, hor_HandlingInformation, ver_Observations, hor_Observations, ver_NoOfPieces, hor_NoOfPieces, ver_Weights, hor_Weights, ver_WeightsSymbol, hor_WeightsSymbol, ver_Commodities, hor_Commodities, ver_ChargeableWeights, hor_ChargeableWeights, ver_CarrierRates, hor_CarrierRates, ver_CarriersubTot, hor_CarriersubTot, ver_NatureQtyGoods, hor_NatureQtyGoods, ver_TotNoOfPieces, hor_TotNoOfPieces, ver_TotWeight, hor_TotWeight, ver_TotCarrierRate, hor_TotCarrierRate, ver_TotChargeWeightPrepaid, hor_TotChargeWeightPrepaid, ver_TotChargeWeightCollect, hor_TotChargeWeightCollect, ver_TotChargeValuePrepaid, hor_TotChargeValuePrepaid, ver_TotChargeValueCollect, hor_TotChargeValueCollect, ver_TotChargeTaxPrepaid, hor_TotChargeTaxPrepaid, ver_TotChargeTaxCollect, hor_TotChargeTaxCollect, ver_AnotherChargesAgentPrepaid, hor_AnotherChargesAgentPrepaid, ver_AnotherChargesAgentCollect, hor_AnotherChargesAgentCollect, ver_AnotherChargesCarrierPrepaid, hor_AnotherChargesCarrierPrepaid, ver_AnotherChargesCarrierCollect, hor_AnotherChargesCarrierCollect, ver_TotPrepaid, hor_TotPrepaid, ver_TotCollect, hor_TotCollect, ver_TerminalFee, hor_TerminalFee, ver_CustomFee, hor_CustomFee, ver_FuelSurcharge, hor_FuelSurcharge, ver_SecurityFee, hor_SecurityFee, ver_PBA, hor_PBA, ver_TAX, hor_TAX, ver_AdditionalChargeName1, hor_AdditionalChargeName1, ver_AdditionalChargeVal1, hor_AdditionalChargeVal1, ver_AdditionalChargeName2, hor_AdditionalChargeName2, ver_AdditionalChargeVal2, hor_AdditionalChargeVal2, ver_Invoice, hor_Invoice, ver_ExportLic, hor_ExportLic, ver_AgentContactSignature, hor_AgentContactSignature, ver_Instructions, hor_Instructions, ver_AgentSignature, hor_AgentSignature, ver_AWBDate, hor_AWBDate, ver_AirportCode, hor_AirportCode, ver_AdditionalChargeName3, hor_AdditionalChargeName3, ver_AdditionalChargeVal3, hor_AdditionalChargeVal3, ver_AdditionalChargeName4, hor_AdditionalChargeName4, ver_AdditionalChargeVal4, hor_AdditionalChargeVal4, ver_ChargeType2, hor_ChargeType2, ver_ValChargeType2, hor_ValChargeType2, ver_OtherChargeType2, hor_OtherChargeType2, OtherChargesPrintType, ComisionRate, GroupID, ver_AWBNumber2, hor_AWBNumber2, ver_AWBNumber3, hor_AWBNumber3, ver_id_cliente_order, hor_id_cliente_order', 'numerical'),
			array('Name, Countries', 'length', 'max'=>45),
			array('CarrierCode', 'length', 'max'=>5),
			array('CreatedDate, date_insert, date_update, date_auth', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CarrierID, Name, CreatedDate, CreatedTime, Expired, CarrierCode, ver_AWBNumber, hor_AWBNumber, ver_AccountShipperNo, hor_AccountShipperNo, ver_ShipperData, hor_ShipperData, ver_AccountConsignerNo, hor_AccountConsignerNo, ver_ConsignerData, hor_ConsignerData, ver_AgentData, hor_AgentData, ver_AccountInformation, hor_AccountInformation, ver_IATANo, hor_IATANo, ver_AccountAgentNo, hor_AccountAgentNo, ver_AirportDepID, hor_AirportDepID, ver_RequestedRouting, hor_RequestedRouting, ver_AirportToCode1, hor_AirportToCode1, ver_CarrierID, hor_CarrierID, ver_AirportToCode2, hor_AirportToCode2, ver_AirportToCode3, hor_AirportToCode3, ver_CarrierCode2, hor_CarrierCode2, ver_CarrierCode3, hor_CarrierCode3, ver_CurrencyID, hor_CurrencyID, ver_ChargeType, hor_ChargeType, ver_ValChargeType, hor_ValChargeType, ver_OtherChargeType, hor_OtherChargeType, ver_DeclaredValue, hor_DeclaredValue, ver_AduanaValue, hor_AduanaValue, ver_AirportDesID, hor_AirportDesID, ver_FlightDate1, hor_FlightDate1, ver_FlightDate2, hor_FlightDate2, ver_SecuredValue, hor_SecuredValue, ver_HandlingInformation, hor_HandlingInformation, ver_Observations, hor_Observations, ver_NoOfPieces, hor_NoOfPieces, ver_Weights, hor_Weights, ver_WeightsSymbol, hor_WeightsSymbol, ver_Commodities, hor_Commodities, ver_ChargeableWeights, hor_ChargeableWeights, ver_CarrierRates, hor_CarrierRates, ver_CarriersubTot, hor_CarriersubTot, ver_NatureQtyGoods, hor_NatureQtyGoods, ver_TotNoOfPieces, hor_TotNoOfPieces, ver_TotWeight, hor_TotWeight, ver_TotCarrierRate, hor_TotCarrierRate, ver_TotChargeWeightPrepaid, hor_TotChargeWeightPrepaid, ver_TotChargeWeightCollect, hor_TotChargeWeightCollect, ver_TotChargeValuePrepaid, hor_TotChargeValuePrepaid, ver_TotChargeValueCollect, hor_TotChargeValueCollect, ver_TotChargeTaxPrepaid, hor_TotChargeTaxPrepaid, ver_TotChargeTaxCollect, hor_TotChargeTaxCollect, ver_AnotherChargesAgentPrepaid, hor_AnotherChargesAgentPrepaid, ver_AnotherChargesAgentCollect, hor_AnotherChargesAgentCollect, ver_AnotherChargesCarrierPrepaid, hor_AnotherChargesCarrierPrepaid, ver_AnotherChargesCarrierCollect, hor_AnotherChargesCarrierCollect, ver_TotPrepaid, hor_TotPrepaid, ver_TotCollect, hor_TotCollect, ver_TerminalFee, hor_TerminalFee, ver_CustomFee, hor_CustomFee, ver_FuelSurcharge, hor_FuelSurcharge, ver_SecurityFee, hor_SecurityFee, ver_PBA, hor_PBA, ver_TAX, hor_TAX, ver_AdditionalChargeName1, hor_AdditionalChargeName1, ver_AdditionalChargeVal1, hor_AdditionalChargeVal1, ver_AdditionalChargeName2, hor_AdditionalChargeName2, ver_AdditionalChargeVal2, hor_AdditionalChargeVal2, ver_Invoice, hor_Invoice, ver_ExportLic, hor_ExportLic, ver_AgentContactSignature, hor_AgentContactSignature, ver_Instructions, hor_Instructions, ver_AgentSignature, hor_AgentSignature, ver_AWBDate, hor_AWBDate, ver_AirportCode, hor_AirportCode, ver_AdditionalChargeName3, hor_AdditionalChargeName3, ver_AdditionalChargeVal3, hor_AdditionalChargeVal3, ver_AdditionalChargeName4, hor_AdditionalChargeName4, ver_AdditionalChargeVal4, hor_AdditionalChargeVal4, Countries, ver_ChargeType2, hor_ChargeType2, ver_ValChargeType2, hor_ValChargeType2, ver_OtherChargeType2, hor_OtherChargeType2, OtherChargesPrintType, ComisionRate, GroupID, ver_AWBNumber2, hor_AWBNumber2, ver_AWBNumber3, hor_AWBNumber3, ver_id_cliente_order, hor_id_cliente_order, activo, user_insert, date_insert, user_update, date_update, user_auth, date_auth', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'routings' => array(self::HAS_MANY, 'Routings', 'carrier_id'),
			'carriersCreditos' => array(self::HAS_MANY, 'CarriersCredito', 'carrier_id', 'order'=>'id_car_cred ASC'),
			'countries0' => array(self::BELONGS_TO, 'Paises', 'countries'),
			'usuario0' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'user_insert'),
			'usuario1' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'user_update'),
			'usuario2' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'user_auth'),	
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CarrierID' => 'Carrier',
			'Name' => 'Name',
			'CreatedDate' => 'Created Date',
			'CreatedTime' => 'Created Time',
			'Expired' => 'Expired',
			'CarrierCode' => 'Carrier Code',
			'ver_AWBNumber' => 'Ver Awbnumber',
			'hor_AWBNumber' => 'Hor Awbnumber',
			'ver_AccountShipperNo' => 'Ver Account Shipper No',
			'hor_AccountShipperNo' => 'Hor Account Shipper No',
			'ver_ShipperData' => 'Ver Shipper Data',
			'hor_ShipperData' => 'Hor Shipper Data',
			'ver_AccountConsignerNo' => 'Ver Account Consigner No',
			'hor_AccountConsignerNo' => 'Hor Account Consigner No',
			'ver_ConsignerData' => 'Ver Consigner Data',
			'hor_ConsignerData' => 'Hor Consigner Data',
			'ver_AgentData' => 'Ver Agent Data',
			'hor_AgentData' => 'Hor Agent Data',
			'ver_AccountInformation' => 'Ver Account Information',
			'hor_AccountInformation' => 'Hor Account Information',
			'ver_IATANo' => 'Ver Iatano',
			'hor_IATANo' => 'Hor Iatano',
			'ver_AccountAgentNo' => 'Ver Account Agent No',
			'hor_AccountAgentNo' => 'Hor Account Agent No',
			'ver_AirportDepID' => 'Ver Airport Dep',
			'hor_AirportDepID' => 'Hor Airport Dep',
			'ver_RequestedRouting' => 'Ver Requested Routing',
			'hor_RequestedRouting' => 'Hor Requested Routing',
			'ver_AirportToCode1' => 'Ver Airport To Code1',
			'hor_AirportToCode1' => 'Hor Airport To Code1',
			'ver_CarrierID' => 'Ver Carrier',
			'hor_CarrierID' => 'Hor Carrier',
			'ver_AirportToCode2' => 'Ver Airport To Code2',
			'hor_AirportToCode2' => 'Hor Airport To Code2',
			'ver_AirportToCode3' => 'Ver Airport To Code3',
			'hor_AirportToCode3' => 'Hor Airport To Code3',
			'ver_CarrierCode2' => 'Ver Carrier Code2',
			'hor_CarrierCode2' => 'Hor Carrier Code2',
			'ver_CarrierCode3' => 'Ver Carrier Code3',
			'hor_CarrierCode3' => 'Hor Carrier Code3',
			'ver_CurrencyID' => 'Ver Currency',
			'hor_CurrencyID' => 'Hor Currency',
			'ver_ChargeType' => 'Ver Charge Type',
			'hor_ChargeType' => 'Hor Charge Type',
			'ver_ValChargeType' => 'Ver Val Charge Type',
			'hor_ValChargeType' => 'Hor Val Charge Type',
			'ver_OtherChargeType' => 'Ver Other Charge Type',
			'hor_OtherChargeType' => 'Hor Other Charge Type',
			'ver_DeclaredValue' => 'Ver Declared Value',
			'hor_DeclaredValue' => 'Hor Declared Value',
			'ver_AduanaValue' => 'Ver Aduana Value',
			'hor_AduanaValue' => 'Hor Aduana Value',
			'ver_AirportDesID' => 'Ver Airport Des',
			'hor_AirportDesID' => 'Hor Airport Des',
			'ver_FlightDate1' => 'Ver Flight Date1',
			'hor_FlightDate1' => 'Hor Flight Date1',
			'ver_FlightDate2' => 'Ver Flight Date2',
			'hor_FlightDate2' => 'Hor Flight Date2',
			'ver_SecuredValue' => 'Ver Secured Value',
			'hor_SecuredValue' => 'Hor Secured Value',
			'ver_HandlingInformation' => 'Ver Handling Information',
			'hor_HandlingInformation' => 'Hor Handling Information',
			'ver_Observations' => 'Ver Observations',
			'hor_Observations' => 'Hor Observations',
			'ver_NoOfPieces' => 'Ver No Of Pieces',
			'hor_NoOfPieces' => 'Hor No Of Pieces',
			'ver_Weights' => 'Ver Weights',
			'hor_Weights' => 'Hor Weights',
			'ver_WeightsSymbol' => 'Ver Weights Symbol',
			'hor_WeightsSymbol' => 'Hor Weights Symbol',
			'ver_Commodities' => 'Ver Commodities',
			'hor_Commodities' => 'Hor Commodities',
			'ver_ChargeableWeights' => 'Ver Chargeable Weights',
			'hor_ChargeableWeights' => 'Hor Chargeable Weights',
			'ver_CarrierRates' => 'Ver Carrier Rates',
			'hor_CarrierRates' => 'Hor Carrier Rates',
			'ver_CarriersubTot' => 'Ver Carriersub Tot',
			'hor_CarriersubTot' => 'Hor Carriersub Tot',
			'ver_NatureQtyGoods' => 'Ver Nature Qty Goods',
			'hor_NatureQtyGoods' => 'Hor Nature Qty Goods',
			'ver_TotNoOfPieces' => 'Ver Tot No Of Pieces',
			'hor_TotNoOfPieces' => 'Hor Tot No Of Pieces',
			'ver_TotWeight' => 'Ver Tot Weight',
			'hor_TotWeight' => 'Hor Tot Weight',
			'ver_TotCarrierRate' => 'Ver Tot Carrier Rate',
			'hor_TotCarrierRate' => 'Hor Tot Carrier Rate',
			'ver_TotChargeWeightPrepaid' => 'Ver Tot Charge Weight Prepaid',
			'hor_TotChargeWeightPrepaid' => 'Hor Tot Charge Weight Prepaid',
			'ver_TotChargeWeightCollect' => 'Ver Tot Charge Weight Collect',
			'hor_TotChargeWeightCollect' => 'Hor Tot Charge Weight Collect',
			'ver_TotChargeValuePrepaid' => 'Ver Tot Charge Value Prepaid',
			'hor_TotChargeValuePrepaid' => 'Hor Tot Charge Value Prepaid',
			'ver_TotChargeValueCollect' => 'Ver Tot Charge Value Collect',
			'hor_TotChargeValueCollect' => 'Hor Tot Charge Value Collect',
			'ver_TotChargeTaxPrepaid' => 'Ver Tot Charge Tax Prepaid',
			'hor_TotChargeTaxPrepaid' => 'Hor Tot Charge Tax Prepaid',
			'ver_TotChargeTaxCollect' => 'Ver Tot Charge Tax Collect',
			'hor_TotChargeTaxCollect' => 'Hor Tot Charge Tax Collect',
			'ver_AnotherChargesAgentPrepaid' => 'Ver Another Charges Agent Prepaid',
			'hor_AnotherChargesAgentPrepaid' => 'Hor Another Charges Agent Prepaid',
			'ver_AnotherChargesAgentCollect' => 'Ver Another Charges Agent Collect',
			'hor_AnotherChargesAgentCollect' => 'Hor Another Charges Agent Collect',
			'ver_AnotherChargesCarrierPrepaid' => 'Ver Another Charges Carrier Prepaid',
			'hor_AnotherChargesCarrierPrepaid' => 'Hor Another Charges Carrier Prepaid',
			'ver_AnotherChargesCarrierCollect' => 'Ver Another Charges Carrier Collect',
			'hor_AnotherChargesCarrierCollect' => 'Hor Another Charges Carrier Collect',
			'ver_TotPrepaid' => 'Ver Tot Prepaid',
			'hor_TotPrepaid' => 'Hor Tot Prepaid',
			'ver_TotCollect' => 'Ver Tot Collect',
			'hor_TotCollect' => 'Hor Tot Collect',
			'ver_TerminalFee' => 'Ver Terminal Fee',
			'hor_TerminalFee' => 'Hor Terminal Fee',
			'ver_CustomFee' => 'Ver Custom Fee',
			'hor_CustomFee' => 'Hor Custom Fee',
			'ver_FuelSurcharge' => 'Ver Fuel Surcharge',
			'hor_FuelSurcharge' => 'Hor Fuel Surcharge',
			'ver_SecurityFee' => 'Ver Security Fee',
			'hor_SecurityFee' => 'Hor Security Fee',
			'ver_PBA' => 'Ver Pba',
			'hor_PBA' => 'Hor Pba',
			'ver_TAX' => 'Ver Tax',
			'hor_TAX' => 'Hor Tax',
			'ver_AdditionalChargeName1' => 'Ver Additional Charge Name1',
			'hor_AdditionalChargeName1' => 'Hor Additional Charge Name1',
			'ver_AdditionalChargeVal1' => 'Ver Additional Charge Val1',
			'hor_AdditionalChargeVal1' => 'Hor Additional Charge Val1',
			'ver_AdditionalChargeName2' => 'Ver Additional Charge Name2',
			'hor_AdditionalChargeName2' => 'Hor Additional Charge Name2',
			'ver_AdditionalChargeVal2' => 'Ver Additional Charge Val2',
			'hor_AdditionalChargeVal2' => 'Hor Additional Charge Val2',
			'ver_Invoice' => 'Ver Invoice',
			'hor_Invoice' => 'Hor Invoice',
			'ver_ExportLic' => 'Ver Export Lic',
			'hor_ExportLic' => 'Hor Export Lic',
			'ver_AgentContactSignature' => 'Ver Agent Contact Signature',
			'hor_AgentContactSignature' => 'Hor Agent Contact Signature',
			'ver_Instructions' => 'Ver Instructions',
			'hor_Instructions' => 'Hor Instructions',
			'ver_AgentSignature' => 'Ver Agent Signature',
			'hor_AgentSignature' => 'Hor Agent Signature',
			'ver_AWBDate' => 'Ver Awbdate',
			'hor_AWBDate' => 'Hor Awbdate',
			'ver_AirportCode' => 'Ver Airport Code',
			'hor_AirportCode' => 'Hor Airport Code',
			'ver_AdditionalChargeName3' => 'Ver Additional Charge Name3',
			'hor_AdditionalChargeName3' => 'Hor Additional Charge Name3',
			'ver_AdditionalChargeVal3' => 'Ver Additional Charge Val3',
			'hor_AdditionalChargeVal3' => 'Hor Additional Charge Val3',
			'ver_AdditionalChargeName4' => 'Ver Additional Charge Name4',
			'hor_AdditionalChargeName4' => 'Hor Additional Charge Name4',
			'ver_AdditionalChargeVal4' => 'Ver Additional Charge Val4',
			'hor_AdditionalChargeVal4' => 'Hor Additional Charge Val4',
			'Countries' => 'Countries',
			'ver_ChargeType2' => 'Ver Charge Type2',
			'hor_ChargeType2' => 'Hor Charge Type2',
			'ver_ValChargeType2' => 'Ver Val Charge Type2',
			'hor_ValChargeType2' => 'Hor Val Charge Type2',
			'ver_OtherChargeType2' => 'Ver Other Charge Type2',
			'hor_OtherChargeType2' => 'Hor Other Charge Type2',
			'OtherChargesPrintType' => 'Other Charges Print Type',
			'ComisionRate' => 'Comision Rate',
			'GroupID' => 'Group',
			'ver_AWBNumber2' => 'Ver Awbnumber2',
			'hor_AWBNumber2' => 'Hor Awbnumber2',
			'ver_AWBNumber3' => 'Ver Awbnumber3',
			'hor_AWBNumber3' => 'Hor Awbnumber3',
			'ver_id_cliente_order' => 'Ver Id Cliente Order',
			'hor_id_cliente_order' => 'Hor Id Cliente Order',
			'activo' => 'Activo',
			'user_insert' => 'User Insert',
			'date_insert' => 'Date Insert',
			'user_update' => 'User Update',
			'date_update' => 'Date Update',
			'user_auth' => 'User Auth',
			'date_auth' => 'Date Auth',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('CarrierID',$this->CarrierID);
		$criteria->compare('Name',$this->Name,true,'LIKE');
		$criteria->compare('CreatedDate',$this->CreatedDate,true,'LIKE');
		$criteria->compare('CreatedTime',$this->CreatedTime);
		$criteria->compare('Expired',$this->Expired);
		$criteria->compare('CarrierCode',$this->CarrierCode,true,'LIKE');
		$criteria->compare('ver_AWBNumber',$this->ver_AWBNumber);
		$criteria->compare('hor_AWBNumber',$this->hor_AWBNumber);
		$criteria->compare('ver_AccountShipperNo',$this->ver_AccountShipperNo);
		$criteria->compare('hor_AccountShipperNo',$this->hor_AccountShipperNo);
		$criteria->compare('ver_ShipperData',$this->ver_ShipperData);
		$criteria->compare('hor_ShipperData',$this->hor_ShipperData);
		$criteria->compare('ver_AccountConsignerNo',$this->ver_AccountConsignerNo);
		$criteria->compare('hor_AccountConsignerNo',$this->hor_AccountConsignerNo);
		$criteria->compare('ver_ConsignerData',$this->ver_ConsignerData);
		$criteria->compare('hor_ConsignerData',$this->hor_ConsignerData);
		$criteria->compare('ver_AgentData',$this->ver_AgentData);
		$criteria->compare('hor_AgentData',$this->hor_AgentData);
		$criteria->compare('ver_AccountInformation',$this->ver_AccountInformation);
		$criteria->compare('hor_AccountInformation',$this->hor_AccountInformation);
		$criteria->compare('ver_IATANo',$this->ver_IATANo);
		$criteria->compare('hor_IATANo',$this->hor_IATANo);
		$criteria->compare('ver_AccountAgentNo',$this->ver_AccountAgentNo);
		$criteria->compare('hor_AccountAgentNo',$this->hor_AccountAgentNo);
		$criteria->compare('ver_AirportDepID',$this->ver_AirportDepID);
		$criteria->compare('hor_AirportDepID',$this->hor_AirportDepID);
		$criteria->compare('ver_RequestedRouting',$this->ver_RequestedRouting);
		$criteria->compare('hor_RequestedRouting',$this->hor_RequestedRouting);
		$criteria->compare('ver_AirportToCode1',$this->ver_AirportToCode1);
		$criteria->compare('hor_AirportToCode1',$this->hor_AirportToCode1);
		$criteria->compare('ver_CarrierID',$this->ver_CarrierID);
		$criteria->compare('hor_CarrierID',$this->hor_CarrierID);
		$criteria->compare('ver_AirportToCode2',$this->ver_AirportToCode2);
		$criteria->compare('hor_AirportToCode2',$this->hor_AirportToCode2);
		$criteria->compare('ver_AirportToCode3',$this->ver_AirportToCode3);
		$criteria->compare('hor_AirportToCode3',$this->hor_AirportToCode3);
		$criteria->compare('ver_CarrierCode2',$this->ver_CarrierCode2);
		$criteria->compare('hor_CarrierCode2',$this->hor_CarrierCode2);
		$criteria->compare('ver_CarrierCode3',$this->ver_CarrierCode3);
		$criteria->compare('hor_CarrierCode3',$this->hor_CarrierCode3);
		$criteria->compare('ver_CurrencyID',$this->ver_CurrencyID);
		$criteria->compare('hor_CurrencyID',$this->hor_CurrencyID);
		$criteria->compare('ver_ChargeType',$this->ver_ChargeType);
		$criteria->compare('hor_ChargeType',$this->hor_ChargeType);
		$criteria->compare('ver_ValChargeType',$this->ver_ValChargeType);
		$criteria->compare('hor_ValChargeType',$this->hor_ValChargeType);
		$criteria->compare('ver_OtherChargeType',$this->ver_OtherChargeType);
		$criteria->compare('hor_OtherChargeType',$this->hor_OtherChargeType);
		$criteria->compare('ver_DeclaredValue',$this->ver_DeclaredValue);
		$criteria->compare('hor_DeclaredValue',$this->hor_DeclaredValue);
		$criteria->compare('ver_AduanaValue',$this->ver_AduanaValue);
		$criteria->compare('hor_AduanaValue',$this->hor_AduanaValue);
		$criteria->compare('ver_AirportDesID',$this->ver_AirportDesID);
		$criteria->compare('hor_AirportDesID',$this->hor_AirportDesID);
		$criteria->compare('ver_FlightDate1',$this->ver_FlightDate1);
		$criteria->compare('hor_FlightDate1',$this->hor_FlightDate1);
		$criteria->compare('ver_FlightDate2',$this->ver_FlightDate2);
		$criteria->compare('hor_FlightDate2',$this->hor_FlightDate2);
		$criteria->compare('ver_SecuredValue',$this->ver_SecuredValue);
		$criteria->compare('hor_SecuredValue',$this->hor_SecuredValue);
		$criteria->compare('ver_HandlingInformation',$this->ver_HandlingInformation);
		$criteria->compare('hor_HandlingInformation',$this->hor_HandlingInformation);
		$criteria->compare('ver_Observations',$this->ver_Observations);
		$criteria->compare('hor_Observations',$this->hor_Observations);
		$criteria->compare('ver_NoOfPieces',$this->ver_NoOfPieces);
		$criteria->compare('hor_NoOfPieces',$this->hor_NoOfPieces);
		$criteria->compare('ver_Weights',$this->ver_Weights);
		$criteria->compare('hor_Weights',$this->hor_Weights);
		$criteria->compare('ver_WeightsSymbol',$this->ver_WeightsSymbol);
		$criteria->compare('hor_WeightsSymbol',$this->hor_WeightsSymbol);
		$criteria->compare('ver_Commodities',$this->ver_Commodities);
		$criteria->compare('hor_Commodities',$this->hor_Commodities);
		$criteria->compare('ver_ChargeableWeights',$this->ver_ChargeableWeights);
		$criteria->compare('hor_ChargeableWeights',$this->hor_ChargeableWeights);
		$criteria->compare('ver_CarrierRates',$this->ver_CarrierRates);
		$criteria->compare('hor_CarrierRates',$this->hor_CarrierRates);
		$criteria->compare('ver_CarriersubTot',$this->ver_CarriersubTot);
		$criteria->compare('hor_CarriersubTot',$this->hor_CarriersubTot);
		$criteria->compare('ver_NatureQtyGoods',$this->ver_NatureQtyGoods);
		$criteria->compare('hor_NatureQtyGoods',$this->hor_NatureQtyGoods);
		$criteria->compare('ver_TotNoOfPieces',$this->ver_TotNoOfPieces);
		$criteria->compare('hor_TotNoOfPieces',$this->hor_TotNoOfPieces);
		$criteria->compare('ver_TotWeight',$this->ver_TotWeight);
		$criteria->compare('hor_TotWeight',$this->hor_TotWeight);
		$criteria->compare('ver_TotCarrierRate',$this->ver_TotCarrierRate);
		$criteria->compare('hor_TotCarrierRate',$this->hor_TotCarrierRate);
		$criteria->compare('ver_TotChargeWeightPrepaid',$this->ver_TotChargeWeightPrepaid);
		$criteria->compare('hor_TotChargeWeightPrepaid',$this->hor_TotChargeWeightPrepaid);
		$criteria->compare('ver_TotChargeWeightCollect',$this->ver_TotChargeWeightCollect);
		$criteria->compare('hor_TotChargeWeightCollect',$this->hor_TotChargeWeightCollect);
		$criteria->compare('ver_TotChargeValuePrepaid',$this->ver_TotChargeValuePrepaid);
		$criteria->compare('hor_TotChargeValuePrepaid',$this->hor_TotChargeValuePrepaid);
		$criteria->compare('ver_TotChargeValueCollect',$this->ver_TotChargeValueCollect);
		$criteria->compare('hor_TotChargeValueCollect',$this->hor_TotChargeValueCollect);
		$criteria->compare('ver_TotChargeTaxPrepaid',$this->ver_TotChargeTaxPrepaid);
		$criteria->compare('hor_TotChargeTaxPrepaid',$this->hor_TotChargeTaxPrepaid);
		$criteria->compare('ver_TotChargeTaxCollect',$this->ver_TotChargeTaxCollect);
		$criteria->compare('hor_TotChargeTaxCollect',$this->hor_TotChargeTaxCollect);
		$criteria->compare('ver_AnotherChargesAgentPrepaid',$this->ver_AnotherChargesAgentPrepaid);
		$criteria->compare('hor_AnotherChargesAgentPrepaid',$this->hor_AnotherChargesAgentPrepaid);
		$criteria->compare('ver_AnotherChargesAgentCollect',$this->ver_AnotherChargesAgentCollect);
		$criteria->compare('hor_AnotherChargesAgentCollect',$this->hor_AnotherChargesAgentCollect);
		$criteria->compare('ver_AnotherChargesCarrierPrepaid',$this->ver_AnotherChargesCarrierPrepaid);
		$criteria->compare('hor_AnotherChargesCarrierPrepaid',$this->hor_AnotherChargesCarrierPrepaid);
		$criteria->compare('ver_AnotherChargesCarrierCollect',$this->ver_AnotherChargesCarrierCollect);
		$criteria->compare('hor_AnotherChargesCarrierCollect',$this->hor_AnotherChargesCarrierCollect);
		$criteria->compare('ver_TotPrepaid',$this->ver_TotPrepaid);
		$criteria->compare('hor_TotPrepaid',$this->hor_TotPrepaid);
		$criteria->compare('ver_TotCollect',$this->ver_TotCollect);
		$criteria->compare('hor_TotCollect',$this->hor_TotCollect);
		$criteria->compare('ver_TerminalFee',$this->ver_TerminalFee);
		$criteria->compare('hor_TerminalFee',$this->hor_TerminalFee);
		$criteria->compare('ver_CustomFee',$this->ver_CustomFee);
		$criteria->compare('hor_CustomFee',$this->hor_CustomFee);
		$criteria->compare('ver_FuelSurcharge',$this->ver_FuelSurcharge);
		$criteria->compare('hor_FuelSurcharge',$this->hor_FuelSurcharge);
		$criteria->compare('ver_SecurityFee',$this->ver_SecurityFee);
		$criteria->compare('hor_SecurityFee',$this->hor_SecurityFee);
		$criteria->compare('ver_PBA',$this->ver_PBA);
		$criteria->compare('hor_PBA',$this->hor_PBA);
		$criteria->compare('ver_TAX',$this->ver_TAX);
		$criteria->compare('hor_TAX',$this->hor_TAX);
		$criteria->compare('ver_AdditionalChargeName1',$this->ver_AdditionalChargeName1);
		$criteria->compare('hor_AdditionalChargeName1',$this->hor_AdditionalChargeName1);
		$criteria->compare('ver_AdditionalChargeVal1',$this->ver_AdditionalChargeVal1);
		$criteria->compare('hor_AdditionalChargeVal1',$this->hor_AdditionalChargeVal1);
		$criteria->compare('ver_AdditionalChargeName2',$this->ver_AdditionalChargeName2);
		$criteria->compare('hor_AdditionalChargeName2',$this->hor_AdditionalChargeName2);
		$criteria->compare('ver_AdditionalChargeVal2',$this->ver_AdditionalChargeVal2);
		$criteria->compare('hor_AdditionalChargeVal2',$this->hor_AdditionalChargeVal2);
		$criteria->compare('ver_Invoice',$this->ver_Invoice);
		$criteria->compare('hor_Invoice',$this->hor_Invoice);
		$criteria->compare('ver_ExportLic',$this->ver_ExportLic);
		$criteria->compare('hor_ExportLic',$this->hor_ExportLic);
		$criteria->compare('ver_AgentContactSignature',$this->ver_AgentContactSignature);
		$criteria->compare('hor_AgentContactSignature',$this->hor_AgentContactSignature);
		$criteria->compare('ver_Instructions',$this->ver_Instructions);
		$criteria->compare('hor_Instructions',$this->hor_Instructions);
		$criteria->compare('ver_AgentSignature',$this->ver_AgentSignature);
		$criteria->compare('hor_AgentSignature',$this->hor_AgentSignature);
		$criteria->compare('ver_AWBDate',$this->ver_AWBDate);
		$criteria->compare('hor_AWBDate',$this->hor_AWBDate);
		$criteria->compare('ver_AirportCode',$this->ver_AirportCode);
		$criteria->compare('hor_AirportCode',$this->hor_AirportCode);
		$criteria->compare('ver_AdditionalChargeName3',$this->ver_AdditionalChargeName3);
		$criteria->compare('hor_AdditionalChargeName3',$this->hor_AdditionalChargeName3);
		$criteria->compare('ver_AdditionalChargeVal3',$this->ver_AdditionalChargeVal3);
		$criteria->compare('hor_AdditionalChargeVal3',$this->hor_AdditionalChargeVal3);
		$criteria->compare('ver_AdditionalChargeName4',$this->ver_AdditionalChargeName4);
		$criteria->compare('hor_AdditionalChargeName4',$this->hor_AdditionalChargeName4);
		$criteria->compare('ver_AdditionalChargeVal4',$this->ver_AdditionalChargeVal4);
		$criteria->compare('hor_AdditionalChargeVal4',$this->hor_AdditionalChargeVal4);
		$criteria->compare('Countries',$this->Countries,true,'LIKE');
		$criteria->compare('ver_ChargeType2',$this->ver_ChargeType2);
		$criteria->compare('hor_ChargeType2',$this->hor_ChargeType2);
		$criteria->compare('ver_ValChargeType2',$this->ver_ValChargeType2);
		$criteria->compare('hor_ValChargeType2',$this->hor_ValChargeType2);
		$criteria->compare('ver_OtherChargeType2',$this->ver_OtherChargeType2);
		$criteria->compare('hor_OtherChargeType2',$this->hor_OtherChargeType2);
		$criteria->compare('OtherChargesPrintType',$this->OtherChargesPrintType);
		$criteria->compare('ComisionRate',$this->ComisionRate);
		$criteria->compare('GroupID',$this->GroupID);
		$criteria->compare('ver_AWBNumber2',$this->ver_AWBNumber2);
		$criteria->compare('hor_AWBNumber2',$this->hor_AWBNumber2);
		$criteria->compare('ver_AWBNumber3',$this->ver_AWBNumber3);
		$criteria->compare('hor_AWBNumber3',$this->hor_AWBNumber3);
		$criteria->compare('ver_id_cliente_order',$this->ver_id_cliente_order);
		$criteria->compare('hor_id_cliente_order',$this->hor_id_cliente_order);
		$criteria->compare('activo',$this->activo);
		$criteria->compare('user_insert',$this->user_insert);
		$criteria->compare('date_insert',$this->date_insert,true,'LIKE');
		$criteria->compare('user_update',$this->user_update);
		$criteria->compare('date_update',$this->date_update,true,'LIKE');
		$criteria->compare('user_auth',$this->user_auth);
		$criteria->compare('date_auth',$this->date_auth,true,'LIKE');
		Yii::app()->session['CarriersAir_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,			
			'sort'=>array(
			    'defaultOrder'=>'CarrierID desc',
			),				
		    'pagination'=>array(
		        'pageSize'=>10,
		    ),				
		));
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->aereo;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CarriersAir the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
