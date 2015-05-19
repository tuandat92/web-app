<?php

class SiteController extends BackController
{
    public $layout='//layout/column1';
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

        $this->render('index');
        //gii back: http://localhost/game_yii/cpanel.php/gii/default/index
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
	    	else
	        	$this->render('error', $error);
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
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
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
			if($model->validate() && $model->login()) {
                $this->layout = '//layout/column1';
                //var_dump($model);exit;
                $this->redirect(Yii::app()->user->returnUrl);

            }

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
		$this->redirect(Yii::app()->homeUrl);
	}


//    public function actionJsonXS(){
//
//        $sql = 'SELECT `Ten_VM`,`Ten_TP`,`Ngay_XS`,`Giai_DB`,`Giai_DB`,`Giai_Nhat`,`Giai_Nhi`,`Giai_Ba`,`Giai_Tu`,`Giai_Nam`,`Giai_Sau`,`Giai_Bay`,`Giai_Tam`
//                  FROM `tbltinhtp` LEFT JOIN `tblxoso` ON `tbltinhtp`.ID_TP=`tblxoso`.ID_TP
//                  				   LEFT JOIN `tblvungmien`ON `tblvungmien`.ID_VM = `tbltinhtp`.ID_VM ';
//        $result = Yii::app()->db1->createCommand($sql)->queryAll();
//        $json = '{"results" :'.CJSON::encode($result).'}';
//        $this->render('json',array('json'=>$json));
//    }
//
//    public function actionJsonBD(){
//        $sql = 'SELECT `Ten_GiaiDau`,`Img_DaiDien`,`ThoiGian_BD`,`ThoiGian_KT`,`Ten_Quoc_Te`,`San_Dau`,`Link_Xem`,`Ty_So`,`Trang_Thai`,`Mo_Ta`,`So_CDV`,`Chu_Nha`,`Doi_Khach`,`Vong`,`ThoiGianDienRa`,`Mua_Giai` FROM `tblgiaidau`,`tbltrandau` WHERE `tblgiaidau`.ID_GiaiDau = `tbltrandau`.ID_GiaiDau ';
//        $result = Yii::app()->db->createCommand($sql)->queryAll();
//        $json = '{"results" :'.CJSON::encode($result).'}';
//        $this->render('json',array('json'=>$json));
//    }

}