<?php

/**
 * This is the model class for table "navieras".
 *
 * The followings are the available columns in table 'navieras':
 * @property string $id_naviera
 * @property string $nombre
 * @property boolean $activo
 * @property integer $tiporegimen
 * @property integer $dias
 * @property string $nit
 * @property string $nit2
 * @property string $id_pais
 * @property string $monto
 * @property integer $id_naviera_group
 * @property integer $user_insert
 * @property string $date_insert
 * @property integer $user_update
 * @property string $date_update
 * @property integer $user_auth
 * @property string $date_auth
 * @property boolean $activo_bk
 * @property boolean $parent_id
 *
 * The followings are the available model relations:
 * @property NavierasRepresentantes[] $navierasRepresentantes
 * @property NavierasGroups $idNavieraGroup
 * @property NavierasCredito[] $navierasCreditos
 * @property Routings[] $routings
 */
class Navieras extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'navieras';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		
			array('nombre, id_naviera_group, parent_id, id_pais, tiporegimen', 'required'),
			array(Yii::app()->session['permisos'][Yii::app()->controller->id]['fields'], 'disabled'), 					
			array('tiporegimen, dias, id_naviera_group, user_insert, user_update, user_auth, parent_id', 'numerical', 'integerOnly'=>true),
			array('nit, nit2', 'length', 'max'=>30),
			array('id_pais', 'length', 'max'=>2),
			array('monto', 'length', 'max'=>12),
			array('nombre, activo, date_insert, date_update, date_auth, activo_bk', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_naviera, nombre, activo, tiporegimen, dias, nit, nit2, id_pais, monto, id_naviera_group, user_insert, date_insert, user_update, date_update, user_auth, date_auth, activo_bk, parent_id', 'safe', 'on'=>'search'),
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
			//'navierasRepresentantes' => array(self::HAS_MANY, 'NavierasRepresentantes', 'id_naviera_group'),			
			'idNavieraGroup' => array(self::BELONGS_TO, 'NavierasGroups', 'id_naviera_group'),
			'tiporegimen0' => array(self::BELONGS_TO, 'Tiporegimen', 'tiporegimen'),				
			//'navierasCreditos' => array(self::HAS_MANY, 'NavierasCredito', 'id_naviera'),
			'routings' => array(self::HAS_MANY, 'Routings', 'id_naviera'),
			'navierasCreditos' => array(self::HAS_MANY, 'NavierasCredito', 'id_naviera', 'order'=>'id_nav_cred ASC'),
			'usuario0' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'user_insert'),
			'usuario1' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'user_update'),
			'usuario2' => array(self::BELONGS_TO, 'UsuariosEmpresas', 'user_auth'),	

			//'parent0' => array(self::BELONGS_TO, 'Navieras', '', 'foreignKey' => array('parent_id'=>'id_naviera'),'condition'=>"", 'order'=>''),

			//'represe0' => array(self::HAS_MANY, 'Navieras', '', 'foreignKey' => array('id_naviera'=>'parent_id'), 'select'=>"COUNT(*) as ttt", ),


			'navieras_representantes' => array(self::HAS_MANY, 'NavierasRepresentantes', 'id_naviera'),
			
			'representantes_navieras' => array(self::HAS_MANY, 'NavierasRepresentantes', 'id_naviera_representante', 
				//'foreignKey' => array('id_naviera_representante'=>'id_naviera')
			),

			'nav0' => array(self::STAT, 'NavierasRepresentantes', 'id_naviera', 'select' => 'COUNT(id_naviera)'),
			
			'rep0' => array(self::STAT, 'NavierasRepresentantes', 'id_naviera_representante', 				
				'select' => 'COUNT(id_naviera)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_naviera' => 'Id Naviera',
			'nombre' => 'Nombre Naviera',
			'activo' => 'Activo',
			'tiporegimen' => 'Tipo Regimen',
			'dias' => 'Dias',
			'nit' => 'Nit',
			'nit2' => 'Nit2',
			'id_pais' => 'Pais',
			'monto' => 'Monto',
			'id_naviera_group' => 'Grupo',
			'user_insert'=>'Usuario Creacion',
			'date_insert'=>'Fecha Creacion',
			'user_update'=>'Usuario Modifica',
			'date_update'=>'Fecha Modifica',
			'user_auth'=>'Usuario Autoriza',
			'date_auth'=>'Fecha Autoriza',
			'parent_id'=>'Tipo Registro',
			'tipo_naviera'=>'Tipo Naviera',
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

		$criteria->compare('id_naviera',$this->id_naviera);
		$criteria->compare('nombre',$this->nombre,true,'ILIKE');
		$criteria->compare('activo',$this->activo);
		$criteria->compare('tiporegimen',$this->tiporegimen);
		$criteria->compare('dias',$this->dias);
		$criteria->compare('nit',$this->nit,true,'ILIKE');
		$criteria->compare('nit2',$this->nit2,true,'ILIKE');
		$criteria->compare('id_pais',$this->id_pais,true);
		$criteria->compare('monto',$this->monto,true);
		$criteria->compare('id_naviera_group',$this->id_naviera_group);
		$criteria->compare('user_insert',$this->user_insert);
		$criteria->compare('date_insert',$this->date_insert,true,'ILIKE');
		$criteria->compare('user_update',$this->user_update);
		$criteria->compare('date_update',$this->date_update,true,'ILIKE');
		$criteria->compare('user_auth',$this->user_auth);
		$criteria->compare('date_auth',$this->date_auth,true,'ILIKE');
		$criteria->compare('activo_bk',$this->activo_bk);
		$criteria->compare('parent_id',$this->parent_id);
		Yii::app()->session['Navieras3_records'] = $criteria;		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'activo desc, id_naviera DESC',
			),	
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Navieras the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function getNamecode()
	{
		return $this->nombre . " - " . $this->id_naviera;
	}

	public function getCodename()
	{
		return $this->id_naviera . " - " . $this->nombre;
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
