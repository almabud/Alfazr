
/* In profile page Edit profile functionality */
$(document).ready(function() {
    var data;
    preview_cp();
    preview_p();

})

function preview_p() {
    $("#input_profile_photo").on("change", function(){

        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // Check if File is selected, or no FileReader support
        if (/^image/.test( files[0].type)){ //  Allow only image upload
            var ReaderObj = new FileReader(); // Create instance of the FileReader
            ReaderObj.readAsDataURL(files[0]); // read the file uploaded
            ReaderObj.onloadend = function(){ // set uploaded image data as background of div
                $("#preview_profile_photo").css({"content" : "url("+this.result+")"});
            }
        }else{
            alert("Upload an image");
        }
    });
    $(".dropify-clear").click(function () {
        $("#preview_profile_photo").css({"content" : "url('')"});
        $("#preview_profile_photo").css({"content" : "url("+$("#profile_photo_data").text()+")"});
    });

}
function preview_cp() {
    $("#input_cover_photo").on("change", function(){

        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // Check if File is selected, or no FileReader support
        if (/^image/.test( files[0].type)){ //  Allow only image upload
            var ReaderObj = new FileReader(); // Create instance of the FileReader
            ReaderObj.readAsDataURL(files[0]); // read the file uploaded
            ReaderObj.onloadend = function(){ // set uploaded image data as background of div
                $("#preview_cover_photo").css({"content" : "url("+this.result+")"});
            }
        }else{
            alert("Upload an image");
        }
    });
    $(".dropify-clear").click(function () {
        $("#preview_cover_photo").css({"content" : "url('')"});
        $("#preview_cover_photo").css({"content" : "url("+$("#dom-target").text()+")"});
    });

}


