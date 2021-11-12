<?php

/**
 * This is the model class for table "navieras_representantes".
 *
 * The followings are the available columns in table 'navieras_representantes':
 * @property integer $id
 * @property integer $id_naviera
 * @property integer $id_naviera_representante
 * @property boolean $activo
 * @property integer $user_insert
 * @property string $date_insert
 * @property integer $user_update
 * @property string $date_update
 * @property integer $user_auth
 * @property string $date_auth
 * @property string $observaciones
 *
 * The followings are the available model relations:
 * @property Navieras $idNaviera
 * @property Navieras $idNavieraRepresentante
 */
class NavierasRepresentantes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'navieras_representantes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_naviera, id_naviera_representante, user_insert, user_update, user_auth', 'numerical', 'integerOnly'=>true),
			array('activo, date_insert, date_update, date_auth, observaciones', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_naviera, id_naviera_representante, activo, user_insert, date_insert, user_update, date_update, user_auth, date_auth, observaciones', 'safe', 'on'=>'search'),
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
			'idNaviera' => array(self::BELONGS_TO, 'Navieras', 'id_naviera'),
			'idNavieraRepresentante' => array(self::BELONGS_TO, 'Navieras', 'id_naviera_representante'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_naviera' => 'Id Naviera',
			'id_naviera_representante' => 'Id Naviera Representante',
			'activo' => 'Activo',
			'user_insert' => 'User Insert',
			'date_insert' => 'Date Insert',
			'user_update' => 'User Update',
			'date_update' => 'Date Update',
			'user_auth' => 'User Auth',
			'date_auth' => 'Date Auth',
			'observaciones' => 'Observaciones',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('id_naviera',$this->id_naviera);
		$criteria->compare('id_naviera_representante',$this->id_naviera_representante);
		$criteria->compare('activo',$this->activo);
		$criteria->compare('user_insert',$this->user_insert);
		$criteria->compare('date_insert',$this->date_insert,true,'ILIKE');
		$criteria->compare('user_update',$this->user_update);
		$criteria->compare('date_update',$this->date_update,true,'ILIKE');
		$criteria->compare('user_auth',$this->user_auth);
		$criteria->compare('date_auth',$this->date_auth,true,'ILIKE');
		$criteria->compare('observaciones',$this->observaciones,true,'ILIKE');
		Yii::app()->session['NavierasRepresentantes_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,			
			'sort'=>array(
			    'defaultOrder'=>'id ASC',
			),				
		    'pagination'=>array(
		        'pageSize'=>10,
		    ),				
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NavierasRepresentantes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
