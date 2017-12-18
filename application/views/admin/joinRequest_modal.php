<!-- model change -->
<div id="mymodal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">View Join Request</h3>
            </div>

            <div class="modal-body">
                <form method="post" id="insert_form">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="name_modal" id="name_modal" disabled="disabled" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Email</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="email_modal" id="email_modal" disabled="disabled" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Contact Number</label>
                        <div class="col-md-8">
                            <input class="form-control" type="number" name="phone" id="phone" maxlength="50" disabled="disabled" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-4 col-form-label">Address</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text"  id="address" name="address" disabled="disabled" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label">Good at.</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="skill" id="skill" maxlength="50" required="" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label">Short discription about your work</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="works" id="works" maxlength="50" required="" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label clearfix"></label>
                        <div class="col-md-8">
                            <p id="message" style="padding-top:5px;margin-bottom: 0px; font-weight: bold; font-size: 110%"></p>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>