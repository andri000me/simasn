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
				<h3> DATA KENAIKAN GAJI BERKALA TERAKHIR </h3>
				<h4> <?= !empty($skpd) ? strtoupper($skpd) : '' ?>  KABUPATEN MAROS </h4>
				<!-- <strong>Judul</strong> -->
			</div>
			<br>
		 	<table class="border thick">
				<thead>
					<tr class="border thick">
						<th class="text-nowrap text-center" style="width:0.1%;">No</th>
						<th class="text-nowrap text-center">NIP</th>
						<th class="text-nowrap text-center">Nama</th>
						<th class="text-nowrap text-center">Unit Kerja</th>
						<th class="text-nowrap text-center">Golongan</th>
						<th class="text-nowrap text-center">TMT KGB</th>
						<th class="text-nowrap text-center">No. SK KGB</th>
						<th class="text-nowrap text-center">Tgl. SK KGB</th>
						<th class="text-nowrap text-center">Masa Kerja Tahun</th>
						<th class="text-nowrap text-center">Masa Kerja Bulan</th>
						<th class="text-nowrap text-center">Gaji Pokok</th>
					</tr>
				</thead>
				<tbody>
					<?php if(!empty($kgb)):?>
						<?php $no=1; foreach ($kgb as $k): ?>
						<tr>
						<td class="text-nowrap"><?= $no++; ?></td>
						<td class="text-nowrap" style='mso-number-format:\@'><?= !empty($k['nip']) ? strval($k['nip']) : '-'; ?></td>
						<td class="text-nowrap"><?= '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($k['nip']).'">'.$k['gelardepan'].''.$k['nama'].''.$k['gelarbelakang'].'</a>'; ?></td>
						<td class="text-nowrap"><?= !empty($k['nm_unitkerja']) ? $k['nm_unitkerja'] : '-'; ?></td>
						<td class="text-nowrap"><?= !empty($k['golongan']) ? $k['golongan'] : '-' ; ?></td>
						<td class="text-nowrap" style='mso-number-format:\@'><?= !empty($k['tmt_kgb']) ? date('d-m-Y',strtotime($k['tmt_kgb'])) : '-';?></td>
						<td class="text-nowrap"><?= !empty($k['no_sk_kgb']) ? $k['no_sk_kgb'] : '-';?></td>
						<td class="text-nowrap" style='mso-number-format:\@'><?= !empty($k['tgl_sk_kgb']) ? date('d-m-Y',strtotime($k['tgl_sk_kgb'])) : '-';?></td>
						<td class="text-nowrap"><?= !empty($k['mkg_tahun']) ? $k['mkg_tahun'] : '-';?></td>
						<td class="text-nowrap"><?= !empty($k['mkg_bulan']) ? $k['mkg_bulan'] : '-';?></td>
						<td class="text-nowrap"><?= !empty($k['gaji_pokok']) ? 'Rp. '.number_format($k['gaji_pokok'],0,',','.') : '-';?></td>
						</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr><td class="text-nowrap" colspan="12"> <center> File tidak ditemukan </center></td></tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
			<label>Tanggal cetak : &nbsp; </label>
		 	<?= date_indo(date("Y-m-d")) ?>
	</div>
</body>
</html>
