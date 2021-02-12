<?php

class Validasi_model extends CI_Model
{
    private function _where()
    {
        $data['level'] = $this->session->userdata('level_id');
        $data['unitk'] = $this->session->userdata('skpd_id');
        return $data;
    }

    public function getmasterAgama(){
        $data = $this->db->get('master_agama');
        return $data;
    }

    public function getmasterUnitkerja(){
        $data = $this->db->get('master_unitkerja');
        return $data;
    }
    public function getmasterGolongan(){
        $data = $this->db->get('master_golongan');
        return $data;
    }

    public function getmasterSNikah(){
        $data = $this->db->get('master_skawin');
        return $data;
    }

    public function getmasterKelamin(){
        $data = $this->db->get('master_kelamin');
        return $data;
    }

    public function getmodDPribadi(){
        $this->db->from('mod_datapribadi dp');
        $this->db->join('master_agama ma','ma.id_agama = dp.agama', 'left');
        $this->db->join('master_skawin sk','sk.id_skawin = dp.skawin', 'left');
        $this->db->join('master_kelamin kl','kl.id_kelamin = dp.kelamin_id', 'left');
        $this->db->join('master_unitkerja mu','mu.id_unitkerja = dp.unitkerja_id', 'left');
        $data = $this->db->get();
        return $data;
    }

    public function getmodDPribadiTinjau(){
        $where = $this->_where();
        if($where['level']==1 || $where['level']==2 ):
            $this->db->where(array('validator_moddp'=>2));
            $this->db->from('mod_datapribadi_tinjauan dpt');
            $this->db->join('master_agama ma','ma.id_agama = dpt.agama', 'left');
            $this->db->join('master_skawin sk','sk.id_skawin = dpt.skawin', 'left');
            $this->db->join('master_kelamin kl','kl.id_kelamin = dpt.kelamin_id', 'left');
            $this->db->join('master_unitkerja mu','mu.id_unitkerja = dpt.unitkerja_id', 'left');
            $data = $this->db->get();
        else:
            $this->db->where(array('unitkerja_id'=>$where['unitk'],'validator_moddp'=>1 ));
            $this->db->from('mod_datapribadi_tinjauan dpt');
            $this->db->join('master_agama ma','ma.id_agama = dpt.agama', 'left');
            $this->db->join('master_skawin sk','sk.id_skawin = dpt.skawin', 'left');
            $this->db->join('master_kelamin kl','kl.id_kelamin = dpt.kelamin_id', 'left');
            $this->db->join('master_unitkerja mu','mu.id_unitkerja = dpt.unitkerja_id', 'left');
            $data = $this->db->get();
        endif;
        return $data;
    }

    public function getmodIdentitas(){
        $this->db->from('mod_identitas idp');
        $this->db->join('master_jenis_pegawai jp','jp.id_jenis_pegawai = idp.jenis_pegawai_id', 'left');
        $this->db->join('master_kedudukan kd','kd.id_kedudukan = idp.kedudukan_id', 'left');
        $this->db->join('master_unitkerja mu','mu.id_unitkerja = idp.unitkerja_id', 'left');
        $data = $this->db->get();
        return $data;
    }

    public function getmodIdentitasTinjau(){
        $where = $this->_where();
        if($where['level']==1 || $where['level']==2 ):
            $this->db->where(array('validator_modidpt'=>2));
            $this->db->from('mod_identitas_tinjauan idpt');
            $this->db->join('master_jenis_pegawai jp','jp.id_jenis_pegawai = idpt.jenis_pegawai_id', 'left');
            $this->db->join('master_kedudukan kd','kd.id_kedudukan = idpt.kedudukan_id', 'left');
            $this->db->join('master_unitkerja mu','mu.id_unitkerja = idpt.unitkerja_id', 'left');
            $data = $this->db->get();
        else:
            $this->db->where(array('unitkerja_id'=>$where['unitk'], 'validator_modidpt'=>1));
            $this->db->from('mod_identitas_tinjauan idpt');
            $this->db->join('master_jenis_pegawai jp','jp.id_jenis_pegawai = idpt.jenis_pegawai_id', 'left');
            $this->db->join('master_kedudukan kd','kd.id_kedudukan = idpt.kedudukan_id', 'left');
            $this->db->join('master_unitkerja mu','mu.id_unitkerja = idpt.unitkerja_id', 'left');
            $data = $this->db->get();
        endif;
        return $data;
    }

    public function getmodFisik(){
        $data = $this->db->get('mod_fisik');
        return $data;
    }

    public function getmodFisikTinjau(){
        $where = $this->_where();
        if($where['level']==1 || $where['level']==2 ):
            $this->db->where(array('validator_modmft'=>2));
            $data = $this->db->get('mod_fisik_tinjauan');
        else:
            $this->db->where(array('unitkerja_id'=>$where['unitk'], 'validator_modmft'=>1));
            $data = $this->db->get('mod_fisik_tinjauan');
        endif;
        return $data;
    }

    public function getmodCpns(){
        $this->db->from('mod_cpns cpn');
        $this->db->join('master_golongan mg','mg.id_golongan = cpn.golongan_id', 'left');
        $this->db->join('master_pengadaan mp','mp.id_pengadaan = cpn.pengadaan_id', 'left');
        $this->db->join('master_unitkerja mu','mu.id_unitkerja = cpn.unitkerja_id', 'left');
        $data = $this->db->get();
        return $data;
    }

