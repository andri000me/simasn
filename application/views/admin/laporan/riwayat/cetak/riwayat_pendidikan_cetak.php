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
                        <th class="text-nowrap text-center">Jenis Pendidikan</th>
                        <th class="text-nowrap text-center">Jurusan</th>
                        <th class="text-nowrap text-center">Tempat Menempuh Pendidikan</th>
                        <th class="text-nowrap text-center">Tk. Ijazah</th>
                        <th class="text-nowrap text-center">Nomor Ijazah</th>
                        <th class="text-nowrap text-center">Tanggal Lulus</th>
					</tr>
				</thead>
				<tbody>
					<?php if(!empty($modpendidikan)):?>
						<?php $no=1; foreach ($modpendidikan as $p): ?>
						<tr>
							<td class="text-nowrap"> <?= $no++;?> </td>
							<td class="text-nowrap" style="mso-number-format:\@"> <?= !empty($p['nip']) ? $p['nip'] : '-'; ?> </td>
							<td class="text-nowrap"> <?= '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($p['nip']).'">'.$p['gelardepan'].''.$p['nama'].''.$p['gelarbelakang'].'</a>'; ?> </td>
							<td class="text-nowrap"><?= !empty($p['jenis_pendidikan']) ? ($p['jenis_pendidikan']==1 ? 'Akademik' : 'Profesi' ) : '-'; ?></td>
                            <td class="text-nowrap"><?= !empty($p['jurusan']) ? $p['jurusan'] : '-'; ?></td>
                            <td class="text-nowrap"><?= !empty($p['nm_lembaga']) ? $p['nm_lembaga'] : '-'; ?></td>
                            <td class="text-nowrap"><?= !empty($p['nm_jpendidikan']) ? $p['nm_jpendidikan'] : '-' ; ?></td>
                            <td class="text-nowrap" style="mso-number-format:\@"><?= !empty($p['no_ijazah']) ? $p['no_ijazah'] : '-' ; ?></td>
                            <td class="text-nowrap" style="mso-number-format:\@"><?= !empty($p['tgl_lulus']) ? date('d-m-Y',strtotime($p['tgl_lulus'])) : '-'; ?></td>
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
