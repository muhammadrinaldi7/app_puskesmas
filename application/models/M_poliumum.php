<?php
class M_poliumum extends CI_Model{

	function get_all_poliumum(){
		$hsl=$this->db->query("SELECT * FROM poliumum,pasien where poliumum.id_pasien=pasien.id_pasien");
		return $hsl;
	}


	function hapus_poliumum($kode){
		$hsl=$this->db->query("DELETE FROM poliumum where id_poliumum='$kode'");
		return $hsl;
	}

	public function add_poliumum($data){
			$this->db->insert('poliumum', $data);
			return true;
		}

		public function get_poliumum_by_id($id){
			$query = $this->db->get_where('poliumum', array('id_poliumum' => $id));
			return $result = $query->row_array();
		}

		public function edit_poliumum($data, $id){
			$this->db->where('id_poliumum', $id);
			$this->db->update('poliumum', $data);
			return true;
		}

}	