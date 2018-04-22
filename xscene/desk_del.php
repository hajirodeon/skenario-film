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
$deskkd = cegah($_REQUEST['deskkd']);
$skenkd = cegah($_REQUEST['skenkd']);
$scenekd = cegah($_REQUEST['scenekd']);

//del
$SQL = sprintf("DELETE FROM skenario_scene_deskripsi ".
					"WHERE kd = '$deskkd'");

mysql_select_db($database_skenario, $skenario);
$Rs = mysql_query($SQL, $skenario) or die(mysql_error());


//del dialog
$SQL1 = sprintf("DELETE FROM skenario_scene_dialog ".
					"WHERE kd_deskripsi = '$deskkd'");

mysql_select_db($database_skenario, $skenario);
$Rs1 = mysql_query($SQL1, $skenario) or die(mysql_error());

//auto kembali
$returner = "index.php?skenkd=$skenkd&scenekd=$scenekd";
xloc($returner);
?>