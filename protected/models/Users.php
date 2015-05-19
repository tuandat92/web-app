<?php

/**
 * This is the model class for table "data_users".
 *
 * The followings are the available columns in table 'data_users':
 * @property integer $ID_ND
 * @property string $fullname
 * @property string $email
 * @property integer $pid
 * @property string $username
 * @property string $password
 * @property integer $active
 */
class Users extends CActiveRecord
{
	// holds the password confirmation word
    public $repeat_password;
 
    //will hold the encrypted password for update actions.
    public $new_password;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblnguoidung';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fullname, username, email', 'required'),
			array('new_password, repeat_password', 'required', 'on' => 'create'),
//			array('password, password_repeat', 'allowEmpty'=>true, 'on' => 'update'),
			array('role, active', 'numerical', 'integerOnly'=>true),
			array('fullname, username', 'length', 'max'=>100),
			array('new_password, repeat_password', 'length', 'min'=>6),
			array('email', 'safe'),
            array('new_password', 'compare', 'compareAttribute'=>'repeat_password'),
            
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fullname, email, role, username, password, active', 'safe', 'on'=>'search'),
		);
	}
	
//	public function beforeSave()
//    {
//        // in this case, we will use the old hashed password.
//        if(empty($this->password) && empty($this->repeat_password) && !empty($this->initialPassword))
//            $this->password=$this->repeat_password=$this->initialPassword;
//
//        return parent::beforeSave();
//    }
//	public function afterFind()
//    {
//        //reset the password to null because we don't want the hash to be shown.
//        $this->initialPassword = $this->password;
//        $this->password = null;
//
//        parent::afterFind();
//    }
 
    public function saveModel($data=array())
    {
            //because the hashes needs to match
            if(!empty($data['password']) && !empty($data['repeat_password']))
            {
                $data['password'] = Yii::app()->user->hashPassword($data['password']);
                $data['repeat_password'] = Yii::app()->user->hashPassword($data['repeat_password']);
            }

            $this->attributes=$data;

            if(!$this->save())
                return CHtml::errorSummary($this);

         return true;
    }
    
    
	/**
	 * @return boolean validate user
	 */
	public function validatePassword($password, $username)
	{
	        return $this->hashPassword($password) === $this->password;
	}
	/**
	 * @return hashed value
	 */
	
	public function hashPassword($phrase, $salt = null)
	{
	        $key = 'Gf;B&yXL|beJUf-K*PPiU{wf|@9K9j5?d+YW}?VAZOS%e2c -:11ii<}ZM?PO!96';
	        if($salt == '')
	                $salt = substr(hash('sha512', $key), 0, 10);
	        else
	                $salt = substr($salt, 0, 10);
	        return hash('sha512', $salt . $key . $phrase);
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
			'id' => 'ID',
			'fullname' => 'Họ và tên',
			'email' => 'Email',
			'role' => 'Quyền',
			'username' => 'Tên đăng nhập',
			'password' => 'Mật khẩu',
			'new_password' => 'Mật khẩu mới',
			'repeat_password' => 'Xác nhận mật khẩu',
			'active' => 'Active',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->condition=' role !=0';
		$criteria->compare('ID_ND',$this->ID_ND);
		//$criteria->compare('username',$this->fullname,true);
		$criteria->compare('Email',$this->Email,true);
//		$criteria->compare('pid',$this->pid);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		//$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}