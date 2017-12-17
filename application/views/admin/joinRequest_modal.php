<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/17/2017
 * Time: 12:17 PM
 */
?>
<div id="mymodal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">View Join Requests</h3>
            </div>

            <div class="modal-body">
                <form method="post" id="insert_form">

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name_modal" id="name_modal" placeholder="Name" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-4 col-form-label clearfix">Email</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" name="email_modal" id="email_modal" placeholder="Email" disabled>
                        </div>
                    </div

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label">Contact Number</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Contact no." disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label">Address</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="address" id="address" placeholder="Address" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label">Good at.</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="skill" id="skill" placeholder="Good at" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label">Short discription about your work</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="5" id="works" name="works" maxlength="200" disabled></textarea>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



<script>

</script>