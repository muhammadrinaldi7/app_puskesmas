<?php
class M_diagnosa extends CI_Model{

	function get_all_diagnosa(){
		$hsl=$this->db->query("SELECT * FROM diagnosa");
		return $hsl;
	}


	function hapus_diagnosa($kode){
		$hsl=$this->db->query("DELETE FROM diagnosa where id_diagnosa='$kode'");
		return $hsl;
	}

	public function add_diagnosa($data){
			$this->db->insert('diagnosa', $data);
			return true;
		}

		public function get_diagnosa_by_id($id){
			$query = $this->db->get_where('diagnosa', array('id_diagnosa' => $id));
			return $result = $query->row_array();
		}

		public function edit_diagnosa($data, $id){
			$this->db->where('id_diagnosa', $id);
			$this->db->update('diagnosa', $data);
			return true;
		}

}	