<?php

class Master_model extends CI_Model
{
    public function getmasterAgama(){
        $data = $this->db->get('master_agama');
		return $data;
    }
    public function getmasterAnak(){
        $data = $this->db->get('master_anak');
		return $data;
    }
    public function getmasterAsisten(){
        $data = $this->db->get('master_asisten');
		return $data;
    }
    public function getmasterBidang(){
        $data = $this->db->get('master_bidang');
		return $data;
    }
    public function getmasterCuti(){
        $data = $this->db->get('master_cuti');
		return $data;
    }
    public function getmasterDiklat(){
        $data = $this->db->get('master_diklat');
		return $data;
    }
    public function getmasterEselon(){
        $data = $this->db->get('master_eselon');
		return $data;
    }
    public function getmasterGolongan(){
        $data = $this->db->get('master_golongan');
		return $data;
    }
    public function getmasterHukuman(){
        $data = $this->db->get('master_hukuman');
		return $data;
    }
    public function getmasterJabatan(){
        $data = $this->db->get('master_jabatan');
		return $data;
    }
    public function getmasterJDiklat(){
        $data = $this->db->get('master_jenis_diklat');
		return $data;
    }
    public function getmasterJHukuman(){
        $data = $this->db->get('master_jenis_hukuman');
		return $data;
    }
    public function getmasterJJabatan(){
        $data = $this->db->get('master_jenis_jabatan');
		return $data;
    }
    public function getmasterJPegawai(){
        $data = $this->db->get('master_jenis_pegawai');
		return $data;
    }
    public function getmasterJgJabatan(){
        $data = $this->db->get('master_jenjang_jabatan');
		return $data;
    }
    public function getmasterJPendidikan(){
        $data = $this->db->get('master_jpendidikan');
		return $data;
    }
    public function getmasterKategoriJabatan(){
        $data = $this->db->get('master_kategori_jabatan');
		return $data;
    }
    public function getmasterKedudukan(){
        $data = $this->db->get('master_kedudukan');
		return $data;
    }
    public function getmasterKelamin(){
        $data = $this->db->get('master_kelamin');
		return $data;
    }
    public function getmasterKelompokJabatan(){
        $data = $this->db->get('master_kelompok_jabatan');
		return $data;
    }
    public function getmasterKepangkatan(){
        $data = $this->db->get('master_kepangkatan');
		return $data;
    }
    public function getmasterLevelJabatan(){
        $data = $this->db->get('master_level_jabatan');
		return $data;
    }
    public function getmasterOperator(){
        $data = $this->db->get('master_operator');
		return $data;
    }
    public function getmasterOrangtua(){
        $data = $this->db->get('master_orangtua');
		return $data;
    }
    public function getmasterOrganisasi(){
        $data = $this->db->get('master_organisasi');
		return $data;
    }
    public function getmasterPangkat(){
        $data = $this->db->get('master_pangkat');
		return $data;
    }
    public function getmasterPasangan(){
        $data = $this->db->get('master_pasangan');
		return $data;
    }
    public function getmasterPengadaan(){
        $data = $this->db->get('master_pengadaan');
        return $data;
    }
    public function getmasterSeminar(){
        $data = $this->db->get('master_seminar');
        return $data;
    }
    public function getmasterSkawin(){
        $data = $this->db->get('master_skawin');
        return $data;
    }
    public function getmasterStatus(){
        $data = $this->db->get('master_status');
        return $data;
    }
    public function getmasterStatuspns(){
        $data = $this->db->get('master_statuspns');
        return $data;
    }
    public function getmasterStatusdasar(){
        $data = $this->db->get('master_status_dasar');
        return $data;
    }
    public function getmasterStruktural(){
        $data = $this->db->get('master_struktural');
        return $data;
    }
    public function getmasterSubbidang(){
        $data = $this->db->get('master_subbidang');
        return $data;
    }
    public function getmasterSubjenisjabatan(){
        $data = $this->db->get('master_sub_jenis_jabatan');
        return $data;
    }
    public function getmasterTempatkerja(){
        $data = $this->db->get('master_tempatkerja');
        return $data;
    }
    public function getmasterTupoksi(){
        $data = $this->db->get('master_tupoksi');
        return $data;
    }
    public function getmasterUnitkerja(){
        $data = $this->db->get('master_unitkerja');
        return $data;
    }
		
}
