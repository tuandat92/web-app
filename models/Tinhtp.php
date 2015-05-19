<?php

/**
 * This is the model class for table "tinhtp".
 *
 * The followings are the available columns in table 'tinhtp':
 * @property integer $ID_TP
 * @property string $Ten_TP
 * @property integer $ID_VM
 *
 * The followings are the available model relations:
 * @property vungmien $iDVM
 */
class Tinhtp extends CActiveRecord1
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tinhtp the static model class
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
		return 'tbltinhtp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Ten_TP, ID_VM', 'required'),
			array('ID_VM', 'numerical', 'integerOnly'=>true),
			array('Ten_TP', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_TP, Ten_TP, ID_VM', 'safe', 'on'=>'search'),
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
			'vung_mien' => array(self::BELONGS_TO, 'Vungmien','ID_VM'),
            'xo_so' => array(self::HAS_MANY,'XoSo','ID_TP'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_TP' => 'Id Tp',
			'Ten_TP' => 'Ten Tp',
			'ID_VM' => 'Id Vm',
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

		$criteria->compare('ID_TP',$this->ID_TP);
		$criteria->compare('Ten_TP',$this->Ten_TP,true);
		$criteria->compare('ID_VM',$this->ID_VM);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
					));
	}
}