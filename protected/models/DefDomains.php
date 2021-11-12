<?php

/**
 * This is the model class for table "DEF_DOMAINS".
 *
 * The followings are the available columns in table 'DEF_DOMAINS':
 * @property string $DOMAIN
 * @property string $DOMAINVALUE
 * @property string $MEANING
 * @property string $DESCRIPTION
 * @property string $MPC01
 * @property string $MPC02
 * @property string $MPC03
 */
class DefDomains extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'DEF_DOMAINS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('DOMAIN, DOMAINVALUE, DESCRIPTION', 'required'),
			array('DOMAIN', 'length', 'max'=>50),
			array('DOMAINVALUE', 'length', 'max'=>10),
			array('MEANING, DESCRIPTION, MPC02, MPC03', 'length', 'max'=>100),
			array('MPC01', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('DOMAIN, DOMAINVALUE, MEANING, DESCRIPTION, MPC01, MPC02, MPC03', 'safe', 'on'=>'search'),
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
			'DOMAIN' => 'nombre de dominio',
			'DOMAINVALUE' => 'valor de dominio',
			'MEANING' => 'desc dominio',
			'DESCRIPTION' => 'descripcion de dominio',
			'MPC01' => 'parametro 1',
			'MPC02' => 'parametro 2',
			'MPC03' => 'parametro 3',
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

		$criteria->compare('DOMAIN',$this->DOMAIN,true,'ILIKE');
		$criteria->compare('DOMAINVALUE',$this->DOMAINVALUE,true,'ILIKE');
		$criteria->compare('MEANING',$this->MEANING,true,'ILIKE');
		$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true,'ILIKE');
		$criteria->compare('MPC01',$this->MPC01,true,'ILIKE');
		$criteria->compare('MPC02',$this->MPC02,true,'ILIKE');
		$criteria->compare('MPC03',$this->MPC03,true,'ILIKE');
		Yii::app()->session['DefDomains_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,			
			'sort'=>array(
			    'defaultOrder'=>'DOMAIN ASC',
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
	 * @return DefDomains the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
