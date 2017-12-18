
    <div class="container col-md-6 my-signup">
        <h2><b>Join Us</b></h2>
        <?php if($this->session->flashdata('msg')){
            echo("<h3>".$this->session->flashdata('msg')."</h3>");
        } ?>
        <hr>

        <!--for checking validation errors-->
        <?php echo validation_errors(); ?>
        <?php echo form_open_multipart('Joinus/Joinususer'); ?>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputEmail4">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputEmail4">Contact no.</label>
                <input type="number" class="form-control" name="phone" id="phone" placeholder="Contact no.">
            </div>
        </div>

        <div class="form-group col-md-12">
            <label for="inputAddress2">Address</label>
            <input type="text" class="form-control" name="address" id="inputAddress2" placeholder="Address">
        </div>

        <div class="form-group col-md-12">
                <label for="inputEmail4">Good at</label>
                <div class="checkbox">

                    <label><input type="checkbox" value="Photographing" name="good_at">Photographing</label>

                    <label><input type="checkbox" value="Videographing" name="good_at">Videographing</label>

                    <label><input type="checkbox" value="Photo_editing" name="good_at">Photo editing</label>

                    <label><input type="checkbox" value="Video_editing" name="good_at" >Video editing</label>

                    <label><input type="checkbox" value="Other" name="good_at">Other</label>

                </div>
        </div>

        <div class="form-group col-md-12">
            <label for="comment">Short discription about your work:</label>
            <textarea class="form-control" rows="5" id="works" name="works" maxlength="200"></textarea>
        </div>



        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-primary btn-lg col-md-12 my-upload-button" name="submit">Submit</button>
        </div>

        </div>


    <?php echo form_close(); ?>
    </div>

