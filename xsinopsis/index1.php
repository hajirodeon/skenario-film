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
$sinopsis = cegah($_POST['sinopsis']);

//cek, sudah ada belum
$SQL1 = sprintf("SELECT * FROM skenario_sinopsis ".
					"WHERE kd_skenario = '$skenkd'");

mysql_select_db($database_skenario, $skenario);
$Rs1 = mysql_query($SQL1, $skenario) or die(mysql_error());
$row_rs1 = mysql_fetch_assoc($Rs1);
$totalRows_rs1 = mysql_num_rows($Rs1);
	
//jika iya
if ($totalRows_rs1 != 0) 
	{
	//update
	$SQL2 = sprintf("UPDATE skenario_sinopsis SET sinopsis = '$sinopsis' ".
						"WHERE kd_skenario = '$skenkd'");
	mysql_select_db($database_skenario, $skenario);
	$Rs2 = mysql_query($SQL2, $skenario) or die(mysql_error());
	
	//diskonek
	xclose;

	//auto kembali
	$returner = "$sumber/xskenario/profil.php?skenkd=$skenkd";
	xloc($returner);
	}

else
	{
	//perintah SQL
	$SQL2 = sprintf("INSERT INTO skenario_sinopsis(kd, kd_skenario, sinopsis) ".
						"VALUES ('$x', '$skenkd', '$sinopsis')");

	mysql_select_db($database_skenario, $skenario);
	$Rs2 = mysql_query($SQL2, $skenario) or die(mysql_error());
	
	//diskonek
	xclose;

	//auto kembali
	$returner = "$sumber/xskenario/profil.php?skenkd=$skenkd";
	xloc($returner);
	}
?>