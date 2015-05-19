<?php

/**
 * This is the model class for table "tblvungmien".
 *
 * The followings are the available columns in table 'tblvungmien':
 * @property integer $ID_VM
 * @property string $Ten_VM
 *
 * The followings are the available model relations:
 * @property Tbltinhtp[] $tbltinhtps
 */
class Vungmien extends CActiveRecord1
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Vungmien the static model class
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
		return 'tblvungmien';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Ten_VM', 'required'),
			array('Ten_VM', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_VM, Ten_VM', 'safe', 'on'=>'search'),
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
			'Tinh_TP' => array(self::HAS_MANY, 'Tinhtp', 'ID_VM'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_VM' => 'Id Vm',
			'Ten_VM' => 'Ten Vm',
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

		$criteria->compare('ID_VM',$this->ID_VM);
		$criteria->compare('Ten_VM',$this->Ten_VM,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
					));
	}
}