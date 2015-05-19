<?php

class UsersController extends BackController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		$supers=array();
	
		$listsupers=Users::model()->findAllByAttributes(array('role'=>'0'));
		foreach($listsupers as $u){
			array_push($supers,$u->username);
		}
		
		$admin=array();
		$listadmin=Users::model()->findAllByAttributes(array('role'=>'1'));
		foreach($listadmin as $u){
			array_push($admin,$u->username);
		}
		$manager=array();
		$listmanager=Users::model()->findAllByAttributes(array('role'=>'2'));
		foreach($listmanager as $u){
			array_push($manager,$u->username);
		}
		
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create'),
				'users'=>array_merge($supers,$admin),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'users'=>array_merge($supers,$admin,$manager),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('admin','ajaxupdate'),
				'users'=>array_merge($supers,$admin),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array_merge($supers,$admin),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
//	public function actionCreate()
//	{
//		$model=new Users;
//
//		// Uncomment the following line if AJAX validation is needed
//		// $this->performAjaxValidation($model);
//
//		if(isset($_POST['Users']))
//		{
//			$model->attributes=$_POST['Users'];
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->id));
//		}
//
//		$this->render('create',array(
//			'model'=>$model,
//		));
//		
//	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        $model=new Users;
		$model->scenario='create';
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Users']))
        {
                $model->attributes=$_POST['Users'];
	        	if($model->new_password!=''){
	        		$model->new_password =$model->hashPassword($_POST['Users']['new_password']);
					$model->password = $model->new_password;
				}
				if($model->repeat_password!=''){
                	$model->repeat_password = $model->hashPassword($_POST['Users']['repeat_password']);
				}
                if($model->save())
                        $this->redirect(array('admin'));
                else{
                        $model->new_password = $_POST['Users']['new_password'];
                        $model->repeat_password = $_POST['Users']['repeat_password'];
                }
        }

        $this->render('create',array(
                'model'=>$model,
        ));
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$model->scenario='update';
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			
			$model->attributes=$_POST['Users'];
			if($model->new_password!=''){
				$model->password = $model->hashPassword($_POST['Users']['new_password']);
			}
			if($model->save()){
				 if(Yii::app()->user->role=='manager' ){
				 	$this->redirect(array('/site/index'));
				 }
				 else{
				 	$this->redirect(array('admin'));
				 }
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users'])){
			$model->attributes=$_GET['Users'];
		}
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	
	public function actionAjaxupdate()
	{
	    $act = $_GET['act'];
	         
	        $autoIdAll = $_POST['autoId'];
	        if(count($autoIdAll)>0)
	        {
	            foreach($autoIdAll as $autoId)
	            {
	                $model=$this->loadModel($autoId);
	            	if($act=='doDelete'){
						$model->delete();
	                }
	                if($act=='doActive'){
	                    $model->active = '1';
	                    if($model->save())
		                    echo 'ok';
		                else
		                    throw new Exception("Sorry",500);
	                }
	                if($act=='doInactive'){
	                    $model->active = '0';
	                    if($model->save())
		                    echo 'ok';
		                else
		                    throw new Exception("Sorry",500);                
	                }
	            
	            }
	        }
	    
	}
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
