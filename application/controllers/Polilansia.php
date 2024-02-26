<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Polilansia extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_polilansia');
	}

	public function index()
	{
		$x['data_polilansia']=$this->m_polilansia->get_all_polilansia();
		$x['sidebar']="polilansia";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('polilansia/polilansia');
		$this->load->view('footer');
	}

	public function daftar(){
		$x['sidebar']="polilansia";
		$this->load->view('header',$x);
		$this->load->view('sidebaruser');
		$this->load->view('polilansia/daftarpoli');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_polilansia']=$this->m_polilansia->get_all_polilansia();
		$x['sidebar']="polilansia2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('polilansia/lihat');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$x['tgl1']=$this->input->post('tgl1');
		$x['tgl2']=$this->input->post('tgl2');
		$x['data_polilansia']=$this->db->query("SELECT * FROM polilansia,pasien where polilansia.id_pasien=pasien.id_pasien AND date(tgl_tindakan) BETWEEN '$tgl1' AND '$tgl2'");
		$this->load->view('polilansia/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_polilansia']=$this->m_polilansia->get_all_polilansia();
		$this->load->view('polilansia/cetak',$x);
	}

		public function simpan_polilansia()
	{
				$data = array(
								'id_pasien' => $this->input->post('id_pasien'),
								'nama_tindakan' => $this->input->post('nama_tindakan'),
								'biaya' => $this->input->post('biaya'),
								'ditangani_oleh' => $this->input->post('ditangani_oleh'),
								'keterangan' => $this->input->post('keterangan'),
								'tgl_tindakan' => $this->input->post('tgl_tindakan'),
							);
				
					$result = $this->m_polilansia->add_polilansia($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('polilansia'));
					}
	}


	


		public function update_polilansia()
	{
		$id = $this->input->post('id_polilansia'); 
			

				$data = array(
								'id_pasien' => $this->input->post('id_pasien'),
								'nama_tindakan' => $this->input->post('nama_tindakan'),
								'biaya' => $this->input->post('biaya'),
								'ditangani_oleh' => $this->input->post('ditangani_oleh'),
								'keterangan' => $this->input->post('keterangan'),
								'tgl_tindakan' => $this->input->post('tgl_tindakan'),
							);
					
				
					$result = $this->m_polilansia->edit_polilansia($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('polilansia'));
					}
	}

	function hapus_polilansia(){
		$kode=$this->input->post('kode');
		$this->m_polilansia->hapus_polilansia($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('polilansia');
	}
}