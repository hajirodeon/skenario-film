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

//konek db
require_once('Connections/skenario.php'); 

//nilai
$judul = $jd004;
?>
<html>
<head>
<title><?php echo $judul;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style/skenario.css" rel="stylesheet" type="text/css">

</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="5" topmargin="5">
<?php include("include/header.php"); ?>
<table bgcolor="<?php echo $bgcolor;?>" width="<?php echo $width;?>" height="<?php echo $height;?>" border="<?php echo $border;?>" cellpadding="<?php echo $cellpadding;?>" cellspacing="<?php echo $cellspacing;?>">
  <tr> 
    <td valign="top"><p><a href="<?php echo $sumber;?>">Halaman Depan</a> &gt; <?php echo $judul;?></p>
      <p><big><strong><?php echo strtoupper($judul);?></strong></big></p>
      <?php 
	  //jika belum dimasukkan --> username
	  if ($_POST['username'] == "")
	  		{
	  ?>	  
	  <SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function cek(){

if (document.frm1.username.value=="") {
alert("Masukkan USERNAME-nya!")
return false
}

return true
}
// End -->
</SCRIPT>
	  <form action="lp_pass.php" method="post" name="frm1" id="frm1" onSubmit="return cek()">
		<p> <strong>Username : </strong><br>
          <input name="username" type="text" id="username" size="15" maxlength="15">
        </p>
		<?php
			}
		else
			{
			?><SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function cek(){

if (document.frm1.passjawab.value=="") {
alert("Jawabannya apa?")
return false
}

return true
}
// End -->
</SCRIPT>
		<form action="lp_pass1.php" method="post" name="frm1" id="frm1" onSubmit="return cek()">
		<p> <strong>Username : </strong><br>
          <?php 
		  $username = balikin($_POST['username']);
		  
		  	$SQL = sprintf("SELECT * FROM member ".
								"WHERE username = '$username'");

			mysql_select_db($database_skenario, $skenario);
			$rs1 = mysql_query($SQL, $skenario) or die("Tidak ada data");
			$row_rs1 = mysql_fetch_assoc($rs1);
			$totalRows_rs1 = mysql_num_rows($rs1);
			
			if ($totalRows_rs1 != 1) 
				{
				echo "TIDAK DITEMUKAN USERNAME : $username";
				}
			else
				{
		  		echo balikin($_POST['username']);
						  
		  ?>
        </p>
		<p> <strong>Pertanyaan : </strong><br>
          <?php 
		 	echo balikin($row_rs1['passtanya']);
		  	}
		  ?>
        </p>
        <p>Jawaban : <br>
          <input name="passjawab" type="text" id="passjawab" size="30">
        </p>
		<input name="username" type="hidden" value="<?php echo $username;?>">
		<?php
			}
			?>
        <p> 
          <input name="Submit" type="submit" id="Submit" value="&gt;&gt;&gt;">
        </p>
      </form>
	  
	 
      <p>&nbsp;</p></td>
  </tr>
</table>
<?php include("include/footer.php"); ?>
</body>
</html>
