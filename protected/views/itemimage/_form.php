<?php
/*
 * Partial template for add equipment image form in the add image dialog box.
 */
?>
<div class="form">

<?php
$form=$this->beginWidget('CActiveForm',
        array(
            'id'=>'image-form',
            //'endableAjaxValidation'=>false,
            'enableClientValidation'=>false,
            'action'=>Yii::app()->createUrl('itemimage/add'),
            'htmlOptions'=>array('enctype'=>'multipart/form-data'),
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
                            )
        ));
?>
<!-- Add equipment image dialog form -->
    <p class="note">Fields with <span class="required">*</span> are required.</p>
<?php echo $form->errorSummary($itemImage); ?>
<div class="row">
<?php echo $form->labelEx($itemImage, 'file'); ?>
<?php echo $form->fileField($itemImage, 'file', $htmlOptions=array('onchange'=>'$("#Image_file").sendImageInput("#image-form");')); ?>
<?php echo $form->error($itemImage, 'file'); ?>
</div>

<?php $this->endWidget(); ?>
    <div id="returnImageInfo">
    </div>
 <script id="imageTemplate" type="text/x-jquery-tmpl">

                <img src="{{:url}}" />
            <button id="addImg" name="addImg" type="button" onclick="$('#addImg').buildHtml(imgData, '#itemImgContainer', '#itemImgTmpl'); $('#addImgDialog').dialog('close'); $('#selectImgButton').toggle();">Add</button>    
            <button id="removeImage" name="removeImage" type="button" onclick="$('#removeImage').deleteImage('{{:delete_url}}');">Remove</button>
</script>
</div>
