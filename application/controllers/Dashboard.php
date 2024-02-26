<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_data');
		$this->load->model('m_antrian');

		
	}

	public function index()
	{

		$x['sidebar']="Dashboard";
		$nik = $this->session->userdata('no_ktp');
		$x['cek'] = $this->db->query("SELECT status from pengguna WHERE no_ktp = '$nik';")->result();
		//ANTRIAN KIA
		$kia = $this->db->query("SELECT CASE WHEN ISNULL(MIN(no_antrian)) THEN 'Tidak Ada Antrian' ELSE MIN(no_antrian)END as antrianK,id_poli From antrian WHERE id_poli = 3")->row();
        $hasil = $kia->antrianK;
		$kia1 = $this->db->query("SELECT CASE WHEN ISNULL(MIN(no_antrian)) THEN 'Tidak Ada Antrian' ELSE MIN(no_antrian)END as antrianK,id_poli From antrian WHERE id_poli = 3 AND status='MENUNGGU DIPANGGIL'")->row();
        $hasilki = $kia1->antrianK;
        $urutan =(int)substr($hasil,1,3);
        $urutan++;
        $huruf = "K";
		$x['sekarang'] = $hasil;
		$x['sekarangki'] = $hasilki;
		$x['idpolikia'] = "3";
        $x['antrian'] = $huruf.sprintf("%03s",$urutan); 
		$x['antriankia'] = $this->db->query("SELECT MAX(no_antrian) antrian FROM antrian WHERE id_poli = '3';")->result();
		//GIGI
		$gigi = $this->db->query("SELECT CASE WHEN ISNULL(MIN(no_antrian)) THEN 'Tidak Ada Antrian' ELSE MIN(no_antrian)END as antrianG,id_poli From antrian WHERE id_poli = 1")->row();
        $hasil1 = $gigi->antrianG;
		$gigi1 = $this->db->query("SELECT CASE WHEN ISNULL(MIN(no_antrian)) THEN 'Tidak Ada Antrian' ELSE MIN(no_antrian)END as antrianG,id_poli From antrian WHERE id_poli = 1 AND status='MENUNGGU DIPANGGIL'")->row();
        $hasilgi = $gigi1->antrianG;
        $urutan =(int)substr($hasil1,1,3);
        $urutan++;
        $huruf1 = "G";
		$x['sekarang1'] = $hasil1;
		$x['sekaranggi'] = $hasilgi;
		$x['idpoligigi'] = "1";
        $x['antrian1'] = $huruf1.sprintf("%03s",$urutan);
		//umum
		$umum = $this->db->query("SELECT CASE WHEN ISNULL(MIN(no_antrian)) THEN 'Tidak Ada Antrian' ELSE MIN(no_antrian)END as antrianU,id_poli From antrian WHERE id_poli = 2")->row();
        $hasil2 = $umum->antrianU;
		$umum1 = $this->db->query("SELECT CASE WHEN ISNULL(MIN(no_antrian)) THEN 'Tidak Ada Antrian' ELSE MIN(no_antrian)END as antrianU,id_poli From antrian WHERE id_poli = 2 AND status='MENUNGGU DIPANGGIL'")->row();
        $hasilum = $umum1->antrianU;
        $urutan =(int)substr($hasil2,1,3);
        $urutan++;
        $huruf1 = "U";
		$x['sekarang2'] = $hasil2;
		$x['sekarangum'] = $hasilum;
		$x['idpoliumum'] = "2";
        $x['antrian2'] = $huruf1.sprintf("%03s",$urutan);
		//lansia
		$lansia = $this->db->query("SELECT CASE WHEN ISNULL(MIN(no_antrian)) THEN 'Tidak Ada Antrian' ELSE MIN(no_antrian)END as antrianL,id_poli From antrian WHERE id_poli = 4")->row();
        $hasil3 = $lansia->antrianL;
		$lansia1 = $this->db->query("SELECT CASE WHEN ISNULL(MIN(no_antrian)) THEN 'Tidak Ada Antrian' ELSE MIN(no_antrian)END as antrianL,id_poli From antrian WHERE id_poli = 4 AND status='MENUNGGU DIPANGGIL'")->row();
        $hasillan = $lansia1->antrianL;
        $urutan =(int)substr($hasil3,1,3);
        $urutan++;
        $huruf1 = "L";
		$x['sekarang3'] = $hasil3;
		$x['sekaranglan'] = $hasillan;
		$x['idpolilansia'] = "4";
        $x['antrian3'] = $huruf1.sprintf("%03s",$urutan);
		$this->load->view('header',$x);
		if($this->session->userdata('level') == 'Administrator'){
		$this->load->view('sidebar');
		}else{
		$this->load->view('sidebaruser');
		}
		$this->load->view('dashboard',$x);
		$this->load->view('footer');
	}
	public function tambahAntrian($no,$id,$idpoli){
		$data = array(
			'no_antrian' => $no,
			'id_pasien' => $id,
			'id_poli' => $idpoli,
			'status' => "MENUNGGU DIPANGGIL",
		);
		$result = $this->m_antrian->add_antrian($data);
		if($result){
			$this->session->set_flashdata('berhasil_ambil', 'Record is Added Successfully!');
			redirect(base_url('Dashboard'));
		}
	}
	public function updateAntrianKia($no){
		$data = array(
			'status' => "DIPANGGIL",
		);
		$result = $this->m_antrian->edit_antrian($data,$no);
		if($result){
			$this->session->set_flashdata('berhasil_panggil', 'Record is Added Successfully!');
			redirect(base_url('Dashboard'));
		}
	}

	public function resetantrian(){
        $this->m_antrian->hapus_antrian('antrian');
        $this->session->set_flashdata('hapus_antrian','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Antrian Berhasil Direset!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('Dashboard');
    }
	
}
