<?php
/*
 * Error dialog template for file uploads via ajax
 * 
 */
?>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'imgErrorDialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'ERROR:',
        'autoOpen'=>false,
        'modal'=>true,
        'buttons'=>array('OK'=>'js:function("#imgErrorDialog").dialog("close")'),
    ),
));

    echo '<div id="imgErrorContainer" class="errorSummary"></div>';

$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<script id="imgErrorTemplate" type="text/x-jquery-tmpl">
        <p>{{:errorMessage}}</p>
        <button id="closeErrorDialog" name="closeErrorDialog" type="button" onclick="$('#imgErrorDialog').dialog('close');">OK</button>
</script>
