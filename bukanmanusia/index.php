<?php
session_start();
include_once "sesi.php";
$modul=(isset($_GET['m']))?$_GET['m']:"awal";
$jawal="Admin Pemilos | SMAN 2 Nganjuk";
switch($modul){
	case 'awal': default: $aktif="Beranda"; $judul="Beranda $jawal"; include "awal.php"; break;
	case 'admin': $aktif="Admin"; $judul="Modul $jawal"; include "modul/administrator/index.php"; break;
	case 'siswa': $aktif="Siswa"; $judul="Modul Siswa $jawal"; include "modul/siswa/index.php"; break;
	case 'guru': $aktif="Guru"; $judul="Modul Guru $jawal"; include "modul/guru/index.php"; break;
	case 'kandidat': $aktif="Kandidat"; $judul="Modul Kandidat $jawal"; include "modul/kandidat/index.php"; break;
}
?>
