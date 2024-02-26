<?php
class M_poli extends CI_Model{

	function get_all_poli(){
		$hsl=$this->db->query("SELECT *,dokter.nama_dokter FROM `poli` LEFT Join dokter on dokter.id_poli = poli.id_poli;");
		return $hsl;
	}


	function hapus_poli($kode){
		$hsl=$this->db->query("DELETE FROM poli where id_poli='$kode'");
		return $hsl;
	}

	public function add_poli($data){
			$this->db->insert('poli', $data);
			return true;
		}

		public function get_poli_by_id($id){
			$query = $this->db->get_where('poli', array('id_poli' => $id));
			return $result = $query->row_array();
		}

		public function edit_poli($data, $id){
			$this->db->where('id_poli', $id);
			$this->db->update('poli', $data);
			return true;
		}

}	