<?php

class CheckoutController extends Controller
{
	public function actionIndex()
	{
                
                $model = new Students();
                $availableEquipment = new In();//In::model()->search();
		//$this->render('index', array('model'=>$model));
                //$model=new Students('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Students'])){
			$model->attributes=$_GET['Students'];
                }
                elseif(isset($_GET['In'])){
                        $availableEquipment = new In();
                        $availableEquipment->unsetAttributes();
                        $availableEquipment->attributes=$_GET['In'];
                }
		$this->render('index',array(
			'model'=>$model, 'availableEquipment'=>$availableEquipment,
		));
	}

        public function joinColumns($data,$row)
        {
                $columnData = CHtml::encode($data->courses->name." Sec. ".$data->courses->section);
                return $columnData;
        }
        
        public function actionCheckout(){
            
                $transactid = substr(microtime(), 11);
            
            
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
