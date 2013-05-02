<?php

/**
 * This is the model class for table "outhistory".
 *
 * The followings are the available columns in table 'outhistory':
 * @property integer $transactid
 * @property string $outdate
 * @property integer $students_id
 * @property integer $kits_id
 * @property integer $items_id
 * @property integer $user_user_id
 *
 * The followings are the available model relations:
 * @property Students $students
 * @property Kits $kits
 * @property Items $items
 * @property User $userUser
 */
class Outhistory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Outhistory the static model class
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
		return 'outhistory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('transactid, outdate, students_id, user_user_id', 'required'),
			array('transactid, students_id, kits_id, items_id, user_user_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('transactid, outdate, students_id, kits_id, items_id, user_user_id', 'safe', 'on'=>'search'),
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
			'students' => array(self::BELONGS_TO, 'Students', 'students_id'),
			'kits' => array(self::BELONGS_TO, 'Kits', 'kits_id'),
			'items' => array(self::BELONGS_TO, 'Items', 'items_id'),
			'userUser' => array(self::BELONGS_TO, 'User', 'user_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'transactid' => 'Transactid',
			'outdate' => 'Outdate',
			'students_id' => 'Students',
			'kits_id' => 'Kits',
			'items_id' => 'Items',
			'user_user_id' => 'User User',
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

		$criteria->compare('transactid',$this->transactid);
		$criteria->compare('outdate',$this->outdate,true);
		$criteria->compare('students_id',$this->students_id);
		$criteria->compare('kits_id',$this->kits_id);
		$criteria->compare('items_id',$this->items_id);
		$criteria->compare('user_user_id',$this->user_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function beforeValidate() {
            if($this->isNewRecord()){
                $this->outdate = data('Y-dd-mm H:i:s');
                //$this->transactid = substr(microtime(), 11);
            }
            return parent::beforeValidate();
        }
}