<?php
//Sistem Informasi ini berbasis OPEN SOURCE dengan lisensi GNU/GPL. 
//
//OmahBIASAWAE dengan segala hormat tidak bertanggung jawab dan tidak memiliki pertanggungjawaban
//kepada apapun atau siapa pun akibat terjadinya kehilangan atau kerusakan yang mungkin muncul yang berasal
//dari buah karya ini.
//
//Sistem Informasi ini akan selalu dikembangkan dan jika ditemukan kesalahan logika ataupun kesalahan program,
//hal ini bukanlah disengaja. Melainkan hal tersebut adalah salah satu dari tahapan pengembangan lebih lanjut. 

//Sistem Informasi Skenario Film (SISFOSKENFI) v1.0, dikembangkan oleh OmahBIASAWAE (Agus Muhajir).
//Dan didistribusikan oleh BIASAWAE PRODUCTION (http://www.omahbiasawae.com)
//
//Bila Anda mempunyai pertanyaan, komentar, saran maupun kritik layangkan saja ke hajirodeon@yahoo.com atau
//hajirodeon@gmail.com .
//
//Semoga program ini berguna bagi Anda.
//
//Ikutilah perkembangan terbaru Sistem Informasi ini di BIASAWAE PRODUCTION.
session_start();

require("../include/cek.php"); 

nocache();



//koneksi
require_once('../Connections/skenario.php'); 

//ambil nilai
$kd = cegah($_REQUEST['kd']);

//del
$SQL = sprintf("DELETE FROM skenario WHERE kd = '$kd'");

mysql_select_db($database_skenario, $skenario);
$Rs = mysql_query($SQL, $skenario) or die(mysql_error());

//del c_jenis
$SQL1 = sprintf("DELETE FROM skenario_c_jenis WHERE kd_skenario = '$kd'");

mysql_select_db($database_skenario, $skenario);
$Rs1 = mysql_query($SQL1, $skenario) or die(mysql_error());


//del c_sasaran
$SQL2 = sprintf("DELETE FROM skenario_c_sasaran WHERE kd_skenario = '$kd'");

mysql_select_db($database_skenario, $skenario);
$Rs2 = mysql_query($SQL2, $skenario) or die(mysql_error());


//del c_tema
$SQL3 = sprintf("DELETE FROM skenario_c_tema WHERE kd_skenario = '$kd'");

mysql_select_db($database_skenario, $skenario);
$Rs3 = mysql_query($SQL3, $skenario) or die(mysql_error());


//del deskripsi
$SQL4 = sprintf("DELETE FROM skenario_scene_deskripsi WHERE kd_skenario = '$kd'");

mysql_select_db($database_skenario, $skenario);
$Rs4 = mysql_query($SQL4, $skenario) or die(mysql_error());


//del dialog
$SQL5 = sprintf("DELETE FROM skenario_scene_dialog WHERE kd_skenario = '$kd'");

mysql_select_db($database_skenario, $skenario);
$Rs5 = mysql_query($SQL5, $skenario) or die(mysql_error());


//del sceneplot
$SQL7 = sprintf("DELETE FROM skenario_sceneplot WHERE kd_skenario = '$kd'");

mysql_select_db($database_skenario, $skenario);
$Rs7 = mysql_query($SQL7, $skenario) or die(mysql_error());


//del set_tempat
$SQL8 = sprintf("DELETE FROM skenario_set_tempat WHERE kd_skenario = '$kd'");

mysql_select_db($database_skenario, $skenario);
$Rs8 = mysql_query($SQL8, $skenario) or die(mysql_error());


//del set_waktu
$SQL9 = sprintf("DELETE FROM skenario_set_waktu WHERE kd_skenario = '$kd'");

mysql_select_db($database_skenario, $skenario);
$Rs9 = mysql_query($SQL9, $skenario) or die(mysql_error());


//del sinopsis
$SQL10 = sprintf("DELETE FROM skenario_sinopsis WHERE kd_skenario = '$kd'");

mysql_select_db($database_skenario, $skenario);
$Rs10 = mysql_query($SQL10, $skenario) or die(mysql_error());


//del tokoh
$SQL11 = sprintf("DELETE FROM skenario_tokoh WHERE kd_skenario = '$kd'");

mysql_select_db($database_skenario, $skenario);
$Rs11 = mysql_query($SQL11, $skenario) or die(mysql_error());


//auto kembali
$returner = "index.php";
xloc($returner);
?>