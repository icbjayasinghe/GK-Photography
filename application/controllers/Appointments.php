<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments extends CI_Controller
{

    /*
     * loads appointment booking view
     */
    public function makeAppointment()
    {
        $this->load->view('header');
        $this->load->view('make_appointment');
        $this->load->view('message_model');
        $this->load->view('footer');
    }

    /*
   check the availability of
   customer defined time slot
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
            $result = $this->appointment->bookSlot($newId,$appDate,$appStartTime,$appEndTime,$description,$custId);
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
                        $result = $this->appointment->bookSlot($newId,$appDate,$appStartTime,$appEndTime,$description,$custId);
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
                $result = $this->appointment->bookSlot($newId,$appDate,$appStartTime,$appEndTime,$description,$custId);
                echo "<h4>Appointment Request Successful</h4><br>";
                return;
            }
        }
    }

    /*
   display the unavailable slots
    as a message
   */
    function displayUnavailableSlotsMessage($appDate){
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
   convert 24 hour format to 12 hour
   */
    function hours24Convert($hour){
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

    function test(){
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