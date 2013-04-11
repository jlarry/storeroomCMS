<?php

/**
 * This is the model class for table "courses".
 *
 * The followings are the available columns in table 'courses':
 * @property integer $id
 * @property string $name
 * @property string $semester
 * @property integer $section
 * @property integer $instructors_id
 * @property integer $tas_id
 *
 * The followings are the available model relations:
 * @property Instructors $instructors
 * @property Tas $tas
 * @property Students[] $students
 */
class Courses extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Courses the static model class
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
		return 'courses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, semester, section, instructors_id', 'required'),
			array('section, instructors_id, tas_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			array('semester', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, semester, section, instructors_id, tas_id', 'safe', 'on'=>'search'),
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
			'instructors' => array(self::BELONGS_TO, 'Instructors', 'instructors_id'),
			'tas' => array(self::BELONGS_TO, 'Tas', 'tas_id'),
			'students' => array(self::HAS_MANY, 'Students', 'courses_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Course',
			'semester' => 'Semester',
			'section' => 'Section',
			'instructors_id' => 'Professor',
			'tas_id' => 'Teaching Assistant',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('semester',$this->semester,true);
		$criteria->compare('section',$this->section);
		$criteria->compare('instructors_id',$this->instructors_id);
		$criteria->compare('tas_id',$this->tas_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}