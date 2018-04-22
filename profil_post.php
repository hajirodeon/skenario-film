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
 

//koneksi
require_once('Connections/skenario.php'); 

nocache();

//judul
$judul = $jd002;

//ambil nilai
$kd_session = $_SESSION['kd_session'];

$SQL1 = sprintf("SELECT * FROM member ".
					"WHERE kd = '$kd_session'");

mysql_select_db($database_skenario, $skenario);
$Rs1 = mysql_query($SQL1, $skenario) or die(mysql_error());
$row_rs1 = mysql_fetch_assoc($Rs1);
$totalRows_rs1 = mysql_num_rows($Rs1);
?>
<html>
<head>
<title><?php echo $judul;?> --> <?php echo $_SESSION['nama_session'];?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style/skenario.css" rel="stylesheet" type="text/css">
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function cek(){

if (document.frmedit.nama.value=="") {
alert("Nama Anda belum ditulis!")
return false
}

if (document.frmedit.alamat.value=="") {
alert("Alamatnya belum diisi!")
return false
}

if (document.frmedit.telp.value=="") {
alert("Nomor Telepon ada?")
return false
}

if (document.frmedit.email.value=="") {
alert("Alamat E-Mail masih kosong!")
return false
}

if (document.frmedit.passtanya.value=="") {
alert("Pertanyaannya apa?")
return false
}

if (document.frmedit.passjawab.value=="") {
alert("Jawaban belum diisi!")
return false
}


return true
}
// End -->
</SCRIPT>
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="5" topmargin="5">
<?php include("include/header.php"); ?>
<table bgcolor="<?php echo $bgcolor;?>" width="<?php echo $width;?>" height="<?php echo $height;?>" border="<?php echo $border;?>" cellpadding="<?php echo $cellpadding;?>" cellspacing="<?php echo $cellspacing;?>">
  <tr> 
    <td width="150" valign="top"><?php include("include/menu.php"); ?>
      </td>
    <td width="4" valign="top">&nbsp;</td>
    <td valign="top"><p><big><strong><?php echo $judul;?> --> <?php echo $_SESSION['nama_session'];?>&nbsp; 
        </strong></big></p>
      <form action="profil_post1.php" method="post" name="frmedit" id="frmedit" onSubmit="return cek()">
        <p><strong>Nama :</strong><br>
          
          <input name="nama" type="text" id="nama" value="<?php echo $row_rs1['nama'];?>" size="30">
        </p>
        <p><strong>Alamat :</strong><br>
          
          <textarea name="alamat" cols="50" rows="3" wrap="VIRTUAL" id="alamat"><?php echo $row_rs1['alamat'];?></textarea>
        </p>
        <p><strong>Telepon :</strong><br>
        
          <input name="telp" type="text" id="telp" value="<?php echo $row_rs1['telp'];?>" size="30">
        </p>
        <p><strong>E-Mail :</strong><br>
          
          <input name="email" type="text" id="email" value="<?php echo $row_rs1['email'];?>" size="30">
        </p>
        <p>&nbsp;</p>
        <p><strong>Jika Lupa Password :</strong></p>
        <p><strong>Pertanyaan :</strong><br>
          
          <input name="passtanya" type="text" id="passtanya" value="<?php echo $row_rs1['passtanya'];?>" size="50">
        </p>
        <p><strong>Jawaban :</strong><br>
          <input name="passjawab" type="text" id="passjawab" value="<?php echo $row_rs1['passjawab'];?>" size="50">
        </p>
        <p> 
          <input name="Submit" type="submit" id="Submit" value="Simpan">
        </p>
      </form>
      
    </td>
  </tr>
</table>
<?php include("include/footer.php"); ?>


</body>
</html>
