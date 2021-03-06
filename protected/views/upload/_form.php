<?php
/* Model Image
 * tempalte for partial render of a file field for student image upload dialog box
 */
?>
<div class="form">

<?php
$form=$this->beginWidget('CActiveForm',
        array(
            'id'=>'image-form',
            //'endableAjaxValidation'=>false,
            'enableClientValidation'=>false,
            'action'=>Yii::app()->createUrl('upload/upload'),
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
<?php echo $form->fileField($image, 'file', $htmlOptions=array('onchange'=>'$("#Image_file").sendImageInput("#image-form");')); ?>
<?php echo $form->error($image, 'file'); ?>
</div>

<?php $this->endWidget(); ?>
    <div id="returnImageInfo">
    </div>
 <script id="imageTemplate" type="text/x-jquery-tmpl">

                <img src="{{:url}}" />
            <button id="addImg" name="addImg" type="button" onclick="$('#addImg').buildHtml(imgData, '#studentImage', '#studentImgTmpl'); $('#addImageDialog').dialog('close'); $('#addImgButtonStudents').toggle();">Add</button>    
            <button id="removeImage" name="removeImage" type="button" onclick="$('#removeImage').deleteImage('{{:delete_url}}');">Remove</button>
</script>
</div>
