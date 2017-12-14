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
            $this->session->set_flashdata('errmsg','Wrong Email! \nTry again');
            redirect('Welcome/contact');
        }
        else {
            $this->load->model('Model_suggestion');
            $result= $this->Model_suggestion->insertSuggestions();
            //if($result!=FALSE){
                $suggestions = array(
                    '$id'=>$result->suggestion_id,
                    '$name'=>$result->name,
                    '$email'=>$result->email,
                    '$message'=>$result->idea,
                );
            $this->session->set_flashdata('errmsg','Thanks for your Interest!');
            redirect('Welcome/contact');

        }	
	}
}