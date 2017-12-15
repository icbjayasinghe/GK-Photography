
<h2>Upcoming Appointments</h2>
<br>

<div class="row">
    <div class="row ">
        <div class="col-md-12 result-table" id="table_results">
            <table class="table table-hover col-md-12">
                <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Appointment Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $appointment_list = "";
                    foreach ($appointments as $row){
                        $appointment_list.= "<tr>";
                        $appointment_list.= "<td>{$row->appointment_id}</td>";
                        $appointment_list.= "<td>{$row->appointment_date}</td>";
                        $appointment_list.= "<td>{$row->start_time}h</td>";
                        $appointment_list.= "<td>{$row->end_time}h</td>";
                        $appointment_list.= "<td>{$row->description}</td>";
                        $appointment_list.= "</tr>";
                    }
                    echo $appointment_list;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
