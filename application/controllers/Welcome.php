<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('header');
		$this->load->view('home-ninja-slider');
		$this->load->view('footer');
	}

	public function contact()
    {
        $this->load->view('header');
        $this->load->view('contact');
        $this->load->view('footer');
    }

    public function gallery()
    {
        $this->load->view('gallery');
    }

    public function mywork()
    {
        $this->load->view('my-work');
    }

    public function blog()
    {
        $this->load->view('header');
        $this->load->view('blog');
        $this->load->view('footer');
    }

    public function works()
    {
        $this->load->view('header');
        $this->load->view('works');
        $this->load->view('footer');
    }

    public function login(){
	    $this->load->view('login_header');
	    $this->load->view('login');
        $this->load->view('footer');
    }

    public function register(){
        $this->load->view('login_header');
        $this->load->view('register');
        $this->load->view('footer');
    }

}
