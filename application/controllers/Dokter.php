<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_dokter');
	}

	public function index()
	{
		$x['data_dokter']=$this->m_dokter->get_all_dokter();
		$x['sidebar']="dokter";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('dokter/dokter');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_dokter']=$this->m_dokter->get_all_dokter();
		$x['sidebar']="dokter2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('dokter/lihat');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$x['tgl1']=$this->input->post('tgl1');
		$x['tgl2']=$this->input->post('tgl2');
		$x['data_dokter']=$this->db->query("SELECT * FROM dokter,poli where dokter.id_poli=poli.id_poli AND date(tanggal_masuk) BETWEEN '$tgl1' AND '$tgl2'");
		$this->load->view('dokter/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_dokter']=$this->m_dokter->get_all_dokter();
		$this->load->view('dokter/cetak',$x);
	}

		public function simpan_dokter()
	{
				$data = array(
								'nama_dokter' => $this->input->post('nama_dokter'),
								'jenis_kelamin' => $this->input->post('jenis_kelamin'),
								'nomor_induk_dokter' => $this->input->post('nomor_induk_dokter'),
								'tempat_lahir' => $this->input->post('tempat_lahir'),
								'tgl_lahir' => $this->input->post('tgl_lahir'),
								'alamat' => $this->input->post('alamat'),
								'id_poli' => $this->input->post('id_poli'),
								'tanggal_masuk' => $this->input->post('tanggal_masuk'),
							);
				
					$result = $this->m_dokter->add_dokter($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('dokter'));
					}
	}


	


		public function update_dokter()
	{
		$id = $this->input->post('id_dokter'); 
			

			$data = array(
								'nama_dokter' => $this->input->post('nama_dokter'),
								'jenis_kelamin' => $this->input->post('jenis_kelamin'),
								'nomor_induk_dokter' => $this->input->post('nomor_induk_dokter'),
								'tempat_lahir' => $this->input->post('tempat_lahir'),
								'tgl_lahir' => $this->input->post('tgl_lahir'),
								'alamat' => $this->input->post('alamat'),
								'id_poli' => $this->input->post('id_poli'),
								'tanggal_masuk' => $this->input->post('tanggal_masuk'),
							);
					
				
					$result = $this->m_dokter->edit_dokter($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('dokter'));
					}
	}

	function hapus_dokter(){
		$kode=$this->input->post('kode');
		$this->m_dokter->hapus_dokter($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('dokter');
	}
}