/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$.fn.addOptionInput = function(returndata, textfield, textfield2){
    if(textfield2){
        var optionText = textfield + " " + textfield2;
    }
    else {
        var optionText = textfield;
    }
    $('<option selected="select" value="'+returndata.data.id +'">'+ optionText +'</option>').appendTo(this);
};

$.fn.sendImageInput = function(formid){
    //alert("OK");
    var FormID = formid;
    var formData = new FormData($(FormID)[0]);
    $.ajax({
                            "type":"POST",
                            "url":"http://localhost/storeroom/index.php?r=upload/upload",
                            "data":formData,
                            "contentType":false,
                            "processData":false,
                            "success":function(data){$(FormID).buildHtml(data,"#returnImageInfo", "#imageTemplate"); imgData = data;},
                            
        }); 
};
//var to hold the return json data containing uploaded image information.  
var imgData = [];

$.fn.buildImgList = function(data, tmplcontainer, template){
   $(tmplcontainer).html($(template).render(data));
};
                    
$.fn.buildHtml = function(data, tmplcontainer, template){
var parsedData = $.parseJSON(data);
if(parsedData.status === "OK"){
$(tmplcontainer).html(
		$(template).render(parsedData)
	);
}
else{
    $("#imgErrorContainer").html($("#imgErrorTemplate").render(parsedData));
    $("#imgErrorDialog").dialog("open");
}
};

$.fn.deleteImage = function(url){
    $("#returnImageInfo").html(" ");
    $.ajax({
        "type":"GET",
        "url":url,
        "dataType":"json",
        "success":function(data){}
    });
};
$.fn.addSelectedImg = function(event){
    //event.preventDefault();
    $("#selectImgDialog").dialog("close");
    $("#selectImgButton").toggle();
    //$("#removeImgButton").toggle();
    //var imgUrl = $("img", this).attr('src');
    $("#itemImgContainer").html($(this).html() + '<button id="removeImgButton" type="button">Remove Image</button>');
    //'<img src="'+imgUrl+'"/><button id="removeImgButton" type="button">Remove Image</button>'
    
};

$.fn.showCheckoutPanels = function(event){
    $("#selectStudentsCnt").hide();
    $("#selectEquipmentCnt").show("slide");
};
//adds click to <li> image selection list in select image dialog box for adding Equipment
$("#itemUlList li").live('click', function(evt){
    $(this).addSelectedImg(evt);
});

$("#removeImgButton").live('click', function(evt){
    $("#itemImgContainer").html(" ");
    $("#selectImgButton").toggle();
});

$(".items tr").live('dblclick',function(evt){
    $("#continueButtonCnt").show();
    var selectedUser = $(this).html();
    $(this).remove();
    $("#selectedStudentCnt table").append('<tr>'+ selectedUser+ '</tr>');
    $("#selectedStudentCnt").show();
});
