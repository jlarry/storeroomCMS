<?php

class KitsController extends Controller
{
	public function actionCreate()
	{
		$model=new Kits;
                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Kits']))
		{
			$model->attributes=$_POST['Kits'];
                       
			if($model->save()){
                                $inTable = new In;
                                $inTable->kits_id = $model->id;
                                $inTable->save();
                            if(Yii::app()->request->isAjaxRequest){
                                 echo CJSON::encode(array(
                                     'status'=>'success',
                                     'data'=>$model,
                                 ));
                                 Yii::app()->end();
                            }
                        }
                        else{
				$this->redirect(array('view','id'=>$model->id));
                        }
		}

		$this->render('create',array(
			'model'=>$model, 
                    ));
	}

	public function actionIndex()
	{
		$this->render('index');
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