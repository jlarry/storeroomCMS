<?php
/* @var $this StudentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Manage Students',
);

$this->menu=array(
	array('label'=>'Add Student', 'url'=>array('create')),
	array('label'=>'Manage Students', 'url'=>array('admin')),
);
?>

<h1>Students</h1>
<?php
$this->widget('zii.widgets.jui.CJuiAccordion',array(
    'panels'=>CHtml::listData($dataProvider,'last_name','first_name'),
    )
    // additional javascript options for the accordion plugin

);
?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'id'=>'accordian',
)); ?>
