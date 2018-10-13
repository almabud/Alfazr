var room_data;
var room_id;
$(document).ready(function(e){
   
     initialize();
});
function initialize()
{
     show_reservation_content();
     $('.modal').modal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      inDuration: 300, // Transition in duration
      outDuration: 200, // Transition out duration
      startingTop: '25%', // Starting top style attribute
      endingTop: '15%', // Ending top style attribute
    });
    $(".check_in_date").flatpickr({
                    dateFormat: "Y-m-d",
                    minDate: "today",

                 });
    get_room();
    $('.check_in_date').on('change',function(){
        $('.check_out_date').removeAttr('disabled').flatpickr({
            dateFormat: "Y-m-d",
            minDate: "today",
            disable: [$(this).val()]
        });

    });
    $('.modal').on('change',function(){
         if(validateForm()){
            calculate_total_price(room_data);
         }
         else{
            $('.show-reservation-price').hide();
            $('#reserved_button').hide();
        }
    });
   add_reservation();
}
/*===============================*/
function show_reservation_content()
{
     $.ajax({
         url: 'reservation/show_reservation_content',
         type: 'GET',
         async: false,
         success: function(data){
             $('#midle-content').html(data);
              show_reservation();
             $('#data-table-simple').dataTable({
                ordering:  true
            });
         }
     });
}
/*====================================*/
function show_reservation(){
    $.ajax({
        type  : 'post',
        url   : 'reservation/get_reservation_data',
        async : false,
        dataType : 'json',
        success : function(data){
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
                var name;
                var reservedByEmail;
                var roomType;
                if(data[i].F_name == null && data[i].L_name == null)
                    name = "user";
                else
                    name = data[i].F_name+' '+ data[i].L_name;
                if(data[i].email == null)
                    reservedByEmail = '';
                else 
                    reservedByEmail = data[i].email;
                if(data[i].room_type==1)
                    roomType = 'Single';
                else if(data[i].room_type==2)
                    roomType = 'Double';
                else if(data[i].room_type==3)
                    roomType = 'Triple';
                else if(data[i].room_type==4)
                    roomType = 'Quad';
                html += '<tr>'+
                        '<td>'+data[i].guest_name+'</td>'+
                        '<td>'+data[i].guest_email+'</td>'+
                        '<td>'+data[i].guest_contact+'</td>'+
                        '<td>'+data[i].name+'</td>'+
                        '<td>'+roomType+'</td>'+
                        '<td>'+data[i].quantity+'</td>'+
                        '<td>'+data[i].price+'</td>'+
                        '<td>'+data[i].reff+'</td>'+
                        '<td>'+data[i].resrve_status+'</td>'+
                        '<td>'+name+'</td>'+
                        '<td>'+reservedByEmail+'</td>'+
                        '<td>'+data[i].created_date_time+'</td>'+
                        // '<td><img class="materialboxed" width="100" height="90" src="'+image_location+'" alt=""></td>'+
                        // '<td style="text-align:right;">'+
                        //     '<a class="btn-floating btn-small waves-effect waves-light green item_edit" data-id="'+data[i].id+'"> <i class="material-icons">edit</i></a>'+
                        //     '<a href="javascript:void(0);" class="btn-floating btn-small waves-effect waves-light red item_delete"  data-id="'+data[i].id+'"><i class="material-icons"> delete</i></a>'+
                        // '</td>'+
                        '</tr>';
                       
            }
            $('#show_data').html(html);
            $('.materialboxed').materialbox();
            
        }
    });
}
/*===============================================*/
function get_room()
{
     $('#select_hotel').on('change', function(){
        id= $('#select_hotel').val();
        $("#select_room_type").html('');
        $("#select_room_type").append('<option  disabled selected>Select room type</option>');
       $.ajax({
        url:'reservation/get_hotel_room_data/room',
        type:'GET',
        async: false,
        dataType: 'json',
        data: {id:id},
        success: function(data){
           room_data=data;
           data=data['room_data'];
            for(i=0;i<data.length;i++)
            {
                if(data[i].room_type==1)
                   $("#select_room_type").append('<option value="'+data[i].room_type+'">Single</option>');
                else if(data[i].room_type==2)
                    $("#select_room_type").append('<option value="'+data[i].room_type+'">Double</option>');
                else if(data[i].room_type==3)
                    $("#select_room_type").append('<option value="'+data[i].room_type+'">Triple</option>');
                else if(data[i].room_type==4)
                   $("#select_room_type").append('<option value="'+data[i].room_type+'">Quat</option>');
            }
              $("#select_room_type").material_select();
               //calculate_total_price(data);
        }
       });
    });
}
function calculate_total_price(data)
{
    
    
    var start_date= new Date($('.check_in_date').val());
    var end_date= new Date($('.check_out_date').val());
    var millisecondsPerDay = 1000 * 60 * 60 * 24;
    var millisBetween=end_date.getTime()- start_date.getTime() ;
    var night = millisBetween / millisecondsPerDay;
    var offer;
    var offer_local_cus;
    var offer_agent;
    var per_night_price;
    var total_price;
    var price;
    for(i=0;i<data['room_data'].length;i++){
        if(data['room_data'][i].room_type == $('#select_room_type').val()){
            offer_local_cus = data['room_data'][i].offer_local_cus;
            offer_agent = data['room_data'][i].offer_agent;
            price_p_night = data['room_data'][i].per_night_price;
            room_id = data['room_data'][i].id;
        }
    }
    if(data['profile_data'].role=='user')
      offer = Math.floor(offer_local_cus) * Math.floor(night) * Math.floor($('#select_quantity').val());
    else
      offer = Math.floor(offer_agent) * Math.floor(night) *  Math.floor($('#select_quantity').val());;
    price = (Math.floor(price_p_night) * Math.floor(night)) * Math.floor($('#select_quantity').val());
    total_price= price - (Math.floor(offer));
    $('#night').html(night);
    $('#price').html(price.toFixed(2));
    $('#offer').html(offer.toFixed(2));
    $('#total_price').html(total_price.toFixed(2));
    $('.show-reservation-price').show();
    $('#reserved_button').show();
    $('#reserve_loader').hide();
}
/*==============================================*/
function add_reservation(){
    $('#add_reservation').on('submit',(function(e){
        e.preventDefault();
        var data = new FormData(this);
        data.append('id',room_id);
        $('#reserve_loader').animate({left: '29px'},'slow').show();
        $('#reserved_label').animate({left: '32px'},'slow');
        $('.error_reg').html('');
        $('#reg_loader').show().animate({left:'71px'},'slow');
        $('#reg_label').animate({left:'133px'},'solow');
        $.ajax({
         url: "reservation/add_reservation",
         type: "POST",
         dataType: "JSON",
         data:  data,
         contentType: false,
         cache: false,
         processData:false,
         success:function(data)
             {
                 $('#reserve_loader').animate({left: '-29px'},'slow').hide();
                 $('#reserved_label').animate({left: '3px'},'slow');
                 if(data.error)
                 {

                 }
                 else
                 {
                    swal("Reserved", "A confirmation emal has been sent to your email.Please check your email and pay your bill.", "success");
                    $('#add_reservation')[0].reset();
                    $('.modal').modal('close');
                    $('#reserved_button').hide();
                    $('.show-reservation-price').hide();
                     Materialize.updateTextFields();
                     initialize();
                     show_reservation();
                 }
            }
        });
    }));
}
/*==============================================*/
function validateForm(room_data) {
  var isValid = true;
  $('.reservation-input').each(function() {
    if($(this).val()=='' || $('#select_hotel').val()==null || $('#select_room_type').val()==null || $('#select_quantity').val()==null)
        isValid=false;
  });
  return (isValid);
}