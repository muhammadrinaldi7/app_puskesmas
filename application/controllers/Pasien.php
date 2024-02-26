<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pasien extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_pasien');
	}

	public function index()
	{
		$x['data_pasien']=$this->m_pasien->get_all_pasien();
		$x['sidebar']="pasien";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('pasien/pasien');
		$this->load->view('footer');
	}

	public function cetak($id)
	{		
		$x['data_rm']=$this->db->query("SELECT * FROM pasien LEFT JOIN pendaftaran on pasien.id_pasien=pendaftaran.id_pasien 
		LEFT JOIN riwayat_tindakan on riwayat_tindakan.id_pendaftaran = pendaftaran.id_pendaftaran 
		LEFT JOIN pemberian_resep_obat on pemberian_resep_obat.id_riwayat_tindakan = riwayat_tindakan.id_riwayat_tindakan 
		LEFT JOIN obat on obat.id_obat = pemberian_resep_obat.id_obat 
		WHERE pasien.id_pasien = '$id';")->result();
		$x['data_rm1']=$this->db->query("SELECT pasien.*,pendaftaran.*,poli.*,riwayat_tindakan.*,obat.*,pemberian_resep_obat.* FROM pasien LEFT JOIN pendaftaran on pasien.id_pasien=pendaftaran.id_pasien LEFT JOIN poli on poli.id_poli = pendaftaran.id_poli LEFT JOIN riwayat_tindakan on riwayat_tindakan.id_pendaftaran = pendaftaran.id_pendaftaran LEFT JOIN pemberian_resep_obat on pemberian_resep_obat.id_riwayat_tindakan = riwayat_tindakan.id_riwayat_tindakan LEFT JOIN obat on obat.id_obat = pemberian_resep_obat.id_obat WHERE pasien.id_pasien = '$id';")->result();
		$this->load->view('pasien/cetak',$x);
	}

		public function simpan_pasien()
	{
				$data = array(
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
				
					$result = $this->m_pasien->add_pasien($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						if($this->session->userdata('level')=='Administrator'){
							redirect(base_url('pasien'));
						}else {
							redirect(base_url('Dashboard'));
						}
						
					}
	}


	


		public function update_pasien()
	{
		$id = $this->input->post('id_pasien'); 
			

				$data = array(
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
					
				
					$result = $this->m_pasien->edit_pasien($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('pasien'));
					}
	}

	function hapus_pasien(){
		$kode=$this->input->post('kode');
		$this->m_pasien->hapus_pasien($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('pasien');
	}
	public function lihat()
	{
		$x['data_pasien']=$this->m_pasien->get_all_pasien();
		$x['sidebar']="rm";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('pasien/lihat');
		$this->load->view('footer');
	}

}
