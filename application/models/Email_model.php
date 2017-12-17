<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model
{
    
    /*
     * send appointment acceptance or rejection mail
     */
    public function sendAppointmentConfirmationMail($status,$cust_email,$appointment_date,$start_time,$end_time,$description){

        $message_body="Appointment Date : ".$appointment_date."<br>
            Appointment Time: ".$start_time."h to ".$end_time."h<br>
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

    /*
     * send registration confirmation mail
     */
    public function sendRegistrationConfirmationMail($cust_email,$first_name,$last_name){
        $subject = 'Registration Confirmed';
        $message_body="<h1>Thank you for registering with us! ".$first_name." ".$last_name."</h1><br> You can now make your appoinments online, with GK Photography.<br>".
            "Contact us for more information.<br><br>98-1, Potpathy Road,<br> Kokuvil East, Kokuvil,<br> Jaffna,<br> Sri Lanka.<br> +94771180383";

        $result = $this->email
            ->from('gkphotography00@gmail.com')
            ->reply_to('gkphotography00@gmail.com')    // Optional, an account where a human being reads.
            ->to($cust_email)
            ->subject($subject)
            ->message($message_body)
            ->send();

        return $result;
    }

    /*
     * send registration confirmation mail
     */
    public function sendAppointmentCancellationMail($appointment_date,$start_time,$end_time,$description,$cust_email){

        $message_body="Appointment Date : ".$appointment_date."<br>
            Appointment Time: ".$start_time."h to ".$end_time."h<br>
            Description : ".$description."<br>";

            $subject = 'Appointment Cancellation';
            $message = '<h1>Sorry, your appointment is cancelled.</h1>';


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