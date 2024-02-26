<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poligigi extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_poligigi');
	}

	public function index()
	{
		$x['data_poligigi']=$this->m_poligigi->get_all_poligigi();
		$x['sidebar']="poligigi";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('poligigi/poligigi');
		$this->load->view('footer');
	}

	public function daftar(){
		$x['sidebar']="poligigi";
		$this->load->view('header',$x);
		$this->load->view('sidebaruser');
		$this->load->view('poligigi/daftarpoli');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_poligigi']=$this->m_poligigi->get_all_poligigi();
		$x['sidebar']="poligigi2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('poligigi/lihat');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$x['tgl1']=$this->input->post('tgl1');
		$x['tgl2']=$this->input->post('tgl2');
		$x['data_poligigi']=$this->db->query("SELECT * FROM poligigi,pasien where poligigi.id_pasien=pasien.id_pasien AND date(tgl_tindakan) BETWEEN '$tgl1' AND '$tgl2'");
		$this->load->view('poligigi/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_poligigi']=$this->m_poligigi->get_all_poligigi();
		$this->load->view('poligigi/cetak',$x);
	}

		public function simpan_poligigi()
	{
				$data = array(
								'id_pasien' => $this->input->post('id_pasien'),
								'nama_tindakan' => $this->input->post('nama_tindakan'),
								'biaya' => $this->input->post('biaya'),
								'ditangani_oleh' => $this->input->post('ditangani_oleh'),
								'keterangan' => $this->input->post('keterangan'),
								'tgl_tindakan' => $this->input->post('tgl_tindakan'),
							);
				
					$result = $this->m_poligigi->add_poligigi($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('poligigi'));
					}
	}


	


		public function update_poligigi()
	{
		$id = $this->input->post('id_poligigi'); 
			

				$data = array(
								'id_pasien' => $this->input->post('id_pasien'),
								'nama_tindakan' => $this->input->post('nama_tindakan'),
								'biaya' => $this->input->post('biaya'),
								'ditangani_oleh' => $this->input->post('ditangani_oleh'),
								'keterangan' => $this->input->post('keterangan'),
								'tgl_tindakan' => $this->input->post('tgl_tindakan'),
							);
					
				
					$result = $this->m_poligigi->edit_poligigi($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('poligigi'));
					}
	}

	function hapus_poligigi(){
		$kode=$this->input->post('kode');
		$this->m_poligigi->hapus_poligigi($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('poligigi');
	}
}