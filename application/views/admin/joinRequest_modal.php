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
            </div>
            <div class="modal-body" id="request_details">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Name</label>
                        <input type="text" class="form-control" name="name_modal" id="name_modal" placeholder="Name" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" name="email_modal" id="email_modal" placeholder="Email" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Contact no.</label>
                        <input type="number" class="form-control" name="phone" id="phone" placeholder="Contact no." disabled>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label for="inputAddress2">Address</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Address" disabled>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputAddress2">Good at</label>
                    <input type="text" class="form-control" name="skill" id="skill" placeholder="Good at" disabled>
                </div>


                    <div class="form-group col-md-12">
                        <label for="comment">Short discription about your works:</label>
                        <textarea class="form-control" rows="5" id="works" name="works" maxlength="200" disabled></textarea>
                    </div>

            </div>
            <div class="modal-footer">


            </div>

        </div>
    </div>

</div>

<script>

</script>