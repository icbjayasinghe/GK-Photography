<?php
class Pdf_Controller extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('Pdf_Library');
		$this->load->model('Pdf_Model');
	}

    public function generateAppointmentReceipt($appointment_id){
        $this->load->model('appointment');
        $result['appointment']= $this->appointment->getAppointmentData($appointment_id);
        $this->load->view('reports/appointment_receipt',$result);

    }
}
?>