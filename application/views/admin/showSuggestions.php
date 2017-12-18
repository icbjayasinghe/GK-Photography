<h2>Suggestions<span> <small>
            <input id="date_picker" type="date" name="appointment_date" onchange="getSuggestionDetails('')" value="<?php echo date("Y-m-d");?>">
        </small>
    <div class="request-icon" onclick="getSuggestionDetails('*')">
                <a class="btn view-all">View All   <i class="fa fa-table" aria-hidden="true"></i></a>
            </div>
</span></h2>

<div class="row">
    <div class="row ">
        <div class="col-md-12 result-table top-buffer" id="table_results">
            <table class="table table-hover col-md-12">
                <thead>
                <tr>
                    <th>Suggestion ID</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Idea</th>
                    <th>View Suggestion</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $suggestionList = "";
                    foreach ($suggestions as $row){
                        $suggestionDetails = [$row->suggestion_id,$row->date,$row->name,$row->email,$row->idea];
                        $rowString = implode(",", $suggestionDetails);
                        $suggestionList.= "<tr>";
                        $suggestionList.= "<td>{$row->suggestion_id}</td>";
                        $suggestionList.= "<td>{$row->date}</td>";
                        $suggestionList.= "<td>{$row->name}</td>";
                        $suggestionList.= "<td>{$row->email}h</td>";
                        $suggestionList.= "<td>{$row->idea}</td>";
                        $suggestionList.= "<td><a class=\"suggestion_check btn btn-primary btn-sm\" onclick=\"loadSuggestionModal('$rowString')\" id={$row->suggestion_id}><b><span class=\"glyphicon glyphicon-eye-open\"></span> View</b></a></td>";
                        
                        $suggestionList.= "</tr>";
                    }
                    echo $suggestionList;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">

	// load suggestion details when date picker is changed
    function getSuggestionDetails(value) {
        if (value == '*'){
            var date = '*';
            $('#date_picker').val("");
        }
        else{
            var date = document.getElementById("date_picker").value;
        }
        $.ajax({
            url:'<?php echo site_url('ctrl_suggestion/viewSuggestions'); ?>',
            method: "post",
            data: {date:date},
            success: function( data ) {
                $('#table_results').html(data);
            }
        });
    }

    // load modal to view suggestion details
    function loadSuggestionModal(suggestionDetails){
        suggestionDetails = suggestionDetails.split(",");
        $('#modal_suggestion_id').val(suggestionDetails[0]);
        $('#date').val(suggestionDetails[1]);
        $('#name').val(suggestionDetails[2]);
        $('#email').val(suggestionDetails[3]);
        $('#idea').val(suggestionDetails[4]);
        $('#modal_suggestion').modal('show');
    }

    function deleteSuggestionDetails(value) {
        
        var id = document.getElementById("modal_suggestion_id").value;
        $.ajax({
            url:'<?php echo site_url('ctrl_suggestion/deleteSuggestions'); ?>',
            method: "post",
            data: {id:id},
            success: function( data ) {
            	$('#modal_suggestion').modal('hide');
                $('#msg_Modal').modal('show');
                $('#msg_result').html(data);
            }
        });
    }

    // load modal to delete customer details
    function delete_suggestion(customerDetails){
        customerDetails = suggestionDetails.split(",");
        // alert(customerDetails);
       	$('#suggestion_id').html(suggestionDetails[0]);
        $('#date').val(suggestionDetails[1]);
        $('#name').val(suggestionDetails[2]);
        $('#email').val(suggestionDetails[3]);
        $('#idea').val(suggestionDetails[4]);
        $('#delete_modal_suggestion').modal('show');
    }

     $('#msg_Modal').on('hidden.bs.modal', function () {
        $('#content').load("<?php echo base_url();?>index.php/administrator/manageSuggestions");
    });
</script>