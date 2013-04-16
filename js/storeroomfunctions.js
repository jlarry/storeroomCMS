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
                            "success":function(data){$(FormID).buildHtml(data,"#returnImageInfo", "#imageTemplate"); imgData = data;}
        }); 
};
var imgData = [];

$.fn.buildHtml = function(data, tmplcontainer, template){
var parsedData = $.parseJSON(data);
$(tmplcontainer).html(
		$(template).render(parsedData)
	);
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
