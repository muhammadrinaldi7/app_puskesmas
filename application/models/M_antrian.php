<?php
class M_antrian extends CI_Model{

	function get_all_antrian(){
		$hsl=$this->db->query("SELECT * FROM antrian");
		return $hsl;
	}


	function hapus_antrian(){
		$hsl=$this->db->query("DELETE FROM antrian");
		return $hsl;
	}

	public function add_antrian($data){
			$this->db->insert('antrian', $data);
			return true;
		}

		public function get_antrian_by_id($id){
			$query = $this->db->get_where('antrian', array('id_antrian' => $id));
			return $result = $query->row_array();
		}

		public function edit_antrian($data, $no){
			$this->db->where('no_antrian', $no);
			$this->db->update('antrian', $data);
			return true;
		}

}	