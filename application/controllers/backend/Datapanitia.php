<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapanitia extends CI_Controller {

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
        $this->load->model('panitia_model');
    }
	public function index()
	{
        $data['alumni'] = $this->panitia_model->get_all()->result();
        $data['alumni2'] = $this->panitia_model->get_all()->result();

		$this->load->view('include/head');
		$this->load->view('include/navbar');
		if ($this->session->userdata('id_user_grup')==1) {
			$this->load->view('admin/sider');
		}elseif ($this->session->userdata('id_user_grup')==2) {
			$this->load->view('dosen/sider');
		}
		$this->load->view('panitia',$data);
		$this->load->view('include/footer');
    }
    public function delete($id){
        $data=$this->panitia_model->delete($id);
        if($data==true){
			$this->session->set_flashdata('msg','delete berhasil !');
			redirect('backend/datapanitia');
		}else {
			$this->session->set_flashdata('msg','delete gagal !');
			redirect('backend/datapanitia');
        }
    }
    public function update($id)
    {
        $config['upload_path']          = './assets/user/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']			= true;
        $config['max_size']             = 4096; // 1MB
        $config['max_width']            = 4028;
        $config['max_height']           = 4028;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('new_foto')){
			// $error = array('error' => $this->upload->display_errors());
            // $this->load->view('v_upload', $error);
            $new_foto=$this->input->post('old_foto');
            $data=$this->panitia_model->update($id,$new_foto);
            if($data==true){
                $this->session->set_flashdata('msg','update berhasil !');
                redirect('backend/datapanitia');
            }else {
                $this->session->set_flashdata('msg','update gagal !');
                redirect('backend/datapanitia');
            }
		}else {
            $new_foto=$this->upload->data('file_name');
            $data=$this->panitia_model->update($id,$new_foto);
            if($data==true){
                $this->session->set_flashdata('msg','Edit data berhasil !');
                redirect('backend/datapanitia');
            }else {
                $this->session->set_flashdata('msg','Edit data gagal !');
                redirect('backend/datapanitia');
            }
        }
    }
    public function tambah()
    {
        $config['upload_path']          = './assets/user/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']			= true;
        $config['max_size']             = 4096; // 1MB
        $config['max_width']            = 4028;
        $config['max_height']           = 4028;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('foto')){
            $this->session->set_flashdata('msg','gagal upload');
                redirect('backend/datapanitia');
		}else {
            $foto=$this->upload->data('file_name');
            $data=$this->panitia_model->tambah($foto);
            if($data==true){
                $this->session->set_flashdata('msg','Tambah data berhasil !');
                redirect('backend/datapanitia');
            }else {
                $this->session->set_flashdata('msg','Tambah data gagal !');
                redirect('backend/datapanitia');
            }
        }
    }
    public function ubahpassword()
    {
        if($this->input->post('submit'))
        {
            if (md5($this->input->post('new_password'))!=md5($this->input->post('confirm_password'))) {
                $this->session->set_flashdata('msg','password tidak sesuai');
                redirect('backend/datapanitia/ubahpassword');
            }else{
                $where = $this->session->userdata('id');
                $data = $this->panitia_model->ubahpassword($where);
                if($data==true){
                    redirect('login/logout');
                }else {
                    $this->session->set_flashdata('msg','ganti password gagal atau password lama salah!');
                    redirect('backend/datapanitia/ubahpassword');
                }
            }
        }
        $this->load->view('include/head');
		$this->load->view('include/navbar');
        $this->load->view('dosen/sider');
        $this->load->view('ubahpassword');
		$this->load->view('include/footer');
    }
    
}
