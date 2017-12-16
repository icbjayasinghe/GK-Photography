<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments extends CI_Controller
{

    /*
     * loads appointment booking view for customer
     */
    public function makeAppointmentCustomer()
    {
        $this->load->view('customer/make_appointment');
    }

    /*
     * loads appointment booking view for customer
     */
    public function makeAppointmentAdmin($cust_id)
    {
        $customer['cust_id']=$cust_id;
        $this->load->view('admin/make_appointment',$customer);
    }

    /*
     * loads appointment booking view
     */
    public function appointmentRequests(){
        $this->load->model('appointment');
        $result['appointmentRequests']= $this->appointment->getAppointmentRequests();
        $this->load->view('admin/appointment_requests',$result);

    }

    /*
     * view appointments
     */
    public function viewAppointments(){
        $this->load->model('appointment');
        $date = $this->input->post('date');
        $appointmentRequests = $this->appointment->getAppointments($date);
        $appointmentList = "<table class=\"table table-hover col-md-12\">
                <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Appointment Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Description</th>
                    <th>Customer Name</th>
                </tr>
                </thead>
                <tbody>";
        foreach ($appointmentRequests as $row){
            $customerDetails = [$row->cust_id,$row->first_name,$row->last_name,$row->cust_phone,$row->cust_address,$row->cust_email,$row->date_joined];
            $rowString = implode(",", $customerDetails);
            $appointmentList.= "<tr>";
            $appointmentList.= "<td>{$row->appointment_id}</td>";
            $appointmentList.= "<td>{$row->appointment_date}</td>";
            $appointmentList.= "<td>{$row->start_time}h</td>";
            $appointmentList.= "<td>{$row->end_time}h</td>";
            $appointmentList.= "<td>{$row->description}</td>";
            $appointmentList.= "<td><a class=\"customer_check\" onclick=\"loadCustomerModal('$rowString')\" id={$row->cust_id}><b>{$row->first_name} {$row->last_name}</b></a></td>";
            //$appointmentList.= "<td><a class=\"btn btn-success btn-sm\" onclick=\"statusChange('accepted',this.id)\" name=\"accept\" value=\"Accept\" id=\"{$row->appointment_id}\"><span class=\"glyphicon glyphicon-edit\"></span>  Accept</a></td>";
            //$appointmentList.= "<td><a class=\"btn btn-danger btn-sm\" onclick=\"statusChange('rejected',this.id)\" name=\"reject\" value=\"Reject\" id=\"{$row->appointment_id}\"><span class=\"glyphicon glyphicon-edit\"></span>  Reject</a></td>";
            $appointmentList.= "</tr>";
        }
        $appointmentList .="</tbody></table>";
        echo $appointmentList;
    }

    /*
     * update appointment status
     */
    public function updateAppointmentStatus(){
        $newStatus = $this->input->post('status');
        $appointmentId = $this->input->post('appointmentId');
        $this->load->model('appointment');

        // update the appointment status as reject or accept
        $result_update = $this->appointment->updateAppointment('status',$newStatus,$appointmentId);

        if ($result_update){
            if($newStatus == "rejected"){
                echo "Appointment Rejected<br>";
            }
            if($newStatus == "accepted"){
                echo "Appointment Accepted<br>";
            }
        }
        else{
            echo "Error in updating<br>";
        }

        // get all data for a particular appointment
        $result_data = $this->appointment->getAppointmentData($appointmentId);
        if ($result_data){
            $appointment_date = $result_data['appointment_date'];
            $description = $result_data['description'];
            $start_time = $result_data['start_time'];
            $end_time = $result_data['end_time'];
            $cust_email = $result_data['cust_email'];

            /* send email confirmation */
            $this->load->library('email');
            $this->load->model('email_model');
            $result_email = $this->email_model->sendAppointmentConfirmationMail($newStatus,$cust_email,$appointment_date,$start_time,$end_time,$description);
            if ($result_email){
                echo "Mail has been sent successfully";
            }
            else{
                echo "Mail NOT Sent";
            }
        }

    }

    /*
     * check the availability of
     * customer defined time slot
     */
    public function checkAvailability()
    {
        $appDate = $this->input->post('date');
        $appStartTime = $this->input->post('stime');
        $appEndTime = $this->input->post('etime');
        $description = $this->input->post('description');
        $custId = $this->input->post('cust_id');
        $this->load->model('database_model'); // to invoke the generateId() method later
        $this->load->model('appointment');
        $result = $this->appointment->getUnavailableSlots($appDate);
        $numRows = $result->num_rows();
        if ($numRows==0){ // if there aren't any appointment for that day
            $newId = $this->database_model->generateId('appointment_id','appointment','APP');
            $result = $this->appointment->addAppointment($newId,$appDate,$appStartTime,$appEndTime,$description,$custId);
            echo "<h4>Appointment Request Successful</h4><br>";
            return;
        }
        else{
            foreach ($result->result() as $row)
            {
                $startTimeDb = $row->start_time;
                $endTimeDb = $row->end_time;
                if ($appStartTime<$startTimeDb){
                    if ($appEndTime<$startTimeDb){
                        $newId = $this->database_model->generateId('appointment_id','appointment','APP');
                        $result = $this->appointment->addAppointment($newId,$appDate,$appStartTime,$appEndTime,$description,$custId);
                        echo "<h4>Appointment Request Successful</h4><br>";
                        return;
                    }
                    else{
                        echo "<h4>Appointment Request Unsuccessful</h4><br>";
                        $this->displayUnavailableSlotsMessage($appDate);
                        return;
                    }
                }
                else{
                    if ($appStartTime<$endTimeDb){
                        echo "<h3>Appointment Request Unsuccessful</h3><br>";
                        $this->displayUnavailableSlotsMessage($appDate);
                        return;
                    }
                }
            }
            // scheduling an appointment after all the appointments for a paticular day
            $lastRow = $result->last_row();
            $startTimeDb = $lastRow->start_time;
            $endTimeDb = $lastRow->end_time;
            if ($appStartTime>$endTimeDb){
                $newId = $this->database_model->generateId('appointment_id','appointment','APP');
                $result = $this->appointment->addAppointment($newId,$appDate,$appStartTime,$appEndTime,$description,$custId);
                echo "<h4>Appointment Request Successful</h4><br>";
                return;
            }
        }
    }

    /*
     * display the unavailable slots
     * as a message
     */
    public function displayUnavailableSlotsMessage($appDate){
        echo "<h4>Below time slots are allocated for ".$appDate."</h4><br>";
        $this->load->model('appointment');
        $result = $this->appointment->getUnavailableSlots($appDate);
        foreach ($result->result() as $row)
        {
            $startTime = $row->start_time;
            $startTimeHour = substr($startTime,0,2);
            $startTimeMinute = substr($startTime,2,2);
            $startTimeHourArray = $this->hours24Convert($startTimeHour);

            $endTime = $row->end_time;
            $endTimeHour = substr($endTime,0,2);
            $endTimeMinute = substr($endTime,2,2);
            $endTimeHourArray = $this->hours24Convert($endTimeHour);

            echo "<h4>";
            echo $startTimeHourArray[0].":".$startTimeMinute.$startTimeHourArray[1]." to ";
            echo $endTimeHourArray[0].":".$endTimeMinute.$endTimeHourArray[1];
            echo "</h4>";
        }
        echo "<br><h4>Please select another time slot or contact <b>GK Photography</b></h4>";
    }

    /*
     * convert 24 hour format to 12 hour
     */
    public function hours24Convert($hour){
        $dataArray=array();
        if ($hour<=12){
            array_push($dataArray,$hour);
            array_push($dataArray,'AM');
            return $dataArray;
        }
        else{
            array_push($dataArray,$hour-12);
            array_push($dataArray,'PM');
            return $dataArray;
        }
    }

    /*
     * count number of appointment requests
     */
    public function appointmentRequestCount(){
        $this->load->model('appointment');
        $result = $this->appointment->fetchAppointmentRequestCount();
        echo $result;
    }

    /*
     * get upcoming appointments for a particular customer
     */
    public function upcomingAppointments(){
        $cust_id = $this->session->userdata('$id');
        $this->load->model('appointment');
        $result['appointments'] = $this->appointment->getUpcomingAppointments($cust_id);
        $this->load->view('customer/upcoming_appointments',$result);
    }

    /*
     * get previous appointments for a particular customer
     */
    public function appointmentHistory(){
        $cust_id = $this->session->userdata('$id');
        $this->load->model('appointment');
        $result['appointments'] = $this->appointment->getAppointmentHistory($cust_id);
        $this->load->view('customer/appointment_history',$result);
    }

    /*
     * get the number of upcoming appointments
     */
    public function countNewAppointments(){
        $cust_id = $this->session->userdata('$id');
        $this->load->model('appointment');
        $result = $this->appointment->countAppointments($cust_id);
        echo $result;
    }

    public function test(){
        $appDate = $this->input->post('date');
        $this->load->model('database_model'); // to invoke the generateId() method later
        $this->load->model('appointment');
        $result = $this->appointment->getUnavailableSlots($appDate);
        foreach ($result->result() as $row)
        {
            echo $row->start_time;
            echo "<br>";
            echo $row->end_time;
            echo "<br>";
            echo "<br>";

        }
    }


}

?>