    public function getmodCpnsTinjau(){
        $where = $this->_where();
        if($where['level']==1 || $where['level']==2 ):
            $this->db->where(array('validator_modcpns'=>2));
            $this->db->from('mod_cpns_tinjauan moc');
            $this->db->join('master_golongan mg','mg.id_golongan = moc.golongan_id', 'left');
            $this->db->join('master_pengadaan mp','mp.id_pengadaan = moc.pengadaan_id', 'left');
            $this->db->join('master_unitkerja mu','mu.id_unitkerja = moc.unitkerja_id', 'left');
        else:
            $this->db->where(array('unitkerja_id'=>$where['unitk'], 'validator_modcpns'=>1));
            $this->db->from('mod_cpns_tinjauan moc');
            $this->db->join('master_golongan mg','mg.id_golongan = moc.golongan_id', 'left');
            $this->db->join('master_pengadaan mp','mp.id_pengadaan = moc.pengadaan_id', 'left');
            $this->db->join('master_unitkerja mu','mu.id_unitkerja = moc.unitkerja_id', 'left');
        endif;
        $data = $this->db->get();
        return $data;
    }

    public function getmodPns(){
        $this->db->from('mod_pns mpn');
        $this->db->join('master_golongan mg','mg.id_golongan = mpn.golongan_id', 'left');
        $this->db->join('master_unitkerja mu','mu.id_unitkerja = mpn.unitkerja_id', 'left');
        $data = $this->db->get();
        return $data;
    }

    public function getmodPnsTinjau(){
        $where = $this->_where();
        if($where['level']==1 || $where['level']==2 ):
            $this->db->where(array('validator_modpns'=>2));
        else:
            $this->db->where(array('unitkerja_id'=>$where['unitk'],'validator_modpns'=>1));
        endif;
        $this->db->from('mod_pns_tinjauan mpnt');
        $this->db->join('master_golongan mg','mg.id_golongan = mpnt.golongan_id', 'left');
        $this->db->join('master_unitkerja mu','mu.id_unitkerja = mpnt.unitkerja_id', 'left');
        $data = $this->db->get();
        return $data;
    }

    public function getmodJabatan(){
        $where = $this->_where();
        if($where['level']==1 || $where['level']==2 ):
            $this->db->where(array('validator_modjabatan'=>2));
        else:
            $this->db->where(array('unitkerja_id'=>$where['unitk'], 'validator_modjabatan'=>1));
        endif;
        $this->db->from('mod_jabatan moj');
        $this->db->join('master_jabatan mj','mj.id_jabatan = moj.jabatan_id', 'left');
        $this->db->join('master_jenis_jabatan mjj','mjj.id_jenis_jabatan = moj.jenis_jabatan_id', 'left');
        $this->db->join('master_jenjang_jabatan mjb','mjb.id_jenjang_jabatan = moj.jenjab_id', 'left');
        $this->db->join('master_eselon me','me.id_eselon = moj.eselon_id', 'left');
        $this->db->join('master_unitkerja mu','mu.id_unitkerja = moj.unitkerja_id', 'left');
        $data = $this->db->get();
        return $data;
    }

    public function getmodPangkat(){
        $where = $this->_where();
        if($where['level']==1 || $where['level']==2 ):
            $this->db->where(array('validator_modpangkat'=>2));
            $this->db->from('mod_pangkat mop');
            $this->db->join('master_kepangkatan mk','mk.id_kepangkatan = mop.kepangkatan_id', 'left');
            $this->db->join('master_golongan mg','mg.id_golongan = mop.golongan_id', 'left');
        else:
            $this->db->where(array('unitkerja_id'=>$where['unitk'], 'validator_modpangkat'=>1));
            $this->db->from('mod_pangkat mop');
            $this->db->join('master_kepangkatan mk','mk.id_kepangkatan = mop.kepangkatan_id', 'left');
            $this->db->join('master_golongan mg','mg.id_golongan = mop.golongan_id', 'left');
        endif;
        $data = $this->db->get();
        return $data;
    }

    public function getmodPendidikan(){
        $where = $this->_where();
        if($where['level']==1 || $where['level']==2 ):
            $this->db->where(array('validator_modpendidikan'=>2));
            $this->db->from('mod_pendidikan moe');
            $this->db->join('master_jpendidikan mj','mj.id_jpendidikan = moe.jpendidikan_id', 'left');
        else:
            $this->db->where(array('unitkerja_id'=>$where['unitk'], 'validator_modpendidikan'=>1));
            $this->db->from('mod_pendidikan moe');
            $this->db->join('master_jpendidikan mj','mj.id_jpendidikan = moe.jpendidikan_id', 'left');
        endif;
        $data = $this->db->get();
        return $data;
    }

    public function getmodDiklat(){
        $where = $this->_where();
        if($where['level']==1 || $where['level']==2 ):
            $this->db->select('mdi.*, md.nm_diklat diklat, mj.jenis_diklat');
            $this->db->where(array('validator_moddiklat'=>2));
            $this->db->from('mod_diklat mdi');
            $this->db->join('master_diklat md','md.id_diklat = mdi.diklat_id', 'left');
            $this->db->join('master_jenis_diklat mj','mj.id_jenis_diklat = mdi.jenisdiklat_id', 'left');
        else:
            $this->db->select('mdi.*, md.nm_diklat diklat, mj.jenis_diklat');
            $this->db->where(array('unitkerja_id'=>$where['unitk'], 'validator_moddiklat'=>1));
            $this->db->from('mod_diklat mdi');
            $this->db->join('master_diklat md','md.id_diklat = mdi.diklat_id', 'left');
            $this->db->join('master_jenis_diklat mj','mj.id_jenis_diklat = mdi.jenisdiklat_id', 'left');
        endif;
        $data = $this->db->get();
        return $data;
    }

