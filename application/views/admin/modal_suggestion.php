<!-- model change -->
<div id="modal_suggestion" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">View Suggestion</h3>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="change_first_name" id="name" disabled="disabled" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Email</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="change_last_name" id="email" disabled="disabled" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-4 col-form-label clearfix">Description</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="change_type" id="idea" maxlength="50" disabled="disabled" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-md-4 col-form-label">Date</label>
                        <div class="col-md-8">
                            <input class="form-control" type="email"  id="date" name="change_email" disabled="disabled" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label clearfix"></label>
                        <div class="col-md-8">
                            <p id="message" style="padding-top:5px;margin-bottom: 0px; font-weight: bold; font-size: 110%"></p>
                        </div>
                    </div>

                    <div class="col-md-offset-10">
                        <input type="hidden" name="modal_suggestion_id" id="modal_suggestion_id" />
                        <input type="button" onclick="deleteSuggestionDetails()" name="add" id="add" value="Delete" class="btn btn-danger my-lg-button" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>