<?php
/* @var $this CheckoutController */

$this->breadcrumbs=array(
	'Checkout',
);
?>
<h1>Checkout Equipment</h1>
<p>Select Student(s)</p>
<div id="selectStudentsCnt" style="overflow-y: auto; max-height:400px;">
<?php
        $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'selectStudent-grid',
        'dataProvider'=>$model->search(),
        'filter'=>$model,
        'selectableRows'=>'2',
        //'ajaxUrl'=>Yii::app()->createUrl('students/admin'),
        'columns'=>array(
            array(
                'name'=>'image',
                'type'=>'html',
                'value'=>'(!empty($data->image))?CHtml::image($data->image):"NO IMAGE"',
            ),
            'last_name',
            'first_name',
            'cleared',
            //'courses.name',
            array(
               'name'=>'courses',
               'type'=>'html',
               'value'=>array($this,'joinColumns'),
            ),
        ),
    ));
?>
</div>
<div id="selectedStudentCnt" style="display: none;">
    <h3>Selected Students</h3>
    <table>
        
    </table>
</div>
<div id="continueButtonCnt" style="display: none;">
    <?php    
    $this->widget('zii.widgets.jui.CJuiButton',array(
    'name'=>'continueCheckout',
    'caption'=>'Continue',
    'options'=>array(
    'onclick'=>new CJavaScriptExpression('function(){$("#continueCheckout").alert("Yes");}'),
)));
?>
</div>