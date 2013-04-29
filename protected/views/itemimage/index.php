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
        'buttons'=>array('Cancel'=>'js:function(){$(this).dialog("close");}'),  
    ),
));
        
 $this->renderPartial('/itemimage/_form', array('itemImage'=>$itemImage));

$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<!-- this container holds the image select template -->
<div id="imgListContainer">
    <ul id="itemUlList">
    </ul>
</div>
<!-- <a href="#" onclick="$(this).addSelectedImg(event);"> -->
<!-- end container -->
<!-- this template creates the image select list of images for the image select dialog box -->
<script id="imgSelectTmpl" type="text/x-jquery-tmpl">
    <li>
    <img src="<?php echo Yii::app()->getBaseUrl()."/images/items/"; ?>{{:filename}}" />
        <h3>{{:name}}</h3>
        <p><strong>File Name:</strong> {{:filename}}
        <strong>Category:</strong> {{:itemcategories.name}}</p>
       <input name="Items[itemimage_id]" id="Items_itemimage_id" value="{{:id}}" type="hidden" />
    </li>
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
                            "success":function(data){$("#imgListContainer").buildImgList(data,"#itemUlList", "#imgSelectTmpl"); imgData = data;}
                            
        });
    };  
</script>

