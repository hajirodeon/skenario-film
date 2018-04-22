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

//konek db
require_once('Connections/skenario.php'); 

//fungsi - fungsi
include("include/fungsi.php");

//ambil nilai
$username = nosql($_POST["username"]);
$password = md5(nosql($_POST["password"]));

//cek lagi, harus A-Z, a-z, 0-9
if (!ctype_alnum($username) OR !ctype_alnum($password))
	{
	$pesan = $msg009;
	$kembali = "index.php";
	pekem($pesan, $kembali);
	}

else
	{
	$SQL = sprintf("SELECT * FROM member ".
						"WHERE username = '$username' ".
						"AND password = '$password'");

	mysql_select_db($database_skenario, $skenario);
	$rs1 = mysql_query($SQL, $skenario) or die("Tidak ada data");
	$row_rs1 = mysql_fetch_assoc($rs1);
	$totalRows_rs1 = mysql_num_rows($rs1);

	//cek login	
	if ($totalRows_rs1 != 0) 
		{
		session_start();	
			
		$kd_session = $row_rs1['kd'];
		$member_session = "MEMBER-SISFOSKENFI";
		$username_session = $username;
		$password_session = $password;
		$nama_session = $row_rs1['nama'];
		$hajirobe_session = $hajirobe;
			
		$_SESSION['kd_session'] = $kd_session;
		$_SESSION['member_session'] = $member_session;
		$_SESSION['username_session'] = $username_session;		
		$_SESSION['password_session'] = $password_session;
		$_SESSION['nama_session'] = $nama_session;
		$_SESSION['hajirobe_session'] = $hajirobe_session;
		
		xclose;
		
		$returner = "index.php";
		xloc($returner);	
		} 
		
	Else 
		{
		xclose;
		
		$pesan = $msg009;
		$kembali = "login.php";
		pekem($pesan, $kembali);
		}
	}
?>