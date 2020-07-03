<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panitia_model extends CI_Model {

    public function get_all()
    {   
        $where = array('id_user_grup'=> 2);
        $this->db->where($where);
        return $this->db->get('user');
    }
    public function delete($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->delete('user');
        if ($query ) {
            return true;
        }else{
            return false;
        }
    }
    public function update($id,$new_foto)
    {
        $data=array(
            'nama_depan'=>$this->input->post('nama_depan'),
            'nama_belakang'=>$this->input->post('nama_belakang'),
            'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
            'telp'=>$this->input->post('telp'),
            'email'=>$this->input->post('email'),
            'alamat'=>$this->input->post('alamat'),
            'username'=>$this->input->post('username'),
            'foto'=>$new_foto
        );
        $this->db->where('id',$id);
        $query=$this->db->update('user',$data);
        if ($query ) {
            return true;
        }else{
            return false;
        }
    }
    public function tambah($foto)
    {
        $data=array(
            'id_user_grup'=>2,
            'nama_depan'=>$this->input->post('nama_depan'),
            'nama_belakang'=>$this->input->post('nama_belakang'),
            'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
            'telp'=>$this->input->post('telp'),
            'email'=>$this->input->post('email'),
            'alamat'=>$this->input->post('alamat'),
            'username'=>$this->input->post('username'),
            'password'=>md5($this->input->post('username')),
            'foto'=>$foto
        );
        $query=$this->db->insert('user',$data);
        if ($query ) {
            return true;
        }else{
            return false;
        }
    }
    public function ubahpassword($id)
    {
        $this->db->where('id',$id);
        $cek = $this->db->get('user');
        if ($cek->num_rows()>0) {
            foreach($cek->result() as $user)
            {
                $password = $user->password;
            }
            if (md5($this->input->post('old_password'))==$password) {
                $password_baru=array('password'=>md5($this->input->post('new_password')));
                $query = $this->db->update('user',$password_baru);
                if ($query ) {
                    return true;
                }else{
                    echo 'gagal ubah';
                }
            }else{
                echo 'password lama salah';
            }
        }else{
            echo 'user ga ada';
        }
    }
}
