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
$dikd = cegah($_POST['dikd']);
$skenkd = cegah($_POST['skenkd']);
$scenekd = cegah($_POST['scenekd']);
$pemain = cegah($_POST['pemain']);
$dialog = cegah($_POST['di']);

//perintah SQL
$SQL2 = sprintf("UPDATE skenario_scene_dialog SET pemain = '$pemain', ".
					"dialog = '$dialog' ".
					"WHERE kd_skenario = '$skenkd' ".
					"AND kd_sceneplot = '$scenekd' ".
					"AND kd = '$dikd'");

mysql_select_db($database_skenario, $skenario);
$Rs2 = mysql_query($SQL2, $skenario) or die(mysql_error());

//diskonek
	xclose;

//auto kembali
$returner = "index.php?skenkd=$skenkd&scenekd=$scenekd";
xloc($returner);
?>