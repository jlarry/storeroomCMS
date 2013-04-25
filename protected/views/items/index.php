<?php
/* @var $this ItemsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Equipment',
);

$this->menu=array(
	array('label'=>'Add Equipment', 'url'=>array('create')),
	array('label'=>'Manage Equipment ', 'url'=>array('admin')),
);
?>

<h1>Equipment</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
