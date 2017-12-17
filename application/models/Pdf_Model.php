<?php
class Pdf_Model extends CI_Model{
	public function select_donor(){
		return $this->db->get('appointment')->result();
	}
}
?>