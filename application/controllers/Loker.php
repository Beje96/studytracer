<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loker extends CI_Controller {

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
    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('masuk')=="is_login")
        {
            $this->session->set_flashdata('msg','Anda Belum Login !');
            redirect('login/login');
        }
        }
        public function index()
        {
            $this->load->view('frontend/include/header');
            $this->load->view('frontend/alumni/include/navbar');
            $this->load->view('frontend/alumni/loker');
            $this->load->view('frontend/include/footer');
        }
    }