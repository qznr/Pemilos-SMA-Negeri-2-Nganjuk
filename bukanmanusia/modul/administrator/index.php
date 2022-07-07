<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/administrator/tampil.php"; break;
	case 'tambah': include "modul/administrator/tambah.php"; break;
	case 'simpan': include "modul/administrator/simpan.php"; break;
	case 'edit': include "modul/administrator/edit.php"; break;
	case 'update': include "modul/administrator/update.php"; break;
	case 'hapus': include "modul/administrator/hapus.php"; break;
	case 'hapussuara': include "modul/administrator/hapussuara.php"; break;
	case 'detail': include "modul/administrator/detail.php"; break;
	case 'profil': include "modul/administrator/profil.php"; break;
	case 'perolehan': include "modul/administrator/perolehan.php"; break;
	case 'reset': include "modul/administrator/reset.php"; break;
	case 'suaramasuk': include "modul/administrator/suaramasuk.php"; break;
	case 'aktifkan': include "modul/administrator/aktifkan.php"; break;
	case 'nonaktifkan': include "modul/administrator/nonaktifkan.php"; break;
}
?>