    public function getmodSeminar(){
        $where = $this->_where();
        if($where['level']==1 || $where['level']==2 ):
            $this->db->select('mos.*, ms.nm_peranan');
            $this->db->where(array('validator_modseminar'=>2));
            $this->db->from('mod_seminar mos');
            $this->db->join('master_seminar ms','ms.id_peranan = mos.peranan_id', 'left');
        else:
            $this->db->select('mos.*, ms.nm_peranan');
            $this->db->where(array('unitkerja_id'=>$where['unitk'], 'validator_modseminar'=>1));
            $this->db->from('mod_seminar mos');
            $this->db->join('master_seminar ms','ms.id_peranan = mos.peranan_id', 'left');
        endif;
        $data = $this->db->get();
        return $data;
    }

    public function getmodHukuman(){
        $where = $this->_where();
        if($where['level']==1 || $where['level']==2 ):
            $this->db->select('moh.*, mh.nm_hukuman, mjh.jenis_hukuman');
            $this->db->where(array('validator_modhukuman'=>2));
            $this->db->from('mod_hukuman moh');
            $this->db->join('master_hukuman mh','mh.id_hukuman = moh.hukuman_id', 'left');
            $this->db->join('master_jenis_hukuman mjh','mjh.id_jenis_hukuman = moh.jhukuman_id', 'left');
        else:
            $this->db->select('moh.*, mh.nm_hukuman, mjh.jenis_hukuman');
            $this->db->where(array('unitkerja_id'=>$where['unitk'], 'validator_modhukuman'=>1));
            $this->db->from('mod_hukuman moh');
            $this->db->join('master_hukuman mh','mh.id_hukuman = moh.hukuman_id', 'left');
            $this->db->join('master_jenis_hukuman mjh','mjh.id_jenis_hukuman = moh.jhukuman_id', 'left');
        endif;
        $data = $this->db->get();
        return $data;
    }

    public function getmodKgb(){
        $where = $this->_where();
        if($where['level']==1 || $where['level']==2 ):
            $this->db->select('kgb.*, mg.golongan, mu.nm_unitkerja');
            $this->db->where(array('validator_modkgb'=>2));
            $this->db->from('mod_kgb kgb');
            $this->db->join('master_golongan mg','mg.id_golongan =kgb.golongan_id', 'left');
            $this->db->join('master_unitkerja mu','mu.id_unitkerja =kgb.unitkerja_id', 'left');
        else:
            $this->db->select('kgb.*, mg.golongan, mu.nm_unitkerja');
            $this->db->where(array('unitkerja_id'=>$where['unitk'], 'validator_modkgb'=>1));
            $this->db->from('mod_kgb kgb');
            $this->db->join('master_golongan mg','mg.id_golongan =kgb.golongan_id', 'left');
            $this->db->join('master_unitkerja mu','mu.id_unitkerja =kgb.unitkerja_id', 'left');
        endif;
        $data = $this->db->get();
        return $data;
    }

    public function getmodKredit(){
        $where = $this->_where();
        if($where['level']==1 || $where['level']==2 ):
            $this->db->where(array('validator_modkredit'=>2));
            $this->db->from('mod_kredit mkr');
            $this->db->join('master_jabatan mks','mks.id_jabatan = mkr.jabatan_id', 'left');
        else:
            $this->db->where(array('unitkerja_id'=>$where['unitk'], 'validator_modkredit'=>1));
            $this->db->from('mod_kredit mkr');
            $this->db->join('master_jabatan mks','mks.id_jabatan = mkr.jabatan_id', 'left');
        endif;
        $data = $this->db->get();
        return $data;
    }

    public function getmodPenghargaan(){
        $where = $this->_where();
        if($where['level']==1 || $where['level']==2 ):
            $this->db->where(array('validator_modtandajasa'=>2));
        else:
            $this->db->where(array('unitkerja_id'=>$where['unitk'], 'validator_modtandajasa'=>1));
        endif;
        $data = $this->db->get('mod_tandajasa');
        return $data;
    }

    public function getmodOrangtua(){
        $where = $this->_where();
        if($where['level']==1 || $where['level']==2 ):
            $this->db->where(array('validator_modorangtua'=>2));
        else:
            $this->db->where(array('unitkerja_id'=>$where['unitk'], 'validator_modorangtua'=>1));
        endif;
        $this->db->from('mod_orangtua mao');
        $this->db->join('master_orangtua mo','mo.id_orangtua = mao.orangtua_id', 'left');
        $this->db->join('master_status_dasar ms','ms.id_status_dasar = mao.status_dasar_id', 'left');
        $data = $this->db->get();
        return $data;
    }
    
    public function getmodPasangan(){
        $where = $this->_where();
        if($where['level']==1 || $where['level']==2 ):
            $this->db->where(array('validator_modpasangan'=>2));
        else:
            $this->db->where(array('unitkerja_id'=>$where['unitk'], 'validator_modpasangan'=>1));
        endif;
        $this->db->from('mod_pasangan mps');
        $this->db->join('master_pasangan mr','mr.id_pasangan = mps.pasangan_id', 'left');
        $this->db->join('master_status_dasar ms','ms.id_status_dasar = mps.status_dasar_id', 'left');
        $data = $this->db->get();
        return $data;
    }
    
