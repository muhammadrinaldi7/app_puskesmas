<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_pendaftaran');
	}

	public function index()
	{
		$x['data_pendaftaran']=$this->m_pendaftaran->get_all_pendaftaran();
		$x['sidebar']="pendaftaran";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('pendaftaran/pendaftaran');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_pendaftaran']=$this->m_pendaftaran->get_all_pendaftaran();
		$x['sidebar']="pendaftaran2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('pendaftaran/lihat');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$x['tgl1']=$this->input->post('tgl1');
		$x['tgl2']=$this->input->post('tgl2');
		$x['data_pendaftaran']=$this->db->query("SELECT * FROM pendaftaran,pasien,dokter,poli where pendaftaran.id_dokter=dokter.id_dokter AND pendaftaran.id_poli=poli.id_poli AND pendaftaran.id_pasien=pasien.id_pasien AND date(tanggal_daftar) BETWEEN '$tgl1' AND '$tgl2'");
		$this->load->view('pendaftaran/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_pendaftaran']=$this->m_pendaftaran->get_all_pendaftaran();
		$this->load->view('pendaftaran/cetak',$x);
	}

		public function simpan_pendaftaran()
	{
				$data = array(
								'no_rawat' => $this->input->post('no_rawat'),
								'tanggal_daftar' => $this->input->post('tanggal_daftar'),
								'id_dokter' => $this->input->post('id_dokter'),
								'id_pasien' => $this->input->post('id_pasien'),
								'id_poli' => $this->input->post('id_poli'),
								'nama_penanggung_jawab' => $this->input->post('nama_penanggung_jawab'),
								'hubungan_dengan_penanggung_jawab' => $this->input->post('hubungan_dengan_penanggung_jawab'),
								'alamat_penanggung' => $this->input->post('alamat_penanggung'),
							);	
					$result = $this->m_pendaftaran->add_pendaftaran($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						if($this->session->userdata('level')=='Administrator'){
						redirect(base_url('pendaftaran'));
						}else {
							redirect(base_url('Dashboard'));
						}
						
					}
	}

		public function update_pendaftaran()
	{
		$id = $this->input->post('id_pendaftaran'); 
					$data = array(
								'no_rawat' => $this->input->post('no_rawat'),
								'tanggal_daftar' => $this->input->post('tanggal_daftar'),
								'id_dokter' => $this->input->post('id_dokter'),
								'id_pasien' => $this->input->post('id_pasien'),
								'id_poli' => $this->input->post('id_poli'),
								'nama_penanggung_jawab' => $this->input->post('nama_penanggung_jawab'),
								'hubungan_dengan_penanggung_jawab' => $this->input->post('hubungan_dengan_penanggung_jawab'),
								'alamat_penanggung' => $this->input->post('alamat_penanggung'),
							);								
					$result = $this->m_pendaftaran->edit_pendaftaran($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('pendaftaran'));
					}
	}

	function hapus_pendaftaran(){
		$kode=$this->input->post('kode');
		$this->m_pendaftaran->hapus_pendaftaran($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('pendaftaran');
	}
}