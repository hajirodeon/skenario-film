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
$skenkd = cegah($_REQUEST['skenkd']);
$temakd = cegah($_REQUEST['temakd']);
$jeniskd = cegah($_REQUEST['jeniskd']);
$sasarankd = cegah($_REQUEST['sasarankd']);
$tempat = cegah($_REQUEST['tempat']);
$waktu = cegah($_REQUEST['waktu']);


/////////////////////////////////////////////// UPDATE TEMA ////////////////////////////////////////////
if ($temakd != "")
	{
	//cek, sudah ada belum
	$SQL1 = sprintf("SELECT * FROM skenario_c_tema ".
						"WHERE kd_skenario = '$skenkd'");

	mysql_select_db($database_skenario, $skenario);
	$Rs1 = mysql_query($SQL1, $skenario) or die(mysql_error());
	$row_rs1 = mysql_fetch_assoc($Rs1);
	$totalRows_rs1 = mysql_num_rows($Rs1);
	
	//jika iya
	if ($totalRows_rs1 != 0) 
		{
		$SQL2 = sprintf("UPDATE skenario_c_tema SET kd_tema = '$temakd' ".
							"WHERE kd_skenario = '$skenkd'");

		mysql_select_db($database_skenario, $skenario);
		$Rs2 = mysql_query($SQL2, $skenario) or die(mysql_error());

		//diskonek
	xclose;

		//auto kembali
		$returner = "profil.php?skenkd=$skenkd";
		xloc($returner);
		}
	
	else
		{
		//perintah SQL
		$SQL2 = sprintf("INSERT INTO skenario_c_tema(kd, kd_skenario, kd_tema) ".
							"VALUES ('$x', '$skenkd', '$temakd')");

		mysql_select_db($database_skenario, $skenario);
		$Rs2 = mysql_query($SQL2, $skenario) or die(mysql_error());

		//diskonek
	xclose;

		//auto kembali
		$returner = "profil.php?skenkd=$skenkd";
		xloc($returner);
		}
	}

/////////////////////////////////////////////// UPDATE JENIS ////////////////////////////////////////////
if ($jeniskd != "")
	{
	//cek, sudah ada belum
	$SQL1 = sprintf("SELECT * FROM skenario_c_jenis ".
						"WHERE kd_skenario = '$skenkd'");

	mysql_select_db($database_skenario, $skenario);
	$Rs1 = mysql_query($SQL1, $skenario) or die(mysql_error());
	$row_rs1 = mysql_fetch_assoc($Rs1);
	$totalRows_rs1 = mysql_num_rows($Rs1);
	
	//jika iya
	if ($totalRows_rs1 != 0) 
		{
		$SQL2 = sprintf("UPDATE skenario_c_jenis SET kd_jenis = '$jeniskd' ".
							"WHERE kd_skenario = '$skenkd'");

		mysql_select_db($database_skenario, $skenario);
		$Rs2 = mysql_query($SQL2, $skenario) or die(mysql_error());

		//diskonek
	xclose;

		//auto kembali
		$returner = "profil.php?skenkd=$skenkd";
		xloc($returner);
		}
	
	else
		{
		//perintah SQL
		$SQL2 = sprintf("INSERT INTO skenario_c_jenis(kd, kd_skenario, kd_jenis) ".
							"VALUES ('$x', '$skenkd', '$jeniskd')");

		mysql_select_db($database_skenario, $skenario);
		$Rs2 = mysql_query($SQL2, $skenario) or die(mysql_error());

		//diskonek
	xclose;

		//auto kembali
		$returner = "profil.php?skenkd=$skenkd";
		xloc($returner);
		}
	}




