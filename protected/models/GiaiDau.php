<?php

/**
 * This is the model class for table "tblgiaidau".
 *
 * The followings are the available columns in table 'tblgiaidau':
 * @property integer $ID_GiaiDau
 * @property string $Ten_GiaiDau
 * @property string $Img_DaiDien
 * @property string $ThoiGian_BD
 * @property string $ThoiGian_KT
 * @property string $Ten_Quoc_Te
 *
 * The followings are the available model relations:
 * @property Tbltrandau[] $tbltrandaus
 */
class GiaiDau extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GiaiDau the static model class
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
		return 'tblgiaidau';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Ten_GiaiDau, Img_DaiDien, ThoiGian_BD, ThoiGian_KT, Ten_Quoc_Te', 'required'),
			array('Ten_GiaiDau, Img_DaiDien, Ten_Quoc_Te', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_GiaiDau, Ten_GiaiDau, Img_DaiDien, ThoiGian_BD, ThoiGian_KT, Ten_Quoc_Te', 'safe', 'on'=>'search'),
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
			'tbltrandaus' => array(self::HAS_MANY, 'Tbltrandau', 'ID_GiaiDau'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_GiaiDau' => 'Id Giai Dau',
			'Ten_GiaiDau' => 'Ten Giai Dau',
			'Img_DaiDien' => 'Img Dai Dien',
			'ThoiGian_BD' => 'Thoi Gian Bd',
			'ThoiGian_KT' => 'Thoi Gian Kt',
			'Ten_Quoc_Te' => 'Ten Quoc Te',
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

		$criteria->compare('ID_GiaiDau',$this->ID_GiaiDau);
		$criteria->compare('Ten_GiaiDau',$this->Ten_GiaiDau,true);
		$criteria->compare('Img_DaiDien',$this->Img_DaiDien,true);
		$criteria->compare('ThoiGian_BD',$this->ThoiGian_BD,true);
		$criteria->compare('ThoiGian_KT',$this->ThoiGian_KT,true);
		$criteria->compare('Ten_Quoc_Te',$this->Ten_Quoc_Te,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
					));
	}
}