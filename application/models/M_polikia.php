<?php
class M_polikia extends CI_Model{

	function get_all_polikia(){
		$hsl=$this->db->query("SELECT * FROM polikia,pasien where polikia.id_pasien=pasien.id_pasien");
		return $hsl;
	}


	function hapus_polikia($kode){
		$hsl=$this->db->query("DELETE FROM polikia where id_polikia='$kode'");
		return $hsl;
	}

	public function add_polikia($data){
			$this->db->insert('polikia', $data);
			return true;
		}

		public function get_polikia_by_id($id){
			$query = $this->db->get_where('polikia', array('id_polikia' => $id));
			return $result = $query->row_array();
		}

		public function edit_polikia($data, $id){
			$this->db->where('id_polikia', $id);
			$this->db->update('polikia', $data);
			return true;
		}

}	