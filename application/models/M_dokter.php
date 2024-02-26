<?php
class M_dokter extends CI_Model{

	function get_all_dokter(){
		$hsl=$this->db->query("SELECT * FROM dokter,poli where dokter.id_poli=poli.id_poli");
		return $hsl;
	}


	function hapus_dokter($kode){
		$hsl=$this->db->query("DELETE FROM dokter where id_dokter='$kode'");
		return $hsl;
	}

	public function add_dokter($data){
			$this->db->insert('dokter', $data);
			return true;
		}

		public function get_dokter_by_id($id){
			$query = $this->db->get_where('dokter', array('id_dokter' => $id));
			return $result = $query->row_array();
		}

		public function edit_dokter($data, $id){
			$this->db->where('id_dokter', $id);
			$this->db->update('dokter', $data);
			return true;
		}

}	