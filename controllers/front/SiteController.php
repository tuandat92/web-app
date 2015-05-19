<?php

class SiteController extends FrontController
{

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $this->layout = "//layouts/column1";
        //$model_left = TheLoai::model()->findAll();
        //$this->render('index',array('models'=>$model_left));
        $this->render('index');
    }

    /*public function actionGallery()
    {
        $gallery = Gimage::model()->findAllByAttributes(array('gid' => 2, 'publish' => 1), array('order' => 't.order DESC'));
        $this->render('gallery', array(
            'gallery' => $gallery,
        ));
    }*/

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {

        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
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
        $this->layout='//layouts/column3';
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $subject = 'Email liên hệ từ I-LOGO  - '.'From '.$model->name;
                $body = '
					<h1>Email liên hệ từ website I-LOGO</h1>
					<p><b>Người gửi:</b>' . $model->name .
                    '<br/><b>Email:</b>' . $model->email .
                    '<br/><b>Nội dung:</b>' . $model->body . '<br/><br/>
					</p>';
//                $headers = "From: {$model->email}\r\nReply-To: {$model->email}";
//                mail(Yii::app()->params['adminEmail'], $model->subject, $model->body, $headers);
                $this->sendMail(Yii::app()->params['adminEmail'],$model->name,$subject,$body);
                Yii::app()->user->setFlash('contact', 'Gửi email thành công.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        echo 1;exit;
        $this->layout = '';

        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }


    public function loadModel($id)
    {
        $model = Match::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function actionJsonXS(){
        //$result = Tinhtp::model()->with('xo_so')->findAll();

        //$vung = Tinhtp::model()->with('vung_mien','xo_so')->findAll();
        $vung = Tinhtp::model()->with('xo_so')->findAll();
        $result = array();

        //var_dump($vung);exit;
        foreach($vung as $value){
            var_dump($value->xo_so);
        }
        exit;

        
        foreach($vung as $model) {
            $view = array();
//            $id = array();
//            $id = intval($model->ID_TP);
            $view += array('ID_VM' => intval($model->ID_VM));
            $view += array('Ten Vung' => $model->vung_mien["Ten_VM"]);
            $view += array('ID_Tinh' => intval($model->ID_TP));
            $view += array('Ten_TP' => $model->Ten_TP);
            //$xoso = XoSo::model()->with('tinh')->findByPk($id);
//            $xoso = XoSo::model()->with('tinh')->findByPk($id);
//            foreach ($xoso as $so) {
                //$view += array('Ngay' => $so->Ngay_XS);
                $view += array('Giai_DB' => $model->Giai_DB);
//                $view += array('Giai_Nhat' => $so->Giai_Nhat);
//                $view += array('Giai_Nhi' => $so->Giai_Nhi);
//                $view += array('Giai_Ba' => $so->Giai_Ba);
//                $view += array('Giai_Tu' => $so->Giai_Tu);
//                $view += array('Giai_Nam' => $so->Giai_Nam);
//                $view += array('Giai_Sau' => $so->Giai_Sau);
//                $view += array('Giai_Bay' => $so->Giai_Bay);
//                $view += array('Giai_Tam' => $so->Giai_Tam);
            }
            $result[] = $view;
//        }
        $json = '{"results" :'.CJSON::encode($result).'}';
        $this->render('json',array('json'=>$json));
    }

    public function actionLinkJson($id){
        //if($id=)
        $models = TranDau::model()->with(array('GiaiDau','ChuNha','DoiKhach'))->findByPk($id);
        $count = count($models);
        $result = array();
        if($count==0){
            $json = 'Khong co ban ghi nao!';
        }else {
            $result += array('ID_trandau' => intval($models->ID_trandau));
            $result += array('Ty_So' => $models->Ty_So);
            $result += array('Trang_Thai' => $models->Trang_Thai);
            $result += array('Mo_Ta' => $models->Mo_Ta);
            $result += array('So_CDV' => intval($models->So_CDV));
            $result += array('Vong' => $models->Vong);
            $result += array('Thoi_Gian' => date('d-m-Y H:i:s', strtotime($models->ThoiGianDienRa)));
            $result += array('Ten_Giai' => $models->GiaiDau["Ten_GiaiDau"]);
            $result += array('ChuNha' => $models->ChuNha["Ten_DB"]);
            $result += array('DoiKhach' => $models->DoiKhach["Ten_DB"]);
            $result += array('San_Dau' => $models->San_Dau);

            $results = CJSON::encode($result);
            $json = '{"results" :[' . $results . ']}';
        }
        $this->render('json',array('json'=>$json));
    }

    public function actionListJson(){
        $models = TranDau::model()->with('GiaiDau','ChuNha','DoiKhach')->findAll();
        //var_dump($models);exit;

        //$dbcritere  = new CDbCriteria();

        $count = count($models);
        $result = array();
        if($count==0){
            $json = 'Khong co ban ghi nao!';
        }else{
            foreach($models as $model){
                $view = array();
                $view+= array('ID_trandau'=>intval($model->ID_trandau));
                $view+= array('Ty_So'=>$model->Ty_So);
                $view+= array('Trang_Thai'=>$model->Trang_Thai);
                $view+= array('Mo_Ta'=>$model->Mo_Ta);
                $view+= array('So_CDV'=>intval($model->So_CDV));
                $view+=array('Vong'=>$model->Vong);
                //$view+= array('Thoi_Gian'=>date('Y/m/d H:m:s',$model->ThoiGianDienRa));
                //$time = new DateTime($model->ThoiGianDienRa);//'d-m-Y H:i:s',strtotime());
                //$view+= array('Thoi_Gian'=>$time->format('d-m-Y H:i:s'));
                $date = DateTime::createFromFormat('Y-m-d H:i:s','2009-02-15 15:16:17');
                $time = $date->format('Y-m-d H:i:s');
                $view+= array('Thoi_Gian'=>$time);
                $view+= array('Ten_Giai'=>$model->GiaiDau["Ten_GiaiDau"]);
                $view+= array('ChuNha'=>$model->ChuNha["Ten_DB"]);
                $view+= array('DoiKhach'=>$model->DoiKhach["Ten_DB"]);
                $view+= array('San_Dau'=>$model->San_Dau);

                //$view+= array('San_Dau'=>$model->trandau["San_Dau"]);

                //$view+= array('Giai_Dau'=>$model->trandau["tbltrandaus"]["Ten_GiaiDau"]);

                $result[] = $view;
            }
            //echo CJSON::encode($result);
            $results = CJSON::encode($result);
            $json = '{"results" :'.$results.'}';
        }
        $this->render('json',array('json'=>$json));

    }
}