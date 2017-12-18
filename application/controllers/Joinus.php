<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/15/2017
 * Time: 12:11 PM
 */

class Joinus extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('directory');
        $this->load->library('upload');


    }


    public function Joinususer(){
        //form validation
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('phone', 'phone', 'required|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('address','Address','required');
        $this->form_validation->set_rules('works','Your skill','required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('joinus');
            $this->load->view('footer');
            $this->session->set_flashdata('msg','Send successfully !');
        }
        else{
//            if(is_uploaded_file($_FILES["pdf"]["tmp_name"])){
//                move_uploaded_file($_FILES["pdf"]["tmp_name"],"./pdf/".$_FILES["pdf"]["tmp_name"]);

                $this->load->model('Joinus_model');
                $respond=$this->Joinus_model->join_model();
                if($respond){
                    $this->session->set_flashdata('msg','Send successfully !');
                    redirect('Welcome/joinus');
                }
                else{
                    $this->session->set_flashdata('msg','Something wrong !');
                    redirect('Welcome/joinus');
                }

            //echo json_encode(array("data2"=>$data2));



            }


    }






}