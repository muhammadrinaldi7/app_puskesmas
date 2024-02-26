<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_pengguna');
	}

	public function index()
	{
		$x['data_pengguna']=$this->m_pengguna->get_all_pengguna();
		$x['sidebar']="pengguna";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('pengguna/pengguna');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_pengguna']=$this->m_pengguna->get_all_pengguna();
		$this->load->view('pengguna/cetak',$x);
	}

		public function simpan_pengguna()
	{
				$data = array(
								'username' => $this->input->post('username'),
								'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
								'nama_pasien' => $this->input->post('nama_pasien'),
								'level' => "Administrator",
								'no_hp' => $this->input->post('no_hp'),
								'email' => $this->input->post('email'),
							);
				
					$result = $this->m_pengguna->add_pengguna($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('pengguna'));
					}
	}

	public function simpan_user()
	{
				$data = array(
								'username' => $this->input->post('username'),
								'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),								
								'no_ktp' => $this->input->post('no_ktp'),
								'nama_pasien' => $this->input->post('nama_pasien'),
								'no_hp' => $this->input->post('no_hp'),
								'level' => $this->input->post('level'),
								'email' => $this->input->post('email'),
							);
				
					$result = $this->m_pengguna->add_pengguna($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('login'));
					}
	}


	public function Verif($id){
		$data = array(
			'status' => 'TERVERIFIKASI',
		);
		$result = $this->m_pengguna->edit_pengguna($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_verif', 'Record is Added Successfully!');
						redirect(base_url('pengguna'));
					}
	}
	public function Tolak($id){
		$this->load->model('m_pasien');
		$data = array(
			'status' => 'DITOLAK',
		);
		$kode = $id;
		$result = $this->m_pengguna->edit_pengguna1($data,$id);
		$result = $this->m_pasien->hapus_pasien1($kode);
					if($result){
						$this->session->set_flashdata('berhasil_tolak', 'Record is Added Successfully!');
						redirect(base_url('pengguna'));
					}
	}


		public function update_pengguna()
	{
		$id = $this->input->post('id_pengguna'); 
			

			if (empty($this->input->post('password'))) {
				$data = array(
								'username' => $this->input->post('username'),
								'nama_pasien' => $this->input->post('nama_pasien'),
								'no_hp' => $this->input->post('no_hp'),
								//'level' => $this->input->post('level'),
								'email' => $this->input->post('email'),
							);
			}else{
				$data = array(
								'username' => $this->input->post('username'),
								'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
								'nama_pasien' => $this->input->post('nama_pasien'),
								'no_hp' => $this->input->post('no_hp'),
								//'level' => $this->input->post('level'),
								'email' => $this->input->post('email'),
							);
			}
					
				
					$result = $this->m_pengguna->edit_pengguna($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('pengguna'));
					}
	}

	function hapus_pengguna(){
		$kode=$this->input->post('kode');
		$this->m_pengguna->hapus_pengguna($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('pengguna');
	}
}