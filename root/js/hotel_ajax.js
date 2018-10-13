
$(document).ready(function(e){
    show_hotel_content();
    
});
/*===================================*/
/*show hotel list-----------*/
function show_hotel_content()
{
     $.ajax({
         url: 'hotels/show_hotel_content',
         type: 'POST',
         async: false,
         success: function(data){
            var html = `
                        <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right gradient-45deg-light-blue-cyan gradient-shadow" id="add_hotel_btn">
                          <i class="material-icons hide-on-med-and-up">add</i>
                          <span class="hide-on-small-onl">Add hotel</span>
                        </a>
                        `;
             $('.breadcrumbs-title').html('Add Hotel');
             $('.active2').html('Hotel List');
             $('.breadcrumbs-btn').html(html);
             $('#midle-content').html(data);
             show_hotels();
             $('#data-table-simple').dataTable({
                ordering:  true
            });
         }
     });
}
/*====================================*/
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
               // var photo = data[i].hotel_photo;
               // var image_location='';
                // if(photo != null)
                // {
                //     var base_url = window.location.origin;
                //     var pathArray = window.location.pathname.split( '/' );
                //     image_location=base_url+'/'+pathArray[1]+'/'+pathArray[2]+'/images/hotels_photo/'+photo;
                   
                // }
                // else
                // image_location='';
               // console.log(image_location);
                html += '<tr>'+
                        '<td>'+data[i].name+'</td>'+
                        '<td>'+data[i].Address+'</td>'+
                        // '<td><img class="materialboxed" width="100" height="90" src="'+image_location+'" alt=""></td>'+
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
    /*===================================*/
    $('#add_hotel_btn').on('click',function(e){
        e.preventDefault();
        add_hotel_content();

    });
    $('#show_data').on('click','.item_edit',function(){
        edit_hotel_content($(this).data());
        });
}
/*================================*/
/*Add hotel content-----------------*/
function add_hotel_content()
{
    $.ajax({
        url: "hotels/add_hotel_content",
        type: "POST",
        success: function(data)
            {
                 var html = `
                        <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right gradient-45deg-light-blue-cyan gradient-shadow" id="list_hotel_btn" onclick="show_hotel_content()" style="margin: 5px !important;">
                            <i class="material-icons hide-on-med-and-up">add</i>
                            <span class="hide-on-small-onl">List hotel</span>
                        </a>
                        <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right gradient-45deg-light-blue-cyan gradient-shadow" id="refresh_hotel_btn"  onclick="refresh()" style="margin: 5px !important;">
                            <i class="material-icons hide-on-med-and-up">add</i>
                            <span class="hide-on-small-onl">Clear</span>
                        </a>
                        `;
             $('.breadcrumbs-title').html('Add Hotel');
             $('.active2').html('Add Hotel');
             $('.breadcrumbs-btn').html(html);
                $('#midle-content').html(data);
                $('form').attr('id','add_hotel');
                $('form').attr('action','hotels/add_hotel');
                $('#submit_button').html('<input type="submit" id="ah_submit" class="btn waves-effect waves-light col s12" value="Add">');
                $('textarea').froalaEditor({
                    charCounterCount: false,
                    emoticonsUseImage: true,
                    height:300,
                    imageUploadURL: 'hotels/froala_image_upload',
                    toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '-', 'insertImage', 'insertVideo', 'insertTable', '|', 'specialCharacters', 'insertHR', 'selectAll', 'clearFormatting', '|', 'html', '|', 'undo', 'redo']
                 });
                 add_hotel();
            },
        error: function(e) 
            {
            console.log(e);
            }          
        });
}
/*=====================*/
/* add hotel buttons--------------*/

