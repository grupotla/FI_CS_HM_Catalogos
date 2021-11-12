<?php

/**
 * This is the model class for table "DEF_USERS_TRANS".
 *
 * The followings are the available columns in table 'DEF_USERS_TRANS':
 * @property string $COD_USER
 * @property string $DET_INDEX
 * @property string $TRANS_TYPE
 * @property string $DATETIME_TRANS
 */
class DefUsersTrans extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'DEF_USERS_TRANS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COD_USER, DET_INDEX, TRANS_TYPE', 'required'),
			array('COD_USER', 'length', 'max'=>20),
			array('DET_INDEX', 'length', 'max'=>3),
			array('TRANS_TYPE', 'length', 'max'=>10),
			array('DATETIME_TRANS', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('COD_USER, DET_INDEX, TRANS_TYPE, DATETIME_TRANS', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'COD_USER' => 'codigo usuario',
			'DET_INDEX' => 'indice de detalle',
			'TRANS_TYPE' => 'tipo de transporte',
			'DATETIME_TRANS' => 'fecha hora de transporte',
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

		$criteria->compare('COD_USER',$this->COD_USER,true,'ILIKE');
		$criteria->compare('DET_INDEX',$this->DET_INDEX,true,'ILIKE');
		$criteria->compare('TRANS_TYPE',$this->TRANS_TYPE,true,'ILIKE');
		$criteria->compare('DATETIME_TRANS',$this->DATETIME_TRANS,true,'ILIKE');
		Yii::app()->session['DefUsersTrans_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,			
			'sort'=>array(
			    'defaultOrder'=>'COD_USER ASC',
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
		return Yii::app()->wms;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DefUsersTrans the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
