<?php
/* @var $this InstructorsController */
/* @var $model Instructors */

$this->breadcrumbs=array(
	'Instructors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Instructors', 'url'=>array('index')),
	array('label'=>'Create Instructors', 'url'=>array('create')),
	array('label'=>'View Instructors', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Instructors', 'url'=>array('admin')),
);
?>

<h1>Update Instructors <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>