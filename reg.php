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


//kosongkan session
session_start();

session_unset();
session_destroy();

include("include/config.php"); 
include("include/fungsi.php"); 

nocache();


//nilai
$judul = $jd001;
?>
<html>
<head>
<title><?php echo $judul;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style/skenario.css" rel="stylesheet" type="text/css">
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function cek(){

if (document.frmreg.nama.value=="") {
alert("Nama Anda belum ditulis!")
return false
}

if (document.frmreg.alamat.value=="") {
alert("Alamatnya belum diisi!")
return false
}

if (document.frmreg.telp.value=="") {
alert("Nomor Telepon ada?")
return false
}

if (document.frmreg.email.value=="") {
alert("Alamat E-Mail masih kosong!")
return false
}

if (document.frmreg.username.value=="") {
alert("Username-nya apa?")
return false
}

if (document.frmreg.password.value=="") {
alert("Password belum ditulis!")
return false
}

if (document.frmreg.passtanya.value=="") {
alert("Pertanyaannya apa?")
return false
}

if (document.frmreg.passjawab.value=="") {
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
    <td valign="top"><p><a href="<?php echo $sumber;?>">Halaman Depan</a> &gt; <?php echo $judul;?></p>
      <p><big><strong><?php echo strtoupper($judul);?></strong></big></p>
      <form action="reg1.php" method="post" name="frmreg" id="frmreg" onSubmit="return cek()">
        <p> Nama : <br>
          <input name="nama" type="text" id="nama" size="30">
        </p>
        <p>Alamat :<br>
          <textarea name="alamat" cols="50" rows="3" wrap="VIRTUAL" id="alamat"></textarea>
        </p>
        <p>Telepon :<br>
          <input name="telp" type="text" id="nama3" size="30">
        </p>
        <p>E-Mail : <br>
          <input name="email" type="text" id="nama4" size="30">
        </p>
        <p>&nbsp;</p>
        <p><strong>Akses yang diminta :</strong></p>
        <p>Username : <br>
          <input name="username" type="text" id="nama5" size="15" maxlength="15">
        </p>
        <p>Password :<br>
          <input name="password" type="password" id="nama6" size="15" maxlength="15">
        </p>
        <p>&nbsp;</p>
        <p><strong>Jika Lupa Password :</strong></p>
        <p>Pertanyaan :<br>
          <input name="passtanya" type="text" id="nama7" size="50">
        </p>
        <p>Jawaban : <br>
          <input name="passjawab" type="text" id="nama8" size="50">
        </p>
        <p> 
          <input type="reset" name="Reset" value="Batal">
          <input name="Submit" type="submit" id="Submit" value="Simpan">
        </p>
      </form>
      
    </td>
  </tr>
</table>
<?php include("include/footer.php"); ?>


</body>
</html>
