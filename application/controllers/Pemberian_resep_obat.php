<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemberian_resep_obat extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_pemberian_resep_obat');
	}

	public function index()
	{
		$x['data_pemberian_resep_obat']=$this->m_pemberian_resep_obat->get_all_pemberian_resep_obat();
		$x['sidebar']="pemberian_resep_obat";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('pemberian_resep_obat/pemberian_resep_obat');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_pemberian_resep_obat']=$this->m_pemberian_resep_obat->get_all_pemberian_resep_obat();
		$x['sidebar']="pemberian_resep_obat2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('pemberian_resep_obat/lihat');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$x['tgl1']=$this->input->post('tgl1');
		$x['tgl2']=$this->input->post('tgl2');
		$x['data_pemberian_resep_obat']=$this->db->query("SELECT * FROM pendaftaran,pasien,dokter,poli,riwayat_tindakan,diagnosa,pemberian_resep_obat,obat where pendaftaran.id_dokter=dokter.id_dokter AND pendaftaran.id_poli=poli.id_poli AND pendaftaran.id_pasien=pasien.id_pasien AND riwayat_tindakan.id_pendaftaran=pendaftaran.id_pendaftaran AND riwayat_tindakan.id_diagnosa=diagnosa.id_diagnosa AND pemberian_resep_obat.id_riwayat_tindakan=riwayat_tindakan.id_riwayat_tindakan AND pemberian_resep_obat.id_obat=obat.id_obat AND date(tanggal_pemberian_resep) BETWEEN '$tgl1' AND '$tgl2'");
		$this->load->view('pemberian_resep_obat/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_pemberian_resep_obat']=$this->m_pemberian_resep_obat->get_all_pemberian_resep_obat();
		$this->load->view('pemberian_resep_obat/cetak',$x);
	}

		public function simpan_pemberian_resep_obat()
	{
				$data = array(
								'id_riwayat_tindakan' => $this->input->post('id_riwayat_tindakan'),
								'id_obat' => $this->input->post('id_obat'),
								'dosis_aturan_obat' => $this->input->post('dosis_aturan_obat'),
								'jumlah_obat' => $this->input->post('jumlah_obat'),
								'keterangan' => $this->input->post('keterangan'),
								'tanggal_pemberian_resep' => $this->input->post('tanggal_pemberian_resep'),
							);
				
					$result = $this->m_pemberian_resep_obat->add_pemberian_resep_obat($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('pemberian_resep_obat'));
					}
	}


	


		public function update_pemberian_resep_obat()
	{
		$id = $this->input->post('id_pemberian_resep_obat'); 
			

				$data = array(
								'id_riwayat_tindakan' => $this->input->post('id_riwayat_tindakan'),
								'id_obat' => $this->input->post('id_obat'),
								'dosis_aturan_obat' => $this->input->post('dosis_aturan_obat'),
								'jumlah_obat' => $this->input->post('jumlah_obat'),
								'keterangan' => $this->input->post('keterangan'),
								'tanggal_pemberian_resep' => $this->input->post('tanggal_pemberian_resep'),
							);
					
				
					$result = $this->m_pemberian_resep_obat->edit_pemberian_resep_obat($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('pemberian_resep_obat'));
					}
	}

	function hapus_pemberian_resep_obat(){
		$kode=$this->input->post('kode');
		$this->m_pemberian_resep_obat->hapus_pemberian_resep_obat($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('pemberian_resep_obat');
	}
}