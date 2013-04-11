<?php
/* @var $this InstructorsController */
/* @var $model Instructors */

$this->breadcrumbs=array(
	'Instructors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Instructors', 'url'=>array('index')),
	array('label'=>'Create Instructors', 'url'=>array('create')),
	array('label'=>'Update Instructors', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Instructors', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Instructors', 'url'=>array('admin')),
);
?>

<h1>View Instructors #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'first_name',
		'last_name',
		'email',
	),
)); ?>
