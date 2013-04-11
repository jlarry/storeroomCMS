/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$.fn.addOptionInput = function(returndata, textfield){
    $('<option selected="select" value="'+returndata.data.id +'">'+textfield+'</option>').appendTo(this);
};

