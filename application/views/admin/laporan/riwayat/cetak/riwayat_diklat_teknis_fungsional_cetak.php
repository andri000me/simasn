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
                        <th class="text-nowrap text-center">No.</th>
                        <th class="text-nowrap text-center">Nama</th>
                        <th class="text-nowrap text-center">NIP</th>
                        <th class="text-nowrap text-center">Jenis Diklat</th>
                        <th class="text-nowrap text-center">Nama Diklat</th>
                        <th class="text-nowrap text-center">Penyelengara</th>
                        <th class="text-nowrap text-center">Jumlah Jam</th>
                        <th class="text-nowrap text-center">Nomor Sertifikat</th>
                        <th class="text-nowrap text-center">Tanggal Sertifikat</th>
					</tr>
				</thead>
				<tbody>
					<?php if(!empty($moddiklatfungsional)):?>
						<?php $no=1; foreach ($moddiklatfungsional as $df): ?>
                            <tr>
                                <td class="text-nowrap"> <?= $no++;?> </td>
                                <td class="text-nowrap" style="mso-number-format:\@"> <?= !empty($df['nip']) ? $df['nip'] : '-'; ?> </td>
                                <td class="text-nowrap"> <?= '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($df['nip']).'">'.$df['gelardepan'].''.$df['nama'].''.$df['gelarbelakang'].'</a>'; ?> </td>
                                <td class="text-nowrap"> <?= !empty($df['nm_dikfungsional']) ? $df['nm_dikfungsional'] : '-'; ?> </td>
                                <td class="text-nowrap"> <?= !empty($df['diklat']) ? $df['diklat'] : '-'; ?> </td>
                                <td class="text-nowrap"> <?= !empty($df['penyelenggara']) ? $df['penyelenggara'] : '-' ; ?> </td>
                                <td class="text-nowrap"> <?= !empty($df['jam']) ? $df['jam'] : '-' ; ?> </td>
                                <td class="text-nowrap"> <?= !empty($df['no_sertifikat']) ? $df['no_sertifikat'] : '-' ; ?> </td>
                                <td class="text-nowrap"> <?= !empty($df['tgl_sertifikat']) ? date('d-m-Y',strtotime($df['tgl_sertifikat'])) : '-'; ?> </td>
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
