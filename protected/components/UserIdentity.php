<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	 
	private $_id;

	public function authenticate()
	{		
		$sql = "SELECT id_usuario, pw_gecos, pais, pw_passwd_dias, pw_passwd_fecha, to_date(cast(pw_passwd_fecha + interval '1' day * pw_passwd_dias as varchar),'yyyy-mm-dd') as fec_res, CURRENT_DATE - to_date(cast(pw_passwd_fecha + interval '1' day * pw_passwd_dias as varchar),'yyyy-mm-dd') as days, pw_name from usuarios_empresas where pw_activo=1 and pw_name='" . strtolower($this->username) . "' and (pw_passwd=md5('" . $this->password . "') OR pw_passwd='" . $this->password . "')";

		//$sql = "SELECT id_usuario, pw_gecos from usuarios_empresas where pw_activo=1 and pw_name='" . strtolower($this->username) . "' and (pw_passwd=md5('" . $this->password . "') or pw_passwd='" . $this->password . "')";
		
		echo '<script>console.log("'.$sql.'");</script>';
		
		$row = Yii::app()->db->createCommand($sql)->queryRow();		
		if ($row) {						
			//$row['days'] = 0;
			if ($row['days'] > 0) {
				
				$this->errorCode=98;
				
			} else {
				
				$thisusername = '';
				
				if (Yii::app()->controller->action->id == "login" && Yii::app()->controller->id == "site") 
					Yii::app()->session['root'] = false;
				
				$sql = "SELECT id_usuario, level FROM usuarios_empresas_login WHERE create_id_usuario = '{$row['id_usuario']}' AND pw_name = '{$row['pw_name']}' AND pw_activo = 't'";					
				$row1 = Yii::app()->db->createCommand($sql)->queryRow();		
				if ($row1) {	
					$thisusername = 'admin';
					
					if (Yii::app()->controller->action->id == "login" && Yii::app()->controller->id == "site") 
						if ($row1['level'] == 0)
							Yii::app()->session['root'] = true;
							
				} else {
					$thisusername = 'user';
				}
				
				
				if (Yii::app()->controller->action->id == "login" && Yii::app()->controller->id == "site") {
					
					$this->_id=$row['id_usuario'];
					Yii::app()->session['usr_nm'] = $row['pw_gecos'];
					Yii::app()->session['pais'] = trim($row['pais']);
					
					$this->username = $thisusername;
					
					$this->errorCode=self::ERROR_NONE;
					
				} else {
					
					//para los auth de creacion clientes nuevos
					
					$this->errorCode=self::ERROR_USERNAME_INVALID;
					
					if ($thisusername == 'admin') {
						
						$this->errorCode=self::ERROR_NONE;
						
					} else {
					
						$query = "mn_control = '".Yii::app()->controller->id."' AND mn_viewer <> 'panel'";
						//echo "($query)<br>";		
						$menu = ContactosMenu::model()->find($query);
						if ($menu) {
							$query = "id_usuario = '".$row['id_usuario']."' AND um_mn_id = '".$menu->mn_id."'"; 
							//echo "($query)<br>";		
							$users=ContactosUsersMenu::model()->find($query);
							if ($users) {				
							
								//echo "(".$users->um_permisos.")<br>";				
								if ($users->um_permisos[2] == 1){ //tiene permisos para autorizar crear/modificar clientes
									
									if ($row['id_usuario'] == Yii::app()->user->id)
										$this->errorCode=96;
									else
										$this->errorCode=self::ERROR_NONE;
									
								} else {
									$this->errorCode=97;
								}
									
								
							}
						}
					}
				}				
			}
		} else {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		} 
				
		return $this->errorCode;
		
			
		/*
		$users=array(
			// username => password
			'admin'=>'andreasofia',
		);
		
		$user=UsuariosEmpresas::model()->find('LOWER(pw_name)=?',array(strtolower($this->username)));	
		if($user===null){
			if(!isset($users[$this->username]))
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			elseif($users[$this->username]!==$this->password)
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			else {

				if (Yii::app()->controller->action->id == "login" && Yii::app()->controller->id == "site") {				
					$this->_id=1;
					$this->username = 'admin';
					Yii::app()->session['usr_nm'] = 'Admin';
				}					
				$this->errorCode=self::ERROR_NONE;
			}
			return $this->errorCode;
		}
		else if(!$row['validatePassword($this->password)){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}
		else
		{
			if (Yii::app()->controller->action->id == "login" && Yii::app()->controller->id == "site") {
				$this->_id=$row['id_usuario;
				Yii::app()->session['usr_nm'] = $row['pw_gecos;
				if ($row['id_usuario == 1237) {
					$this->username = 'admin';
				} else {
					$this->username = 'user';
				}
				$this->errorCode=self::ERROR_NONE;
			} else {
				$this->errorCode=self::ERROR_USERNAME_INVALID;
				if ($row['id_usuario == 1237) {				
					$this->errorCode=self::ERROR_NONE;
				} else {
					$query = "mn_control = '".Yii::app()->controller->id."' AND mn_viewer <> 'panel'";
					//echo "($query)<br>";		
					$menu = ContactosMenu::model()->find($query);
					if ($menu) {
						$query = "id_usuario = '".$row['id_usuario."' AND um_mn_id = '".$menu->mn_id."'"; 
						//echo "($query)<br>";		
						$users=ContactosUsersMenu::model()->find($query);
						if ($users) {						
							if ($users->um_permisos[2] == 1) //tiene permisos para autorizar creacion clientes nuevos
								$this->errorCode=self::ERROR_NONE;
						}
					}
				}
			}
		}		
		return $this->errorCode;
		*/
	}

	/**
	 * @return integer the ID of the user record
	 */
	 
	public function getId()
	{
		return ($this->_id ? $this->_id : 0);
	}
		 
	/*	public function authenticate()
	{
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}	*/
}