    public function getmodAnak(){
        $where = $this->_where();
        if($where['level']==1 || $where['level']==2 ):
            $this->db->where(array('validator_modanak'=>2));
        else:
            $this->db->where(array('unitkerja_id'=>$where['unitk'], 'validator_modanak'=>1));
        endif;
        $this->db->from('mod_anak mda');
        $this->db->join('master_anak ma','ma.id_anak = mda.anak_id', 'left');
        $this->db->join('master_kelamin kl','kl.id_kelamin = mda.kelamin_id', 'left');
        $data = $this->db->get();
        return $data;
    }

    public function getmodCuti(){
        $where = $this->_where();
        if($where['level']==1 || $where['level']==2 ):
            $this->db->where(array('validator_modcuti'=>2));
        else:
            $this->db->where(array('unitkerja_id'=>$where['unitk'], 'validator_modcuti'=>1));
        endif;
        $this->db->from('mod_cuti moc');
        $this->db->join('master_cuti mc','mc.id_cuti = moc.cuti_id', 'left');
        $data = $this->db->get();
        return $data;
    }

    public function getviewAsn(){
        $data = $this->db->get('view_asn');
        return $data;
    }

    public function getmodulValidasi()
    {
        $this->db->select('*');
        $this->db->from('mod_datapribadi_tinjauan dpr');
        $this->db->join('mod_identitas_tinjauan idn', 'idn.nip = dpr.nip', 'left');
        $this->db->join('mod_fisik_tinjauan fis', 'fis.nip = dpr.nip', 'left');
        $this->db->join('mod_cpns_tinjauan cpns', 'cpns.nip = dpr.nip', 'left');
        $this->db->join('mod_pns_tinjauan pns', 'pns.nip = dpr.nip', 'left');
        $this->db->join('mod_jabatan jbt', 'jbt.nip = dpr.nip', 'left');
        $this->db->join('mod_pangkat pkt', 'pkt.nip = dpr.nip', 'left');
        $this->db->join('mod_pendidikan pdk', 'pdk.nip = dpr.nip', 'left');
        $this->db->join('mod_diklat dkl', 'dkl.nip = dpr.nip', 'left');
        $this->db->join('mod_seminar smr', 'smr.nip = dpr.nip', 'left');
        $this->db->join('mod_hukuman huk', 'huk.nip = dpr.nip', 'left');
        $this->db->join('mod_kgb kgb', 'kgb.nip = dpr.nip', 'left');
        $this->db->join('mod_tandajasa tdj', 'tdj.nip = dpr.nip', 'left');
        $this->db->join('mod_orangtua ort', 'ort.nip = dpr.nip', 'left');
        $this->db->join('mod_pasangan psg', 'psg.nip = dpr.nip', 'left');
        $this->db->join('mod_anak ank', 'ank.nip = dpr.nip', 'left');
        $this->db->join('mod_cuti cut', 'cut.nip = dpr.nip', 'left');
        $data = $this->db->get();
        return $data;

    }

    public function updateValidasiOPDdp($aksi, $post, $nip, $lvladmin)
    {
        if($aksi=='tidak_valid'):
            $data['status_validasi_moddp'] = 0;
            $data['ket_validasi_moddp'] = $post['alasan_notvalid_dpt'];
            $data = $this->security->xss_clean($data);
            $data_update = $this->db->where('nip', $nip)->update('mod_datapribadi_tinjauan', $data);
        endif;
        if($aksi=='valid'):
            if($lvladmin==2):
                //Hapus datapribadi tinjauan
                $dp = $this->db->where('nip', $nip)->get('mod_datapribadi_tinjauan')->row_array();
                if(!empty($dp['nip_lama']) && $dp['nip_lama']!=''){$data['nip_lama'] = $dp['nip_lama'];}
                if(!empty($dp['unitkerja_id']) && $dp['unitkerja_id']!=''){$data['unitkerja_id'] = $dp['unitkerja_id'];}
                if(!empty($dp['nama']) && $dp['nama']!=''){$data['nama'] = $dp['nama'];}
                if(!empty($dp['gelardepan']) && $dp['gelardepan']!=''){$data['gelardepan'] = $dp['gelardepan'];}
                if(!empty($dp['gelarbelakang']) && $dp['gelarbelakang']!=''){$data['gelarbelakang'] = $dp['gelarbelakang'];}
                if(!empty($dp['tempatlahir']) && $dp['tempatlahir']!=''){$data['tempatlahir'] = $dp['tempatlahir'];}
                if(!empty($dp['tanggallahir']) && $dp['tanggallahir']!=''){ $data['tanggallahir'] = $dp['tanggallahir'];}
                if(!empty($dp['alamat']) && $dp['alamat']!=''){$data['alamat'] = $dp['alamat'];}
                if(!empty($dp['kodepos']) && $dp['kodepos']!=''){$data['kodepos'] = $dp['kodepos'];}
                if(!empty($dp['email']) && $dp['email']!=''){$data['email'] = $dp['email'];}
                if(!empty($dp['notlpx']) && $dp['notlpx']!=''){$data['notlpx'] = $dp['notlpx'];}
                if(!empty($dp['nohp']) && $dp['nohp']!=''){$data['nohp'] = $dp['nohp'];}
                if(!empty($dp['agama']) && $dp['agama']!=''){$data['agama'] = $dp['agama'];}
                if(!empty($dp['kelamin_id']) && $dp['kelamin_id']!=''){$data['kelamin_id'] = $dp['kelamin_id'];}
                if(!empty($dp['skawin']) && $dp['skawin']!=''){$data['skawin'] = $dp['skawin'];}
                if(!empty($dp['file_ktp']) && $dp['file_ktp']!=''){$data['file_ktp'] = $dp['file_ktp'];}
                if(!empty($dp['foto']) && $dp['foto']!=''){$data['foto'] = $dp['foto'];}
                if(!empty($dp['keterangan']) && $dp['keterangan']!=''){$data['keterangan'] = $dp['keterangan'];}
                $data['update'] = date('Y-m-d H:i:s');
                $data['status_validasi_moddp'] = 1;
                $data = $this->security->xss_clean($data);
                $data_update = $this->db->where('nip', $nip)->update('mod_datapribadi', $data);

                //Hapus datapribadi tinjauan
                $this->db->where('nip', $nip)->delete('mod_datapribadi_tinjauan');
            else:
                $data['validator_moddp'] = 2;
                $data = $this->security->xss_clean($data);
                $data_update = $this->db->where('nip', $nip)->update('mod_datapribadi_tinjauan', $data);
            endif;
        endif;
        return $data_update;
    }
    
