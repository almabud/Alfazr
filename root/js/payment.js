var id;
var reff;
$(document).ready(function(e){
   
     initialize();
});
function initialize()
{
     $("#add_payment_btn").on('click',function(){
        $("input[name='amount']").val('');
        $("input[name='reff']").val('');
        Materialize.updateTextFields();
        $('#payment_button').attr('disabled',true);
        $('#payment_loader').animate({left: -$("#payment_loader").parent().width() / 2},'slow')
        $('#payment_loader').hide();
        $('#payment_label').show();
        $('.dropify-clear').click();
        $('.dropify').dropify();
        $('#error').html('');
     });
     $([name="amount"]).val('');
     $('.modal').modal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      inDuration: 300, // Transition in duration
      outDuration: 200, // Transition out duration
      startingTop: '25%', // Starting top style attribute
      endingTop: '15%', // Ending top style attribute
    });
    $('.modal').on('change',function(){
         if(validateForm()){
            if($.isNumeric($("input[name='amount']").val()))
              $('#payment_button').removeAttr('disabled');
        else
           $('#payment_button').attr('disabled',true);
         }
         else{
             $('#payment_button').attr('disabled',true);
        }
    });
 add_payment();
 show_payment();
 payment_status_update();
      $('.materialboxed').materialbox();
      $('#data-table-simple').DataTable({
        "drawCallback": function( settings ) {
             $('select').material_select();
    }
      });
       
}
/*====================================*/
function payment_status_update()
{
    $('.status').hover(function(){
         $(this).find('.item_edit').removeClass('hide');
         $(this).find('.status_change').off('click').on('click','.status_btn',(function(){
            $(this).find('.status_loader').animate({left: $(".status_btn").width() / 2.5},'slow').show();
            $(this).find('.payment_status_label').hide(); 
            status = ($(this).parent().parent().find('#status_select').val());
            $.ajax({
             url: "payment/payment_status_update",
             type: "POST",
             dataType: "JSON",
             data:  {id:id, status:status, reff:reff},
             success:function(data)
                 {
                    console.log(data);
                }
            });
         }));
           

    },function(){
        $(this).find('.item_edit').addClass('hide');
    });

    $('.status').on('click','.item_edit',function(e){
        e.preventDefault();
        id = $(this).data('id');
        reff = $(this).data('reff');
        console.log(reff);
        $(this).parent().find('span').find('.status_text').html('');
        $(this).parent().find('.item_edit').hide().removeClass('item_edit');
        $(this).parent().find('.status_change').removeClass('hide');
    });
     
}
/*===============================*/
function show_payment(){
    $.ajax({
        type  : 'GET',
        url   : 'payment/get_all_payment',
        async : false,
        dataType : 'json',
        success : function(data){
           console.log(data);
            var html = '';
            var i;
            var status;
             var base_url = window.location.origin;
             var pathArray = window.location.pathname.split( '/' );
            for(i=0; i<data.length; i++){
                var test1,test2;
                if(data[i].status=='pending')
                {
                     status=`<div class="status_change hide" method="post">
                              <select id="status_select" name="status">
                                <option value="" disabled selected>`+data[i].status+`</option>
                                <option class='test' value="confirmed">Confirmed</option>
                                <option value="cancel">Cancel</option>
                              </select>
                                <p>
                                 <button type="submit" class="btn waves-effect waves-light col s5 status_btn right" name="submit">
                                  <div class="spinner status_loader">
                                      <div class="rect1"></div>
                                      <div class="rect2"></div>
                                      <div class="rect3"></div>
                                      <div class="rect4"></div>
                                  </div>
                                  <span  class="center payment_status_label">save</span>
                                </button> 
                                </p>

                            </div>
                            </br>
                            `;
                        status_text=`<span class="status_text">`+data[i].status+`</span></span><a class="btn-floating btn-flat btn-small waves-effect waves-light right item_edit hide" data-id="`+data[i].id+`" data-reff="`+data[i].reff+`"> <i class="material-icons black-text">edit</i></a>`;               
                 }
               else
                {
                    status='';
                    status_text=data[i].status;
                }
                var image_location = base_url+'/'+pathArray[1]+'/'+pathArray[2]+'/images/payment_reciept/'+data[i].payment_receipt;
                html += `<tr>
                        <td>`+data[i].name+`</td>
                        <td>`+data[i].email+`</td>
                        <td>`+data[i].reff+`</td>
                        <td><img class="materialboxed" width="100" height="90" src="`+image_location+`" alt=""></td>
                        <td class="status"><span>
                        `+status+status_text+
                        `
                        </td>
                        <td>`+data[i].created_date_time+`</td>
                        </tr>`;
            }
            $('#show_data').html(html);
        }
    });
}
/*==============================================*/
function add_payment(){
    $('#add_payment').on('submit',(function(e){
        e.preventDefault();
        $('#payment_loader').animate({left: $("#payment_loader").parent().width() / 2},'slow').show();
        $('#payment_label').hide();
        $('.error_reg').html('');
        $.ajax({
         url: "payment/add_payment",
         type: "POST",
         dataType: "JSON",
         data:  new FormData(this),
         contentType: false,
         cache: false,
         processData:false,
         success:function(data)
             {
                $('#payment_loader').animate({left: -$("#payment_loader").parent().width() / 2},'slow').hide();
                $('#payment_label').show();
                 if(data.error)
                 {
                     $('#error').html(data.error);
                     $('#error').focus();
                 }
                 else
                 {
                    swal("Sent", "We recieved your payment request. Wait for the  confirmation mail.", "success");
                    $('#add_payment')[0].reset();
                    $('.modal').modal('close');
                     Materialize.updateTextFields();
                     $('#error').html('');
                     show_payment();
                     payment_status_update();
                     $('.materialboxed').materialbox();
                 }
            }
        });
    }));
}
/*==============================================*/
function validateForm(room_data) {
  var isValid = true;
  $('.reservation-input').each(function() {
    if($(this).val()=='')
        isValid=false;
  });
  return (isValid);
}