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
$tokohkd = cegah($_REQUEST['tokohkd']);

mysql_select_db($database_skenario, $skenario);

$query_rs1 = "SELECT * FROM skenario ".
				"WHERE kd = '$skenkd'";
$rs1= mysql_query($query_rs1, $skenario) or die(mysql_error());
$row_rs1 = mysql_fetch_assoc($rs1);
$totalRows_rs1 = mysql_num_rows($rs1);

//judul
$judul = "$jd008 $row_rs1[judul]";
?>
<html>
<head>
<title><?php echo balikin($judul);?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../style/skenario.css" rel="stylesheet" type="text/css">
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function cek(){

if (document.frmtokoh.nama.value=="") {
alert("Namanya siapa?")
return false
}

if (document.frmtokoh.panggilan.value=="") {
alert("Panggilannya apa?")
return false
}

if (document.frmtokoh.usia.value=="") {
alert("Usianya berapa?")
return false
}

if (document.frmtokoh.fisik.value=="") {
alert("Gambaran fisiknya bagaimana?")
return false
}

if (document.frmtokoh.psikis.value=="") {
alert("Gambaran psikisnya seperti apa?")
return false
}

if (document.frmtokoh.status.value=="") {
alert("Statusnya apa?")
return false
}

if (document.frmtokoh.agama.value=="") {
alert("Agamanya apa?")
return false
}

if (document.frmtokoh.profesi.value=="") {
alert("Apa profesinya?")
return false
}

if (document.frmtokoh.cirikhusus.value=="") {
alert("Bagaimana ciri khususnya?")
return false
}

if (document.frmtokoh.latarbelakang.value=="") {
alert("Apa latarbelakangnya?")
return false
}

if (document.frmtokoh.peran.value=="") {
alert("Perannya sebagai apa?")
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
    <td width="150" valign="top"><?php include("../include/menu.php"); ?> <p>&nbsp;</p></td>
    <td width="4" valign="top"><p>&nbsp;</p>
      </td>
    <td valign="top"><p><a href="index.php?skenkd=<?php echo $skenkd;?>">Kembali</a></p>
      <p><?php echo xheadline(balikin($judul));?>
        <?php
	  mysql_select_db($database_skenario, $skenario);

$query_rsx = "SELECT * FROM skenario_tokoh ".
				"WHERE kd_skenario = '$skenkd' ".
				"AND kd = '$tokohkd'";
$rsx= mysql_query($query_rsx, $skenario) or die(mysql_error());
$row_rsx = mysql_fetch_assoc($rsx);
$totalRows_rsx = mysql_num_rows($rsx);
?>
      </p>
      <form action="edit1.php" method="post" name="frmtokoh" id="frmtokoh" onSubmit="return cek()">
        <p>Nama : <br>
          <input name="nama" type="text" id="nama" value="<?php echo balikin($row_rsx['nama']);?>" size="30">
        </p>
        <p>Panggilan :<br>
          <input name="panggilan" type="text" id="panggilan" value="<?php echo balikin($row_rsx['panggilan']);?>" size="30">
        </p>
        <p>Usia :<br>
          <input name="usia" type="text" id="usia" value="<?php echo balikin($row_rsx['usia']);?>" size="2">
          tahun </p>
        <p>Gambaran Fisik :<br>
          <textarea name="fisik" cols="50" rows="3" wrap="VIRTUAL" id="fisik"><?php echo balikin($row_rsx['fisik']);?></textarea>
        </p>
        <p>Gambaran Psikis :<br>
          <textarea name="psikis" cols="50" rows="3" wrap="VIRTUAL" id="psikis"><?php echo balikin($row_rsx['psikis']);?></textarea>
        </p>
        <p>Status :<br>
          <input name="status" type="text" id="status" value="<?php echo balikin($row_rsx['status']);?>" size="40">
        </p>
        <p>Agama :<br>
          <input name="agama" type="text" id="agama" value="<?php echo balikin($row_rsx['agama']);?>" size="30">
        </p>
        <p>Profesi :<br>
          <input name="profesi" type="text" id="profesi" value="<?php echo balikin($row_rsx['profesi']);?>" size="50">
        </p>
        <p>Ciri Khusus :<br>
          <input name="cirikhusus" type="text" id="cirikhusus" value="<?php echo balikin($row_rsx['cirikhusus']);?>" size="50">
        </p>
        <p>Latar Belakang :<br>
          <textarea name="latarbelakang" cols="50" rows="3" id="latarbelakang"><?php echo balikin($row_rsx['latarbelakang']);?></textarea>
        </p>
        <p>Peran : <br>
          <input name="peran" type="text" id="peran" value="<?php echo balikin($row_rsx['peran']);?>" size="50">
        </p>
        <p> 
          <input name="skenkd" type="hidden" value="<?php echo $skenkd;?>">
          <input name="tokohkd" type="hidden" id="tokohkd" value="<?php echo $tokohkd;?>">
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
