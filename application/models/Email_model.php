<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model
{
    
    /*
     * send appointment acceptance or rejection mail
     */
    public function sendAppointmentConfirmationMail($status,$cust_email,$appointment_date,$start_time,$end_time,$description){

        $message_body="Appointment Date : ".$appointment_date."<br>
            Appointment Time: ".$start_time."h to".$end_time."h<br>
            Description : ".$description."<br>";

        if ($status=="rejected"){
            $subject = 'Appointment Rejection';
            $message = '<h1>Sorry, your appointment is rejected.</h1>';

        }
        else if ($status=="accepted"){
            $subject = 'Appointment Acception';
            $message = '<h1>Your appointment is accepted.</h1>';
        }

        $result = $this->email
            ->from('gkphotography00@gmail.com')
            ->reply_to('gkphotography00@gmail.com')    // Optional, an account where a human being reads.
            ->to($cust_email)
            ->subject($subject)
            ->message($message."".$message_body)
            ->send();

        return $result;
    }
}

?>