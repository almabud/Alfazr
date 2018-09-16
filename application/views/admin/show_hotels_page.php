<!--DataTables example-->
<div id="table-datatables">
    <div class="row margin hr_content_header">
        <div class="col s12">
            <h1>Hotel
                <span style="font-size:40px">List</span>
                <div class="right"> <a class="waves-effect waves-light btn modal-trigger" id="add_hotel_btn">Add New</a></div>
            </h1>
        </div>
    </div>
    <div class="row margin">
        <div class="col s12">
            <table id="data-table-simple" class="bordered striped highlight responsive-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <!-- <th>Photo</th> -->
                        <th width="100"><span class="right"> Action</span></th>
                    </tr>
                </thead>
                <tbody id="show_data"></tbody>
            </table>
        </div>
    </div>
</div>