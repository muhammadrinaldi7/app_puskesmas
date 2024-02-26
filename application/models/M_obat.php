<?php
class M_obat extends CI_Model{

	function get_all_obat(){
		$hsl=$this->db->query("SELECT * FROM obat");
		return $hsl;
	}


	function hapus_obat($kode){
		$hsl=$this->db->query("DELETE FROM obat where id_obat='$kode'");
		return $hsl;
	}

	public function add_obat($data){
			$this->db->insert('obat', $data);
			return true;
		}

		public function get_obat_by_id($id){
			$query = $this->db->get_where('obat', array('id_obat' => $id));
			return $result = $query->row_array();
		}

		public function edit_obat($data, $id){
			$this->db->where('id_obat', $id);
			$this->db->update('obat', $data);
			return true;
		}

}	