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

include("include/config.php"); 
include("include/fungsi.php"); 

nocache();

//ambil nilai
$username = cegah($_POST['username']);
$passjawab = cegah($_POST['passjawab']);

//konek db
require_once('Connections/skenario.php'); 

//cek
$SQL = sprintf("SELECT * FROM member ".
					"WHERE username = '$username' ".
					"AND passjawab = '$passjawab'");

mysql_select_db($database_skenario, $skenario);
$rs1 = mysql_query($SQL, $skenario) or die("Tidak ada data");
$row_rs1 = mysql_fetch_assoc($rs1);
$totalRows_rs1 = mysql_num_rows($rs1);

//jika iya	
if ($totalRows_rs1 != 0) 
	{
	//nilai
	$judul = $jd004;
?>
<html>
<head>
<title><?php echo $judul;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style/skenario.css" rel="stylesheet" type="text/css">

</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="5" topmargin="5">
<?php include("include/header.php"); ?>
<table width="1000" height="300" border="0" cellpadding="3" cellspacing="0">
  <tr> 
    <td valign="top"><p><a href="<?php echo $sumber;?>">Halaman Depan</a> &gt; <?php echo $judul;?></p>
      <p><big><strong><?php echo strtoupper($judul);?></strong></big></p>
      <p><strong>Username :</strong> <br>
	  <?php echo $username;?></p>
      <p><strong>Password Baru :</strong> <br>
        <?php
	  //membuat password baru
	  
	  //jika belum ada
	  if ($_SESSION['passx_session'] == "")
	  		{
			$passx_session = $passx;
			session_register("passx_session");
			echo $passx_session;
			
			$nilaix = md5($passx_session);
			
			$SQL = sprintf("UPDATE member SET password = '$nilaix' ".
								"WHERE username = '$username'");

			mysql_select_db($database_skenario, $skenario);
			$rs1 = mysql_query($SQL, $skenario) or die("Tidak ada data");
			}
		
		//jika sudah ada
	else if ($_SESSION['passx_session'] != "")
			{
			$passx_session = $_SESSION['passx_session'];
			echo $passx_session;
			}
	   ?>
      </p>
      <p>--&gt; <a href="login.php">LOGIN</a></p></td>
  </tr>
</table>
<?php include("include/footer.php"); ?>


</body>
</html>
<?php
	
	}
else
	{
	$pesan = $msg007;
	$kembali = "lp_pass.php";
	pekem($pesan, $kembali);
	}
	?>