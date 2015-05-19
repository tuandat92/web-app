<?php

/**
 * This is the model class for table "data_article".
 *
 * The followings are the available columns in table 'data_article':
 * @property integer $id
 * @property integer $catid
 * @property string $title
 * @property string $desc
 * @property string $content
 * @property string $image
 * @property integer $views
 * @property string $createdate
 * @property string $author
 * @property string $source
 * @property integer $priority
 * @property integer $publish
 * @property integer $hot
 */
class Article extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Article the static model class
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
		return 'data_article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('catid', 'required'),
			array('catid, views, priority, publish, hot', 'numerical', 'integerOnly'=>true),
			array('title, desc, image', 'length', 'max'=>500),
			array('author, source', 'length', 'max'=>200),
			array('content, createdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, catid, title, desc, content, image, views, createdate, author, source, priority, publish, hot', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'catid' => 'Catid',
			'title' => 'Title',
			'desc' => 'Desc',
			'content' => 'Content',
			'image' => 'Image',
			'views' => 'Views',
			'createdate' => 'Createdate',
			'author' => 'Author',
			'source' => 'Source',
			'priority' => 'Priority',
			'publish' => 'Publish',
			'hot' => 'Hot',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('catid',$this->catid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('views',$this->views);
		$criteria->compare('createdate',$this->createdate,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('publish',$this->publish);
		$criteria->compare('hot',$this->hot);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
					));
	}

}