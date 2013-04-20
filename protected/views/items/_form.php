<?php
/* @var $this ItemsController */
/* @var $model Items */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'items-form',
	'enableAjaxValidation'=>false,
        'enableClientValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'storeroomid'); ?>
		<?php echo $form->textField($model,'storeroomid',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'storeroomid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'niunumber'); ?>
		<?php echo $form->textField($model,'niunumber'); ?>
		<?php echo $form->error($model,'niunumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'po'); ?>
		<?php echo $form->textField($model,'po'); ?>
		<?php echo $form->error($model,'po'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cost'); ?>
		<?php echo $form->textField($model,'cost',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'purchasedate'); ?>
		<?php echo $form->textField($model,'purchasedate'); ?>
		<?php echo $form->error($model,'purchasedate'); ?>
	</div>

	<div class="row">
            <?php echo CHtml::button('Select Image', $htmlOptions=array('id'=>'selectImgButton', 'onclick'=>'$("#selectImgDialog").dialog("open"); $("#selectImgDialog").listImages();')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kits_id'); ?>
		<?php echo $form->dropDownList($model, 'kits_id', CHtml::listData($kits,'id', 'storeroomid'),array('prompt'=>'Kits')); ?>
		<?php echo $form->error($model,'kits_id'); ?>
	</div>
        <div class="row">
            <?php echo CHtml::button('Add Kit', $htmlOptions=array('id'=>'addKitButton')); ?>
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'itemcategories_id'); ?>
		<?php echo $form->dropDownList($model,'itemcategories_id',CHtml::listData($itemcategories,'id','name'), array('prompt'=>'Select Category')); ?>
		<?php echo $form->error($model,'itemcategories_id'); ?>
	</div>
        <div class="row">
            <?php echo CHtml::button('Add Category', $htmlOptions=array('id'=>'addCatButton')); ?>
        </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
<?php
        $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'selectImgDialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Select or Add Image',
        'modal'=>true,
        'autoOpen'=>false,
    ),
));
     
 $this->renderPartial('/itemimage/index', array('image'=>$image));

$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
</div><!-- form -->