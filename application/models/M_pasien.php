<?php
class M_pasien extends CI_Model{

	function get_all_pasien(){
		$hsl=$this->db->query("SELECT * FROM pasien");
		return $hsl;
	}


	function rm_pasien($id){
		$hsl=$this->db->query("SELECT * FROM pasien LEFT JOIN pendaftaran on pasien.id_pasien=pendaftaran.id_pasien 
		LEFT JOIN riwayat_tindakan on riwayat_tindakan.id_pendaftaran = pendaftaran.id_pendaftaran 
		LEFT JOIN pemberian_resep_obat on pemberian_resep_obat.id_riwayat_tindakan = riwayat_tindakan.id_riwayat_tindakan 
		LEFT JOIN obat on obat.id_obat = pemberian_resep_obat.id_obat 
		WHERE pasien.id_pasien = '$id';")->result();
		return $hsl;
	}

	function hapus_pasien($kode){
		$hsl=$this->db->query("DELETE FROM pasien where id_pasien='$kode'");
		return $hsl;
	}
	function hapus_pasien1($kode){
		$hsl=$this->db->query("DELETE FROM pasien where no_ktp='$kode'");
		return $hsl;
	}

	public function add_pasien($data){
			$this->db->insert('pasien', $data);
			return true;
		}

		public function get_pasien_by_id($id){
			$query = $this->db->get_where('pasien', array('id_pasien' => $id));
			return $result = $query->row_array();
		}

		public function edit_pasien($data, $id){
			$this->db->where('id_pasien', $id);
			$this->db->update('pasien', $data);
			return true;
		}

}	