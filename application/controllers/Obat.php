<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_obat');
	}

	public function index()
	{
		$x['data_obat']=$this->m_obat->get_all_obat();
		$x['sidebar']="obat";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('obat/obat');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_obat']=$this->m_obat->get_all_obat();
		$this->load->view('obat/cetak',$x);
	}

		public function simpan_obat()
	{
				$data = array(
								'kode_obat' => $this->input->post('kode_obat'),
								'nama_obat' => $this->input->post('nama_obat'),
								'jenis_obat' => $this->input->post('jenis_obat'),
								'satuan' => $this->input->post('satuan'),
								'stok' => $this->input->post('stok'),
							);
				
					$result = $this->m_obat->add_obat($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('obat'));
					}
	}


	


		public function update_obat()
	{
		$id = $this->input->post('id_obat'); 
			

			$data = array(
								'kode_obat' => $this->input->post('kode_obat'),
								'nama_obat' => $this->input->post('nama_obat'),
								'jenis_obat' => $this->input->post('jenis_obat'),
								'satuan' => $this->input->post('satuan'),
								'stok' => $this->input->post('stok'),
							);
					
				
					$result = $this->m_obat->edit_obat($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('obat'));
					}
	}

	function hapus_obat(){
		$kode=$this->input->post('kode');
		$this->m_obat->hapus_obat($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('obat');
	}

	public function lihat()
	{
		$x['data_obat']=$this->m_obat->get_all_obat();
		$x['sidebar']="obat1";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('obat/lihat');
		$this->load->view('footer');
	}

}