    public function updateValidasiOPDid($aksi, $post, $nip, $lvladmin)
    {
        if($aksi=='tidak_valid'):
            $data['status_validasi_modidpt'] = 0;
            $data['ket_validasi_modidpt'] = $post['alasan_notvalid_idpt'];
            $data = $this->security->xss_clean($data);
            $data_update = $this->db->where('nip', $nip)->update('mod_identitas_tinjauan', $data);
        endif;
        if($aksi=='valid'):
            if($lvladmin==2):
                //Hapus identitas tinjauan
                $idn = $this->db->where('nip', $nip)->get('mod_identitas_tinjauan')->row_array();

                if(!empty($idn['kedudukan_id']) && $idn['kedudukan_id']!=''){$data['kedudukan_id'] = $idn['kedudukan_id'];}
                if(!empty($idn['status_pegawai']) && $idn['status_pegawai']!=''){
                    $data['status_pegawai'] = $idn['status_pegawai'];
                    if($idn['status_pegawai']==2)
                    {
                        if(!empty($idn['no_statuspns']) && $idn['no_statuspns']!=''){$data['no_statuspns'] = $idn['no_statuspns'];}
                        if(!empty($idn['tglsk_statuspns']) && $idn['tglsk_statuspns']!=''){$data['tglsk_statuspns'] = $idn['tglsk_statuspns'];}
                        if(!empty($idn['tmt_statuspns']) && $idn['tmt_statuspns']!=''){$data['tmt_statuspns'] = $idn['tmt_statuspns'];}
                        if(!empty($idn['file_sk_pnsnonaktif']) && $idn['file_sk_pnsnonaktif']!=''){$data['file_sk_pnsnonaktif'] = $idn['file_sk_pnsnonaktif'];}
                    }else{
                        $data['no_statuspns'] = null;
                        $data['tglsk_statuspns'] = null;
                        $data['tmt_statuspns'] = null;
                        $data['file_sk_pnsnonaktif'] = null;
                    }
                }
                if(!empty($idn['unitkerja_id']) && $idn['unitkerja_id']!=''){$data['unitkerja_id'] = $idn['unitkerja_id'];}
                if(!empty($idn['jenis_pegawai_id']) && $idn['jenis_pegawai_id']!=''){$data['jenis_pegawai_id'] = $idn['jenis_pegawai_id'];}
                if(!empty($idn['no_statuspns']) && $idn['no_statuspns']!=''){$data['no_statuspns'] = $idn['no_statuspns'];}
                if(!empty($idn['tglsk_statuspns']) && $idn['tglsk_statuspns']!=''){$data['tglsk_statuspns'] = $idn['tglsk_statuspns'];}
                if(!empty($idn['file_sk_pnsnonaktif']) && $idn['file_sk_pnsnonaktif']!=''){$data['file_sk_pnsnonaktif'] = $idn['file_sk_pnsnonaktif'];}
                if(!empty($idn['tmt_statuspns']) && $idn['tmt_statuspns']!=''){ $data['tmt_statuspns'] = $idn['tmt_statuspns'];}
                if(!empty($idn['nokarpeg']) && $idn['nokarpeg']!=''){$data['nokarpeg'] = $idn['nokarpeg'];}
                if(!empty($idn['file_karpeg']) && $idn['file_karpeg']!=''){$data['file_karpeg'] = $idn['file_karpeg'];}
                if(!empty($idn['noarsip']) && $idn['noarsip']!=''){$data['noarsip'] = $idn['noarsip'];}
                if(!empty($idn['noaskes']) && $idn['noaskes']!=''){$data['noaskes'] = $idn['noaskes'];}
                if(!empty($idn['noktp']) && $idn['noktp']!=''){$data['noktp'] = $idn['noktp'];}
                if(!empty($idn['file_ktp']) && $idn['file_ktp']!=''){$data['file_ktp'] = $idn['file_ktp'];}
                if(!empty($idn['notaspen']) && $idn['notaspen']!=''){$data['notaspen'] = $idn['notaspen'];}
                if(!empty($idn['file_taspen']) && $idn['file_taspen']!=''){$data['file_taspen'] = $idn['file_taspen'];}
                if(!empty($idn['nonpwp']) && $idn['nonpwp']!=''){$data['nonpwp'] = $idn['nonpwp'];}
                if(!empty($idn['file_npwp']) && $idn['file_npwp']!=''){$data['file_npwp'] = $idn['file_npwp'];}
                if(!empty($idn['nokariskarsu']) && $idn['nokariskarsu']!=''){$data['nokariskarsu'] = $idn['nokariskarsu'];}
                if(!empty($idn['file_kariskarsu']) && $idn['file_kariskarsu']!=''){$data['file_kariskarsu'] = $idn['file_kariskarsu'];}
                if(!empty($idn['nonuptk']) && $idn['nonuptk']!=''){$data['nonuptk'] = $idn['nonuptk'];}
                if(!empty($idn['file_nuptk']) && $idn['file_nuptk']!=''){$data['file_nuptk'] = $idn['file_nuptk'];}
                if(!empty($idn['noregguru']) && $idn['noregguru']!=''){$data['noregguru'] = $idn['noregguru'];}
                if(!empty($idn['nobpjs']) && $idn['nobpjs']!=''){$data['nobpjs'] = $idn['nobpjs'];}
                if(!empty($idn['file_bpjs']) && $idn['file_bpjs']!=''){$data['file_bpjs'] = $idn['file_bpjs'];}
                if(!empty($idn['kepemilikan_kpe']) && $idn['kepemilikan_kpe']!=''){$data['kepemilikan_kpe'] = $idn['kepemilikan_kpe'];}
                if(!empty($idn['file_kpe']) && $idn['file_kpe']!=''){$data['file_kpe'] = $idn['file_kpe'];}
                if(!empty($idn['bapetarum']) && $idn['bapetarum']!=''){$data['bapetarum'] = $idn['bapetarum'];}
                if(!empty($idn['status_sertifikasi']) && $idn['status_sertifikasi']!=''){$data['status_sertifikasi'] = $idn['status_sertifikasi'];}
                if(!empty($idn['file_sertifikasi']) && $idn['file_sertifikasi']!=''){$data['file_sertifikasi'] = $idn['file_sertifikasi'];}
                if(!empty($idn['file_sertifikasi']) && $idn['file_sertifikasi']!=''){$data['file_sertifikasi'] = $idn['file_sertifikasi'];}
                $data['update'] = date('Y-m-d H:i:s');
                $data['status_validasi_modidp'] = 1;
                $data = $this->security->xss_clean($data);
                $data_update = $this->db->where('nip', $nip)->update('mod_identitas', $data);

                //Hapus identitas tinjauan
                $this->db->where('nip', $nip)->delete('mod_identitas_tinjauan');
                
            else:
                $data['validator_modidpt'] = 2;
                $data = $this->security->xss_clean($data);
                $data_update = $this->db->where('nip', $nip)->update('mod_identitas_tinjauan', $data);
            endif;
        endif;
        return $data_update;
    }

