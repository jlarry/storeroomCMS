<?php
/* @var $this ItemsController */
/* @var $model Items */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'storeroomid'); ?>
		<?php echo $form->textField($model,'storeroomid',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'niunumber'); ?>
		<?php echo $form->textField($model,'niunumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'po'); ?>
		<?php echo $form->textField($model,'po'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cost'); ?>
		<?php echo $form->textField($model,'cost',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'purchasedate'); ?>
		<?php echo $form->textField($model,'purchasedate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'added'); ?>
		<?php echo $form->textField($model,'added'); ?>
	</div>

	<div class="row">
		<?php// echo $form->label($model,'image'); ?>
		<?php// echo $form->textField($model,'image',array('size'=>60,'maxlength'=>245)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kits_id'); ?>
		<?php echo $form->textField($model,'kits_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'itemcategories_id'); ?>
		<?php echo $form->textField($model,'itemcategories_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->