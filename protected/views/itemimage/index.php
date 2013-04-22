<?php

/*  index file at /itemimage/index.php
 *  This is a a partial template for the image select dialog box 
 *  located in the ItemsController actionCreate, View/Create + _form
 */
?>
<?php
        $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'addImgDialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Add New Image',
        'modal'=>true,
        'autoOpen'=>false,
    ),
));
        
 $this->renderPartial('/itemimage/_form', array('itemImage'=>$itemImage));

$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<div id="buttonContainer"><?php echo CHtml::htmlButton('Add Image', $htmlOptions=array('id'=>'addImgButton', 'onclick'=>'$("#addImgDialog").dialog("open");')); ?></div>
<!-- this container holds the image select template -->
<div id="imgListContainer">
    <ul id="imgUlList">
    </ul>
</div>

<!-- end container -->
<!-- this template creates the image select list of images for the image select dialog box -->
<script id="imgSelectTmpl" type="text/x-jquery-tmpl">
    <li><a href="#" id="itemImg" onclick="$(this).addSelectedImg(event);">{{:filename}}</a></li>
</script>
<!-- End template -->
<!-- This script makes an ajax call to item/index to populate the image select dialog box -->
<script>
    $.fn.listImages = function(){
        $.ajax({
                            "type":"GET",
                            "url":"http://localhost/storeroom/index.php?r=itemimage/index",
                            //"data":formData,
                            "dataType":"json",
                            "success":function(data){$("#imgListContainer").buildImgList(data,"#imgUlList", "#imgSelectTmpl"); imgData = data;}
                            
        });
    };  
</script>

