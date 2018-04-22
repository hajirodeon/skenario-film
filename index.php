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
?>
<html>
<head>
<title>Selamat Datang --> 
<?php
//jika belum login
if ($_SESSION['hajirobe_session'] == "")
	{
	echo "TAMU";
	}

else
	{
	echo $_SESSION['nama_session'];
	}
	?>



</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style/skenario.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="5" topmargin="5">
<?php include("include/header.php"); ?>
<table bgcolor="<?php echo $bgcolor;?>" width="<?php echo $width;?>" height="<?php echo $height;?>" border="<?php echo $border;?>" cellpadding="<?php echo $cellpadding;?>" cellspacing="<?php echo $cellspacing;?>">
  <tr> 
    <td width="150" valign="top"><?php include("include/menu.php"); ?>
      </td>
    <td width="4" valign="top">&nbsp;</td>
    <td valign="middle"><div align="center">
        <p>Selamat Datang --> <strong> 
          <?php
//jika belum login
if ($_SESSION['hajirobe_session'] == "")
	{
	echo "TAMU";
	}

else
	{
	echo $_SESSION['nama_session'];
	}
	?>
          </strong></p>
        <p>Sistem Informasi Skenario Film (SISFOSKENFI) v1.0 adalah program untuk 
          mengolah naskah skenario. Sehingga dengan menggunakan program ini, naskah 
          bisa tersusun dengan baik sesuai plot-plotnya.</p>
        <p>Selamat Bekerja.</p>
      </div></td>
  </tr>
</table>
<?php include("include/footer.php"); ?>


</body>
</html>
