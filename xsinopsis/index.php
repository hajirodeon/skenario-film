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


mysql_select_db($database_skenario, $skenario);

$query_rs1 = "SELECT * FROM skenario ".
				"WHERE kd = '$skenkd'";
$rs1= mysql_query($query_rs1, $skenario) or die(mysql_error());
$row_rs1 = mysql_fetch_assoc($rs1);
$totalRows_rs1 = mysql_num_rows($rs1);

$judul = "$jd015 $row_rs1[judul]";
?>
<html>
<head>
<title><?php echo balikin($judul);?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../style/skenario.css" rel="stylesheet" type="text/css">
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function cek(){

if (document.frmsinopsis.sinopsis.value=="") {
alert("Sinopsis belum ditulis!")
return false
}

return true
}
// End -->
</SCRIPT>
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="5" topmargin="5">
<?php include("../include/header.php"); ?>
<table bgcolor="<?php echo $bgcolor;?>" width="<?php echo $width;?>" height="<?php echo $height;?>" border="<?php echo $border;?>" cellpadding="<?php echo $cellpadding;?>" cellspacing="<?php echo $cellspacing;?>">
  <tr> 
    <td width="150" valign="top"><?php include("../include/menu.php"); ?> </td>
    <td width="4" valign="top"><p>&nbsp;</p>
      
    </td>
    <td valign="top"><p><a href="<?php echo $sumber;?>/xskenario/index.php">Daftar 
        Skenario</a> > <a href="<?php echo $sumber;?>/xskenario/profil.php?skenkd=<?php echo $skenkd;?>">Profil 
        --&gt; <?php echo balikin($row_rs1[judul]);?></a> &gt; <?php echo balikin($judul);?></p>
      <p><?php echo xheadline(balikin($judul));?></p>
      <?php
	 mysql_select_db($database_skenario, $skenario);

$query_rsx = "SELECT * FROM skenario_sinopsis ".
				"WHERE kd_skenario = '$skenkd'";
$rsx= mysql_query($query_rsx, $skenario) or die(mysql_error());
$row_rsx = mysql_fetch_assoc($rsx);
$totalRows_rsx = mysql_num_rows($rsx);
?>
      <form action="index1.php" method="post" name="frmsinopsis" id="frmsinopsis" onSubmit="return cek()">
        <p> 
          <textarea name="sinopsis" cols="60" rows="10" id="sinopsis"><?php echo $row_rsx['sinopsis'];?></textarea>
        </p>
        <p> 
          <input name="skenkd" type="hidden" value="<?php echo $_REQUEST['skenkd']; ?>">
          <input type="reset" name="Reset" value="Batal">
          <input name="Submit" type="submit" id="Submit" value="Simpan">
        </p>
      </form></td>
  </tr>
</table>
<?php include("../include/footer.php"); ?>
</body>
</html>
<?php
//diskonek
	xclose;
?>
