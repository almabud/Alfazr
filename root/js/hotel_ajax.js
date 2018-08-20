var eh_dropify;
$(document).ready(function(e){
  //  e.preventDefault();
    $('.modal').modal();
    $('#add_hotel_btn').click(function(){
        $("#add_hotel")[0].reset(); 
    });
   show_hotels(); //call function show all product
     
    $('#data-table-simple').dataTable({
        ordering:  false,
        //select: true
    });


    //function show all product
    function show_hotels(){
        $.ajax({
            type  : 'post',
            url   : 'hotels/get_hotel_data',
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    var photo = data[i].hotel_photo;
                    var image_location='';
                    if(photo != null)
                    {
                        var base_url = window.location.origin;
                        var pathArray = window.location.pathname.split( '/' );
                        image_location=base_url+'/'+pathArray[1]+'/'+pathArray[2]+'/images/hotels_photo/'+photo;
                       
                    }
                    else
                    image_location='';
                   // console.log(image_location);
                    html += '<tr>'+
                            '<td>'+data[i].name+'</td>'+
                            '<td>'+data[i].Address+'</td>'+
                            '<td>'+data[i].about+'</td>'+
                            '<td><img class="materialboxed" width="100" height="90" src="'+image_location+'" alt=""></td>'+
                            '<td style="text-align:right;">'+
                        
                                '<a class="btn-floating btn-small waves-effect waves-light green item_edit" data-id="'+data[i].id+'" data-name="'+data[i].name+'" data-address="'+data[i].Address+'" data-about="'+data[i].about+'" data-photo="'+data[i].hotel_photo+'"> <i class="material-icons">edit</i></a>'+' '+
                                '<a href="javascript:void(0);" class="btn-floating btn-small waves-effect waves-light red item_delete"  data-id="'+data[i].id+'"><i class="material-icons"> delete</i></a>'+
                            '</td>'+
                            '</tr>';
                           
                }
                $('#show_data').html(html);
                $('.materialboxed').materialbox();
            }

        });
   }
   
   // add hotel
    $("#add_hotel").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
        url: "hotels/add_hotel",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
            cache: false,
        processData:false,
        beforeSend : function()
        {
        //$("#preview").fadeOut();
        $("#err").fadeOut();
        },
        success: function(data)
            {
                    //  console.log(data);
                    $("#preview").html(data).fadeIn();
                    $("#add_hotel")[0].reset(); 
                    $('.dropify-clear').click();
                    $('#add_modal').modal('close');
                    show_hotels();
            },
        error: function(e) 
            {
            console.log(e);
            }          
        });
    }));

    //get data for update record
    $('#show_data').on('click','.item_edit',function(){
        $('.dropify-clear').click();
        var id = $(this).data('id');
        var name = $(this).data('name');
        var address = $(this).data('address');
        var about   = $(this).data('about');
        var photo = $(this).data('photo');
        var base_url = window.location.origin;
        var pathArray = window.location.pathname.split( '/' );
        var image_location=base_url+'/'+pathArray[1]+'/'+pathArray[2]+'/images/hotels_photo/'+photo;
        //console.log(photo);
        //http://localhost/alfazr/root/images/hotels_photo/3d55dfe551f191549979f61c681ebf71.png
         //console.log(image_location);
        $('[name="name"]').val(name);
        $('[name="address"]').val(address);
        $('[name="about"]').val(about);
        $('[name="id"]').val(id);
        $('#edit_modal').modal('open');
        Materialize.updateTextFields();
        $('.eh_dropify').dropify();
       
    });
    //Edit hotel-------------
    $("#edit_hotel").on('submit',(function(e) {
    e.preventDefault();
        $.ajax({
        url: "hotels/edit_hotel",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
            cache: false,
        processData:false,
        beforeSend : function()
        {
        //$("#preview").fadeOut();
        //$("#err").fadeOut();
        },
        success: function(data)
            {
                    //  console.log(data);
                // $("#preview").html(data).fadeIn();
                    $("#edit_hotel")[0].reset(); 
                    //$('.dropify-clear').click();
                    $('#edit_modal').modal('close');
                    show_hotels();
            },
        error: function(e) 
            {
            console.log(e);
            }          
        });
    }));

  // dlt hotel---------------
  $('#show_data').on('click','.item_delete',function(){
    var id = $(this).data('id');
    swal({    title: "Are you sure?",
    text: "You will not be able to recover this Hotel data!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, delete it!",
    closeOnConfirm: false,
    showLoaderOnConfirm: true,},
    function(){
        $.ajax({
            url: "hotels/dlt_hotel",
            type: "POST",
            dataType : "JSON",
            data:  {id:id},
            success: function(data)
                {
                    swal("Deleted!", "Hotel has been deleted.", "success");
                     show_hotels();
                },
            error: function(e) 
                {
                console.log(e);
                }          
            });
          });
  });

});