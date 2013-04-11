<?php

/**
 * This is the model class for table "students".
 *
 * The followings are the available columns in table 'students':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $semester
 * @property string $year
 * @property string $image
 * @property integer $cleared
 * @property integer $courses_id
 *
 * The followings are the available model relations:
 * @property Incidents[] $incidents
 * @property Inhistory[] $inhistories
 * @property Outhistory[] $outhistories
 * @property Courses $courses
 */
class Students extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Students the static model class
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
		return 'students';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, email, semester, cleared, year, courses_id', 'required'),
			array('courses_id', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, email, image', 'length', 'max'=>45),
			array('semester', 'length', 'max'=>15),
			array('year', 'length', 'max'=>4),
                        array('cleared', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('first_name, last_name, semester, year, cleared, courses_id', 'safe', 'on'=>'search'),
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
			'incidents' => array(self::HAS_MANY, 'Incidents', 'students_id'),
			'inhistories' => array(self::HAS_MANY, 'Inhistory', 'students_id'),
			'outhistories' => array(self::HAS_MANY, 'Outhistory', 'students_id'),
			'courses' => array(self::BELONGS_TO, 'Courses', 'courses_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'semester' => 'Semester',
			'year' => 'Year',
			'image' => 'Image',
			'cleared' => 'Cleared to Checkout?',
			'courses_id' => 'Course',
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
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('semester',$this->semester,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('cleared',$this->cleared);
		$criteria->compare('courses_id',$this->courses_id);
                $criteria->with = array('courses');
                $criteria->compare('courses.id',$this->courses_id, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function beforeValidate() {
            if($this->isNewRecord){
                $this->year = date('Y');
                //$this->semester = Semester::getCurrentSemester();
            }
            return parent::beforeValidate();
        }
}