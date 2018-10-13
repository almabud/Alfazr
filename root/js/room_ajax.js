
$(document).ready(function(e){
    show_room_content();
    
});
/*===================================*/
/*show hotel list-----------*/
function show_room_content()
{
     $.ajax({
         url: 'rooms/roomlist',
         type: 'POST',
         async: false,
         success: function(data){
              var html = `
                        <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right gradient-45deg-light-blue-cyan gradient-shadow" id="add_room_btn">
                          <i class="material-icons hide-on-med-and-up">add</i>
                          <span class="hide-on-small-onl">Add New</span>
                        </a>
                        `;
             $('.breadcrumbs-title').html('Room List');
             $('.active2').html('Room List');
             $('.breadcrumbs-btn').html(html);
             $('.midle-content').html(data);
             show_rooms();
             $('#data-table-simple').dataTable({
                ordering:  true
            });
         }
     });
}
/*====================================*/
function show_rooms(){
    $.ajax({
        type  : 'post',
        url   : 'rooms/get_room_data',
        async : false,
        dataType : 'json',
        success : function(data){
            var room_type;
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
                if(data[i].room_type==1)
                    room_type='Single';
                else if(data[i].room_type==2)
                    room_type='Double';
                else if(data[i].room_type==3)
                    room_type='Triple';
                else if(data[i].room_type==4)
                    room_type='Quad';
                html += '<tr>'+
                            '<td>'+data[i].name+'</td>'+
                            '<td>'+room_type+'</td>'+
                            '<td>'+data[i].per_night_price+'</td>'+
                            '<td>'+data[i].offer_agent+'</td>'+
                            '<td>'+data[i].offer_local_cus+'</td>'+
                            '<td>'+data[i].available_rooms+'</td>'+
                            '<td style="text-align:right;">'+
                                '<a class="btn-floating btn-small waves-effect waves-light green item_edit" data-id="'+data[i].id+'"> <i class="material-icons">edit</i></a>'+
                                '<a href="javascript:void(0);" class="btn-floating btn-small waves-effect waves-light red item_delete"  data-id="'+data[i].id+'"><i class="material-icons"> delete</i></a>'+
                            '</td>'+
                        '</tr>';
                       
            }
           $('#show_data').html(html);
           $('.materialboxed').materialbox();
            
        }
    });
    /*=======================================*/
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
                url: "rooms/dlt_room",
                type: "POST",
                dataType : "JSON",
                data:  {id:id},
                success: function(data)
                    {
                        swal("Deleted!", "Hotel has been deleted.", "success");
                        show_rooms();
                    },
                error: function(e) 
                    {
                    console.log(e);
                    }          
                });
            });
    });
    /*===================================*/
    $('#add_room_btn').on('click',function(e){
        e.preventDefault();
        add_room_content();

    });
    $('#show_data').on('click','.item_edit',function(){
        edit_room_content($(this).data());
        });
}
/*================================*/
/*Add hotel content-----------------*/
function add_room_content()
{
    $.ajax({
        url: "rooms/add_room_content",
        type: "POST",
        success: function(data)
            {
                var html = `
                    <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right gradient-45deg-light-blue-cyan gradient-shadow" id="list_room_btn" onclick="show_room_content()" style="margin: 5px !important;">
                        <i class="material-icons hide-on-med-and-up">add</i>
                        <span class="hide-on-small-onl">Room List</span>
                    </a>
                    <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right gradient-45deg-light-blue-cyan gradient-shadow" id="refresh_hotel_btn"  onclick="refresh()" style="margin: 5px !important;">
                        <i class="material-icons hide-on-med-and-up">add</i>
                        <span class="hide-on-small-onl">Clear</span>
                    </a>
                        `;
             $('.breadcrumbs-title').html('Add Room');
             $('.active2').html('Add Room');
             $('.breadcrumbs-btn').html(html);
                $('.midle-content').html(data);
                $('form').attr('id','add_room');
                $('form').attr('action','hotels/rooms/add_room');
                $('#submit_button').html('<input type="submit" id="ar_submit" class="btn waves-effect waves-light col s12" value="Add">');
                $('textarea').froalaEditor({
                    charCounterCount: false,
                    emoticonsUseImage: true,
                    height:300,
                    imageUploadURL: 'froala_image_upload',
                    toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '-', 'insertImage', 'insertVideo', 'insertTable', '|', 'specialCharacters', 'insertHR', 'selectAll', 'clearFormatting', '|', 'html', '|', 'undo', 'redo']
                 });
                 $('select').material_select();
                 add_room();
            },
        error: function(e) 
            {
            console.log(e);
            }          
        });
}
/*=====================*/
/* add hotel buttons--------------*/

function add_room()
{
    /* add hotel------------------------*/
    dlt_froala_img();
   // pekeuploader();
   // image_galary();
     $("#add_room").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
        url: "rooms/add_room",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
            cache: false,
        processData:false,
        success: function(data)
            {
                if(data.error){
                    if(data.error.price_p_night)
                     $('#price_p_night_error').html(data.error.price_p_night).show();
                    else
                     $('#price_p_night_error').html('').hide();
                    if(data.error.offer_agent)
                     $('#offer_agent_error').html(data.error.offer_agent).show();
                    else
                     $('#offer_agent_error').html('').hide();
                    if(data.error.offer_cus)
                     $('#offer_cus_error').html(data.error.offer_cus).show();
                    else
                     $('#offer_cus_error').html('').hide();
                    if(data.error.total_room)
                      $('#total_room_error').html(data.error.total_room).show();
                    else
                     $('#total_room_error').html('').hide();
                }
                else{
                    $('.error').html('').hide();
                    swal("Added!", "Room has been Added.", "success");
                    show_room_content();
                }
              
            },
        error: function(e) 
            {
            console.log(e);
            }          
        });
    }));
