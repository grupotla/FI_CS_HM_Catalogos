<?php

/**
 * This is the model class for table "contactos_menu".
 *
 * The followings are the available columns in table 'contactos_menu':
 * @property integer $mn_id
 * @property integer $mn_sort
 * @property integer $mn_parent
 * @property string $mn_title_short
 * @property string $mn_title_long
 * @property string $mn_viewer
 * @property string $mn_control
 * @property string $mn_action
 * @property string $mn_layout
 * @property string $mn_st
 * @property integer $mn_us_id
 * @property string $mn_dt
 *
 * The followings are the available model relations:
 * @property ContactosMenu $mnParent
 * @property ContactosMenu[] $contactosMenus
 * @property ContactosEnums $mnSt
 * @property ContactosEnums $mnViewer
 * @property ContactosUsersMenu[] $contactosUsersMenus
 */
class ContactosMenu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contactos_menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mn_sort, mn_parent, mn_us_id', 'numerical', 'integerOnly'=>true),
			array('mn_title_short', 'length', 'max'=>30),
			array('mn_title_long', 'length', 'max'=>60),
			array('mn_control', 'length', 'max'=>50),
			array('mn_action', 'length', 'max'=>15),
			array('mn_viewer, mn_layout, mn_st, mn_dt', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('mn_id, mn_sort, mn_parent, mn_title_short, mn_title_long, mn_viewer, mn_control, mn_action, mn_layout, mn_st, mn_us_id, mn_dt', 'safe', 'on'=>'search'),
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
			'mnParent' => array(self::BELONGS_TO, 'ContactosMenu', 'mn_parent'),
			'contactosMenus' => array(self::HAS_MANY, 'ContactosMenu', 'mn_parent'),
			'mnSt' => array(self::BELONGS_TO, 'ContactosEnums', 'mn_st'),
			'mnViewer' => array(self::BELONGS_TO, 'ContactosEnums', 'mn_viewer'),
			'contactosUsersMenus' => array(self::HAS_MANY, 'ContactosUsersMenu', 'um_mn_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'mn_id' => 'Id contactos_menu',
			'mn_sort' => 'Orden',
			'mn_parent' => 'Id Padre',
			'mn_title_short' => 'Titulo',
			'mn_title_long' => 'Titulo Largo',
			'mn_viewer' => 'Acceso',
			'mn_control' => 'ControlDB',
			'mn_action' => 'AccionDB',
			'mn_layout' => 'Layout',
			'mn_st' => 'Status',
			'mn_us_id' => 'Usuario',
			'mn_dt' => 'Fecha',
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

		$criteria->compare('mn_id',$this->mn_id);
		$criteria->compare('mn_sort',$this->mn_sort);
		$criteria->compare('mn_parent',$this->mn_parent);
		$criteria->compare('mn_title_short',$this->mn_title_short,true);
		$criteria->compare('mn_title_long',$this->mn_title_long,true);
		$criteria->compare('mn_viewer',$this->mn_viewer,true);
		$criteria->compare('mn_control',$this->mn_control,true);
		$criteria->compare('mn_action',$this->mn_action,true);
		$criteria->compare('mn_layout',$this->mn_layout,true);
		$criteria->compare('mn_st',$this->mn_st,true);
		$criteria->compare('mn_us_id',$this->mn_us_id);
		$criteria->compare('mn_dt',$this->mn_dt,true);
		//$criteria->condition = "";		
		//$criteria->order = "";
		
		
				
		Yii::app()->session['ContactosMenu_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ContactosMenu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/*
    public function behaviors()
    {
        return array('ESaveRelatedBehavior' => array(
                'class' => 'application.components.ESaveRelatedBehavior')
        );
    }
    */	
	
}
