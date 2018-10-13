$(document).ready(function(e){
    show_reservation_content();
    
});
/*===============================*/
function show_reservation_content()
{
     $.ajax({
         url: 'admin/show_reservation_content',
         type: 'GET',
         async: false,
         success: function(data){
         	console.log(data);
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
             //show_hotels();
             $('#data-table-simple').dataTable({
                ordering:  true
            });
         }
     });
}
/*====================================*/
