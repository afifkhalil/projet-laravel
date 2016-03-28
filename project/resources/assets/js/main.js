/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



/*
var person = {
    firstName: "Christophe",
    lastName: "Coenraets",
    blogURL: "http://coenraets.org"
};
var templateRow = "<h1>{{firstName}} {{lastName}}</h1>Blog: {{blogURL}}";

var html = Mustache.to_html(templateRow, person);
$('#sampleArea').append(html);
*/

$('body').on('click','.add-input', function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    var nbr =  $('#'+id + ' .line-input').length;
    var idCategory =  $('#'+id).attr('data-id');
    var row = $('#'+id + ' .to-copy').clone().removeClass('to-copy');
    nbr++;
    //console.log(nbr);
    row.find('select.option').attr('name', 'option-'+idCategory+'-'+nbr).val('');
    row.find('input.price').attr('name', 'price-'+idCategory+'-'+nbr).val('');
    row.find('input.desc').attr('name', 'desc-'+idCategory+'-'+nbr).val('');

    $('#'+id + ' .appendTo').append(row);

});




/*SELECTION element avec class .
avec id #
balise div
$('.add-input').on('click', function(){

});
$(this) refer to element clicked
 e.preventDefault(); do my work not yours
console.log debugueur js
clone() function copy html
PARENT.append('fils'); -> <parent> fils </parent>
*/


/*
var person = {
    firstName: "Christophe",
    lastName: "Coenraets",
    blogURL: "http://coenraets.org"
};
var templateRow = "<h1>{{firstName}} {{lastName}}</h1>Blog: {{blogURL}}";

var html = Mustache.to_html(templateRow, person);
$('#sampleArea').append(html);
*/


/* last add-cars
$('body').on('click','.add-input', function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    var nbr =  $('#'+id + ' .line-input').length;
    var idCategory =  $('#'+id).attr('data-id');
    var row = $('#'+id + ' .to-copy').clone().removeClass('to-copy');
    nbr++;
    //console.log(nbr);
    row.find('select.option').attr('name', 'option-'+idCategory+'-'+nbr).val('');
    row.find('input.price').attr('name', 'price-'+idCategory+'-'+nbr).val('');
    row.find('input.desc').attr('name', 'desc-'+idCategory+'-'+nbr).val('');

    $('#'+id + ' .appendTo').append(row);

});

*/
//$(el).css('visibility', 'hidden');
//$(el).css('visibility', 'visible');
//$(el).css('background', 'red');
//$(el).css({'background': 'red', 'border':'1px solid #000'});


/*SELECTION element avec class .
avec id #
balise div
$('.add-input').on('click', function(){});
$(this) refer to element clicked
 e.preventDefault(); do my work not yours
console.log debugueur js
clone() function copy html
PARENT.append('fils'); -> <parent> fils </parent>
*/


/*$('.modifier').on('click', function(e){
    
    e.preventDefault();
    
    var id=$(this).attr('data-id');
    var Route=hoursRoute+id;
    $.ajax({
        url: Route,
        type: 'GET',
        data: '',
        dataType: 'text',
        success: function(response) {
           var json_obj = $.parseJSON(response);
           var output="<ul>";
           for (var i in json_obj) 
            {
                output+="<li>" + json_obj[i].h + ",  " + json_obj[i].state + "</li>";
            }
              output+="</ul>";
           console.log(output);
        },
        fail: function(response) {
        }
    });
});
*/