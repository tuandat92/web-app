<?php

/**
 * This is the model class for table "tbldoibong".
 *
 * The followings are the available columns in table 'tbldoibong':
 * @property integer $ID_DB
 * @property string $Ten_DB
 * @property string $Img_DB
 * @property string $San_Nha_DB
 * @property string $Dia_Diem_DB
 * @property string $Quoc_Gia
 * @property string $Website
 * @property string $Email
 * @property integer $Nam_thanh_lap
 *
 * The followings are the available model relations:
 * @property Tblbangxh[] $tblbangxhs
 * @property Tbldanhhieu[] $tbldanhhieus
 * @property Tbltrandau[] $tbltrandaus
 * @property Tbltrandau[] $tbltrandaus1
 */
class DoiBong extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DoiBong the static model class
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
		return 'tbldoibong';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Ten_DB, Img_DB, San_Nha_DB, Dia_Diem_DB, Quoc_Gia, Website, Email, Nam_thanh_lap', 'required'),
			array('Nam_thanh_lap', 'numerical', 'integerOnly'=>true),
			array('Ten_DB, Img_DB, San_Nha_DB, Dia_Diem_DB', 'length', 'max'=>255),
			array('Quoc_Gia', 'length', 'max'=>100),
			array('Website', 'length', 'max'=>200),
			array('Email', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_DB, Ten_DB, Img_DB, San_Nha_DB, Dia_Diem_DB, Quoc_Gia, Website, Email, Nam_thanh_lap', 'safe', 'on'=>'search'),
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
			'tblbangxhs' => array(self::HAS_MANY, 'Tblbangxh', 'ID_DB'),
			'tbldanhhieus' => array(self::HAS_MANY, 'Tbldanhhieu', 'ID_DB'),
			'tbltrandaus' => array(self::HAS_MANY, 'Tbltrandau', 'ID_Chu_Nha'),
			'tbltrandaus1' => array(self::HAS_MANY, 'Tbltrandau', 'ID_Doi_Khach'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_DB' => 'Id Db',
			'Ten_DB' => 'Ten Db',
			'Img_DB' => 'Img Db',
			'San_Nha_DB' => 'San Nha Db',
			'Dia_Diem_DB' => 'Dia Diem Db',
			'Quoc_Gia' => 'Quoc Gia',
			'Website' => 'Website',
			'Email' => 'Email',
			'Nam_thanh_lap' => 'Nam Thanh Lap',
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

		$criteria->compare('ID_DB',$this->ID_DB);
		$criteria->compare('Ten_DB',$this->Ten_DB,true);
		$criteria->compare('Img_DB',$this->Img_DB,true);
		$criteria->compare('San_Nha_DB',$this->San_Nha_DB,true);
		$criteria->compare('Dia_Diem_DB',$this->Dia_Diem_DB,true);
		$criteria->compare('Quoc_Gia',$this->Quoc_Gia,true);
		$criteria->compare('Website',$this->Website,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Nam_thanh_lap',$this->Nam_thanh_lap);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
					));
	}
}