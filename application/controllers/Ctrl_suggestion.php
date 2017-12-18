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
            $this->session->set_flashdata('errmsg',"Wrong Email! Try again");
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

    //view suggestions
    public function viewSuggestions(){
        $this->load->model('model_suggestion');
        $date = $this->input->post('date');
        $suggestionRequests = $this->model_suggestion->getSuggestions($date);
        $suggestionList = "<table class=\"table table-hover col-md-12\">
                <thead>
                <tr>
                    <th>Suggestion ID</th>
                    <th>Suggestion Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Suggestion</th>
                </tr>
                </thead>
                <tbody>";
        foreach ($suggestionRequests as $row){
            $suggestionDetails = [$row->suggestion_id,$row->date,$row->name,$row->email,$row->idea];
            $rowString = implode(",", $suggestionDetails);
            $suggestionList.= "<tr>";
            $suggestionList.= "<td>{$row->suggestion_id}</td>";
            $suggestionList.= "<td>{$row->date}</td>";
            $suggestionList.= "<td>{$row->name}h</td>";
            $suggestionList.= "<td>{$row->email}h</td>";
            $suggestionList.= "<td>{$row->idea}</td>";
            $suggestionList.= "<td><a class=\"suggestion_check btn btn-primary btn-sm\" onclick=\"loadSuggestionModal('$rowString')\" id={$row->suggestion_id}><b><span class=\"glyphicon glyphicon-eye-open\"></span> View</b></a></td>";
            $suggestionList.= "</tr>";    
        }

        $suggestionList .="</tbody></table>";
        echo $suggestionList;
    }

    public function deleteSuggestions(){
        $id = $this->input->post('id');
        $this->load->model('model_suggestion');
       $result =$this->model_suggestion->deleteSuggestion($id);
       if($result){
            echo "<h4>Successfully Deleted!</h4>";
       }
       else{
        echo "<h4>Fail to Delete!</h4>"; 
       }
    }
}