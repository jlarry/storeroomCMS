<?php
/* @var $this CoursesController */
/* @var $model Courses */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'courses-form',
	'enableAjaxValidation'=>false,
        'enableClientValidation'=>true,
            'clientOptions'=>array(
              'validateOnSubmit'=>true,
                'afterValidate'=>'js:function(form,data,hasError){
                    if(!hasError){
                        $.ajax({
                            "type":"POST",
                            "url":"'.Yii::app()->createUrl('courses/create').'",
                            "dataType":"json",
                            "data":form.serialize(),
                            "success":function(returndata){$("#addCourseDialog").dialog("close"); $("#courses-form")[0].reset(); $("#Students_courses_id").addOptionInput(returndata, returndata.data.name, returndata.data.section);},
        });
    }
}'
            ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'semester'); ?>
		<?php echo $form->dropDownList($model,'semester', Semester::getSemesters(), array('prompt'=>'Select Semester')); ?>
		<?php echo $form->error($model,'semester'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'section'); ?>
		<?php echo $form->dropDownList($model,'section', array('1'=>'Section 1','2'=>'Section 2','3'=>'Section 3'), array('prompt'=>'Select Section')); ?>
		<?php echo $form->error($model,'section'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'instructors_id'); ?>
		<?php echo $form->dropDownList($model,'instructors_id',CHtml::listData($instructors, 'id', 'last_name'), array('prompt'=>'Select Professor')); ?>
		<?php echo $form->error($model,'instructors_id'); ?>
	</div>
        <div class="row">
            <?php echo CHtml::link('Add New Professor', '#', $htmlOptions=array('onclick'=>'$("#addProfDialog").dialog("open"); return false;')); ?>
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'tas_id'); ?>
		<?php echo $form->dropDownList($model,'tas_id',CHtml::listData($tas, 'id', 'last_name'), array('prompt'=>'Select TA')); ?>
		<?php echo $form->error($model,'tas_id'); ?>
	</div>
        <div class="row">
            <?php echo CHtml::link('Add New TA', '#', $htmlOptions=array('onclick'=>'$("#addTaDialog").dialog("open"); return false;')); ?>
        </div>

	<div class="row buttons">
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        <?php echo CHtml::resetButton('Cancel', array('id'=>'courseClrFrmButton','onclick'=>'$("#addCourseDialog").dialog("close");')); ?>    
	</div>

<?php $this->endWidget(); ?>

<?php
        $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'addTaDialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Add New TA',
        'modal'=>true,
        'autoOpen'=>false,
    ),
));
        
    echo $this->renderPartial('/tas/_form', array('model'=>Tas::model()));

$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<?php
        $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'addProfDialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Add New Professor',
        'modal'=>true,
        'autoOpen'=>false,
    ),
));
        
    echo $this->renderPartial('/instructors/_form', array('model'=>Instructors::model()));

$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
</div><!-- form -->