    public function updateValidasiOPDmf($aksi, $post, $nip, $lvladmin)
    {
        if($aksi=='tidak_valid'):
            $data['status_validasi_modmft'] = 0;
            $data['ket_validasi_modmft'] = $post['alasan_notvalid_mft'];
            $data = $this->security->xss_clean($data);
            $data_update = $this->db->where('nip', $nip)->update('mod_fisik_tinjauan', $data);
        endif;
        if($aksi=='valid'):
            if($lvladmin==2):
                $mf = $this->db->where('nip', $nip)->get('mod_fisik_tinjauan')->row_array();

                if(!empty($mf['goldarah']) && $mf['goldarah']!=''){$data['goldarah'] = $mf['goldarah'];}
                if(!empty($mf['tinggi']) && $mf['tinggi']!=''){$data['tinggi'] = $mf['tinggi'];}
                if(!empty($mf['berat']) && $mf['berat']!=''){$data['berat'] = $mf['berat'];}
                if(!empty($mf['cacat']) && $mf['cacat']!=''){$data['cacat'] = $mf['cacat'];}
                if(!empty($mf['nosepatu']) && $mf['nosepatu']!=''){$data['nosepatu'] = $mf['nosepatu'];}
                if(!empty($mf['nobaju']) && $mf['nobaju']!=''){$data['nobaju'] = $mf['nobaju'];}
                if(!empty($mf['kondisi_fisik']) && $mf['kondisi_fisik']!=''){$data['kondisi_fisik'] = $mf['kondisi_fisik'];}
                $data['last_update_mf'] = date('Y-m-d H:i:s');
                $data['status_validasi_modmf'] = 1;
                $data = $this->security->xss_clean($data);
                $data_update = $this->db->where('nip', $nip)->update('mod_fisik', $data);
                //Hapus fisik tinjauan
                $this->db->where('nip', $nip)->delete('mod_fisik_tinjauan');
            else:
                $data['validator_modmft'] = 2;
                $data = $this->security->xss_clean($data);
                $data_update = $this->db->where('nip', $nip)->update('mod_fisik_tinjauan', $data);
            endif;
        endif;
        return $data_update;
    }

