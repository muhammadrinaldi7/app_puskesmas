<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

		function __construct(){
		parent::__construct();
      
	}

	public function index()
	{
		$this->load->view('login');
	}

	function aksi_login(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');

        $result = $this->db->query("SELECT * FROM pengguna LEFT JOIN pasien ON pengguna.no_ktp = pasien.no_ktp WHERE pengguna.username = '$username';")->row_array();

        // jika usernya ada
        if ($result) {
                if (password_verify($password, $result['password'])) {
                    $data_session = array(
							'id_pengguna2' => $result['id_pengguna'],
							'username2' => $result['username'],
							'no_ktp' => $result['no_ktp'],
							'id_pasien' => $result['id_pasien'],
							'nama_pasien' => $result['nama_pasien'],
							'no_hp' => $result['no_hp'],
							'foto' => "",
							'level' => $result['level'],
							'email' => $result['email'],
							'status' => $result['status'],
						 	'status2' => "loggg"
						);
					$this->session->set_userdata($data_session);
					$this->session->set_flashdata('berhasil_login', ' ');
					redirect("Dashboard");
                } else {
                    $this->session->set_flashdata('data_salah_login', 'Password Salah!');
					redirect("login");
                }
           
        }    else{
			$this->session->set_flashdata('gagal_login', 'Data Tidak Ditemukan!');
			redirect("login");
		}

	}
			public function logout(){
			$this->session->sess_destroy();
			redirect("login");
		}
}
