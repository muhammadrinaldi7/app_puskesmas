<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_tindakan extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_riwayat_tindakan');
	}

	public function index()
	{
		$x['data_riwayat_tindakan']=$this->m_riwayat_tindakan->get_all_riwayat_tindakan();
		$x['sidebar']="riwayat_tindakan";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('riwayat_tindakan/riwayat_tindakan');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_riwayat_tindakan']=$this->m_riwayat_tindakan->get_all_riwayat_tindakan();
		$x['sidebar']="riwayat_tindakan2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('riwayat_tindakan/lihat');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$x['tgl1']=$this->input->post('tgl1');
		$x['tgl2']=$this->input->post('tgl2');
		$x['data_riwayat_tindakan']=$this->db->query("SELECT * FROM pendaftaran,pasien,dokter,poli,riwayat_tindakan,diagnosa where pendaftaran.id_dokter=dokter.id_dokter AND pendaftaran.id_poli=poli.id_poli AND pendaftaran.id_pasien=pasien.id_pasien AND riwayat_tindakan.id_pendaftaran=pendaftaran.id_pendaftaran AND riwayat_tindakan.id_diagnosa=diagnosa.id_diagnosa AND date(tanggal_tindakan) BETWEEN '$tgl1' AND '$tgl2'");
		$this->load->view('riwayat_tindakan/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_riwayat_tindakan']=$this->m_riwayat_tindakan->get_all_riwayat_tindakan();
		$this->load->view('riwayat_tindakan/cetak',$x);
	}

		public function simpan_riwayat_tindakan()
	{
				$data = array(
								'nama_tindakan' => $this->input->post('nama_tindakan'),
								'id_pendaftaran' => $this->input->post('id_pendaftaran'),
								'id_diagnosa' => $this->input->post('id_diagnosa'),
								'hasil_periksa' => $this->input->post('hasil_periksa'),
								'tanggal_tindakan' => $this->input->post('tanggal_tindakan'),
							);
				
					$result = $this->m_riwayat_tindakan->add_riwayat_tindakan($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('riwayat_tindakan'));
					}
	}


	


		public function update_riwayat_tindakan()
	{
		$id = $this->input->post('id_riwayat_tindakan'); 
			

				$data = array(
								'nama_tindakan' => $this->input->post('nama_tindakan'),
								'id_pendaftaran' => $this->input->post('id_pendaftaran'),
								'id_diagnosa' => $this->input->post('id_diagnosa'),
								'hasil_periksa' => $this->input->post('hasil_periksa'),
								'tanggal_tindakan' => $this->input->post('tanggal_tindakan'),
							);
					
				
					$result = $this->m_riwayat_tindakan->edit_riwayat_tindakan($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('riwayat_tindakan'));
					}
	}

	function hapus_riwayat_tindakan(){
		$kode=$this->input->post('kode');
		$this->m_riwayat_tindakan->hapus_riwayat_tindakan($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('riwayat_tindakan');
	}
}