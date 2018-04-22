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
$tokohkd = cegah($_POST['tokohkd']);
$nama = cegah($_POST['nama']);
$panggilan = cegah($_POST['panggilan']);
$usia = cegah($_POST['usia']);
$fisik = cegah($_POST['fisik']);
$psikis = cegah($_POST['psikis']);
$status = cegah($_POST['status']);
$agama = cegah($_POST['agama']);
$profesi = cegah($_POST['profesi']);
$cirikhusus = cegah($_POST['cirikhusus']);
$latarbelakang = cegah($_POST['latarbelakang']);
$peran = cegah($_POST['peran']);

//perintah SQL
$SQL2 = sprintf("UPDATE skenario_tokoh SET nama = '$nama', ".
					"panggilan = '$panggilan', usia = '$usia', fisik = '$fisik', psikis = '$psikis', ".
					"status = '$status', agama = '$agama', profesi = '$profesi', cirikhusus = '$cirikhusus', ".
					"peran = '$peran'".
					"WHERE kd_skenario = '$skenkd' ".
					"AND kd = '$tokohkd'");		
						
mysql_select_db($database_skenario, $skenario);
$Rs2 = mysql_query($SQL2, $skenario) or die(mysql_error());

//diskonek
	xclose;

//auto kembali
$returner = "index.php?skenkd=$skenkd";
xloc($returner);
?>