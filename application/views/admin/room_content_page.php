<form  method="post" enctype="multipart/form-data">
    <input type="text" name="id" style="display:none;">
       <div class="row margin">
            <div class="input-field col s12">
                <select name='select_hotel' id="select_hotel" required="1">
                    <option value="" disabled selected>Select Hotel</option>
                    <?php foreach($hotel_information as $value)
                        {
                            echo '<option value='.$value->id.'>'.$value->name.'</option>';
                        }
                    ?>
                </select>
             <label>Hotel</label>
            </div>
        </div>
        <div class="row margin">
            <div class="input-field col s12">
                <select name='select_room_type' required="1">
                    <option value="" disabled selected>Select room type</option>
                    <option value="1">Single</option>
                    <option value="2">Double</option>
                    <option value="3">Triple</option>
                    <option value="4">Quad</option>
                </select>
             <label>Room type</label>
            </div>
        </div>
        <div class="row margin">
            <div id="card-alert" class="card red lighten-5">
                <div class="card-content red-text error" id="price_p_night_error" style="display:none;"></div>
            </div>
            <div class="input-field col s12">
                <input id="price_p_night" type="text" name="price_p_night" required="1">
                <label for="price_p_night">Price per night</label>
            </div>
        </div>
        <div class="row margin">
            <div id="card-alert" class="card red lighten-5">
                <div class="card-content red-text error" id="offer_agent_error" style="display:none;"></div>
            </div>
            <div class="input-field col s12">
                <input id="offer_agent" type="text" name="offer_agent">
                <label for="offer_agent">Offer for Agent</label>
            </div>
        </div>
        <div class="row margin">
            <div id="card-alert" class="card red lighten-5">
                <div class="card-content red-text error" id="offer_cus_error" style="display:none;"></div>
            </div>
            <div class="input-field col s12">
                <input id="offer_cus" type="text" name="offer_cus">
                <label for="offer_cus">Offer for Customer</label>
            </div>
        </div>
        <div class="row margin">
            <div id="card-alert" class="card red lighten-5">
                <div class="card-content red-text error" id="total_room_error" style="display:none;"></div>
            </div>
            <div class="input-field col s12">
                <input id="total_room" type="text" name="total_room" required="1">
                <label for="total_room">Available Rooms</label>
            </div>
        </div>
        <div class="row margin">
            <div class="col s12">
                <label>About</label>
                <textarea id="about" name="about"></textarea>
            </div>
        </div>
       <div></div>
        <div class="row">
            <div class="input-field col m3 s4 right" id="submit_button">
            </div>
        </div>
    </form>
