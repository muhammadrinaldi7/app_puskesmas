<?php
class M_poligigi extends CI_Model{

	function get_all_poligigi(){
		$hsl=$this->db->query("SELECT * FROM poligigi,pasien where poligigi.id_pasien=pasien.id_pasien");
		return $hsl;
	}


	function hapus_poligigi($kode){
		$hsl=$this->db->query("DELETE FROM poligigi where id_poligigi='$kode'");
		return $hsl;
	}

	public function add_poligigi($data){
			$this->db->insert('poligigi', $data);
			return true;
		}

		public function get_poligigi_by_id($id){
			$query = $this->db->get_where('poligigi', array('id_poligigi' => $id));
			return $result = $query->row_array();
		}

		public function edit_poligigi($data, $id){
			$this->db->where('id_poligigi', $id);
			$this->db->update('poligigi', $data);
			return true;
		}

}	