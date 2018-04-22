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

include("include/fungsi.php"); 
include("include/config.php"); 

nocache();

//judul
$judul = $jd005;
?>
<html>
<head>
<title><?php echo $judul;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style/skenario.css" rel="stylesheet" type="text/css">
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function cek(){

if (document.frmlogin.username.value=="") {
alert("Username-nya apa?")
return false
}

if (document.frmlogin.password.value=="") {
alert("Password belum ditulis!")
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
    <td valign="top"><p><a href="<?php echo $sumber;?>">Halaman 
        Depan</a> &gt; <?php echo $judul;?></p>
      <p><big><strong><?php echo $judul;?></strong></big></p>
      <form action="login1.php" method="post" name="frmlogin" id="frmlogin" onSubmit="return cek()">
        <p> Username : 
          <input name="username" type="text" id="username" size="15" maxlength="15">
        </p>
        <p>Password : 
          <input name="password" type="password" id="password" size="15" maxlength="15">
        </p>
        <p> 
          <input type="reset" name="Reset" value="Batal">
          <input name="Submit" type="submit" id="Submit" value="OK">
        </p>
      </form>
      <p>&nbsp;</p></td>
  </tr>
</table>
<?php include("include/footer.php"); ?>


</body>
</html>
