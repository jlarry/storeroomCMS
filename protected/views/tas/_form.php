<?php
/* @var $this TasController */
/* @var $model Tas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tas-form',
        'action'=>Yii::app()->createUrl('tas/create'),
	'enableAjaxValidation'=>false,
        'enableClientValidation'=>true,
            'clientOptions'=>array(
              'validateOnSubmit'=>true,
        'afterValidate'=>'js:function(form,data,hasError){
                    if(!hasError){
                        $.ajax({
                            "type":"POST",
                            "url":"'.Yii::app()->createUrl('tas/create').'",
                            "dataType":"json",
                            "data":form.serialize(),
                            "success":function(returndata){$("#addTaDialog").dialog("close"); $("#tas-form")[0].reset(); $("#Courses_tas_id").addOptionInput(returndata, returndata.data.last_name);},
        });
    }
}'
            ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name'); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name'); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'semester'); ?>
		<?php echo CHtml::activeDropDownList($model,'semester', Semester::getSemesters()); ?>
		<?php echo $form->error($model,'semester'); ?>
	</div>


	<div class="row buttons">
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        <?php echo CHtml::resetButton('Cancel', array('id'=>'taClrFrmButton','onclick'=>'$("#addTaDialog").dialog("close");')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
