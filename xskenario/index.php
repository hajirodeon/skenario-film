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



//ambil nilai
$kd_session = $_SESSION['kd_session'];

//judul
$judul = $jd012;

//koneksi
require_once('../Connections/skenario.php'); 
?>
<html>
<head>
<title><?php echo $judul;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../style/skenario.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="5" topmargin="5">
<?php include("../include/header.php"); ?>
<table bgcolor="<?php echo $bgcolor;?>" width="<?php echo $width;?>" height="<?php echo $height;?>" border="<?php echo $border;?>" cellpadding="<?php echo $cellpadding;?>" cellspacing="<?php echo $cellspacing;?>">
  <tr> 
    <td width="150" valign="top"><?php include("../include/menu.php"); ?>
      </td>
    <td width="4" valign="top">&nbsp;</td>
    <td valign="top"><p><?php echo xheadline($judul);?></p>
      <p><a href="add.php">Tambah Skenario</a></p>
      <p> 
        <?php
	  mysql_select_db($database_skenario, $skenario);

$query_rs1 = "SELECT * FROM skenario ".
				"WHERE kd_member = '$kd_session'".
				"ORDER BY judul ASC";
$rs1= mysql_query($query_rs1, $skenario) or die(mysql_error());
$row_rs1 = mysql_fetch_assoc($rs1);
$totalRows_rs1 = mysql_num_rows($rs1);
?>
      </p>
      <? ///nek isih kosong
	if ($totalRows_rs1 == 0)
		{
		?>
      <font color="#FF0000"><strong>TIDAK ADA SKENARIO FILM</strong></font> 
      <?php
		}	
	
	else if ($totalRows_rs1 != 0)//nek eneng isine...
	  	{ 
	?>
      <table width="800" border="1" cellpadding="2" cellspacing="0" bordercolor="#CCCCCC">
        <?php 	
		do { 
		?>
        <tr valign="top"> 
          <td width="21"> 
            <?php
						  $nomer = $nomer + 1;
			  echo "$nomer. ";
			?>
          </td>
          <td width="447"> <a href="profil.php?skenkd=<?php echo $row_rs1['kd']; ?>"> 
            <?php 			  
			echo balikin($row_rs1['judul']); 
			?>
            </a> </td>
          <td width="112"><div align="center">[<a href="edit.php?kd=<?php echo $row_rs1['kd']; ?>">EDIT</a> 
              - <a href="del.php?kd=<?php echo $row_rs1['kd']; ?>">HAPUS</a>]</div></td>
        </tr>
        <?php } while ($row_rs1 = mysql_fetch_assoc($rs1)); ?>
      </table>
      <?php
		}
		?>
      <p>&nbsp;</p></td>
  </tr>
</table>
<?php include("../include/footer.php"); ?>


</body>
</html>
<?php
//diskonek
	xclose;
?>
