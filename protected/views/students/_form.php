<?php
/* @var $this StudentsController */
/* @var $model Students */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'students-form',
	//'enableAjaxValidation'=>false,
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
                ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cleared'); ?>
		<?php echo $form->radioButtonList($model,'cleared',array('No'=>'No','Yes'=>'Yes')); ?>
		<?php echo $form->error($model,'cleared'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'courses_id'); ?>
		<?php echo $form->dropDownList($model,'courses_id', CHtml::listData($courses, 'id' , 'name'),array('prompt'=>'Select Course')); ?>
		<?php echo $form->error($model,'courses_id'); ?>
	</div>
        <div class="row">
            <?php echo CHtml::link('Add New Course', '#', $htmlOptions=array('onclick'=>'$("#addCourseDialog").dialog("open"); return false;')); ?>
        </div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'semester'); ?>
		<?php echo $form->dropDownList($model,'semester', Semester::getSemesters() ,array('prompt'=>'Select Semester')); ?>
		<?php echo $form->error($model,'semester'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', $htmlOptions=array('id'=>'submit', 'name'=>'submit')); ?>

        </div>

<?php $this->endWidget(); ?>
<?php
        $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'addCourseDialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Add New Course',
        'modal'=>true,
        'autoOpen'=>false,
    ),
));
        
    echo $this->renderPartial('/courses/_form', array('model'=>Courses::model(), 'instructors'=>$instructors, 'tas'=>$tas));

$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
</div><!-- form -->