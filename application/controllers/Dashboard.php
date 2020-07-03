<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
	public function dashboard_dosen()
	{
		$this->load->view('include/head');
		$this->load->view('include/navbar');
		$this->load->view('dosen/sider');
		$this->load->view('dosen/home');
		$this->load->view('include/footer');
	}
	public function dashboard_admin()
	{
   		$this->load->view('include/head');
		$this->load->view('include/navbar');
		$this->load->view('admin/sider');
		$this->load->view('admin/home');
		$this->load->view('include/footer');
	}
public function dashboard_alumni()
{
	$this->load->view('frontend/include/header');
	$this->load->view('frontend/alumni/include/navbar');
	$this->load->view('frontend/about');
	$this->load->view('frontend/include/footer');
}
}