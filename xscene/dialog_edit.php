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
$dikd = cegah($_REQUEST['dikd']);
$skenkd = cegah($_REQUEST['skenkd']);
$scenekd = cegah($_REQUEST['scenekd']);

//judul
$judul = $jd021;
?>
<html>
<head>
<title><?php echo balikin($judul);?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../style/skenario.css" rel="stylesheet" type="text/css">
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function cek(){

if (document.frmdi.pemain.value=="") {
alert("Siapa yang berdialog?")
return false
}

if (document.frmdi.di.value=="") {
alert("Dialognya belum ditulis!")
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
    <td width="150" valign="top"><?php include("../include/menu.php"); ?></td>
    <td width="4" valign="top"><p></p></td>
    <td valign="top"><a href="index.php?skenkd=<?php echo $skenkd;?>&scenekd=<?php echo $scenekd;?>">Kembali</a></p>
      <?php 
	//tampilkan deskripsi
	$SQL1 = sprintf("SELECT * FROM skenario_scene_dialog ".
						"WHERE kd_skenario = '$skenkd' ".
						"AND kd_sceneplot = '$scenekd' ".
						"AND kd = '$dikd'");

	mysql_select_db($database_skenario, $skenario);
	$Rs1 = mysql_query($SQL1, $skenario) or die(mysql_error());
	$row_rs1 = mysql_fetch_assoc($Rs1);
	$totalRows_rs1 = mysql_num_rows($Rs1);
	
	?>
      <form action="dialog_edit1.php" method="post" name="frmdi" id="frmdi" onSubmit="return cek()">
        <?php echo xheadline(balikin($judul));?> 
        <p>Pemain / Karakter / Aktor : <br>
          <input name="pemain" type="text" id="pemain" value="<?php echo $row_rs1['pemain'];?>" size="50">
        </p>
        <p>Dialog : <br>
          <textarea name="di" cols="50" rows="5" wrap="VIRTUAL" id="di"><?php echo $row_rs1['dialog'];?></textarea>
        </p>
        <p> 
          <input name="dikd" type="hidden" value="<?php echo $dikd;?>">
          <input name="skenkd" type="hidden" value="<?php echo $skenkd;?>">
          <input name="scenekd" type="hidden" value="<?php echo $scenekd;?>">
          <input type="reset" name="Reset" value="Batal">
          <input name="Submit" type="submit" id="Submit" value="Simpan">
        </p>
      </form>
      <p>&nbsp;&nbsp;</td>
  </tr>
</table>
<?php include("../include/footer.php"); ?>
</body>
</html>