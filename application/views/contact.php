
    <div class="canvas contact-page">
      <div class="contact-bg col-md-8 col-sm-12">
        <img src="<?php echo base_url();?>img/dolon.jpg" alt="" width="100%">
      </div> 
      
      <div class="col-md-4 col-sm-12 contact-bar">
        <!-- <img class="map-img" src="<?php echo base_url();?>img/map.jpg" alt="" width="100%"> -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d311154.5153053772!2d79.90046362381837!3d9.610487470657748!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa095b60c06d7d684!2skokuvil!5e0!3m2!1sen!2slk!4v1509005595500" width="626" height="249" frameborder="0" style="border:0" allowfullscreen></iframe>
        <h3 class="interest-text text-center"> Thanks for your Interest </h3>
        
        <div class="col-md-6 add-text">
        Contact languages :<br>* English<br> * Tamil<br> * Sinhala

        </div>
        <div class="col-md-6 add-text">
        98-1, Potpathy Road, Kokuvil East, Kokuvil,
        Jaffna, Sri Lanka.
        (0)771180383
        </div>
        <br>
        <?php if ($this->session->flashdata('msg')){
            echo "<h3>".$this->session->flashdata('msg')."</h3>";
        }

        ?>

        <!--    session for enter wrong pw or username-->
        <?php if ($this->session->flashdata('errmsg')){
            echo "<h3>".$this->session->flashdata('errmsg')."</h3>" ;
        }
        ?>

        <!--for checking validation errors-->
        <?php echo validation_errors(); ?>

        <!--    use CI form helper for gettting customer data from db -->
        <?php echo form_open('Ctrl_suggestion/ctrl_suggestions'); ?>
                <div class="controls controls-row">
                   <div class="">
                    <input id="name" name="name" type="text" class="form-control" placeholder="Name"> 
                    </div>
                     <div class="">
                      <input id="email" name="email" type="email" class="col-md-6 form-control" placeholder="Email address">
                    </div>
                </div>
                <div class="controls">
                    <textarea id="message" name="message" class="col-md-12" placeholder="Your Message" rows="5"></textarea>
                </div>
                  
                <div class="controls btn-full">
                    <button id="contact-submit" name="submit" value="Submit" type="submit" class="btn btn-primary">Send</button>
                </div>
            <!-- </form> -->
        <!-- </div> -->
        <?php echo form_close(); ?>
      </div>
    </div>
