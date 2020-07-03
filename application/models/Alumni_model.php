<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni_model extends CI_Model {

    public function get_all()
    {   
        $where = array('id_user_grup'=> 3);
        $this->db->where($where);
        return $this->db->get('user');
    }
    public function editstatus($id,$pesan)
    {
        
        $data=array('status'=>$pesan);
        $this->db->where('id',$id);
        $query=$this->db->update('user',$data);
        if ($query) {
            return true;
        }else {
            return false;
        }
    }
    public function daftar($foto)
    {
        $bidang='';
        if ($this->input->post('bidang_pekerjaan2')!=="") {
            $bidang=$this->input->post('bidang_pekerjaan2');
        }else{
            $bidang=$this->input->post('bidang_pekerjaan');
        }

        $data=array(
            'id_user_grup'=>3,
            'nama_depan'=>$this->input->post('nama_depan'),
            'nama_belakang'=>$this->input->post('nama_belakang'),
            'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
            'tgl_lahir'=>$this->input->post('tanggal_lahir'),
            'telp'=>$this->input->post('telp'),
            'email'=>$this->input->post('email'),
            'alamat'=>$this->input->post('alamat'),
            'username'=>$this->input->post('username'),
            'password'=>md5($this->input->post('password')),
            'tahun_lulus'=>$this->input->post('tahun_lulus'),
            'mulai_kerja'=>$this->input->post('mulai_kerja'),
            'angkatan'=>$this->input->post('angkatan'),
            'pekerjaan'=>$this->input->post('pekerjaan'),
            'bidang_pekerjaan'=>$bidang,
            'jabatan'=>$this->input->post('jabatan'),
            'alamat_kerja'=>$this->input->post('alamat_kerja'),
            'kota'=>$this->input->post('kota'),
            'foto'=>$foto,
            'status'=>'nonaktif'
        );
        $query=$this->db->insert('user',$data);
        if ($query ) {
            return true;
        }else{
            return false;
        }
    }
}
