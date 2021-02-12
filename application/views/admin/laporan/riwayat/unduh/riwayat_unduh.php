<?php
  header("Content-type: application/octet-stream");
  header("Content-Disposition: attachment; filename=".$uri2."-".$uri4."-".date('Y-m-d-His').".xls");
  header("Pragma: no-cache");
  header("Expires: 0");

  $this->load->view('admin/laporan/riwayat/cetak/'.$uri4.'_cetak');
?>
