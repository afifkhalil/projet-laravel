/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




$('.add-option').on('click',function(e){
  e.preventDefault();
  var id_cat=$(this).attr('data-id');
  var option=$('select[name=option-'+id_cat+'] option:selected');
  var option_name = option.text();
  var option_id = option.attr('value');
  var el=$('#to-clone').clone().removeClass('hidden').attr('id','').addClass('row');
  var nb=$('#new_option_'+id_cat +' .row').length;
  //console.log(option_id);
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
   console.log($('form').attr('action'));
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

// prepare the form when the DOM is ready


$('.form-options').on('submit', function(e){
    var amo = $(this).find('.new_option');
    var parent = $(this).find('.ajax');
    e.preventDefault();
    var i=0;
    var x  = $( this ).serialize();

    $.ajax({
        url: route,
        type: 'POST',
        data: x,
        dataType: 'text',
        success: function(response) {
            var tab = $.parseJSON(response);
            amo.children('.row').each(function(){
                var x = $(this).find('input').val();
                var y = $(this).find('textarea').val();
                //console.log(tab[i]);
                cloneAjax(x,y,parent,tab[i]);
                i++;
            });
            amo.html('');
        },
        fail: function(response) {
        }
    });
});


function cloneAjax(x,y,parent,tab){
    var el = $('#ajax-clone').clone().removeClass('hidden').attr('id','');
    el.find('p.name').append(x);
    el.find('p.desc').append(y);
    var url=el.find('form.form-delete-option').attr('action');
    el.find('form.form-delete-option').attr('action',url.slice(0,-1)+tab);
    
    $(parent).append(el);
}



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
         location.reload();
        },
        fail: function(response) {
        }
    });
});

var datepicker  = $('#datetimepicker12');
var datepickerTD  = $('#datetimepicker12 td');

datepicker.on('click', '.day:not(.disabled)', function(e){
    e.preventDefault();
    datepickerTD.removeClass('clicked')
     $(this).addClass('clicked');
    var dates=$(this).attr('data-day');
    $('.showDate').html(dates);
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
                 var  phrase  = "";
                 var btn;
                if(json_obj[i].state == "true"){
                 phrase =  json_obj[i].line + ' ' + json_obj[i].attach_name;
                }
                $('.h-'+json_obj[i].h).find('span').html(state + ' '+ phrase);
                 if(json_obj[i].annuler == "true")
                 {  btn=$('#btn-anuuler').clone().removeClass('hidden');
                     $('.h-'+json_obj[i].h).find('span').append(btn);
                 }
               
                 console.log(json_obj[i].annuler);
                
            }
              $('.day_id').val(id);
              $('.supprimer').attr('data-id',id);
              
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

if($('.owl-carousel').length>0){
    $('.owl-carousel').owlCarousel({
        stagePadding: 0,
        loop:false,
        margin:10,
        nav:true,
        navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        autoplay:true,
        autoHeight:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
}