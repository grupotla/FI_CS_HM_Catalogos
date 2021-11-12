<?php

/**
 * This is the model class for table "DEF_USERS".
 *
 * The followings are the available columns in table 'DEF_USERS':
 * @property string $COD_USER
 * @property string $FIRSTNAME
 * @property string $LASTNAME
 * @property string $COD_GROUP
 * @property string $PASSWORD
 * @property string $STATUS
 * @property string $PASSWORD_EXPIRES
 * @property string $CHANGE_PASSWORD
 * @property string $PASSWORD_DATE
 * @property string $ID_CARD
 * @property string $BLOOD_TYPE
 * @property string $COMMENTS
 * @property string $USER_TYPE
 * @property string $EXTERNAL_USER
 * @property integer $id_usuario
 */
class DEFUSERS extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'DEF_USERS';
	}

	public function primaryKey(){
		return 'COD_USER';
  }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COD_USER, FIRSTNAME, LASTNAME, PASSWORD', 'required'),
			array('id_usuario', 'numerical', 'integerOnly'=>true),
			array('COD_USER', 'length', 'max'=>20),
			array('FIRSTNAME, LASTNAME', 'length', 'max'=>50),
			array('COD_GROUP, BLOOD_TYPE', 'length', 'max'=>10),
			array('PASSWORD', 'length', 'max'=>40),
			array('STATUS, PASSWORD_EXPIRES, CHANGE_PASSWORD, EXTERNAL_USER', 'length', 'max'=>1),
			array('ID_CARD', 'length', 'max'=>15),
			array('COMMENTS', 'length', 'max'=>100),
			array('USER_TYPE', 'length', 'max'=>2),
			array('PASSWORD_DATE', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('COD_USER, FIRSTNAME, LASTNAME, COD_GROUP, PASSWORD, STATUS, PASSWORD_EXPIRES, CHANGE_PASSWORD, PASSWORD_DATE, ID_CARD, BLOOD_TYPE, COMMENTS, USER_TYPE, EXTERNAL_USER, id_usuario', 'safe', 'on'=>'search'),
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
			'FIRSTNAME' => 'Primer nombre',
			'LASTNAME' => 'Apellido',
			'COD_GROUP' => 'codigo grupo',
			'PASSWORD' => 'contraseña',
			'STATUS' => 'estado',
			'PASSWORD_EXPIRES' => 'Vence contraseña',
			'CHANGE_PASSWORD' => 'Puede cambiar contraseña',
			'PASSWORD_DATE' => 'fecha vencimiento contraseña',
			'ID_CARD' => 'id tarjeta',
			'BLOOD_TYPE' => 'tipo de sangre',
			'COMMENTS' => 'Comentarios',
			'USER_TYPE' => 'Tipo de usuario',
			'EXTERNAL_USER' => 'Usuario externo',
			'id_usuario' => 'usuario master',
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
		$criteria->compare('FIRSTNAME',$this->FIRSTNAME,true,'ILIKE');
		$criteria->compare('LASTNAME',$this->LASTNAME,true,'ILIKE');
		$criteria->compare('COD_GROUP',$this->COD_GROUP,true,'ILIKE');
		$criteria->compare('PASSWORD',$this->PASSWORD,true,'ILIKE');
		$criteria->compare('STATUS',$this->STATUS,true,'ILIKE');
		$criteria->compare('PASSWORD_EXPIRES',$this->PASSWORD_EXPIRES,true,'ILIKE');
		$criteria->compare('CHANGE_PASSWORD',$this->CHANGE_PASSWORD,true,'ILIKE');
		$criteria->compare('PASSWORD_DATE',$this->PASSWORD_DATE,true,'ILIKE');
		$criteria->compare('ID_CARD',$this->ID_CARD,true,'ILIKE');
		$criteria->compare('BLOOD_TYPE',$this->BLOOD_TYPE,true,'ILIKE');
		$criteria->compare('COMMENTS',$this->COMMENTS,true,'ILIKE');
		$criteria->compare('USER_TYPE',$this->USER_TYPE,true,'ILIKE');
		$criteria->compare('EXTERNAL_USER',$this->EXTERNAL_USER,true,'ILIKE');
		$criteria->compare('id_usuario',$this->id_usuario);
		Yii::app()->session['DEFUSERS_records'] = $criteria;

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
	 * @return DEFUSERS the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
