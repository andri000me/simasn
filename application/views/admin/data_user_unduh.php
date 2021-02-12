<?php
  header("Content-type: application/octet-stream");
  header("Content-Disposition: attachment; filename=daftar_admin-".date('Y-m-d-His').".xls");
  header("Pragma: no-cache");
  header("Expires: 0");

  $this->load->view('admin/data_user_cetak');
?>