    public function updateValidasiOPDcpns($aksi, $post, $nip, $lvladmin)
    {
        if($aksi=='tidak_valid'):
            $data['status_validasi_modcpns'] = 0;
            $data['ket_validasi_modcpns'] = $post['alasan_notvalid_cpnst'];
            $data = $this->security->xss_clean($data);
            $data_update = $this->db->where('nip', $nip)->update('mod_cpns_tinjauan', $data);
        endif;
        if($aksi=='valid'):
            if($lvladmin==2):
                $cekpangkat = $this->db->where(array('nip'=> $nip))->get('mod_pangkat')->row_array();
                $cpn = $this->db->where('nip', $nip)->get('mod_cpns_tinjauan')->row_array();

                if(!empty($cpn['golongan_id']) && $cpn['golongan_id']!=''){$data['golongan_id'] = $cpn['golongan_id'];}
                if(!empty($cpn['tmt_cpns']) && $cpn['tmt_cpns']!=''){$data['tmt_cpns'] = $cpn['tmt_cpns'];}
                if(!empty($cpn['masa_kerja_golongan_tahun']) && $cpn['masa_kerja_golongan_tahun']!=''){$data['masa_kerja_golongan_tahun'] = $cpn['masa_kerja_golongan_tahun'];}
                if(!empty($cpn['masa_kerja_golongan_bulan']) && $cpn['masa_kerja_golongan_bulan']!=''){$data['masa_kerja_golongan_bulan'] = $cpn['masa_kerja_golongan_bulan'];}
                if(!empty($cpn['pengadaan_id']) && $cpn['pengadaan_id']!=''){$data['pengadaan_id'] = $cpn['pengadaan_id'];}
                if(!empty($cpn['no_bkn']) && $cpn['no_bkn']!=''){$data['no_bkn'] = $cpn['no_bkn'];}
                if(!empty($cpn['tgl_bkn']) && $cpn['tgl_bkn']!=''){$data['tgl_bkn'] = $cpn['tgl_bkn'];}
                if(!empty($cpn['sk_pejabat']) && $cpn['sk_pejabat']!=''){$data['sk_pejabat'] = $cpn['sk_pejabat'];}
                if(!empty($cpn['sk_nomor']) && $cpn['sk_nomor']!=''){$data['sk_nomor'] = $cpn['sk_nomor'];}
                if(!empty($cpn['sk_tanggal']) && $cpn['sk_tanggal']!=''){$data['sk_tanggal'] = $cpn['sk_tanggal'];}
                if(!empty($cpn['spmt_nomor']) && $cpn['spmt_nomor']!=''){$data['spmt_nomor'] = $cpn['spmt_nomor'];}
                if(!empty($cpn['spmt_tanggal']) && $cpn['spmt_tanggal']!=''){$data['spmt_tanggal'] = $cpn['spmt_tanggal'];}
                if(!empty($cpn['file_sk']) && $cpn['file_sk']!=''){$data['file_sk'] = $cpn['file_sk'];}
                if(!empty($cpn['file_spmt']) && $cpn['file_spmt']!=''){$data['file_spmt'] = $cpn['file_spmt'];}
                $data['update_modcpns'] = date('Y-m-d H:i:s');
                $data['status_validasi_modcpns'] = 1;
                $data = $this->security->xss_clean($data);
                $data_update = $this->db->where('nip', $nip)->update('mod_cpns', $data);
                
                //Update pangkat awal
                if(empty($cekpangkat)){
                    if(!empty($cpn['tmt_cpns']) && $cpn['tmt_cpns']!=''){ $data_pkt['tmt_pangkat'] =  $cpn['tmt_cpns'];}
                    if(!empty($cpn['tgl_bkn']) && $cpn['tgl_bkn']!=''){$data_pkt['tgl_bakn'] = $cpn['tgl_bkn'];}
                    if(!empty($cpn['sk_tanggal']) && $cpn['sk_tanggal']!=''){$data_pkt['sk_tanggal'] = $cpn['sk_tanggal'];}

                    $data_pkt['nip'] = $nip;
                    if(!empty($cpn['golongan_id']) && $cpn['golongan_id']!=''){$data_pkt['golongan_id'] = $cpn['golongan_id'];}
                    $data_pkt['kepangkatan_id'] = 5;
                    if(!empty($cpn['unitkerja_id']) && $cpn['unitkerja_id']!=''){$data_pkt['unitkerja_id'] = $cpn['unitkerja_id'];}
                    if(!empty($cpn['sk_nomor']) && $cpn['sk_nomor']!=''){$data_pkt['sk_nomor'] = $cpn['sk_nomor'];}
                    if(!empty($cpn['no_bkn']) && $cpn['no_bkn']!=''){$data_pkt['no_bakn'] = $cpn['no_bkn'];}
                    if(!empty($cpn['masa_kerja_golongan_tahun']) && $cpn['masa_kerja_golongan_tahun']!=''){$data_pkt['masa_kerja_golongan_tahun'] = $cpn['masa_kerja_golongan_tahun'];}
                    if(!empty($cpn['masa_kerja_golongan_bulan']) && $cpn['masa_kerja_golongan_bulan']!=''){$data_pkt['masa_kerja_golongan_bulan'] = $cpn['masa_kerja_golongan_bulan'];}
                    if(!empty($cpn['sk_pejabat']) && $cpn['sk_pejabat']!=''){$data_pkt['pejabat_penetap'] = $cpn['sk_pejabat'];}
                    $data_pkt['validator_modpangkat'] = 2;
                    $data_pkt['status_validasi_modpangkat'] = 1;
                    $data_pkt['status_aktif'] = 1;
                    $this->db->where(array('nip'=> $nip))->insert('mod_pangkat',$data_pkt);
                }

                //Hapus cpns tinjauan
                $this->db->where('nip', $nip)->delete('mod_cpns_tinjauan');
            else:
                $data['validator_modcpns'] = 2;
                $data = $this->security->xss_clean($data);
                $data_update = $this->db->where('nip', $nip)->update('mod_cpns_tinjauan', $data);
            endif;
        endif;
        return $data_update;
    }

