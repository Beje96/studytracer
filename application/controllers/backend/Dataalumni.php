<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataalumni extends CI_Controller {

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
        $this->load->model('alumni_model');
    }
	public function index()
	{
        $data['alumni'] = $this->alumni_model->get_all()->result();
        $data['alumni2'] = $this->alumni_model->get_all()->result();
		$this->load->view('include/head');
		$this->load->view('include/navbar');
		if ($this->session->userdata('id_user_grup')==1) {
			$this->load->view('admin/sider');
		}elseif ($this->session->userdata('id_user_grup')==2) {
			$this->load->view('dosen/sider');
		}
		$this->load->view('dataalumni',$data);
		$this->load->view('include/footer');
    }
	public function editstatus($id,$pesan)
	{
		$status=$this->alumni_model->editstatus($id,$pesan);
		if($status==true){
			$this->session->set_flashdata('msg','Edit status berhasil !');
			redirect('backend/dataalumni');
		}else {
			$this->session->set_flashdata('msg','Edit status gagal !');
			redirect('backend/dataalumni');
		}
	}
}
