<?php
/**
 * Created by Sublime.
 * User: Lachini Roshika
 * Date: 10/25/2017
 * Time: 1:00 AM
 */

class Ctrl_suggestion extends CI_Controller{

	public function ctrl_suggestions(){
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() == FALSE) {
            $this->load->view('contact');
        }
        else {
            $this->load->model('Model_suggestion');
            $result= $this->Model_suggestion->insertSuggestions();
            if($result!=FALSE){
                $suggesions = array(
                    '$id'=>$result->suggestion_id,
                    '$name'=>$result->name,
                    '$email'=>$result->email,
                    '$message'=>$result->idea,
                );
                $this->session->set_userdata($suggesions);
                $this->session->set_flashdata('welcomemsg','Hi ....');
                /*if($this->session->userdata('$type')=='Customer'){
                    redirect('Appointments/makeAppointment');
                    $this->session->set_flashdata('welcome','Welcome back');
                }
                elseif($this->session->userdata('$type')=='Administrator'){
                    redirect('Administrator/adminHome');

                }*/
                redirect('Welcome/index');


            }
            else{
                $this->session->set_flashdata('errmsg','Wrong Email and Password..');
                redirect('Welcome/contact');
            }



        }	
	}
}