<?php

class ItemImageController extends Controller
{
    public $layout='//layouts/column1';
    
	public function actionCreate()
	{
		//$this->render('create');
	}

	public function actionIndex()
	{
            $publicPath = Yii::app()->getBaseUrl()."/images/items/";
            
            $itemImages = new CActiveDataProvider('Itemimage');
            echo json_encode($itemImages);
            //$this->render('index');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}