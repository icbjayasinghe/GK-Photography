
<!-- model to display customer details -->
<div id="edit_profile_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">Profile<small><!-- (<span id="edit_cust_id"></span>) --></small></h3>
            </div>
            <div class="modal-body">
                <!--for checking validation errors-->
                    <?php echo validation_errors(); ?>

                <!--    use CI form helper for putting customer registration data to db -->
                    <form>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">ID</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="cust_id" id="edit_cust_id" maxlength="50" required="" disabled="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">First Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="first_name" id="edit_first_name" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Last Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="last_name" id="edit_last_name" maxlength="50" required="">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-4 col-form-label">Phone</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text"  id="edit_cust_phone" name="cust_phone" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-4 col-form-label">Address</label>
                        <div class="col-md-8">
                            <textarea class="form-control" type=""  id="edit_cust_address" name="cust_address"  maxlength="50" required=""></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-4 col-form-label">Email/Username</label>
                        <div class="col-md-8">
                            <input class="form-control" type="cust_email"  id="edit_cust_email" name="cust_email"  maxlength="50" required="">
                        </div>  
                    </div>

                    <div class="col-md-offset-10">
                        <!-- <input type="hidden" name="cust_id" id="cust_id" /> -->
                        <input type="button" onclick="" name="update" id="update" value="Update" class="btn btn-success my-lg-button" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

