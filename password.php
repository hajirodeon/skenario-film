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
 

nocache();

//judul
$judul = $jd003;
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

if (document.frmpass.passlama.value=="") {
alert("Password Lama Belum Dimasukkan!")
return false
}

if (document.frmpass.passbaru.value=="") {
alert("Password Baru Belum Dimasukkan!")
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
    <td valign="top"><p><big><strong><?php echo strtoupper($judul);?> </strong></big></p>
      <form action="password1.php" method="post" name="frmpass" id="frmpass" onSubmit="return cek()">
        <p><strong>Password Lama :</strong><br>
          <input name="passlama" type="password" id="passlama" size="15" maxlength="15">
        </p>
        <p><strong>Password Baru :</strong><br>
          <input name="passbaru" type="password" id="passbaru" size="15" maxlength="15">
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
