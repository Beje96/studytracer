<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

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
        parent :: __construct();
        $this->load->model('alumni_model');
        $this->load->model('pekerjaan_model');
    }
	public function daftar()
	{
		$data['pekerjaan']=$this->pekerjaan_model->get_pekerjaan()->result();
		$this->load->view('frontend/register',$data);
	}
	public function aksidaftar()
	{
		$config['upload_path']          = './assets/user/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['overwrite']			= true;
        $config['max_size']             = 4096; // 1MB
        $config['max_width']            = 4028;
        $config['max_height']           = 4028;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('foto')){
            $this->session->set_flashdata('msg','gagal upload');
                redirect('register/daftar');
		}else {
        	$foto=$this->upload->data('file_name');
            $data=$this->alumni_model->daftar($foto);
            if($data==true){    
				$this->session->set_flashdata('msg','Pendaftaran berhasil , silahkan tunggu 1 x 24 jam untuk aktivasi!');
				redirect('login/login');
			}else {
				$this->session->set_flashdata('msg','Pendaftaran gagal, silahkan coba lagi!');
				redirect('login/login');
			}
        }
	}
	public function get_sub_pekerjaan()
	{
		$id = $this->input->post('id');
		$data=$this->pekerjaan_model->get_sub_pekerjaan($id)->result();
		echo json_encode($data);
	}

}
