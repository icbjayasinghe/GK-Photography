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
            'date'=>date("Y-m-d"),
            'name' => $this->input->post('name',TRUE),
            'email' => $this->input->post('email',TRUE),
            'idea' => $this->input->post('message',TRUE));

        try{//Transfering data to gkdb
            $this->db->insert('suggestions',$data);
        }
        catch (Exception $e){
            echo $e;
        }
	}

    public function getSuggestions($date){
        try{
            if ($date == "*"){
                $this->db->select('*');
                $this->db->from('suggestions');
                $result = $this->db->get();
                return $result->result();
            }
            else{
                $this->db->select('*');
                $this->db->from('suggestions');
                $this->db->where('suggestions.date', $date);
                $result = $this->db->get();
                return $result->result();
            }
        }
        catch (Exception $e){
            echo $e;
        }      
    }

     public function deleteSuggestion($id){
        try{
            $this->db->where('suggestion_id',$id);
            $result=$this->db->delete('suggestions');
            return $result;
        }
        catch(Exception $e){
            echo $e;
        }
    }

}