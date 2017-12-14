
<h2>Manage Gallery</h2>

<div class="tab-content">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#upload_image" role="tab" aria-controls="upload_image">Upload Photo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#daily_purchases" role="tab" aria-controls="add-admin">Edit Gallery</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade active" id="upload_image" role="tabpanel">
            <div class="row">
                <div class="main col-md-4">
                    <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                        <div id="image_preview">
                            <img id="previewing" src="noimage.png" />
                        </div>
                        <div id="selectImage">
                            <label>Select Your Image</label><br/>
                            <input type="file" name="file" id="file" required />
                            <input type="submit" value="Upload" class="btn btn-primary btn-lg btn-block my-lg-button" />
                        </div>
                    </form>
                </div>
                <h4 id='loading' class="col-md-4" >loading..</h4>
                <div id="message" class="col-md-4"></div>
            </div>
        </div>
    </div>
</div>



<script>

    // Function to preview image after validation
    $(function() {
        $("#file").change(function() {
            $("#message").empty(); // To remove the previous error message
            var file = this.files[0];
            var imagefile = file.type;
            var match= ["image/jpeg","image/png","image/jpg"];
            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
            {
                $('#previewing').attr('src','noimage.png');
                $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<strong>Note - </strong>"+"<span id='error_message'>Only jpeg, jpg and png Images types are allowed</span>");
                return false;
            }
            else
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });


    function imageIsLoaded(e) {
        $("#file").css("color","green");
        $('#image_preview').css("display", "block");
        $('#previewing').attr('src', e.target.result);
        $('#previewing').attr('width', '350px');
        $('#previewing').attr('height', '263px');
    };

    $('#uploadimage').on('submit',(function(e){
        e.preventDefault();
        $("#message").empty();
        $('#loading').show();
        $.ajax({
            url: '<?php echo site_url('gallery/uploadImage'); ?>', // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                $('#loading').hide();
                $("#message").html(data);
            }
        });
    }));

    // function to activate the first tab
    $(function () {
        $('#myTab a:first').tab('show');
    });


</script>