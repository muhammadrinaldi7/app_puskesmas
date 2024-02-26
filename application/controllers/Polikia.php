<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Polikia extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_polikia');
	}

	public function index()
	{
		$x['data_polikia']=$this->m_polikia->get_all_polikia();
		$x['sidebar']="polikia";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('polikia/polikia');
		$this->load->view('footer');
	}

	public function daftar(){
		$x['sidebar']="polikia";
		$this->load->view('header',$x);
		$this->load->view('sidebaruser');
		$this->load->view('polikia/daftarpoli');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_polikia']=$this->m_polikia->get_all_polikia();
		$x['sidebar']="polikia2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('polikia/lihat');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$x['tgl1']=$this->input->post('tgl1');
		$x['tgl2']=$this->input->post('tgl2');
		$x['data_polikia']=$this->db->query("SELECT * FROM polikia,pasien where polikia.id_pasien=pasien.id_pasien AND date(tgl_tindakan) BETWEEN '$tgl1' AND '$tgl2'");
		$this->load->view('polikia/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_polikia']=$this->m_polikia->get_all_polikia();
		$this->load->view('polikia/cetak',$x);
	}

		public function simpan_polikia()
	{
				$data = array(
								'id_pasien' => $this->input->post('id_pasien'),
								'nama_tindakan' => $this->input->post('nama_tindakan'),
								'biaya' => $this->input->post('biaya'),
								'ditangani_oleh' => $this->input->post('ditangani_oleh'),
								'keterangan' => $this->input->post('keterangan'),
								'tgl_tindakan' => $this->input->post('tgl_tindakan'),
							);
				
					$result = $this->m_polikia->add_polikia($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('polikia'));
					}
	}


	


		public function update_polikia()
	{
		$id = $this->input->post('id_polikia'); 
			

				$data = array(
								'id_pasien' => $this->input->post('id_pasien'),
								'nama_tindakan' => $this->input->post('nama_tindakan'),
								'biaya' => $this->input->post('biaya'),
								'ditangani_oleh' => $this->input->post('ditangani_oleh'),
								'keterangan' => $this->input->post('keterangan'),
								'tgl_tindakan' => $this->input->post('tgl_tindakan'),
							);
					
				
					$result = $this->m_polikia->edit_polikia($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('polikia'));
					}
	}

	function hapus_polikia(){
		$kode=$this->input->post('kode');
		$this->m_polikia->hapus_polikia($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('polikia');
	}
}