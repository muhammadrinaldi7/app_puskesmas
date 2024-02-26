<?php
class M_pendaftaran extends CI_Model{

	function get_all_pendaftaran(){
		$hsl=$this->db->query("SELECT * FROM pendaftaran LEFT JOIN poli on poli.id_poli = pendaftaran.id_poli LEFT JOIN pasien on pendaftaran.id_pasien=pasien.id_pasien;");
		return $hsl;
	}


	function hapus_pendaftaran($kode){
		$hsl=$this->db->query("DELETE FROM pendaftaran where id_pendaftaran='$kode'");
		return $hsl;
	}

	public function add_pendaftaran($data){
			$this->db->insert('pendaftaran', $data);
			return true;
		}

		public function get_pendaftaran_by_id($id){
			$query = $this->db->get_where('pendaftaran', array('id_pendaftaran' => $id));
			return $result = $query->row_array();
		}

		public function edit_pendaftaran($data, $id){
			$this->db->where('id_pendaftaran', $id);
			$this->db->update('pendaftaran', $data);
			return true;
		}

}	