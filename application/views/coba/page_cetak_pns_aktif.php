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
	</style>
</head>
<body>
	<div id="container">
		<!-- Print Body -->
		<div id="body">
			<div class="header" align="center">
				<label align="left"></label>
				<h3> DATA <?= strtoupper(str_replace('_', ' ', $uri3)); ?> </h3>
				<!-- <strong>Judul</strong> -->
			</div>
			<br>
		 		<table class="border thick">
				<thead>
					<tr class="border thick">
						<th class="text-nowrap text-center" rowspan="2" width="1%">No</th>
						<th class="text-nowrap text-center" rowspan="2">NIP</th>
						<th class="text-nowrap text-center" rowspan="2">Nama</th>
						<th class="text-nowrap text-center" colspan="2">Pangkat Terakhir</th>
						<th class="text-nowrap text-center" colspan="3">Jabatan</th>
						<th class="text-nowrap text-center" colspan="2">Masa Kerja</th>
						<th class="text-nowrap text-center" rowspan="2">Unit Kerja</th>
						<th class="text-nowrap text-center" rowspan="2">Status PNS</th>
					</tr>
					<tr class="border thick">
						<th class="text-center text-nowrap">Gol/Ruang</th>
						<th class="text-center text-nowrap">TMT Pangkat</th>
						<th class="text-center text-nowrap">Nama Jabatan</th>
						<th class="text-center text-nowrap">Eselon</th>
						<th class="text-center text-nowrap">TMT Jabatan</th>
						<th class="text-center text-nowrap">Tahun</th>
						<th class="text-center text-nowrap">Bulan</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach ($pns as $p): ?>
					<tr>
						<td> <?= $no++;?> </td>
						<td> <?= $p['nip'];?> </td>
						<td> <?= !empty($p['nip_lama']) ?  $p['nip_lama'] : '-';?> </td>
						<td> <?= '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($p['nip']).'">'.$p['gelardepan'].''.$p['nama'].''.$p['gelarbelakang'].'</a>';?> </td>
						<td> <?= !empty($p['golongan']) ? $p['golongan'] : '-';?> </td>
						<td> <?= !empty($p['tmt_pangkat']) ? date('d-m-Y', strtotime($p['tmt_pangkat'])) : '-';?> </td>
						<td> <?= !empty($p['nm_jabatan']) ? $p['nm_jabatan'] : '-';?> </td>
						<td> <?= !empty($p['eselon']) ? $p['eselon'] : '';?> </td>
						<td> <?= !empty($p['tmt_jabatan']) ? date('d-m-Y', strtotime($p['tmt_jabatan'])) : '-';?> </td>
						<td> <?= !empty($p['mgk_tahun']) ? $p['mgk_tahun'] : '';?> </td>
						<td> <?= !empty($p['mgk_bulan']) ? $p['mgk_bulan'] : '';?> </td>
						<td> <?= !empty($p['nm_unitkerja']) ? $p['nm_unitkerja'] : '';?> </td>
						<td> <?= !empty($p['nm_kedudukan']) ? $p['nm_kedudukan'] : '';?> </td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
			<label>Tanggal cetak : &nbsp; </label>
		 	<?= date_indo(date("Y-m-d")) ?>
	</div>
</body>
</html>
