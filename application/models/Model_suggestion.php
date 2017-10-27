<?php
/**
 * Created by Sublime.
 * User: Lachini Roshika
 * Date: 10/25/2017
 * Time: 1:00 AM
 */
class Model_suggestion extends CI_Model{
	public function insertSuggestions(){

		$this->load->model('database_model');
		$sug_id = $this->database_model->generateId('suggestion_id','suggestions','SUG');

		$data=array(
            'suggestion_id' =>$sug_id,
            'name' => $this->input->post('name',TRUE),
            'email' => $this->input->post('email',TRUE),
            'idea' => sha1($this->input->post('message',TRUE)));

        try{//Transfering data to gkdb
            $this->db->insert('suggestions',$data);
        }
        catch (Exception $e){
            echo $e;
        }
	}


	// function insertSuggestions($data){
	// 	try{
 //            $result=$this->db->insert('suggestions',$data);
 //        }
 //        catch (Exception $e){
 //            echo $e;
 //        }
	// }
}