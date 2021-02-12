<?php
  header("Content-type: application/octet-stream");
  header("Content-Disposition: attachment; filename=".$uri2."-pns-nonaktif-".date('Y-m-d-His').".xls");
  header("Pragma: no-cache");
  header("Expires: 0");

  $this->load->view('admin/laporan/pns/cetak/page_cetak_pns_nonaktif');
?>
