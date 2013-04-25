<?php
/* @var $this ItemsController */
/* @var $model Items */

$this->breadcrumbs=array(
	'Equipment'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Equipment', 'url'=>array('index')),
	array('label'=>'Manage Equipment', 'url'=>array('admin')),
);
?>

<h1>Add Equipment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'kits'=>$kits, 'itemcategories'=>$itemcategories, 'itemImage'=>$itemImage)); ?>
<?php //echo $this->renderPartial('/upload/_error');?>