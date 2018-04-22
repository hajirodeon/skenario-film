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

//jika belum login
if (($_SESSION['member_session'] == "") AND ($_SESSION['username_session'] == "") AND ($_SESSION['hajirobe_session'] == ""))
	{
	?>	
<table width="150" border="1" cellpadding="3" cellspacing="0" bordercolor="#CCCCCC">
  <tr> 
    <td height="27"><a href="<?php echo $sumber;?>">Halaman Depan</a></td>
  </tr>
  <tr> 
    <td><a href="<?php echo $sumber;?>/reg.php">Daftar</a></td>
  </tr>
  <tr> 
    <td><a href="<?php echo $sumber;?>/login.php">Login</a></td>
  </tr>
  <tr> 
    <td><a href="<?php echo $sumber;?>/lp_pass.php">Lupa Password</a></td>
  </tr>
</table>

	
	<?
	}

else
	{
	?>


<table width="152" border="1" cellpadding="3" cellspacing="0" bordercolor="#CCCCCC">
  <tr> 
    <td width="152" height="27"><a href="<?php echo $sumber;?>">Halaman 
      Depan</a></td>
  </tr>
  <tr> 
    <td><a href="<?php echo $sumber;?>/profil.php">Ganti 
      Profil</a></td>
  </tr>
  <tr> 
    <td><a href="<?php echo $sumber;?>/password.php">Ganti 
      Password</a></td>
  </tr>
  <tr> 
    <td><a href="<?php echo $sumber;?>/xskenario/index.php">Daftar 
      Skenario</a></td>
  </tr>
  <tr> 
    <td><a href="<?php echo $sumber;?>/xref/index.php">Daftar 
      Istilah</a></td>
  </tr>
  <tr> 
    <td><a href="<?php echo $sumber;?>/logout.php">KELUAR</a></td>
  </tr>
</table>
<?php
	}
	?>