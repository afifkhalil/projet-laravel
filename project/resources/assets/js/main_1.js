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

$('.add-option').on('click',function(e){
  e.preventDefault();
  var id_cat=$(this).attr('data-id');
  var option=$('select[name=option-'+id_cat+'] option:selected');
  var option_name = option.text();
  var option_id = option.attr('value');
  var el=$('#to-clone').clone().removeClass('hidden').attr('id','').addClass('row');
  var nb=$('#new_option_'+id_cat +' .row').length;
  console.log(option_id);
 if($('select[name=option-'+id_cat+'] option').length != 0){
    nb++;
   // console.log(nb, '#new_option_'+id_cat +' .row');
    el.find('p').text(option_name);
    //el.find('input').attr('name','price-'+id_cat+'-'+option_id).val('');
    el.find('input').attr('name','price-'+option_id).val('');
    $('#new_option_'+id_cat).append(el);
    var x =$('input[name=tab_option]:hidden').val(); 
      $('input[name=tab_option]:hidden').val(x+option_id+'-');
        //var tab =
       //var id=tab.val();
       //tab.value = id+option_id;
       option.remove();
 }
});

$('.nouvelle_option').on('click',function(e){
  e.preventDefault();
  var amo = $(this).parent().parent().find('.new_option');
  var el=$('#to-clone').clone().removeClass('hidden').attr('id','').addClass('row');
  var nb=amo.find('.row').length;
  
    el.find('input.name').attr('name','name_option_'+nb).val('');
    el.find('textarea.description').attr('name','description_option_'+nb).val('');
    amo.append(el);
    $('input[name=tab_option]:hidden').val(amo.find('.row').length);
});
$('.option_nouvelle').on('click',function(e){
  e.preventDefault();
  var amo = $(this).parent().parent().find('.new_option');
  var el=$('#to-clone').clone().removeClass('hidden').attr('id','').addClass('row');
  var nb=amo.find('.row').length;
  
    el.find('input.name').attr('name','name_option_'+nb).val('');
    el.find('textarea.description').attr('name','description_option_'+nb).val('');
    amo.append(el);
    $('input[name=nb_option]:hidden').val(amo.find('.row').length);
    var enregistrer=$(this).parent().find('.btn.btn-success.pull-right');
    enregistrer.css('visibility','visible');
});
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

// prepare the form when the DOM is ready


$('.form-options').on('submit', function(e){
    var amo = $(this).find('.new_option');
    var parent = $(this).find('.ajax');
    e.preventDefault();
    var x  = $( this ).serialize();

    $.ajax({
        url: route,
        type: 'POST',
        data: x,
        dataType: 'text',
        success: function(response) {
            
            amo.children('.row').each(function(){
                var x = $(this).find('input').val();
                var y = $(this).find('textarea').val();
                cloneAjax(x,y,parent);
            });
            amo.html('');
        },
        fail: function(response) {
        }
    });
});


function cloneAjax(x,y,parent){
    var el = $('#ajax-clone').clone().removeClass('hidden').attr('id','');
    el.find('p.name').append(x);
    el.find('p.desc').append(y);
    $(parent).append(el);
}


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
$('.supprimer').on('click', function(e){
    
    e.preventDefault();
    
    var id=$(this).attr('data-id');
    var Route=suppdayRoute+id;
    $.ajax({
        url: Route,
        type: 'GET',
        data: '',
        dataType: 'text',
        success: function(response) {
           $( "."+id ).remove();
        },
        fail: function(response) {
        }
    });
});

var datepicker  = $('#datetimepicker12');
var datepickerTD  = $('#datetimepicker12 td');

datepicker.on('click', '.day', function(e){
    e.preventDefault();
    datepickerTD.removeClass('clicked')
     $(this).addClass('clicked');
    var dates=$(this).attr('data-day');
    dates=dates.replace('/','-');
    dates=dates.replace('/','-');
    var Route=idDayRoute+dates+'/'+carid;
    $.ajax({
        url: Route,
        type: 'GET',
        data: '',
        dataType: 'text',
        success: function(response) {
            var json_obj = $.parseJSON(response);
            var id;
            var state;
              // if($.inArray(i, tabheurs)==0)
            for(var j=9;j<=16;j++)
            {
                  $('.h-'+j).removeClass('disabled').find('input').attr('disabled', false).attr('checked',false) ;
                  $('.h-'+j).find('span').html('');
            }
            for (var i in json_obj) 
            {   if(json_obj[i].state=='false')
                {
                    state='(non disponible)';
                } 
                else
                {
                    state='(réservée)';
                }
                 $('.h-'+json_obj[i].h).addClass('disabled').find('input').attr('disabled', true) ;
                 
                 id=json_obj[i].id;
                 $('.h-'+json_obj[i].h).find('span').html(state);
                 console.log($('.h-'+json_obj[i].h).find('label').val());
                
            }
              $('.day_id').val(id);
         //json_obj[i].state
        /* for(var i in json_obj)
         {}*/
        },
        fail: function(response) {
                 
        }
    });
});

    
  // console.log(dates);
 
datepicker.on('control space', function(e){
		$('#datetimepicker12 td').attr('data-action', '');
     });
datepickerTD.attr('data-action', '');


if($('.datepicker-drive').length>0){
   $('.datepicker-drive').datepicker();
}