    public function updateValidasiOPDpns($aksi, $post, $nip, $lvladmin)
    {
        if($aksi=='tidak_valid'):
            $data['status_validasi_modpns'] = 0;
            $data['ket_validasi_modpns'] = $post['alasan_notvalid_pnst'];
            $data = $this->security->xss_clean($data);
            $data_update = $this->db->where('nip', $nip)->update('mod_pns_tinjauan', $data);
        endif;
        if($aksi=='valid'):
            if($lvladmin==2):
                $pn = $this->db->where('nip', $nip)->get('mod_pns_tinjauan')->row_array();

                if(!empty($pn['golongan_id']) && $pn['golongan_id']!=''){$data['golongan_id'] = $pn['golongan_id'];}
                if(!empty($pn['tmt_pns']) && $pn['tmt_pns']!=''){$data['tmt_pns'] = $pn['tmt_pns'];}
                if(!empty($pn['masa_kerja_golongan_tahun']) && $pn['masa_kerja_golongan_tahun']!=''){$data['masa_kerja_golongan_tahun'] = $pn['masa_kerja_golongan_tahun'];}
                if(!empty($pn['masa_kerja_golongan_bulan']) && $pn['masa_kerja_golongan_bulan']!=''){$data['masa_kerja_golongan_bulan'] = $pn['masa_kerja_golongan_bulan'];}
                if(!empty($pn['no_bkn']) && $pn['no_bkn']!=''){$data['no_bkn'] = $pn['no_bkn'];}
                if(!empty($pn['tgl_bkn']) && $pn['tgl_bkn']!=''){$data['tgl_bkn'] = $pn['tgl_bkn'];}
                if(!empty($pn['sk_pejabat']) && $pn['sk_pejabat']!=''){$data['sk_pejabat'] = $pn['sk_pejabat'];}
                if(!empty($pn['sk_nomor']) && $pn['sk_nomor']!=''){$data['sk_nomor'] = $pn['sk_nomor'];}
                if(!empty($pn['sk_tanggal']) && $pn['sk_tanggal']!=''){$data['sk_tanggal'] = $pn['sk_tanggal'];}
                if(!empty($pn['sttpl_nomor']) && $pn['sttpl_nomor']!=''){$data['sttpl_nomor'] = $pn['sttpl_nomor'];}
                if(!empty($pn['sttpl_tanggal']) && $pn['sttpl_tanggal']!=''){$data['sttpl_tanggal'] = $pn['sttpl_tanggal'];}
                if(!empty($pn['nomor_kdokter']) && $pn['nomor_kdokter']!=''){$data['nomor_kdokter'] = $pn['nomor_kdokter'];}
                if(!empty($pn['tanggal_kdokter']) && $pn['tanggal_kdokter']!=''){$data['tanggal_kdokter'] = $pn['tanggal_kdokter'];}
                if(!empty($pn['file_sk']) && $pn['file_sk']!=''){$data['file_sk'] = $pn['file_sk'];}
                if(!empty($pn['file_sttpl']) && $pn['file_sttpl']!=''){$data['file_sttpl'] = $pn['file_sttpl'];}
                if(!empty($pn['file_sumpah']) && $pn['file_sumpah']!=''){$data['file_sumpah'] = $pn['file_sumpah'];}
                $data['update_modpns'] = date('Y-m-d H:i:s');
                $data['status_validasi_modpns'] = 1;
                $data = $this->security->xss_clean($data);
                $data_update = $this->db->where('nip', $nip)->update('mod_pns', $data);
                //Hapus fisik tinjauan
                $this->db->where('nip', $nip)->delete('mod_pns_tinjauan');
            else:
                $data['validator_modpns'] = 2;
                $data = $this->security->xss_clean($data);
                $data_update = $this->db->where('nip', $nip)->update('mod_pns_tinjauan', $data);
            endif;
        endif;
        return $data_update;
    }

    public function updateValidasiOPDriwayat($riwayat='', $aksi='', $nip='', $id='', $post='', $lvladmin='')
    {
        if($aksi=='tidak_valid'):
            $data['status_validasi_mod'.$riwayat] = 0;
            $data['ket_validasi_mod'.$riwayat] = $post['alasan_notvalid_'.$riwayat];
            $data = $this->security->xss_clean($data);
            $data_update = $this->db->where(array('nip'=> $nip, 'id'=>$id))->update('mod_'.$riwayat, $data);
        endif;
        if($aksi=='valid'):
            if($lvladmin==2):
                $data['status_validasi_mod'.$riwayat] = 1;
                $data['status_aktif'] = 1;
                $data = $this->security->xss_clean($data);
                $data_update = $this->db->where(array('nip'=> $nip, 'id'=>$id))->update('mod_'.$riwayat, $data);
            else:
                $data['validator_mod'.$riwayat] = 2;
                $data = $this->security->xss_clean($data);
                $data_update = $this->db->where(array('nip'=> $nip, 'id'=>$id))->update('mod_'.$riwayat, $data);
            endif;
        endif;
        return $data_update;
    }



}