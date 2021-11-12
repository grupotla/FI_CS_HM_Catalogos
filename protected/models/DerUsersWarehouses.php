<?php

/**
 * This is the model class for table "DEF_USERS_WAREHOUSES".
 *
 * The followings are the available columns in table 'DEF_USERS_WAREHOUSES':
 * @property string $COD_USER
 * @property string $COD_WAREHOUSE
 */
class DerUsersWarehouses extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'DEF_USERS_WAREHOUSES';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COD_USER, COD_WAREHOUSE', 'required'),
			array('COD_USER', 'length', 'max'=>20),
			array('COD_WAREHOUSE', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('COD_USER, COD_WAREHOUSE', 'safe', 'on'=>'search'),
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
			'COD_WAREHOUSE' => 'codigo bodega',
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
		$criteria->compare('COD_WAREHOUSE',$this->COD_WAREHOUSE,true,'ILIKE');
		Yii::app()->session['DerUsersWarehouses_records'] = $criteria;		

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
	 * @return DerUsersWarehouses the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
