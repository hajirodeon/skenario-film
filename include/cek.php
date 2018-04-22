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

require("config.php"); 
require("fungsi.php"); 

///cek session
$kd_session = $_SESSION['kd_session'];
$username_session = $_SESSION['username_session'];
$password_session = $_SESSION['password_session'];
$member_session = $_SESSION['member_session'];
$nama_session = $_SESSION['nama_session'];
$hajirobe_session = $_SESSION['hajirobe_session'];

if (($kd_session == "") AND ($username_session == "") AND ($password_session == "") AND ($member_session == "") AND ($nama_session == "") AND ($hajirobe_session == ""))
	{
	$pesan = $msg012;
	$kembali = "$sumber";
	pekem($pesan, $kembali);
	}
?>