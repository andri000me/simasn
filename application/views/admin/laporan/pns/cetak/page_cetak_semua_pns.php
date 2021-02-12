<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>
		<?php
	    if ($uri1 == '') {
	        echo "Sistem Informasi Manajemen Pegawai BKPSDM Maros";
	    } else {
	        echo 'SIMPEG | ' . ucwords(str_replace('_', ' ', $uri1));
	        if ($uri3 != '') {
	            echo " - " . ucwords(str_replace('_', ' ', $uri3));
	        }
	    }
	    ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
	<link rel="apple-touch-icon" href="<?= base_url(); ?>assets/<?= base_url(); ?>assets/pages/ico/60.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/pages/ico/76.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?= base_url(); ?>assets/pages/ico/120.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?= base_url(); ?>assets/pages/ico/152.png">
	<link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/img/logo-maros.png" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
	<meta content="" name="Sistem informasi manajemen data statistik sektoral" />
	<meta content="" name="Surya Project" />
	<link href="<?= base_url()?>assets/cetak/css/report.css" rel="stylesheet" type="text/css">
	<style>
		.tengah{text-align: center;}
		.text-nowrap{white-space: nowrap;}
	</style>
</head>
<body>
	<div id="container">
		<!-- Print Body -->
		<div id="body">
			<div class="header" align="center">
				<label align="left"></label>
				<h3> DATA <?= strtoupper(str_replace('_', ' ', $uri4)); ?> </h3>
				<h4> <?= !empty($skpd) ? strtoupper($skpd) : '' ?> KABUPATEN MAROS </h4>
				<!-- <strong>Judul</strong> -->
			</div>
			<br>
		 	<table class="border thick">
				<thead>
					<tr class="border thick">
						<th class="text-nowrap text-center" >No</th>
						<th class="text-nowrap text-center">NIP</th>
						<th class="text-nowrap text-center" >NIP Lama</th>
						<th class="text-nowrap text-center" >Nama</th>
						<th class="text-nowrap text-center" >Tempat Lahir</th>
						<th class="text-nowrap text-center" >Tanggal Lahir</th>
						<th class="text-nowrap text-center" >Jenis Kelamin</th>
						<th class="text-nowrap text-center" >Agama</th>
						<th class="text-nowrap text-center" >Status Nikah</th>
						<th class="text-nowrap text-center" >NIK</th>
						<th class="text-nowrap text-center" >Telp/HP</th>
						<th class="text-nowrap text-center" >Email</th>
						<th class="text-nowrap text-center" >Alamat</th>
						<th class="text-nowrap text-center" >No. NPWP</th>
						<th class="text-nowrap text-center" >No. BPJS</th>
						<th class="text-nowrap text-center" >Kedudukan Hukum</th>
						<th class="text-nowrap text-center" >Status CPNS/PNS</th>
						<th class="text-nowrap text-center" >No. Kartu Pegawai</th>
						<th class="text-nowrap text-center" >No. SK CPNS</th>
						<th class="text-nowrap text-center" >Tanggal SK CPNS</th>
						<th class="text-nowrap text-center" >TMT CPNS</th>
						<th class="text-nowrap text-center" >TMT PNS</th>
						<th class="text-nowrap text-center" >Golongan Awal</th>
						<th class="text-nowrap text-center" >Golongan</th>
						<th class="text-nowrap text-center" >TMT Pangkat</th>
						<th class="text-nowrap text-center" >Masa Kerja Bulan</th>
						<th class="text-nowrap text-center" >Masa Kerja Tahun</th>
						<th class="text-nowrap text-center" >jenis Jabatan</th>
						<th class="text-nowrap text-center" >Jabatan</th>
						<th class="text-nowrap text-center" >TMT Jabatan</th>
						<!-- <th class="text-nowrap text-center" >Tugas Poko</th> -->
						<th class="text-nowrap text-center" >Pendidikan</th>
						<th class="text-nowrap text-center" >Tahun Lulus</th>
						<th class="text-nowrap text-center" >Unit Kerja</th>
						<th class="text-nowrap text-center" >Bidang</th>
						<th class="text-nowrap text-center" >Sub Bidang</th>
						<!-- <th class="text-nowrap text-center" >Tempat Kerja</th> -->
						<th class="text-nowrap text-center" >No. SK KGB</th>
						<th class="text-nowrap text-center" >Tanggal SK KGB</th>
						<th class="text-nowrap text-center" >TMT KGB</th>
						<th class="text-nowrap text-center" >Gaji Pokok</th>
						<th class="text-nowrap text-center" >Diklat</th>
						<th class="text-nowrap text-center" >Diklat Tahun Lulus</th>
						<th class="text-nowrap text-center" >Diklat Jam</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach ($pns as $p): ?>
					<tr>
						<?php
							if(!empty($p['jenis_jabatan_id'])){
								if($p['jenis_jabatan_id']==2){
									if($p['id_eselon']==7){
										$jabatan =  $p['nm_jabatan'];
									}elseif($p['jabatan_id']==706){
										$jabatan =  $p['nm_jabatan'].' '.$p['nm_unitkerja'] ; 
									}else{
										if($p['subbagian_id']!=0){
											$jabatan =  $p['nm_jabatan'].' '.$p['nm_subbidang'];
										}else{
											$jabatan =  $p['nm_jabatan'].' '.$p['nm_bidang'];
										}
									}
									
								}elseif($p['jenis_jabatan_id']=1){
									$jabatan =  $p['nm_jabatan'].' '.$p['nm_unitkerja'] ; 
								}else{
									if(!empty($p['jenjang_jabatan'])){
										$jj = explode('/',$p['jenjang_jabatan']);
										$jabatan = !empty($p['nm_jabatan']) ? $p['nm_jabatan'].' '.$jj[0] : 'Jabatan belum ada';
									}else{
										$jabatan = !empty($p['nm_jabatan']) ? $p['nm_jabatan'] : 'Jabatan belum ada';
									}
									
								}
							}else{
								$jabatan = 'Jabatan belum ada';
							}
						?>
						<td class="text-nowrap" style="text-align: center;"> <?= $no++;?> </td>
						<td class="text-nowrap" style="mso-number-format:\@; text-align : center;"> <?= (string)$p['nip'];?> </td>
						<td class="text-nowrap" style="mso-number-format:\@; text-align : center;"> <?= !empty($p['nip_lama']) ?  $p['nip_lama'] : '-';?> </td>
						<td class="text-nowrap"> <?= '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($p['nip']).'">'.$p['gelardepan'].''.$p['nama'].''.$p['gelarbelakang'].'</a>';?> </td>
						<td class="text-nowrap"> <?= !empty($p['tempatlahir']) ? $p['tempatlahir'] : '-';?> </td>
						<td class="text-nowrap" style="mso-number-format:\@; text-align : center;"> <?= !empty($p['tanggallahir']) ? date('d-m-Y', strtotime($p['tanggallahir'])) : '-';?> </td>
						<td class="text-nowrap"> <?= !empty($p['nm_kelamin']) ? $p['nm_kelamin'] : '-';?> </td>
						<td class="text-nowrap"> <?= !empty($p['nm_agama']) ? $p['nm_agama'] : '';?> </td>
						<td class="text-nowrap"> <?= !empty($p['skawin']) && $p['skawin']==3 ? (($p['nm_kelamin']=='Laki-laki') ? 'Duda' : 'Janda') : (!empty($p['nm_skawin']) ? $p['nm_skawin'] : '' );?> </td>
						<td class="text-nowrap" style="mso-number-format:\@; text-align : center;"> <?= !empty($p['noktp']) ? (string)$p['noktp'] : '-';?> </td>
						<td class="text-nowrap" style="mso-number-format:\@; text-align : center;"> <?= !empty($p['notlpx']) ? $p['notlpx'] : '-';?> / <?= !empty($p['nohp']) ? $p['nohp'] : '-';?> </td>
						<td class="text-nowrap"> <?= !empty($p['email']) ? $p['email'] : '-';?> </td>
						<td class="text-nowrap"> <?= !empty($p['alamat']) ? $p['alamat'] : '-';?> </td>
						<td class="text-nowrap" style="mso-number-format:\@;"> <?= !empty($p['nonpwp']) ? $p['nonpwp'] : '-';?> </td>
						<td class="text-nowrap" style="mso-number-format:\@;"> <?= !empty($p['nobpjs']) ? $p['nobpjs'] : '-';?> </td>
						<td class="text-nowrap"> <?= !empty($p['nm_kedudukan']) ? $p['nm_kedudukan'] : '-';?> </td>
						<td class="text-nowrap" style="mso-number-format:\@;"> <?= !empty($p['jenis_pegawai']) ? $p['jenis_pegawai'] : '-';?> </td>
						<td class="text-nowrap" style="mso-number-format:\@;"> <?= !empty($p['nokarpeg']) ? $p['nokarpeg'] : '-';?> </td>
						<td class="text-nowrap" style="mso-number-format:\@;"> <?= !empty($p['no_sk_cpns']) ? $p['no_sk_cpns'] : '-';?> </td>
						<td class="text-nowrap" style="mso-number-format:\@; text-align : center;"> <?= !empty($p['tgl_sk_cpns']) ? date('d-m-Y',strtotime($p['tgl_sk_cpns'])) : '-';?> </td>
						<td class="text-nowrap" style="mso-number-format:\@; text-align : center;"> <?= !empty($p['tmt_cpns']) ? date('d-m-Y',strtotime($p['tmt_cpns'])) : '-';?> </td>
						<td class="text-nowrap" style="mso-number-format:\@; text-align : center;"> <?= !empty($p['tmt_pns']) ? date('d-m-Y',strtotime($p['tmt_pns'])) : '-';?> </td>
						<td class="text-nowrap" style="text-align: center;"> <?= !empty($p['golongan_awal']) ? $p['golongan_awal'] : '-';?> </td>
						<td class="text-nowrap" style="text-align: center;"> <?= !empty($p['golongan']) ? $p['golongan'] : '-';?> </td>
						<td class="text-nowrap" style="text-align: center;"> <?= !empty($p['mkg_bulan']) ? $p['mkg_bulan'] : '-';?> </td>
						<td class="text-nowrap" style="text-align: center;"> <?= !empty($p['mkg_tahun']) ? $p['mkg_tahun'] : '-';?> </td>
						<td class="text-nowrap" style="mso-number-format:\@; text-align : center;"> <?= !empty($p['tmt_pangkat']) ? date('d-m-Y',strtotime($p['tmt_pangkat'])) : '-';?> </td>
						<td class="text-nowrap"> <?= !empty($p['jenis_jabatan']) ? $p['jenis_jabatan'] : '-';?> </td>
						<td class="text-nowrap"> <?= $jabatan;?> </td>
						<td class="text-nowrap" style="mso-number-format:\@; text-align : center;"> <?= !empty($p['tmt_jabatan']) ? date('d-m-Y',strtotime($p['tmt_jabatan'])) : '-';?> </td>
						<td class="text-nowrap"> <?= !empty($p['nm_jpendidikan']) ? $p['nm_jpendidikan'] : '-';?> </td>
						<td class="text-nowrap" style="mso-number-format:\@; text-align : center;"> <?= !empty($p['tgl_lulus']) ? date('Y',strtotime($p['tgl_lulus'])) : '-';?> </td>
						<td class="text-nowrap"> <?= !empty($p['nm_unitkerja']) ? $p['nm_unitkerja'] : '-';?> </td>
						<td class="text-nowrap"> <?= !empty($p['nm_bidang']) ? $p['nm_bidang'] : '-';?> </td>
						<td class="text-nowrap"> <?= !empty($p['nm_subbidang']) ? $p['nm_subbidang'] : '-';?> </td>
						<td class="text-nowrap"> <?= !empty($p['no_sk_kgb']) ? $p['no_sk_kgb'] : '-';?> </td>
						<td class="text-nowrap" style="mso-number-format:\@; text-align : center;"> <?= !empty($p['tgl_sk_kgb']) ? date('d-m-Y',strtotime($p['tgl_sk_kgb'])) : '-';?> </td>
						<td class="text-nowrap" style="mso-number-format:\@; text-align : center;"> <?= !empty($p['tmt_kgb']) ? date('d-m-Y',strtotime($p['tmt_kgb'])) : '-';?> </td>
						<td class="text-nowrap"> <?= !empty($p['gaji_pokok']) ? 'Rp. '.number_format($p['gaji_pokok'],0,',','.') : '-';?> </td>
						<td class="text-nowrap" style="mso-number-format:\@; text-align : center;"> <?= !empty($p['nm_diklat']) ? $p['nm_diklat'] : '-';?> </td>
						<td class="text-nowrap" style="mso-number-format:\@; text-align : center;"> <?= !empty($p['tgl_sertifikat_diklat']) ? date('d-m-Y',strtotime($p['tgl_sertifikat_diklat'])) : '-';?> </td>
						<td class="text-nowrap" style="text-align: center;"> <?= !empty($p['jam_diklat']) ? $p['jam_diklat'] : '-';?> </td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
			<label>Tanggal cetak : &nbsp; </label>
		 	<?= date_indo(date("Y-m-d")).'<br>Jumlah Keseluruhan Pegawai : '.count($pns) ?>
	</div>
</body>
</html>
