<?php
/* @var $this ItemsController */
/* @var $model Items */

$this->breadcrumbs=array(
	'Equipment'=>array('index'),
	$model->storeroomid,
);

$this->menu=array(
	array('label'=>'List Equipment', 'url'=>array('index')),
	array('label'=>'Add Equipment', 'url'=>array('create')),
	array('label'=>'Update Equipment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Equipment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Equipment', 'url'=>array('admin')),
);
?>

<h1>Showing Equipment <?php echo $model->storeroomid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'storeroomid',
		'niunumber',
		'description',
		'po',
		'cost',
		'purchasedate',
		'added',
                'kits.storeroomid',
		'itemimage.filename',
		//'kits_id',
		//'itemcategories_id',
                'itemcategories.name',
	),
)); ?>
