<?php
class M_pemberian_resep_obat extends CI_Model{

	function get_all_pemberian_resep_obat(){
		$hsl=$this->db->query("SELECT * FROM pendaftaran,pasien,dokter,poli,riwayat_tindakan,diagnosa,pemberian_resep_obat,obat where pendaftaran.id_dokter=dokter.id_dokter AND pendaftaran.id_poli=poli.id_poli AND pendaftaran.id_pasien=pasien.id_pasien AND riwayat_tindakan.id_pendaftaran=pendaftaran.id_pendaftaran AND riwayat_tindakan.id_diagnosa=diagnosa.id_diagnosa AND pemberian_resep_obat.id_riwayat_tindakan=riwayat_tindakan.id_riwayat_tindakan AND pemberian_resep_obat.id_obat=obat.id_obat");
		return $hsl;
	}


	function hapus_pemberian_resep_obat($kode){
		$hsl=$this->db->query("DELETE FROM pemberian_resep_obat where id_pemberian_resep_obat='$kode'");
		return $hsl;
	}

	public function add_pemberian_resep_obat($data){
			$this->db->insert('pemberian_resep_obat', $data);
			return true;
		}

		public function get_pemberian_resep_obat_by_id($id){
			$query = $this->db->get_where('pemberian_resep_obat', array('id_pemberian_resep_obat' => $id));
			return $result = $query->row_array();
		}

		public function edit_pemberian_resep_obat($data, $id){
			$this->db->where('id_pemberian_resep_obat', $id);
			$this->db->update('pemberian_resep_obat', $data);
			return true;
		}

}	