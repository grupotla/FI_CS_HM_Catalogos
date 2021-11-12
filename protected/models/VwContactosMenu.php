<?php

/**
 * This is the model class for table "vw_menu".
 *
 * The followings are the available columns in table 'vw_menu':
 * @property integer $us_id
 * @property integer $mn_id
 * @property integer $mn_sort
 * @property integer $mn_parent
 * @property string $mn_viewer
 * @property string $mn_title_short
 * @property string $mn_title_long
 * @property string $mn_control
 * @property string $mn_action
 * @property string $mn_layout
 * @property string $mn_st
 * @property integer $mn_us_id
 * @property string $mn_dt
 */
class VwContactosMenu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vw_contactos_menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('us_id, mn_id, mn_sort, mn_parent, mn_us_id', 'numerical', 'integerOnly'=>true),
			array('mn_title_short', 'length', 'max'=>30),
			array('mn_title_long', 'length', 'max'=>60),
			array('mn_control', 'length', 'max'=>50),
			array('mn_action', 'length', 'max'=>15),
			array('mn_viewer, mn_layout, mn_st, mn_dt', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('us_id, mn_id, mn_sort, mn_parent, mn_viewer, mn_title_short, mn_title_long, mn_control, mn_action, mn_layout, mn_st, mn_us_id, mn_dt', 'safe', 'on'=>'search'),
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
			'us_id' => 'Us',
			'mn_id' => 'Mn',
			'mn_sort' => 'Mn Sort',
			'mn_parent' => 'Mn Parent',
			'mn_viewer' => 'Mn Viewer',
			'mn_title_short' => 'Mn Title Short',
			'mn_title_long' => 'Mn Title Long',
			'mn_control' => 'Mn Control',
			'mn_action' => 'Mn Action',
			'mn_layout' => 'Mn Layout',
			'mn_st' => 'Mn St',
			'mn_us_id' => 'Mn Us',
			'mn_dt' => 'Mn Dt',
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

		$criteria->compare('us_id',$this->us_id);
		$criteria->compare('mn_id',$this->mn_id);
		$criteria->compare('mn_sort',$this->mn_sort);
		$criteria->compare('mn_parent',$this->mn_parent);
		$criteria->compare('mn_viewer',$this->mn_viewer,true);
		$criteria->compare('mn_title_short',$this->mn_title_short,true);
		$criteria->compare('mn_title_long',$this->mn_title_long,true);
		$criteria->compare('mn_control',$this->mn_control,true);
		$criteria->compare('mn_action',$this->mn_action,true);
		$criteria->compare('mn_layout',$this->mn_layout,true);
		$criteria->compare('mn_st',$this->mn_st,true);
		$criteria->compare('mn_us_id',$this->mn_us_id);
		$criteria->compare('mn_dt',$this->mn_dt,true);
		//$criteria->condition = "";		
		//$criteria->order = "";
		
		
				
		Yii::app()->session['VwContactosMenu_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VwContactosMenu the static model class
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
    

	public static function getChilds2($id) { //MENU PRINCIPAL
		
		$subitems = array();		
		$where = "mn_st='Activo' AND mn_parent = '$id' AND mn_viewer <> 'panel' AND (mn_viewer = 'publico' OR '".Yii::app()->user->name."' = 'admin' OR us_id = '".intval(Yii::app()->user->id)."')";		
		//echo $where;
		
		$models = VwContactosMenu::model()->findAll(array("condition"=>$where,"order"=>"mn_sort asc"));
		$arr_menu_id = array();
		$data = array();
		$htm = '';


        foreach($models as $model) {        	
        	if (!in_array($model->mn_id,$arr_menu_id)) {				
        		$view = true;	

        		switch($model->mn_viewer){    					
					case "publico":
						break;
						
					case "admin":
						$view = (Yii::app()->user->name != "admin" ? false : true);	
						break;
						
					case "root":						
						$view = Yii::app()->session['root'];	
						break;
						
					default: //user
						$view = (Yii::app()->user->isGuest==1 && Yii::app()->user->name=="Guest"?false:true);
						break;
				}        		

        		if (!$view)
        			continue;		
				$arr_menu_id[] = $model->mn_id;
				$url = "#";
				if ($model->mn_control) {
					$url = "/{$model->mn_control}";
					if ($model->mn_action) 
						$url .= "/{$model->mn_action}";
					
					/*if (!empty($model->mn_layout))
						$url=array($url,'mn_id'=>$model->mn_id,'layout'=>$model->mn_layout);
					else
						$url=array($url,'mn_id'=>$model->mn_id);*/
						
						$url=array($url);
				}
				
				$subitems = VwContactosMenu::getChilds2($model->mn_id);				
				$arr_tmp = array();				
				$arr_tmp['url'] = $url;
				
				$arr_tmp['id'] = $model->mn_id;

				$arr_tmp['label'] = $model->mn_title_short;
				$arr_tmp['icon'] = "icon-".$model->mn_icon . " " . TbHtml::ICON_COLOR_WHITE;
				
				if (count($subitems) > 0) 
					$arr_tmp['items'] = $subitems;
					
				$data[] = $arr_tmp;
			}
        }
        return $data;
    }    





	public static function getChilds3($id,$level) {	//OPCIONES DE MENU Y OPCIONES POR USUARIO	
		$query = "mn_parent = $id AND mn_st='Activo'";		
		//$query = "mn_parent = $id";
		//echo $query."<br>";		
		$models = VwContactosMenu::model()->findAll(array("condition"=>$query,"order"=>"mn_sort asc"));		
		$arr_menu_id = array();
		$data = array();		
        foreach($models as $model) {        	
        	if (!in_array($model->mn_id,$arr_menu_id)) 
        	{				
        		//if ($model->mn_viewer == "admin" && $level != 4) continue;		
        		//echo $model->mn_id." ".$model->mn_title_short."<br>";
				$arr_menu_id[] = $model->mn_id;				
				$subitems = VwContactosMenu::getChilds3($model->mn_id,$level);				
				$arr_tmp = array();								
				if (count($subitems) > 0) {					
					/*$arr_tmp['parent']['label'] = $model->mn_title_short;					
					$arr_tmp['parent']['id'] = $model->mn_id;					
					$arr_tmp['parent']['view'] = $model->mn_viewer;
					$arr_tmp['control'] = $model->mn_control;*/
					$arr_tmp['children'] = $subitems;					
					$arr_tmp['parent'] = "";
					
				} else {
					/*$arr_tmp['label'] = $model->mn_title_short;
					$arr_tmp['id'] = $model->mn_id;
					$arr_tmp['view'] = $model->mn_viewer;
					$arr_tmp['control'] = $model->mn_control;*/
					$arr_tmp['parent'] = $model->mn_parent;
				}
				
				$arr_tmp['label'] = $model->mn_title_short;
				$arr_tmp['id'] = $model->mn_id;
				$arr_tmp['view'] = $model->mn_viewer;
				$arr_tmp['stat'] = $model->mn_st;
				$arr_tmp['control'] = $model->mn_control;
				$arr_tmp['sort'] = $model->mn_sort;
				$arr_tmp['action'] = $model->mn_action;
								
				$data[] = $arr_tmp;
			}
        }
        return $data;
    }    
	




	
}
