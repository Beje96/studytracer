<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
        $this->load->model('login_model');
    }

	public function login()
	{
        if($this->input->post('submit'))
        {
            $username=$this->input->post('username');
            $password=md5($this->input->post('password'));
            
            $query=$this->login_model->cek_user($username,$password);
            if($query->num_rows()>0)
            {
                foreach ($query->result() as $user) {
                    $this->session->set_userdata('masuk','is_login');
                    $this->session->set_userdata('id',$user->id);
                    $this->session->set_userdata('username',$username);
                    $this->session->set_userdata('nama_depan',$user->nama_depan);
                    $this->session->set_userdata('id_user_grup',$user->id_user_grup);
                }

                if ($this->session->userdata('id_user_grup')==1) {
                    redirect('dashboard/dashboard_admin');
                }else if($this->session->userdata('id_user_grup')==2){
                    redirect('dashboard/dashboard_dosen');
                }else{
                    redirect('dashboard/dashboard_alumni');
                }
            }
        }
		$this->load->view('login');
    }

    public function logout(){
        $this->session->set_userdata('masuk','not_login');
        $this->session->sess_destroy();
        redirect('login/login');
    }
    
}
