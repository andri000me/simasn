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
						<th class="text-nowrap text-center" width="1%">No.</th>
						<th class="text-nowrap text-center">NIP</th>
						<th class="text-nowrap text-center">Nama</th>
						<th class="text-nowrap text-center">Unit Kerja</th>
						<!-- <th class="text-nowrap text-center">Jabatan</th> -->
						<th class="text-nowrap text-center">Golongan</th>
						<th class="text-nowrap text-center">Jenis Kepangkatan</th>
						<th class="text-nowrap text-center">Pangkat</th>
						<th class="text-nowrap text-center">Nomor SK</th>
						<th class="text-nowrap text-center">Tanggal SK</th>
						<th class="text-nowrap text-center">Nomor BKN</th>
						<th class="text-nowrap text-center">Tanggal BKN</th>
						<th class="text-nowrap text-center">TMT Golongan</th>
						<th class="text-nowrap text-center">Masa Kerja Gol. Tahun</th>
						<th class="text-nowrap text-center">Masa Kerja Gol. Bulan</th>
						<th class="text-nowrap text-center">Pejabat Penetap</th>
					</tr>
				</thead>
				<tbody>
					<?php if(!empty($modpangkat)):?>
						<?php $no=1; foreach ($modpangkat as $p): ?>
						<tr>
							
							<td class="text-nowrap"> <?= $no++;?> </td>
							<td class="text-nowrap" style="mso-number-format:\@"> <?= !empty($p['nip']) ? $p['nip'] : '-'; ?> </td>
							<td class="text-nowrap"> <?= '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($p['nip']).'">'.$p['gelardepan'].''.$p['nama'].''.$p['gelarbelakang'].'</a>'; ?> </td>
							<td class="text-nowrap"> <?= !empty($p['nm_unitkerja']) ? $p['nm_unitkerja'] : '-'; ?> </td>
							<td class="text-nowrap"> <?= !empty($p['golongan']) ? $p['golongan'] : '-' ; ?> </td>
							<td class="text-nowrap"> <?= !empty($p['nm_kepangkatan']) ? $p['nm_kepangkatan'] : '-'; ?> </td>
							<td class="text-nowrap"> <?= !empty($p['pangkat']) ? $p['pangkat'] : '-'; ?> </td>
							<td class="text-nowrap"> <?= !empty($p['sk_nomor']) ? $p['sk_nomor'] : '-'; ?> </td>
							<td class="text-nowrap text-center" style="mso-number-format:\@"> <?= !empty($p['sk_tanggal']) ? date('d-m-Y',strtotime($p['sk_tanggal'])) : '-'; ?> </td>
							<td class="text-nowrap text-center"> <?= !empty($p['no_bakn']) ? $p['no_bakn'] : '-'; ?> </td>
							<td class="text-nowrap text-center" style="mso-number-format:\@"> <?= !empty($p['tgl_bakn']) ? date('d-m-Y',strtotime($p['tgl_bakn'])) : '-'; ?> </td>
							<td class="text-nowrap text-center" style="mso-number-format:\@"> <?= !empty($p['tmt_pangkat']) ? date('d-m-Y',strtotime($p['tmt_pangkat'])) : '-'; ?> </td>
							<td class="text-nowrap text-center"> <?= !empty($p['mkg_tahun']) ? $p['mkg_tahun'] : '-'; ?> </td>
							<td class="text-nowrap text-center"> <?= !empty($p['mkg_bulan']) ? $p['mkg_bulan'] : '-'; ?> </td>
							<td class="text-nowrap"> <?= !empty($p['pejabat_penetap']) ? $p['pejabat_penetap'] : '-'; ?> </td>
						</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr><td colspan="15"> <center> File tidak ditemukan </center></td></tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
			<label>Tanggal cetak : &nbsp; </label>
		 	<?= date_indo(date("Y-m-d")) ?>
	</div>
</body>
</html>
