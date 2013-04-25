<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kits-form',
        'action'=>Yii::app()->createUrl('kits/create'),
	'enableAjaxValidation'=>false,
        'enableClientValidation'=>true,
            'clientOptions'=>array(
              'validateOnSubmit'=>true,
        'afterValidate'=>'js:function(form,data,hasError){
                    if(!hasError){
                        $.ajax({
                            "type":"POST",
                            "url":"'.Yii::app()->createUrl('kits/create').'",
                            "dataType":"json",
                            "data":form.serialize(),
                            "success":function(returndata){$("#addGroupDialog").dialog("close"); $("#kits-form")[0].reset(); $("#Items_kits_id").addOptionInput(returndata, returndata.data.storeroomid);},
        });
    }
}'
            ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'storeroomid'); ?>
		<?php echo $form->textField($model,'storeroomid'); ?>
		<?php echo $form->error($model,'storeroomid'); ?>
	</div>
        <div class="row">
            <!-- Holds the selected image template -->
        </div>
        <div class="row">
            <?php $this->widget('zii.widgets.jui.CJuiButton',array(
    'name'=>'button',
    'caption'=>'Select Image',
    'value'=>'',
    'onclick'=>new CJavaScriptExpression('function(){ return false;}'),
)); ?>
        </div>
        
 <?php $this->endWidget(); ?>

</div>
