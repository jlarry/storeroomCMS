<?php
/* Model Image
 * 
 */
?>
<div class="form">

<?php
$form=$this->beginWidget('CActiveForm',
        array(
            'id'=>'image-form',
            //'endableAjaxValidation'=>false,
            'enableClientValidation'=>true,
            'htmlOptions'=>array('enctype'=>'multipart/form-data'),
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            )
        ));
?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
<?php echo $form->errorSummary($image); ?>
<div class="row">
<?php echo $form->labelEx($image, 'file'); ?>
<?php echo $form->fileField($image, 'file'); ?>
<?php echo $form->error($image, 'file'); ?>
</div>
<div class="row buttons">
	<?php echo CHtml::submitButton('Create'); ?>
</div>
<?php $this->endWidget(); ?>
</div>