/*===========================*/
}
/*=======================*/

/*Edit hotel content-----------------*/
function edit_room_content(edit_data)
 //get data for update record
 {
    $.ajax({
        url: "rooms/edit_room_content",
        type: "POST",
        success: function(data)
            {
                 $.ajax({
                     url:"rooms/get_room_data",
                     type: "POST",
                     data:{id:edit_data.id},
                     dataType: "json",
                     success:function(room_data)
                     {
                        console.log('room_data');
                            var html = `
                        <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right gradient-45deg-light-blue-cyan gradient-shadow" id="list_room_btn" onclick="show_room_content()" style="margin: 5px !important;">
                            <i class="material-icons hide-on-med-and-up">add</i>
                            <span class="hide-on-small-onl">Room List</span>
                        </a>
                            `;
                        $('.breadcrumbs-title').html('Edit Room');
                        $('.active2').html('Edit Room');
                        $('.breadcrumbs-btn').html(html);
                        $('.midle-content').html(data);
                        $('form').attr('id','edit_room');
                        $('form').attr('action','rooms/edit_rooms');
                        $('#submit_button').html('<input type="submit" id="er_submit" class="btn waves-effect waves-light col s12" value="Edit">');
                        $('textarea').froalaEditor({
                            charCounterCount: false,
                            emoticonsUseImage: true,
                            height:500,
                            imageUploadURL: 'froala_image_upload',
                            toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '-', 'insertImage', 'insertVideo', 'insertTable', '|', 'specialCharacters', 'insertHR', 'selectAll', 'clearFormatting', '|', 'html', '|', 'undo', 'redo']
                         });
                         $('select').material_select();
                         var base_url = window.location.origin;
                         var pathArray = window.location.pathname.split( '/' );
                         var image_location=base_url+'/'+pathArray[1]+'/'+pathArray[2]+'/images/hotels_photo/'+edit_data.photo;
                         //console.log(photo);
                         //http://localhost/alfazr/root/images/hotels_photo/3d55dfe551f191549979f61c681ebf71.png
                          //console.log(image_location);
                         $('[name="select_hotel"]').val(room_data.hotel_id);
                         $('[name="select_room_type"]').val(room_data.room_type);
                         $('[name="price_p_night"]').val(room_data.per_night_price);
                         $('[name="offer_agent"]').val(room_data.offer_agent);
                         $('[name="offer_cus"]').val(room_data.offer_local_cus);
                         $('[name="total_room"]').val(room_data.available_rooms);
                         $('[name="about"]').froalaEditor('html.set', room_data.about);
                         $('[name="id"]').val(room_data.id);
                         $('[name="select_hotel"]').material_select();
                         $('[name="select_room_type"]').material_select();
                         Materialize.updateTextFields();
                         edit_room();
                         $('#refresh_hotel_btn').hide();
                    }
                 });
                 
            },
        error: function(e) 
            {
            console.log(e);
            }          
        });
 }
//Edit hotel-------------
function edit_room()
{
    dlt_froala_img();
    $("#edit_room").on('submit',(function(e) {
    e.preventDefault();
        $.ajax({
            url: "rooms/edit_room",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
                cache: false,
            processData:false,
           
            data: new FormData(this),
            success:function(data)
            {
                if(data.error){
                    if(data.error.price_p_night)
                     $('#price_p_night_error').html(data.error.price_p_night).show();
                    else
                     $('#price_p_night_error').html('').hide();
                    if(data.error.offer_agent)
                     $('#offer_agent_error').html(data.error.offer_agent).show();
                    else
                     $('#offer_agent_error').html('').hide();
                    if(data.error.offer_cus)
                     $('#offer_cus_error').html(data.error.offer_cus).show();
                    else
                     $('#offer_cus_error').html('').hide();
                    if(data.error.total_room)
                      $('#total_room_error').html(data.error.total_room).show();
                    else
                     $('#total_room_error').html('').hide();
                }
                else{
                    $('.error').html('').hide();
                    swal("Updated!", "Room has been updated.", "success");
                    show_room_content();
                }
            }
        });
    }));
}
/*==========================================*/

function dlt_froala_img()
{
    // Delete Froala image---------------
 $('textarea').on('froalaEditor.image.removed', function (e, editor, $img) {
    $.ajax({
      // Request method.
      method: 'POST',
      // Request URL.
      url: 'froala_image_dlt',
      // Request params.
      data: {
        src: $img.attr('src')
      }
    })
    .done (function (data) {
      console.log ('Image was deleted');
    })
    .fail (function (err) {
      console.log ('Image delete problem: ' + JSON.stringify(err));
    })
  });
}

/*==========================================*/
function refresh()
{
    $("#add_room")[0].reset(); 
    $('textarea').froalaEditor('destroy');
    $('textarea').froalaEditor({
        charCounterCount: false,
        emoticonsUseImage: true,
        height:300,
        imageUploadURL: 'froala_image_upload',
        toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '-', 'insertImage', 'insertVideo', 'insertTable', '|', 'specialCharacters', 'insertHR', 'selectAll', 'clearFormatting', '|', 'html', '|', 'undo', 'redo']
     });

}
