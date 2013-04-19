<?php

/**
 * This is the model class for table "items".
 *
 * The followings are the available columns in table 'items':
 * @property integer $id
 * @property string $storeroomid
 * @property integer $niunumber
 * @property string $description
 * @property integer $po
 * @property string $cost
 * @property string $purchasedate
 * @property string $added
 * @property string $kits_id
 * @property integer $itemcategories_id
 * @property integer $itemimage_id
 *
 * The followings are the available model relations:
 * @property In $in
 * @property Incidents[] $incidents
 * @property Inhistory $inhistory
 * @property Kits $kits
 * @property Itemcategories $itemcategories
 * @property Itemimage $itemimage
 * @property Notes[] $notes
 * @property Out $out
 * @property Outhistory $outhistory
 * @property Outofservice[] $outofservices
 */
class Items extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Items the static model class
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
		return 'items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, added, kits_id, itemcategories_id', 'required'),
			array('id, niunumber, po, itemcategories_id, itemimage_id', 'numerical', 'integerOnly'=>true),
			array('storeroomid', 'length', 'max'=>20),
			array('description', 'length', 'max'=>45),
			array('cost, kits_id', 'length', 'max'=>10),
			array('purchasedate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, storeroomid, niunumber, description, po, cost, purchasedate, added, kits_id, itemcategories_id, itemimage_id', 'safe', 'on'=>'search'),
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
			'in' => array(self::HAS_ONE, 'In', 'items_id'),
			'incidents' => array(self::HAS_MANY, 'Incidents', 'items_id'),
			'inhistory' => array(self::HAS_ONE, 'Inhistory', 'items_id'),
			'kits' => array(self::BELONGS_TO, 'Kits', 'kits_id'),
			'itemcategories' => array(self::BELONGS_TO, 'Itemcategories', 'itemcategories_id'),
			'itemimage' => array(self::BELONGS_TO, 'Itemimage', 'itemimage_id'),
			'notes' => array(self::HAS_MANY, 'Notes', 'items_id'),
			'out' => array(self::HAS_ONE, 'Out', 'items_id'),
			'outhistory' => array(self::HAS_ONE, 'Outhistory', 'items_id'),
			'outofservices' => array(self::HAS_MANY, 'Outofservice', 'items_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'storeroomid' => 'Storeroom ID',
			'niunumber' => 'NIU Property #',
			'description' => 'Description',
			'po' => 'PO',
			'cost' => 'Cost',
			'purchasedate' => 'Purchase Date',
			//'added' => 'Added',
			'kits_id' => 'Belongs to Kit?',
			'itemcategories_id' => 'Category',
			//'itemimage_id' => 'Itemimage',
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
		$criteria->compare('storeroomid',$this->storeroomid,true);
		$criteria->compare('niunumber',$this->niunumber);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('po',$this->po);
		$criteria->compare('cost',$this->cost,true);
		$criteria->compare('purchasedate',$this->purchasedate,true);
		$criteria->compare('added',$this->added,true);
		$criteria->compare('kits_id',$this->kits_id,true);
		$criteria->compare('itemcategories_id',$this->itemcategories_id);
		$criteria->compare('itemimage_id',$this->itemimage_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}