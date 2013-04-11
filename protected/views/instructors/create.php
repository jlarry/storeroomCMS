<?php
/* @var $this InstructorsController */
/* @var $model Instructors */

$this->breadcrumbs=array(
	'Instructors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Instructors', 'url'=>array('index')),
	array('label'=>'Manage Instructors', 'url'=>array('admin')),
);
?>

<h1>Create Instructors</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>