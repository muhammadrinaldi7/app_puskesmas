<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poliumum extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_poliumum');
	}

	public function index()
	{
		$x['data_poliumum']=$this->m_poliumum->get_all_poliumum();
		$x['sidebar']="poliumum";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('poliumum/poliumum');
		$this->load->view('footer');
	}

	public function daftar(){
		$x['sidebar']="poliumum";
		$this->load->view('header',$x);
		$this->load->view('sidebaruser');
		$this->load->view('poliumum/daftarpoli');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_poliumum']=$this->m_poliumum->get_all_poliumum();
		$x['sidebar']="poliumum2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('poliumum/lihat');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$x['tgl1']=$this->input->post('tgl1');
		$x['tgl2']=$this->input->post('tgl2');
		$x['data_poliumum']=$this->db->query("SELECT * FROM poliumum,pasien where poliumum.id_pasien=pasien.id_pasien AND date(tgl_tindakan) BETWEEN '$tgl1' AND '$tgl2'");
		$this->load->view('poliumum/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_poliumum']=$this->m_poliumum->get_all_poliumum();
		$this->load->view('poliumum/cetak',$x);
	}

		public function simpan_poliumum()
	{
				$data = array(
								'id_pasien' => $this->input->post('id_pasien'),
								'nama_tindakan' => $this->input->post('nama_tindakan'),
								'biaya' => $this->input->post('biaya'),
								'ditangani_oleh' => $this->input->post('ditangani_oleh'),
								'keterangan' => $this->input->post('keterangan'),
								'tgl_tindakan' => $this->input->post('tgl_tindakan'),
							);
				
					$result = $this->m_poliumum->add_poliumum($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('poliumum'));
					}
	}


	


		public function update_poliumum()
	{
		$id = $this->input->post('id_poliumum'); 
			

				$data = array(
								'id_pasien' => $this->input->post('id_pasien'),
								'nama_tindakan' => $this->input->post('nama_tindakan'),
								'biaya' => $this->input->post('biaya'),
								'ditangani_oleh' => $this->input->post('ditangani_oleh'),
								'keterangan' => $this->input->post('keterangan'),
								'tgl_tindakan' => $this->input->post('tgl_tindakan'),
							);
					
				
					$result = $this->m_poliumum->edit_poliumum($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('poliumum'));
					}
	}

	function hapus_poliumum(){
		$kode=$this->input->post('kode');
		$this->m_poliumum->hapus_poliumum($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('poliumum');
	}
}