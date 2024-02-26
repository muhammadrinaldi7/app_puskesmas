<?php
class M_riwayat_tindakan extends CI_Model{

	function get_all_riwayat_tindakan(){
		$hsl=$this->db->query("SELECT * FROM pendaftaran,pasien,dokter,poli,riwayat_tindakan,diagnosa where pendaftaran.id_dokter=dokter.id_dokter AND pendaftaran.id_poli=poli.id_poli AND pendaftaran.id_pasien=pasien.id_pasien AND riwayat_tindakan.id_pendaftaran=pendaftaran.id_pendaftaran AND riwayat_tindakan.id_diagnosa=diagnosa.id_diagnosa ");
		return $hsl;
	}


	function hapus_riwayat_tindakan($kode){
		$hsl=$this->db->query("DELETE FROM riwayat_tindakan where id_riwayat_tindakan='$kode'");
		return $hsl;
	}

	public function add_riwayat_tindakan($data){
			$this->db->insert('riwayat_tindakan', $data);
			return true;
		}

		public function get_riwayat_tindakan_by_id($id){
			$query = $this->db->get_where('riwayat_tindakan', array('id_riwayat_tindakan' => $id));
			return $result = $query->row_array();
		}

		public function edit_riwayat_tindakan($data, $id){
			$this->db->where('id_riwayat_tindakan', $id);
			$this->db->update('riwayat_tindakan', $data);
			return true;
		}

}	