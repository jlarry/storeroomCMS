<?php
/* @var $this CheckoutController */

$this->breadcrumbs=array(
	'Checkout',
);
?>
<h1>Checkout Equipment</h1>
<p>Select Student(s)</p>
<div id="selectStudentsCnt" style="overflow-y: scroll; height:400px;">
<?php
        $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider'=>$model->search(),
        'selectableRows'=>'2',
        'columns'=>array(
            array(
                'name'=>'image',
                'type'=>'html',
                'value'=>'(!empty($data->image))?CHtml::image($data->image):"NO IMAGE"',
            ),
            'last_name',
            'first_name',
            'cleared',
            'courses.name',
            array(
              'class'=>'CCheckBoxColumn',  
            ),
        ),
    ));
?>
</div>
<div id="selectedStudentCnt">
<?php    
    $this->widget('zii.widgets.jui.CJuiButton',array(
    'name'=>'button',
    'caption'=>'Continue',
    'options'=>array(
    'onclick'=>'js:function(){alert("Yes");}',
)));
?>
</div>
