<?php

class SiteController extends Controller
{

	public $asDialog;

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		//if (!Yii::app()->user->isGuest) {

			Yii::app()->session['items'] = VwContactosMenu::getChilds2(1);

			$this->render('index');
		//}
		//else
		//	$this->redirect(array('login'));

	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else {

				//if ($this->asDialog)

				if (isset($_GET['text']))
					$this->layout = '//layouts/iframe';

				$this->render('error', $error);
			}

		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid

			//echo "<br><br><br>(entrar)";

			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);

			/*echo "<pre>";
			print_r($model);
			echo "</pre>";*/



			if ($model->expired == 98)
				$this->redirect(array('change'));

		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();

		if (Yii::app()->user->isGuest)
			$this->redirect(array('login'));
		else
			$this->redirect(Yii::app()->homeUrl);
	}


	public function actionChange()
	{
		$this->render('change');

	}


public function actionCheck_email_address($email) {
		$resul = true;

	    // First, we check that there's one @ symbol, and that the lengths are right
	    if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
	        // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
	        $resul = false;
	    }
	    // Split it into sections to make life easier
	    $email_array = explode("@", $email);
	    $local_array = explode(".", $email_array[0]);
	    for ($i = 0; $i < sizeof($local_array); $i++) {
	        if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
	            $resul = false;
	        }
	    }

	    if (isset($email_array[1]))

	    if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
	        $domain_array = explode(".", $email_array[1]);
	        if (sizeof($domain_array) < 2) {
	            $resul = false; // Not enough parts to domain
	        }
	        for ($i = 0; $i < sizeof($domain_array); $i++) {
	            if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
	                $resul = false;
	            }
	        }
	    }

        echo json_encode(array("res"=>$resul));
        die();
	}



	public function actionRenewSession()
  {
      echo (Yii::app()->user->getState(CWebUser::AUTH_TIMEOUT_VAR) - time() - 29) * 1000;
  }

						

}
