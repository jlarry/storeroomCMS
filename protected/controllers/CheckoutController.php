<?php

class CheckoutController extends Controller
{
	public function actionIndex()
	{
                $model = new Students();
                $availableEquipment = In::model()->search();
		//$this->render('index', array('model'=>$model));
                //$model=new Students('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Students']))
			$model->attributes=$_GET['Students'];

		$this->render('index',array(
			'model'=>$model, 'availableEquipment'=>$availableEquipment,
		));
	}

        public function joinColumns($data,$row)
        {
                $columnData = CHtml::encode($data->courses->name." Sec. ".$data->courses->section);
                return $columnData;
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