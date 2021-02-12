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
						<th class="text-nowrap text-center">NIP</th>
						<th class="text-nowrap text-center">Nama</th>
						<th class="text-nowrap text-center">Unit Kerja</th>
						<th class="text-nowrap text-center">Jenis Jabatan</th>
						<th class="text-nowrap text-center">Jenjang Jabatan</th>
						<th class="text-nowrap text-center">Eselon</th>
						<th class="text-nowrap text-center">Jabatan</th>
						<th class="text-nowrap text-center">Tanggal SK</th>
						<th class="text-nowrap text-center">Nomor SK</th>
						<th class="text-nowrap text-center">TMT Jabatan</th>
						<th class="text-nowrap text-center">Tanggal Pelantikan</th>
						<th class="text-nowrap text-center">Pejabat</th>
				</thead>
				<tbody>
					<?php if(!empty($modjabatan)):?>
						<?php $no=1; foreach ($modjabatan as $j): ?>
						<tr>
							<?php
								if(!empty($j['jenis_jabatan_id']) && $j['jenis_jabatan_id']==2){
									if($j['eselon_id']==7){
										$jabatan =  $j['nm_jabatan'];
									}elseif($j['jabatan_id']==706){
										$jabatan =  $j['nm_jabatan'].' '.$j['nm_unitkerja'] ; 
									}else{
										if($j['subbagian_id']!=0){
											$jabatan =  $j['nm_jabatan'].' '.$j['nm_subbidang'];
										}else{
											$jabatan =  $j['nm_jabatan'].' '.$j['nm_bidang'];
										}
									}
								}elseif(!empty($j['jenis_jabatan_id']) && $j['jenis_jabatan_id']==1){
									$jabatan =  $j['nm_jabatan'].' '.$j['nm_unitkerja'] ; 
								}else{
									if(!empty($j['jenjang_jabatan'])){
										$jj = explode('/',$j['jenjang_jabatan']);
										$jabatan = !empty($j['nm_jabatan']) ? $j['nm_jabatan'].' '.$jj[0] : 'Jabatan belum ada';
									}else{
										$jabatan = !empty($j['nm_jabatan']) ? $j['nm_jabatan'] : 'Jabatan belum ada';
									}
									
								}
							?>
							<td class="text-nowrap"> <?= $no++;?> </td>
							<td class="text-nowrap" style="mso-number-format:\@"> <?= !empty($j['nip']) ? $j['nip'] : '-'; ?> </td>
							<td class="text-nowrap"> <?= '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($j['nip']).'">'.$j['gelardepan'].''.$j['nama'].''.$j['gelarbelakang'].'</a>'; ?> </td>
							<td class="text-nowrap"> <?= !empty($j['nm_unitkerja']) ? $j['nm_unitkerja'] : '-';?></td>
							<td class="text-nowrap"> <?= !empty($j['jenis_jabatan']) ? $j['jenis_jabatan'] : '-';?></td>
							<td class="text-nowrap"> <?= $jabatan;?></td>
							<td class="text-nowrap"> <?= !empty($j['eselon']) ? $j['eselon'] : '-' ;?></td>
							<td class="text-nowrap"> 
								<?= !empty($j['nm_jabatan']) ? $j['nm_jabatan'] : '-' ;?>
							</td>
							<td class="text-nowrap"> <?= !empty($j['tgl_sk']) ? date('d-m-Y',strtotime($j['tgl_sk'])) : '-';?></td>
							<td class="text-nowrap"> <?= !empty($j['no_sk']) ? $j['no_sk'] : '-';?></td>
							<td class="text-nowrap"> <?= !empty($j['tmt_jabatan']) ? date('d-m-Y',strtotime($j['tmt_jabatan'])) : '-';?></td>
							<td class="text-nowrap"> <?= !empty($j['tmt_pelantikan']) ? date('d-m-Y',strtotime($j['tmt_pelantikan'])) : '-';?></td>
							<td class="text-nowrap"> <?= !empty($j['pejabat_sk']) ? $j['pejabat_sk'] : '-';?></td>
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
