<?php

/**
 * This is the model class for table "itemimage".
 *
 * The followings are the available columns in table 'itemimage':
 * @property integer $id
 * @property string $filename
 * @property string $name
 * @property integer $itemcategories_id
 *
 * The followings are the available model relations:
 * @property Itemcategories $itemcategories
 * @property Items[] $items
 * @property Kits[] $kits
 */
class Itemimage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Itemimage the static model class
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
		return 'itemimage';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('filename, name, itemcategories_id', 'required'),
			array('itemcategories_id', 'numerical', 'integerOnly'=>true),
			array('filename, name', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, filename, name, itemcategories_id', 'safe', 'on'=>'search'),
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
			'itemcategories' => array(self::BELONGS_TO, 'Itemcategories', 'itemcategories_id'),
			'items' => array(self::HAS_MANY, 'Items', 'itemimage_id'),
			'kits' => array(self::HAS_MANY, 'Kits', 'itemimage_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'filename' => 'Filename',
			'name' => 'Name',
			'itemcategories_id' => 'Itemcategories',
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
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('itemcategories_id',$this->itemcategories_id);
                $criteria->with = array('itemcategories');
                $criteria->compare('itemcategories.id',$this->itemcategories_id, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
                /**
         * @return CMapIterator the iterator for the foreach statement
         */
        public function getIterator()
        {
                $attributes=$this->getAttributes();
                $relations = array();
                
                foreach ($this->relations() as $key => $related)
                {
                        if ($this->hasRelated($key))
                        {
                                $relations[$key] = $this->$key;
                        }
                }
                
                $all = array_merge($attributes, $relations);
                
                return new CMapIterator($all);
        }

}