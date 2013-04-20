<?php

/*
 * itemimage index file
 */
?>
<?php echo CHtml::htmlButton('Add Image', $htmlOptions=array('id'=>'addImgButton')); ?>
<div id="imgSelectContainer"></div>
<script id="imgSelectTmpl" type="text/x-jquery-tmpl">
        <div id="itemImg">
            <img src="{{:name}}" />
        </div>
</script>
<script>
    $.fn.listImages = function(){
        $.ajax({
                            "type":"GET",
                            "url":"http://localhost/storeroom/index.php?r=itemimage/index",
                            //"data":formData,
                            "dataType":"json",
                            "success":function(data){$("#imgSelectContainer").buildHtml(data,"#imgSelectContainer", "#imgSelectTmpl");}
                            
        });
    };  
</script>