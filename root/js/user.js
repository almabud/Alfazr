$(document).ready(function(e){
    registration();
    login();
    activation();
    re_send_email();
    $('.modal').modal({
        dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      inDuration: 300, // Transition in duration
      outDuration: 200, // Transition out duration
      startingTop: '25%', // Starting top style attribute
      endingTop: '15%', // Ending top style attribute
    });
    Materialize.updateTextFields();
  
});
/*=============================+*/
function login()
{
    $('#login').on('submit',(function(e){
        e.preventDefault();
        $('#error').html('');
        $('#success').html('');
        var base_url = window.location.origin;
        var pathArray = window.location.pathname.split( '/' );
        var url=base_url+'/'+pathArray[1]+'/'+pathArray[2]+'/admin/user/login';
        
        $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data:  new FormData(this),
            contentType: false,
                    cache: false,
                processData:false,
            success:function(data)
            {
                if(data.error)
                  $('#error').html(data.error);
                else
                  window.location.replace(data.success);
            }
        });
    }))
}
/*=======================================*/
function registration()
{
    $('#register_form').on('submit',(function(e){
        e.preventDefault();
        $('.error_reg').html('');
        $('#reg_loader').show().animate({left:'71px'},'slow');
        $('#reg_label').animate({left:'133px'},'solow');
        $.ajax({
         url: "do_register",
         type: "POST",
         dataType: "json",
         data:  new FormData(this),
         contentType: false,
                 cache: false,
             processData:false,
         success:function(data)
             {
                 $('#reg_loader').hide();
                 $('#reg_label').animate({left: '101px'},'solow');
                if(data.error)
                {
                    if(data.error.active)
                       $('#activation_tecnical_error').html(data.error.active);
                     else if(data.error.register)
                      $('#email_error').html(data.error.register);
                     else if(data.error.error)
                     $('#activation_tecnical_error').html(data.error.error);
                     else if(data.error.password)
                     $('#password_error').html(data.error.password);
                     
                }
                else
                {
                 swal({
                 title: "Account created successfully",
                 text: "Your account created successfully. Please check your email for activate your account.",
                 type: "success",
                 showCancelButton: false,
                 confirmButtonColor: "green",
                 confirmButtonText: "OK",
                 closeOnConfirm: false,
                 showLoaderOnConfirm: true,
                 },
                 function(){
                     window.location.replace("login");
                     });
                }
             }
        });
    }));
}
/*======================================*/
function activation()
{
    $('#error').html('');
    $('#success').html('');
    $.ajax({
        type: "POST",
        dataType: "json",
        contentType: false,
                cache: false,
            processData:false,
        success:function(data)
        {
            if(data.error)
                $('#error').html(data.error);
            else
                $('#success').html(data.success);
        }
    });
}
/*===========================*/
function re_send_email()
{
    $('#re_send_email').on('submit',function(e){
        e.preventDefault();
        $('#resend_email_error').html('');
        $('#re_send_mail_loader').show().animate({left:'90px'},'slow');
        $('#re_send_email_label').animate({left:'33px'},'solow');
        $.ajax({
            url: "re_send_email",
            type: "POST",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData:false,
            success:function(data)
            {
                console.log(data);
                $('#re_send_mail_loader').hide();
                $('#re_send_email_label').animate({left: '3px'},'solow');
                if(data.error)
                    $('#resend_email_error').html(data.error);
                else
                {
                swal({
                    title: "Confirmation eamail has sent successfully",
                    text: "Please check your email for activate your account.",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonColor: "green",
                    confirmButtonText: "OK",
                    closeOnConfirm: true,
                    showLoaderOnConfirm: true,
                    },
                    function(){
                        $('#error').html('');
                        $('#success').html('');
                        $('.modal').modal('close');
                        });
                }
            }
        });
    });
}