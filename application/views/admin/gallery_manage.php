
<h2>Manage Gallery</h2>

<div class="tab-content">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#daily_appointments" role="tab" aria-controls="daily_appointments">Upload Photo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#daily_purchases" role="tab" aria-controls="add-admin">Edit Gallery</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade active" id="daily_appointments" role="tabpanel">
            <div class="row">
                <div class="main col-md-10">
                    <form action="../controller/daily-collection-appointments.php" target="_blank" method="post" class="userform" id="daily_appointments_form">
                        <div class="form-group row top-buffer-hard">
                            <div class="col-md-4">
                                <label><h4>Select the Date</h4></p></label>
                            </div>
                            <div class="col-md-4">
                                <input  class="form-control" type="date"  id="rdate" name="rdate"
                                        value="<?php echo date("Y-m-d");?>">
                            </div>
                        </div>
                        <div class="col-md-3 top-buffer-hard">
                            <input name="submit" type="submit" value="Print" class="btn btn-primary col-md-2 my-button-action my-lg-button"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
