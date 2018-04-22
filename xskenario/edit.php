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
$kd = cegah($_REQUEST['kd']);

mysql_select_db($database_skenario, $skenario);

$query_rs1 = "SELECT * FROM skenario ".
				"WHERE kd = '$kd'";
$rs1= mysql_query($query_rs1, $skenario) or die(mysql_error());
$row_rs1 = mysql_fetch_assoc($rs1);
$totalRows_rs1 = mysql_num_rows($rs1);

//judul
$judul = "$jd013 $row_rs1[judul]";
?>
<html>
<head>
<title><?php echo $judul;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../style/skenario.css" rel="stylesheet" type="text/css">
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function cek(){

if (document.frmskenario.judul.value=="") {
alert("Judul skenario film belum ditulis!")
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
    <td valign="top"><p><a href="index.php">Daftar Skenario Film</a> 
        &gt; <?php echo $judul;?></p>
      <p><?php echo xheadline($judul);?></p>
      <form action="edit1.php" method="post" name="frmskenario" id="frmskenario" onSubmit="return cek()">
        <p> Judul :<br>
          <input name="judul" type="text" id="judul" value="<?php echo balikin($row_rs1['judul']);?>" size="50">
        </p>
        <p> 
          <input name="kd" type="hidden" value="<?php echo $_REQUEST['kd'];?>">
          <input type="reset" name="Reset" value="Batal">
          <input name="Submit" type="submit" id="Submit2" value="Simpan">
        </p>
      </form>
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