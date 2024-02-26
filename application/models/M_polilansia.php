<?php
class M_polilansia extends CI_Model{

	function get_all_polilansia(){
		$hsl=$this->db->query("SELECT * FROM polilansia,pasien where polilansia.id_pasien=pasien.id_pasien");
		return $hsl;
	}


	function hapus_polilansia($kode){
		$hsl=$this->db->query("DELETE FROM polilansia where id_polilansia='$kode'");
		return $hsl;
	}

	public function add_polilansia($data){
			$this->db->insert('polilansia', $data);
			return true;
		}

		public function get_polilansia_by_id($id){
			$query = $this->db->get_where('polilansia', array('id_polilansia' => $id));
			return $result = $query->row_array();
		}

		public function edit_polilansia($data, $id){
			$this->db->where('id_polilansia', $id);
			$this->db->update('polilansia', $data);
			return true;
		}

}	