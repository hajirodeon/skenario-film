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

require("include/cek.php"); 
 

nocache();

//konek db
require_once('Connections/skenario.php'); 

//ambil nilai
$passlama = md5(nosql($_POST["passlama"]));
$passbaru = md5(nosql($_POST["passbaru"]));
$kd_session = $_SESSION['kd_session'];
$username_session = $_SESSION['username_session'];

//cek lagi, harus A-Z, a-z, 0-9
if (!ctype_alnum($passlama) OR !ctype_alnum($passbaru))
	{
	$pesan = $msg004;
	$kembali = "password.php";
	pekem($pesan, $kembali);
	}

else
	{
	$SQL = sprintf("SELECT * FROM member ".
						"WHERE kd = '$kd_session' ".
						"AND username = '$username_session' ".
						"AND password = '$passlama'");

	mysql_select_db($database_skenario, $skenario);
	$rs1 = mysql_query($SQL, $skenario) or die("Tidak ada data");
	$row_rs1 = mysql_fetch_assoc($rs1);
	$totalRows_rs1 = mysql_num_rows($rs1);

	//cek	
	if ($totalRows_rs1 != 0) 
		{
		//perintah SQL
		$SQL2 = sprintf("UPDATE member SET password = '$passbaru' ".
							"WHERE kd = '$kd_session' ".
							"AND username = '$username_session'");

		mysql_select_db($database_skenario, $skenario);
		$Rs2 = mysql_query($SQL2, $skenario) or die(mysql_error());
		
		//diskonek
	xclose;
	
		//auto-kembali
		$pesan = $msg005;
		$kembali = "index.php";
		pekem($pesan, $kembali);
		} 
		
	Else 
		{
		//diskonek
	xclose;
		
		$pesan = $msg006;
		$kembali = "password.php";
		pekem($pesan, $kembali);
		}
	}
?> 