/////////////////////////////////////////////// UPDATE SASARAN ////////////////////////////////////////////
if ($sasarankd != "")
	{
	//cek, sudah ada belum
	$SQL1 = sprintf("SELECT * FROM skenario_c_sasaran ".
						"WHERE kd_skenario = '$skenkd'");

	mysql_select_db($database_skenario, $skenario);
	$Rs1 = mysql_query($SQL1, $skenario) or die(mysql_error());
	$row_rs1 = mysql_fetch_assoc($Rs1);
	$totalRows_rs1 = mysql_num_rows($Rs1);
	
	//jika iya
	if ($totalRows_rs1 != 0) 
		{
		$SQL2 = sprintf("UPDATE skenario_c_sasaran SET kd_sasaran = '$sasarankd' ".
							"WHERE kd_skenario = '$skenkd'");

		mysql_select_db($database_skenario, $skenario);
		$Rs2 = mysql_query($SQL2, $skenario) or die(mysql_error());

		//diskonek
	xclose;

		//auto kembali
		$returner = "profil.php?skenkd=$skenkd";
		xloc($returner);
		}
	
	else
		{
		//perintah SQL
		$SQL2 = sprintf("INSERT INTO skenario_c_sasaran(kd, kd_skenario, kd_sasaran) ".
							"VALUES ('$x', '$skenkd', '$sasarankd')");

		mysql_select_db($database_skenario, $skenario);
		$Rs2 = mysql_query($SQL2, $skenario) or die(mysql_error());

		//diskonek
	xclose;

		//auto kembali
		$returner = "profil.php?skenkd=$skenkd";
		xloc($returner);
		}
	}



/////////////////////////////////////////////// SET TEMPAT ////////////////////////////////////////////
if ($tempat != "")
	{
	//cek, sudah ada belum
	$SQL1 = sprintf("SELECT * FROM skenario_set_tempat ".
						"WHERE kd_skenario = '$skenkd'");

	mysql_select_db($database_skenario, $skenario);
	$Rs1 = mysql_query($SQL1, $skenario) or die(mysql_error());
	$row_rs1 = mysql_fetch_assoc($Rs1);
	$totalRows_rs1 = mysql_num_rows($Rs1);
	
	//jika iya
	if ($totalRows_rs1 != 0) 
		{
		$SQL2 = sprintf("UPDATE skenario_set_tempat SET tempat = '$tempat' ".
							"WHERE kd_skenario = '$skenkd'");

		mysql_select_db($database_skenario, $skenario);
		$Rs2 = mysql_query($SQL2, $skenario) or die(mysql_error());

		//diskonek
	xclose;

		//auto kembali
		$returner = "profil.php?skenkd=$skenkd";
		xloc($returner);
		}
	
	else
		{
		//perintah SQL
		$SQL2 = sprintf("INSERT INTO skenario_set_tempat(kd, kd_skenario, tempat) ".
							"VALUES ('$x', '$skenkd', '$tempat')");

		mysql_select_db($database_skenario, $skenario);
		$Rs2 = mysql_query($SQL2, $skenario) or die(mysql_error());

		//diskonek
	xclose;

		//auto kembali
		$returner = "profil.php?skenkd=$skenkd";
		xloc($returner);
		}
	}



/////////////////////////////////////////////// SET WAKTU ////////////////////////////////////////////
if ($waktu != "")
	{
	//cek, sudah ada belum
	$SQL1 = sprintf("SELECT * FROM skenario_set_waktu ".
						"WHERE kd_skenario = '$skenkd'");

	mysql_select_db($database_skenario, $skenario);
	$Rs1 = mysql_query($SQL1, $skenario) or die(mysql_error());
	$row_rs1 = mysql_fetch_assoc($Rs1);
	$totalRows_rs1 = mysql_num_rows($Rs1);
	
	//jika iya
	if ($totalRows_rs1 != 0) 
		{
		$SQL2 = sprintf("UPDATE skenario_set_waktu SET waktu = '$waktu' ".
							"WHERE kd_skenario = '$skenkd'");

		mysql_select_db($database_skenario, $skenario);
		$Rs2 = mysql_query($SQL2, $skenario) or die(mysql_error());

		//diskonek
	xclose;

		//auto kembali
		$returner = "profil.php?skenkd=$skenkd";
		xloc($returner);
		}
	
	else
		{
		//perintah SQL
		$SQL2 = sprintf("INSERT INTO skenario_set_waktu(kd, kd_skenario, waktu) ".
							"VALUES ('$x', '$skenkd', '$waktu')");

		mysql_select_db($database_skenario, $skenario);
		$Rs2 = mysql_query($SQL2, $skenario) or die(mysql_error());

		//diskonek
	xclose;

		//auto kembali
		$returner = "profil.php?skenkd=$skenkd";
		xloc($returner);
		}
	}
?>