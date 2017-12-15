
<h2>Manage Gallery</h2>

<div class="tab-content">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#upload_image" role="tab" aria-controls="upload_image">Upload Photo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#edit_gallery" role="tab" aria-controls="edit_gallery">Edit Gallery</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade" id="upload_image" role="tabpanel">
            <div class="row">
                <div class="main col-md-4">
                    <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                        <div id="image_preview">
                            <img id="previewing" src="noimage.png" />
                        </div>
                        <div id="selectImage">
                            <label>Select Your Image</label><br/>
                            <input type="file" name="file" id="file" required />
                            <input type="submit" value="Upload" class="btn btn-primary btn-lg btn-block my-upload-button" />
                        </div>
                    </form>
                </div>
                <h4 id='loading' class="col-md-4" >loading..</h4>
                <div id="message" class="col-md-4"></div>
            </div>
        </div>

        <div class="tab-pane fade active" id="edit_gallery" role="tabpanel">
            <div class="row">
                <h4 class="top-buffer">High Priority - Gallery Page</h4>
                <hr>

                <?php
                $image_list ="";
                $count = 0;
                foreach ($images as $row) {
                    if ($count==6){
                        break;
                    }
                    $image_list.="<div class=\"col-sm-12 col-md-4\">
                                        <a class=\"lightbox\" href=\"#\" onclick='loadEditImageModal(this.id)' id='$row->path'>
                                            <img class=\"img-responsive img-portfolio img-hover top-buffer\" src=\"".base_url()."img/uploads/".$row->path."\" alt=\"Bridge\">
                                        </a>
                                   </div>";
                    $count+=1;
                }
                echo $image_list;
                ?>
            </div>

            <div class="row">
                <h4 class="top-buffer">Other - My Work Page</h4>
                <hr>

                <?php
                $image_list ="";
                $count = 0;
                foreach ($images as $row) {
                    if ($count>=6){
                        $image_list.="<div class=\"col-sm-12 col-md-4\">
                                        <a class=\"lightbox\" href=\"#\" onclick='loadEditImageModal(this.id)' id='$row->path'>
                                            <img class=\"img-responsive img-portfolio img-hover\" src=\"".base_url()."img/uploads/".$row->path."\" alt=\"Bridge\">
                                        </a>
                                   </div>";
                    }
                    $count+=1;
                }
                echo $image_list;
                ?>
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
    
    // upload image on form submit
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

    // load a modal to delete or edit images
    function loadEditImageModal(imageId) {
        $('#edit_image_Modal').modal('show');
        $('#image_id').val(imageId);
    }

    // function to delete an image from gallery
    function deleteImage(){
        var imageId = document.getElementById('image_id').value;
        $('#edit_image_Modal').modal('hide');
        $.ajax({
            url:'<?php echo site_url('gallery/removeImage'); ?>',
            type: "POST", //request type
            data: {image_id : imageId},
            cache: false,
            success:function(result){
                $('#msg_Modal').modal('show');
                $('#msg_result').html(result);
                $('#myTab').tabs({ active: 2 });
            }
        });
    }

    $(document).ready(function(){
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
    });

    $('#msg_Modal').on('hidden.bs.modal', function () {
        $('#content').load("<?php echo base_url();?>index.php/administrator/manageGallery");
    });
</script>