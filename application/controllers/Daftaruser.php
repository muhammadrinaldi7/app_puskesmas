<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftaruser extends CI_Controller {

    public function index(){
        $this->load->view('daftaruser');
    }

    public function daftar(){
        $this->load->model('m_pengguna');
        $this->load->model('m_pasien');
        $data = array(
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'no_ktp' => $this->input->post('no_ktp'),
            'nama_pasien' => $this->input->post('nama_pasien'),
            'level' => $this->input->post('level'),
            'no_hp' => $this->input->post('no_hp'),
            'email' => $this->input->post('email'),
            'status' => $this->input->post('status'),
        );
        $data1 = array(
            'no_rekamedis' => $this->input->post('no_rekamedis'),
            'no_ktp' => $this->input->post('no_ktp'),
            'status_pasien' => $this->input->post('status_pasien'),
            'no_bpjs' => $this->input->post('no_bpjs'),
            'nama_pasien' => $this->input->post('nama_pasien'),
            'jenkel' => $this->input->post('jenkel'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
        );
        $result = $this->m_pengguna->add_pengguna($data);
        $result = $this->m_pasien->add_pasien($data1);
        if($result){
            $this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
            redirect(base_url('login'));
        }
    }
}
?>