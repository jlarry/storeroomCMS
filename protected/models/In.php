<?php

/**
 * This is the model class for table "in".
 *
 * The followings are the available columns in table 'in':
 * @property integer $items_id
 *
 * The followings are the available model relations:
 * @property Items $items
 */
class In extends CActiveRecord
{
	public $storeroomid;
        /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return In the static model class
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
		return 'in';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('items_id', 'required'),
			array('items_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('items_id, storeroomid', 'safe', 'on'=>'search'),
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
			'items' => array(self::BELONGS_TO, 'Items', 'items_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'items_id' => 'Equipment',
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

		$criteria->compare('items_id',$this->items_id);
                $criteria->with = array('items');
                $criteria->compare('items.storeroomid',$this->storeroomid, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}