function add_hotel()
{
    /* add hotel------------------------*/
    dlt_froala_img();
    pekeuploader();
    image_galary();
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
                swal("Added!", "Hotel has been Added.", "success");
                show_hotel_content();
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
function edit_hotel_content(edit_data)
 //get data for update record
 {
    $.ajax({
        url: "hotels/add_hotel_content",
        type: "POST",
        success: function(data)
            {
                 $.ajax({
                     url:"hotels/get_hotel_data",
                     type: "POST",
                     data:{id:edit_data.id},
                     dataType: "json",
                     success:function(hotel_data)
                     {
                        var html = `
                        <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right gradient-45deg-light-blue-cyan gradient-shadow" id="list_hotel_btn" onclick="show_hotel_content()" style="margin: 5px !important;">
                            <i class="material-icons hide-on-med-and-up">add</i>
                            <span class="hide-on-small-onl">List hotel</span>
                        </a>
                       <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right gradient-45deg-light-blue-cyan gradient-shadow" id="refresh_hotel_btn"  onclick="refresh()" style="margin: 5px !important;">
                            <i class="material-icons hide-on-med-and-up">add</i>
                            <span class="hide-on-small-onl">Clear</span>
                        </a>
                        `;
                        $('.breadcrumbs-title').html('Edit Hotel');
                        $('.active2').html('Edit Hotel');
                        $('.breadcrumbs-btn').html(html);
                        $('#midle-content').html(data);
                        
                        $('form').attr('id','edit_hotel');
                        $('form').attr('action','hotels/edit_hotel');
                        $('#submit_button').html('<input type="submit" id="eh_submit" class="btn waves-effect waves-light col s12" value="Edit">');
                        $('textarea').froalaEditor({
                            charCounterCount: false,
                            emoticonsUseImage: true,
                            height:500,
                            imageUploadURL: 'hotels/froala_image_upload',
                            toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '-', 'insertImage', 'insertVideo', 'insertTable', '|', 'specialCharacters', 'insertHR', 'selectAll', 'clearFormatting', '|', 'html', '|', 'undo', 'redo']
                         });
                         var base_url = window.location.origin;
                         var pathArray = window.location.pathname.split( '/' );
                         var image_location=base_url+'/'+pathArray[1]+'/'+pathArray[2]+'/images/hotels_photo/'+edit_data.photo;
                         //console.log(photo);
                         //http://localhost/alfazr/root/images/hotels_photo/3d55dfe551f191549979f61c681ebf71.png
                          //console.log(image_location);
                         $('[name="name"]').val(hotel_data.name);
                         $('[name="address"]').val(hotel_data.Address);
                         $('[name="id"]').val(hotel_data.id);
                         $('[name="about"]').froalaEditor('html.set', hotel_data.about);
                         Materialize.updateTextFields();
                         edit_hotel(edit_data.id);
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
function edit_hotel(h_id)
{
    dlt_froala_img();
    pekeuploader();
    image_galary();
    init_photo_for_edit(h_id);
    var i = 0;
    var dlt_photo=[];
    $(".grid").on('click','.remove_old_photo', function(e){
        dlt_photo.push($(this).data());
    });
   
    $("#edit_hotel").on('submit',(function(e) {
        var form_data=new FormData(this);
        dlt_photo=JSON.stringify(dlt_photo);
        form_data.append('dlt_photo',dlt_photo);
    e.preventDefault();
        $.ajax({
        url: "hotels/edit_hotel",
        type: "POST",
        data:form_data,
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
                //if(data=="su")
                //console.log(data);
                swal("Updated!", "Hotel has been updated.", "success");
                show_hotel_content();
            },
        error: function(e) 
            {
            console.log(e);
            }          
        });
    }));
}

function init_photo_for_edit(h_id)
{
    $.ajax({
        url: "hotels/get_hotel_photo",
        type: "POST",
        dataType: "json",
        data: {id:h_id},
        success: function(data)
            {
                var base_url = window.location.origin;
                var pathArray = window.location.pathname.split( '/' );                
               for(i=0;i<data.length;i++)
               {
                var image_location=base_url+'/'+pathArray[1]+'/'+pathArray[2]+'/images/hotels_photo/'+data[i].room_photo;
                    var newRow = $('<div class="pekerow pkrw grid-item"></div>').appendTo('.grid');
                    $('<img  height="200" width="200" src="'+image_location+'"/>').appendTo(newRow);
                    var dismiss = $('<div class="remove_old_photo pkdelfile" data-id="'+data[i].id+'" data-photo_name="'+data[i].room_photo+'"></div>').prependTo(newRow);
                    $('<a href="javascript:void(0);" class="delbutton pkdel btn-floating waves-effect waves-light red right"><i class="material-icons">clear</i></a>').appendTo(dismiss);
                    
               }
            },
            error: function(e) 
            {
              console.log(e);
            }    
        });
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
      url: 'hotels/froala_image_dlt',
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
/*peke uploader-------------------*/
function pekeuploader()
{
    $("#photo").pekeUpload({
    dragMode: true,
    dragText: 'Drag and Drop your files</br><i class="large material-icons">backup</i>',
    showPreview:	true,
    showFilename: false,
    url:	"hotels/add_hotel",
    showPercent:	true,
    onSubmit: true,
    onFileSuccess:	function(file,data){
        console.log(data);
    },
    onFileError:	function(file,error){
        console.log("error "+error);
    }
  });
}
/*==========================================*/
function image_galary()
{
    var $grid= $('.grid').masonry({
        itemSelector: '.grid-item',
        columnWidth: 205
      });
    $grid.imagesLoaded().progress( function() {
      $grid.masonry('layout');
    });
}
function refresh()
{
    $("#add_hotel")[0].reset(); 
    $('textarea').froalaEditor('destroy');
    $('textarea').froalaEditor({
        charCounterCount: false,
        emoticonsUseImage: true,
        height:300,
        imageUploadURL: 'hotels/froala_image_upload',
        toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '-', 'insertImage', 'insertVideo', 'insertTable', '|', 'specialCharacters', 'insertHR', 'selectAll', 'clearFormatting', '|', 'html', '|', 'undo', 'redo']
     });

}
