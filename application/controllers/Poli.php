<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_poli');
	}

	public function index()
	{
		$x['data_poli']=$this->m_poli->get_all_poli();
		$x['sidebar']="poli";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('poli/poli');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_poli']=$this->m_poli->get_all_poli();
		$this->load->view('poli/cetak',$x);
	}

		public function simpan_poli()
	{
				$data = array(
								'nama_poli' => $this->input->post('nama_poli'),
								'ruang_poli' => $this->input->post('ruang_poli'),
								'jam_mulai' => $this->input->post('jam_mulai'),
								'jam_selesai' => $this->input->post('jam_selesai'),
							);
				
					$result = $this->m_poli->add_poli($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('poli'));
					}
	}


	


		public function update_poli()
	{
		$id = $this->input->post('id_poli'); 
			

			$data = array(
								'nama_poli' => $this->input->post('nama_poli'),
								'ruang_poli' => $this->input->post('ruang_poli'),
								'jam_mulai' => $this->input->post('jam_mulai'),
								'jam_selesai' => $this->input->post('jam_selesai'),
							);
					
				
					$result = $this->m_poli->edit_poli($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('poli'));
					}
	}

	function hapus_poli(){
		$kode=$this->input->post('kode');
		$this->m_poli->hapus_poli($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('poli');
	}
}