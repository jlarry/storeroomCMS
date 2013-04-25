<?php

/* ItemCategories _form
 * form for ItemsCategories model
 */
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'itemscategories-form',
        'action'=>Yii::app()->createUrl('itemsCategories/create'),
	'enableAjaxValidation'=>false,
        'enableClientValidation'=>true,
            'clientOptions'=>array(
              'validateOnSubmit'=>true,
        'afterValidate'=>'js:function(form,data,hasError){
                    if(!hasError){
                        $.ajax({
                            "type":"POST",
                            "url":"'.Yii::app()->createUrl('/itemsCategories/create').'",
                            "dataType":"json",
                            "data":form.serialize(),
                            "success":function(returndata){$("#addCatDialog").dialog("close"); $("#itemscategories-form")[0].reset(); $("#Items_itemcategories_id").addOptionInput(returndata, returndata.data.name);},
        });
    }
}'
            ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
        
 <?php $this->endWidget(); ?>

</div>