
    <div class="row margin hr_content_header">
        <div class="col s12 header">
        <h4> Add <span style="font-size:18px">New Hotel</span></h4>
        </div>
        <div class="right"> <a class="waves-effect waves-light btn" id="list_hotel_btn" onclick="show_hotel_content()" style="margin: 5px !important;">List hotels</a></div>
        <div class="right"> <a class="waves-effect waves-light btn" id="refresh_hotel_btn"  onclick="refresh()" style="margin: 5px !important;">Refresh</a></div>
    </div>
    <form  method="post" enctype="multipart/form-data">
    <input type="text" name="id" style="display:none;">
        <div class="row margin">
            <p class="col s12 center-align red-text text-accent-4"><?php print_r($this->session->flashdata('error')); ?></p>
            <div class="input-field col s12">
            <input id="name" type="text" name="name" required="1">
            <label for="name" class="center-align">Hotel Name</label>
        </div>
        <div class="row margin">
            <div class="input-field col s12">
            <input id="address" type="text" name="address">
            <label for="address">Address</label>
            </div>
        </div>
        <div class="row margin">
            <div class="col s12">
                <textarea id="about" name="about"></textarea>
            </div>
        </div>
        <div class="row margin">
            <div id="file-upload" class="section">
                <div class="row section">
                    <div class="col s12">
                        <input type="file" multiple="multiple" name="files[]" id="photo" />
                    </div>
                </div>
            </div>
        </div>
       <div id="hh"></div>
        <div class="row">
            <div class="input-field col m3 s4 right" id="submit_button">
            </div>
        </div>
    </form>
