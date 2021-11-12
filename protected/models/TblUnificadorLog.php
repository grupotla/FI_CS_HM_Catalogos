<?php

/**
 * This is the model class for table "tbl_unificador_log".
 *
 * The followings are the available columns in table 'tbl_unificador_log':
 * @property integer $tul_cli_entrega_id
 * @property integer $tul_cli_recibe_id
 * @property string $tul_usu_id
 * @property integer $tul_tpi_id
 * @property integer $tul_pai_id
 * @property string $tul_fecha_creacion
 * @property integer $tul_estado
 */
class TblUnificadorLog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_unificador_log';
	}

	public function primaryKey(){
		//return 'tul_cli_entrega_id';
		return 'tul_fecha_creacion';
		//return 'tul_cli_recibe_id';
  }

public $id;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tul_cli_entrega_id, tul_cli_recibe_id, tul_tpi_id, tul_pai_id, tul_estado', 'numerical', 'integerOnly'=>true),
			array('tul_usu_id', 'length', 'max'=>30),
			array('tul_fecha_creacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tul_cli_entrega_id, tul_cli_recibe_id, tul_usu_id, tul_tpi_id, tul_pai_id, tul_fecha_creacion, tul_estado', 'safe', 'on'=>'search'),
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
			'idEntrega' => array(self::BELONGS_TO, 'Clientes', 'tul_cli_entrega_id'),
			'idRecibe' => array(self::BELONGS_TO, 'Clientes', 'tul_cli_recibe_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tul_cli_entrega_id' => 'Tul Cli Entrega',
			'tul_cli_recibe_id' => 'Tul Cli Recibe',
			'tul_usu_id' => 'Tul Usu',
			'tul_tpi_id' => 'Tul Tpi',
			'tul_pai_id' => 'Tul Pai',
			'tul_fecha_creacion' => 'Tul Fecha Creacion',
			'tul_estado' => 'Tul Estado',
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

		$criteria->compare('tul_cli_entrega_id',$this->tul_cli_entrega_id);
		$criteria->compare('tul_cli_recibe_id',$this->tul_cli_recibe_id);
		$criteria->compare('tul_usu_id',$this->tul_usu_id,true,'ILIKE');
		$criteria->compare('tul_tpi_id',$this->tul_tpi_id);
		$criteria->compare('tul_pai_id',$this->tul_pai_id);
		$criteria->compare('tul_fecha_creacion',$this->tul_fecha_creacion,true,'ILIKE');
		$criteria->compare('tul_estado',$this->tul_estado);
		Yii::app()->session['TblUnificadorLog_records'] = $criteria;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'tul_cli_entrega_id ASC',
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
		return Yii::app()->baw;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblUnificadorLog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
