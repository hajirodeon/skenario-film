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
$skenkd = cegah($_POST['skenkd']);
$lokasi = cegah($_POST['lokasi']);
$tempat = cegah($_POST['tempat']);
$waktu = cegah($_POST['waktu']);
$plot = cegah($_POST['plot']);

//perintah SQL
$SQL2 = sprintf("INSERT INTO skenario_sceneplot(kd, kd_skenario, kd_lokasi, tempat, kd_waktu, plot) ".
					"VALUES ('$x', '$skenkd', '$lokasi', '$tempat', '$waktu', '$plot')");

mysql_select_db($database_skenario, $skenario);
$Rs2 = mysql_query($SQL2, $skenario) or die(mysql_error());

//diskonek
	xclose;

//auto kembali
$returner = "index.php?skenkd=$skenkd";
xloc($returner);
?>