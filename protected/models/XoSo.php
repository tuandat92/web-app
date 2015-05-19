<?php

/**
 * This is the model class for table "tblxoso".
 *
 * The followings are the available columns in table 'tblxoso':
 * @property integer $ID_XoSo
 * @property integer $ID_TP
 * @property string $Ngay_XS
 * @property string $Giai_DB
 * @property string $Giai_Nhat
 * @property string $Giai_Nhi
 * @property string $Giai_Ba
 * @property string $Giai_Tu
 * @property string $Giai_Nam
 * @property string $Giai_Sau
 * @property string $Giai_Bay
 * @property string $Giai_Tam
 *
 * The followings are the available model relations:
 * @property Tbltinhtp $iDTP
 */
class XoSo extends CActiveRecord1
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return XoSo the static model class
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
		return 'tblxoso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_TP, Ngay_XS, Giai_DB, Giai_Nhat, Giai_Nhi, Giai_Ba, Giai_Tu, Giai_Nam, Giai_Sau, Giai_Bay, Giai_Tam', 'required'),
			array('ID_TP', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_XoSo, ID_TP, Ngay_XS, Giai_DB, Giai_Nhat, Giai_Nhi, Giai_Ba, Giai_Tu, Giai_Nam, Giai_Sau, Giai_Bay, Giai_Tam', 'safe', 'on'=>'search'),
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
			'tinh' => array(self::BELONGS_TO, 'Tinhtp', 'ID_TP'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_XoSo' => 'Id Xo So',
			'ID_TP' => 'Id Tp',
			'Ngay_XS' => 'Ngay Xs',
			'Giai_DB' => 'Giai Db',
			'Giai_Nhat' => 'Giai Nhat',
			'Giai_Nhi' => 'Giai Nhi',
			'Giai_Ba' => 'Giai Ba',
			'Giai_Tu' => 'Giai Tu',
			'Giai_Nam' => 'Giai Nam',
			'Giai_Sau' => 'Giai Sau',
			'Giai_Bay' => 'Giai Bay',
			'Giai_Tam' => 'Giai Tam',
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

		$criteria->compare('ID_XoSo',$this->ID_XoSo);
		$criteria->compare('ID_TP',$this->ID_TP);
		$criteria->compare('Ngay_XS',$this->Ngay_XS,true);
		$criteria->compare('Giai_DB',$this->Giai_DB,true);
		$criteria->compare('Giai_Nhat',$this->Giai_Nhat,true);
		$criteria->compare('Giai_Nhi',$this->Giai_Nhi,true);
		$criteria->compare('Giai_Ba',$this->Giai_Ba,true);
		$criteria->compare('Giai_Tu',$this->Giai_Tu,true);
		$criteria->compare('Giai_Nam',$this->Giai_Nam,true);
		$criteria->compare('Giai_Sau',$this->Giai_Sau,true);
		$criteria->compare('Giai_Bay',$this->Giai_Bay,true);
		$criteria->compare('Giai_Tam',$this->Giai_Tam,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
					));
	}
}