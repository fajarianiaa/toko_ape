<?php 
//proteksi
$this->simple_login->cek_login();
//menggabungkan layout
require_once('header.php');
require_once('sidebar.php');
require_once('content.php');
require_once('footer.php');
?>