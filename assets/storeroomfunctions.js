/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$.fn.addOptionInput = function(returndata, textfield){
    $('<option selected="select" value="'+returndata.data.id +'">'+textfield+'</option>').appendTo(this);
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
                            "success":function(returndata){$("#returnImageInfo").buildHtml(returndata);}
        }); 
};

$.fn.buildHtml = function(jsondata){

};


