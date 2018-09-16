<!--DataTables example-->

<div id="table-datatables">
    <div class="row margin hr_content_header">
        <div class="col s12">
            <h1>Room
                <span style="font-size:40px">List</span>
                <div class="right"> <a class="waves-effect waves-light btn modal-trigger" id="add_room_btn">Add New</a></div>
            </h1>
        </div>
    </div>
    <div class="row margin">
        <div class="col s12">
            <table id="data-table-simple" class="bordered striped highlight responsive-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Room type</th>
                        <th>Per night price</th>
                        <th>Offer_Agent</th>
                        <th>Offer_Customer</th>
                        <th>Available rooms</th>
                        <!-- <th>Photo</th> -->
                        <th width="100"><span class="right"> Action</span></th>
                    </tr>
                </thead>
                <tbody id="show_data"></tbody>
            </table>
        </div>
    </div>
</div>