<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosa extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_diagnosa');
	}

	public function index()
	{
		$x['data_diagnosa']=$this->m_diagnosa->get_all_diagnosa();
		$x['sidebar']="diagnosa";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('diagnosa/diagnosa');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_diagnosa']=$this->m_diagnosa->get_all_diagnosa();
		$this->load->view('diagnosa/cetak',$x);
	}

		public function simpan_diagnosa()
	{
				$data = array(
								'kode_diagnosa' => $this->input->post('kode_diagnosa'),
								'nama_penyakit' => $this->input->post('nama_penyakit'),
								'ciri_ciri_penyakit' => $this->input->post('ciri_ciri_penyakit'),
								'keterangan' => $this->input->post('keterangan'),
								'ciri_ciri_umum' => $this->input->post('ciri_ciri_umum'),
							);
				
					$result = $this->m_diagnosa->add_diagnosa($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('diagnosa'));
					}
	}


	


		public function update_diagnosa()
	{
		$id = $this->input->post('id_diagnosa'); 
			

			$data = array(
								'kode_diagnosa' => $this->input->post('kode_diagnosa'),
								'nama_penyakit' => $this->input->post('nama_penyakit'),
								'ciri_ciri_penyakit' => $this->input->post('ciri_ciri_penyakit'),
								'keterangan' => $this->input->post('keterangan'),
								'ciri_ciri_umum' => $this->input->post('ciri_ciri_umum'),
							);
					
				
					$result = $this->m_diagnosa->edit_diagnosa($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('diagnosa'));
					}
	}

	function hapus_diagnosa(){
		$kode=$this->input->post('kode');
		$this->m_diagnosa->hapus_diagnosa($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('diagnosa');
	}
}