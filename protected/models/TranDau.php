<?php

/**
 * This is the model class for table "tbltrandau".
 *
 * The followings are the available columns in table 'tbltrandau':
 * @property integer $ID_trandau
 * @property integer $ID_GiaiDau
 * @property string $San_Dau
 * @property string $Link_Xem
 * @property string $Ty_So
 * @property string $Trang_Thai
 * @property string $Mo_Ta
 * @property integer $So_CDV
 * @property integer $ID_Chu_Nha
 * @property integer $ID_Doi_Khach
 * @property string $Vong
 * @property string $ThoiGianDienRa
 * @property string $Mua_Giai
 * @property string $trong_tai
 *
 * The followings are the available model relations:
 * @property Tblcomment[] $tblcomments
 * @property Tblnews[] $tblnews
 * @property Tblgiaidau $iDGiaiDau
 * @property Tbldoibong $iDChuNha
 * @property Tbldoibong $iDDoiKhach
 * @property TbltrandauKenh[] $tbltrandauKenhs
 * @property Tblvideo[] $tblvideos
 */
class TranDau extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TranDau the static model class
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
		return 'tbltrandau';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_GiaiDau, San_Dau, Link_Xem, Ty_So, Trang_Thai, Mo_Ta, So_CDV, ID_Chu_Nha, ID_Doi_Khach, Vong, ThoiGianDienRa, Mua_Giai, trong_tai', 'required'),
			array('ID_GiaiDau, So_CDV, ID_Chu_Nha, ID_Doi_Khach', 'numerical', 'integerOnly'=>true),
			array('San_Dau', 'length', 'max'=>120),
			array('Link_Xem, trong_tai', 'length', 'max'=>200),
			array('Ty_So', 'length', 'max'=>20),
			array('Trang_Thai', 'length', 'max'=>50),
			array('Vong, Mua_Giai', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_trandau, ID_GiaiDau, San_Dau, Link_Xem, Ty_So, Trang_Thai, Mo_Ta, So_CDV, ID_Chu_Nha, ID_Doi_Khach, Vong, ThoiGianDienRa, Mua_Giai, trong_tai', 'safe', 'on'=>'search'),
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
			'tblcomments' => array(self::HAS_MANY, 'Tblcomment', 'ID_trandau'),
			'tblnews' => array(self::HAS_MANY, 'Tblnews', 'ID_trandau'),
			'GiaiDau' => array(self::BELONGS_TO, 'GiaiDau', 'ID_GiaiDau'),
			'ChuNha' => array(self::BELONGS_TO, 'DoiBong', 'ID_Chu_Nha'),
			'DoiKhach' => array(self::BELONGS_TO, 'DoiBong', 'ID_Doi_Khach'),
			'tbltrandauKenhs' => array(self::HAS_MANY, 'TbltrandauKenh', 'ID_trandau'),
			'tblvideos' => array(self::HAS_MANY, 'Tblvideo', 'ID_trandau'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_trandau' => 'Id Trandau',
			'ID_GiaiDau' => 'Id Giai Dau',
			'San_Dau' => 'San Dau',
			'Link_Xem' => 'Link Xem',
			'Ty_So' => 'Ty So',
			'Trang_Thai' => 'Trang Thai',
			'Mo_Ta' => 'Mo Ta',
			'So_CDV' => 'So Cdv',
			'ID_Chu_Nha' => 'Id Chu Nha',
			'ID_Doi_Khach' => 'Id Doi Khach',
			'Vong' => 'Vong',
			'ThoiGianDienRa' => 'Thoi Gian Dien Ra',
			'Mua_Giai' => 'Mua Giai',
			'trong_tai' => 'Trong Tai',
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

		$criteria->compare('ID_trandau',$this->ID_trandau);
		$criteria->compare('ID_GiaiDau',$this->ID_GiaiDau);
		$criteria->compare('San_Dau',$this->San_Dau,true);
		$criteria->compare('Link_Xem',$this->Link_Xem,true);
		$criteria->compare('Ty_So',$this->Ty_So,true);
		$criteria->compare('Trang_Thai',$this->Trang_Thai,true);
		$criteria->compare('Mo_Ta',$this->Mo_Ta,true);
		$criteria->compare('So_CDV',$this->So_CDV);
		$criteria->compare('ID_Chu_Nha',$this->ID_Chu_Nha);
		$criteria->compare('ID_Doi_Khach',$this->ID_Doi_Khach);
		$criteria->compare('Vong',$this->Vong,true);
		$criteria->compare('ThoiGianDienRa',$this->ThoiGianDienRa,true);
		$criteria->compare('Mua_Giai',$this->Mua_Giai,true);
		$criteria->compare('trong_tai',$this->trong_tai,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
					));
	}
}