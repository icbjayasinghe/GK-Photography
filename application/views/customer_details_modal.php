
<!-- model to display customer details -->
<div id="customer_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">Customer Details <small>(<span id="cust_id"></span>)</small></h3>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">First Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="first_name" id="first_name" disabled="disabled" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Last Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="last_name" id="last_name" disabled="disabled" maxlength="50" required="">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-4 col-form-label">Phone</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text"  id="cust_phone" name="cust_phone" disabled="disabled" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-4 col-form-label">Address</label>
                        <div class="col-md-8">
                            <textarea class="form-control" type=""  id="cust_address" name="cust_address" disabled="disabled" maxlength="50" required=""></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-4 col-form-label">Email/Username</label>
                        <div class="col-md-8">
                            <input class="form-control" type="cust_email"  id="cust_email" name="add_emp_email" disabled="disabled" maxlength="50" required="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

