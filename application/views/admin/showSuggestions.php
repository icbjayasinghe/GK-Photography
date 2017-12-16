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
                        $suggestionList.= "<td>{$row->name}h</td>";
                        $suggestionList.= "<td>{$row->email}h</td>";
                        $suggestionList.= "<td>{$row->idea}</td>";
                        $suggestionList.= "<td><a class=\"suggestion_check\" onclick=\"loadSuggestionModal('$rowString')\" id={$row->suggestion_id}></a></td>";
                        $suggestionList.= "<td><a class=\"suggestion_check btn btn-danger btn-sm\" onclick=\"delete_suggestion('$rowString')\" id={$row->suggestion_id}><b><span class=\"glyphicon glyphicon-edit\"></span> Delete</b></a></td>";
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

    // load modal to view suggestion details
    function loadSuggestionModal(suggestionDetails){
        suggestionDetails = suggestionDetails.split(",");
        $('#suggestion_id').html(suggestionDetails[0]);
        $('#date').val(suggestionDetails[1]);
        $('#name').val(suggestionDetails[2]);
        $('#email').val(suggestionDetails[3]);
        $('#idea').val(suggestionDetails[4]);
        $('#suggestion_Modal').modal('show');
    }


    // load appointment details when date picker is changed
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
</script>