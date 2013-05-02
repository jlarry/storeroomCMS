<?php
/* @var $this CheckoutController */

$this->breadcrumbs=array(
	'Checkout',
);
?>
<h1>Checkout Equipment</h1>
<div id="checkoutPanels">
<div id="selectStudentsCnt" style="overflow-y: auto; max-height:400px;">
Select Students
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
<div id="selectEquipmentCnt" style="overflow-y: auto; max-height:400px; display: none;">
<?php
        $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'selectEquipment-grid',
        'dataProvider'=>$availableEquipment->search(),
        'filter'=>$availableEquipment,
        'selectableRows'=>'2',
        //'ajaxUrl'=>Yii::app()->createUrl('/admin'),
        'columns'=>array(
            array(
                'name'=>'items.storeroomid',
                'value'=>'$data->items->storeroomid',
                'filter'=>'<input name="In[storeroomid]" type="text" maxlength="45" />',
           ),
            array(
                'name'=>'items.description',
                'value'=>'$data->items->description',
                'filter'=>'<input name="In[description]" type="text" maxlength="245" />',
           ),
            array(
                'name'=>'items.itemcategories.name',
                'value'=>'$data->items->itemcategories->name',
                'filter'=>'<input name="In[category]" type="text" maxlength="45" />',
            ),
        ),
    ));
?>
</div>
</div><!-- closes checkout panels -->
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
    'onclick'=>new CJavaScriptExpression('function(){$("#continueCheckout").showCheckoutPanels(); return false;}'),
)));
?>
    <input type="button" name="continueCheckout" id="continueCheckout" onclick="$('#continueCheckout').showCheckoutPanels();"/>
</div>