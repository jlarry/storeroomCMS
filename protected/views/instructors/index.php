<?php
/* @var $this InstructorsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Instructors',
);

$this->menu=array(
	array('label'=>'Create Instructors', 'url'=>array('create')),
	array('label'=>'Manage Instructors', 'url'=>array('admin')),
);
?>

<h1>Instructors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
